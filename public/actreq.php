<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/filesystem.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/cftp.php');

function UpdateRecFiles() {
  //$db = new SQLite3(constant("CSDB"));
  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open($_SERVER['DOCUMENT_ROOT'] . '/database/cst.db');
      }
   }
  $db = new MyDB();
  $files = Array();
  FileSystem::mp4FileList("/mnt/video/",$files);
  $files.sort();
  foreach( $files as $file) {
    $fname=preg_replace('/^.+[\\\\\\/]/', '', $file);
    $sql = 'select COUNT(*) as count from T_REC_FILE where NAME="'.$fname.'";';
    $count=$db->querySingle($sql);
    if($count==0)
    {
      $dur=shell_exec("mp4time ".$fpath);
      if(strlen($dur)>8)$dur=substr($dur,strlen($dur)-8,8);
      if(substr_count($dur,':')<2)$dur='文件错误';
      $finfo = stat($file);
      $size=$finfo["size"];
      $ctime = $finfo["ctime"];
      $sql = "insert into T_REC_FILE values('".$fname."','".$dur."',".$size.",".$ctime.",0);";
      $db->exec($sql);
    }
  }
  $db->close();
}
function UpdateRecFile() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $tid = (int)$_REQUEST["param"];
  $sql= "select rowid,NAME from T_REC_FILE where ZT=0 and T_ID=".$tid;
  $result = $db->query($sql);
  while ($res = $result->fetchArray(SQLITE3_ASSOC)) 
  {
    $row_id=$res['rowid'];
    $fname = $res['NAME'];
    $fpath = "/mnt/video/".$fname;
    if(file_exists($fpath))
    {
      $dur=shell_exec("mp4time ".$fpath);
      if(strlen($dur)>8)$dur=substr($dur,strlen($dur)-8,8);
      if(substr_count($dur,':')<2)$dur='文件错误';
      $finfo = stat($fpath);
      $size=$finfo["size"];
      $ctime = $finfo["ctime"];
      $sql = "update T_REC_FILE set DUR='".$dur."', SIZE=".$size.",CTIME=".$ctime.",ZT=1 where rowid='".$res['rowid']."';";
      $db->exec($sql);

      $sql = 'select * from T_UPLOAD_AUTO where UA_ID=1;';
      $res_auto= $db->query($sql);
      $row_auto = $result->fetchArray(SQLITE3_ASSOC);
      if(isset($row_auto["UA_ID"])&&($row_auto["ENABLE"]>0)&&($row_auto["UPMODE"]==0))
      {
        $sql = 'select * from T_UPLOAD_PARAM where UP_ID=1;';
        $res_svr = $db->query($sql);
        $row_svr = $res_svr->fetchArray(SQLITE3_ASSOC);
        if(isset($row_svr["UP_ID"]))
        {
          $ftp = new cftp($row_svr['SVR_IP'], $row_svr['SVR_PORT'], $row_svr['FTP_USER'], $row_svr['FTP_PASS']);
          $to=$fname;
          $ret = $ftp->up_file($fpath, $to);
          if($ret) {
            $sql = 'update T_REC_FILE set UP=1 where rowid='.$row_id.';';
            $db->exec($sql);
          }
          $ftp->close();
        }
      }

    }
  }
  $db->close();
}

function UploadRecFiles() {
  $svr_ok=0;
  $rbt_ok=0;
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'select * from T_UPLOAD_PARAM where UP_ID=1;';
  $res_svr = $db->query($sql);
  $row_svr = $res_svr->fetchArray(SQLITE3_ASSOC);
  if(isset($row_svr["UP_ID"]))
  {
    $svr_ip=$row_svr['SVR_IP'];
    $svr_port=$row_svr['SVR_PORT'];
    $svr_user=$row_svr['FTP_USER'];
    $svr_pass=$row_svr['FTP_PASS'];
    $svr_ok=1;
  }
  if($svr_ok>0)
  {
    $sql= "select rowid,NAME from T_REC_FILE where UP=0";
    $result = $db->query($sql);
    while ($res = $result->fetchArray(SQLITE3_ASSOC)) 
    {
      $row_id=$res['rowid'];
      $fname = $res['NAME'];
      $fpath = "/mnt/video/".$fname;
      if(file_exists($fpath))
      {
        $ftp = new cftp($svr_ip, $svr_port, $svr_user, $svr_pass);
        $to=$fname.".tmp";
        $ret = $ftp->up_file($fpath, $to);
        if($ret) {
          $sql = 'update T_REC_FILE set UP=1 where rowid='.$row_id.';';
          $db->exec($sql);
          $ftp->move_file($to,$fname);
        }
        $ftp->close();
        $rbt_ok=1;
      }
    }
  }
  $db->close();
  if($rbt_ok>0)
  {
    shell_exec("reboot");
  }
}

if (isset($_REQUEST["type"])) {
  switch ($_REQUEST["type"]) {
    case 1:
      UpdateRecFiles();
      break;
    case 2:
      UpdateRecFile();
      break;
    case 3:
      UploadRecFiles();
      break;
  }
}
?>