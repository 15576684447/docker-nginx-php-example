<?php

header("Content-type: text/json; charset=utf8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/cftp.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

function getFiles() {
  //$db = new SQLite3(constant("CSDB"));
  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open($_SERVER['DOCUMENT_ROOT'] . '/database/cst.db');
      }
   }
  $db = new MyDB();
  $sql = 'select rowid as ROW_ID,NAME,DUR,SIZE,CTIME,UP from T_REC_FILE order by ROW_ID desc;';
  $result = $db->query($sql);
  $rows=array();
  while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
    $rows[]=$res;
  }
  echo json_encode($rows);
  $db->close();
}
function upFile() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $row_id=(int)$_POST["param"];
  $sql = 'select NAME from T_REC_FILE where rowid='.$row_id.';';
  $fname = $db->querySingle($sql);
  $info="上传失败,请检查权限及路径是否正确！";
  if(isset($fname))
  {
    $fpath="/mnt/video/".$fname;
    if(file_exists($fpath))
    {
      $sql = 'select * from T_UPLOAD_PARAM where UP_ID=1;';
      $result = $db->query($sql);
      $row = $result->fetchArray(SQLITE3_ASSOC);
      if(isset($row["UP_ID"]))
      {
        $ftp = new cftp($row['SVR_IP'], $row['SVR_PORT'], $row['FTP_USER'], $row['FTP_PASS']);
        $from="video/".$fname;
        $to=$fname.".tmp";
        $res = $ftp->up_file($from, $to);
        if($res) {
          $sql = 'update T_REC_FILE set UP=1 where rowid='.$row_id.';';
          $db->exec($sql);
          $ftp->move_file($to,$fname);
          $info="上传成功!";
        }
        $ftp->close();
      }
    }
  }
  $db->close();
  echo "{\"msg\":\"$info\"}";
}
function delFile() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $row_id=(int)$_POST["param"];
  $sql = 'select NAME from T_REC_FILE where rowid='.$row_id.';';
  $fname = $db->querySingle($sql);
  $arr=explode('.',$fname);
  $delpath="/mnt/video/".$arr[0].".*";
  shell_exec("rm -f ".$delpath);
  $sql = 'delete from T_REC_FILE where rowid='.$row_id.';';
  $db->exec($sql);
  echo "{\"msg\":\"删除成功！\"}";
}
function delmulFile() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_REQUEST["param"]);
  for ($i = 0; $i < count($ps); $i++) {
    $row_id=(int)$ps[$i];
    $sql = 'select NAME from T_REC_FILE where rowid='.$row_id.';';
    $fname = $db->querySingle($sql);
    $arr=explode('.',$fname);
    $delpath="/mnt/video/".$arr[0].".*";
    shell_exec("rm -f ".$delpath);
    $sql = 'delete from T_REC_FILE where rowid='.$row_id.';';
    $db->exec($sql);
  }
  echo "{\"msg\":\"批量删除成功！\"}";
}

function delallFile() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'delete from T_REC_FILE;';
  $db->exec($sql);
  shell_exec("rm -f /mnt/video/*.*");
  $buf = pack("CvC", constant("CMD_SET_SYS"), 1,constant("SUB_SYS_TID"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"全部删除成功！\"}";
}
if (isset($_POST["cmdtype"])) {
  $rt = $_POST["cmdtype"];
  switch ($rt) {
    case 1:
      getFiles();
      break;
    case 2:
      upFile();
      break;
    case 3:
      delFile();
      break;
    case 4:
      delmulFile();
      break;
    case 5:
      delallFile();
      break;
  }
}
?>
