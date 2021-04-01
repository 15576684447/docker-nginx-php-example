<?php

header("Content-type: text/json; charset=utf8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

//$k=$_REQUEST["mk"];
//ActionAckAlarmModule($k);
//effHandle();
//return;
function baseHandle() {
  //$db = new SQLite3(constant("CSDB"));
  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open($_SERVER['DOCUMENT_ROOT'] . '/database/cst.db');
      }
   }
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $enable = (int) $ps[0];
  $debug = (int) $ps[1];
  $mode = (int) $ps[2];
  $cam_id = (int) $ps[3];
  $sql = 'select CAM_ID from T_TRACK_BASE where TB_ID=0;';
  $cam_old = $db->querySingle($sql);
  $sql = 'update T_TRACK_BASE set ENABLE=' . $enable .  ', DEBUG=' . $debug . ', MODE=' . $mode . ', CAM_ID=' . $cam_id . ' where TB_ID=0;';
  $db->exec($sql);
  if($mode==1)
  {
    $buf = pack("CvCCC", constant("CMD_SET_VCOM"), 3, constant("SUB_VCOM_MODE1"),1,2);
    SendSocketMsg($buf);
    sleep(1);
  }

  if($cam_id!=$cam_old)
  {
    $sql = 'update T_TRACK_BASE set CAM_ID=' . $cam_id . ' where TB_ID=0;';
    $db->exec($sql);
    $sql = 'select PQRS from T_TRACK_CAM where CAM_ID='.$cam_id.';';
    $pqrs = $db->querySingle($sql);
    $sql = 'select PTZXR from T_TRACK_CAM where CAM_ID='.$cam_id.';';
    $ptzxr = $db->querySingle($sql);

    $sql = 'update T_PTZ_INIT set PQRS='.$pqrs.';';
    $db->exec($sql);
    $sql = 'update T_RULE_TX set PTZXR='.$ptzxr.';';
    $db->exec($sql);
    $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP2"));
  }
  else
  {
    $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP3"));
  }
  SendSocketMsg($buf);
  $db->close();
  echo "{\"msg\":\"配置更新成功！\"}";
}

function advtHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $minrw = (int) $ps[0];
  $minrh = (int) $ps[1];
  $maxrw = (int) $ps[2];
  $maxrh = (int) $ps[3];
  $rgbth = (int) $ps[4];
  $dirxth = (int) $ps[5];
  $closexth = (int) $ps[6];
  $lostth = (int) $ps[7];
  $mvth = (int) $ps[8];
  $stopth = (int) $ps[9];

  $sql = 'update T_ADVT_PARAM set MINRW=' . $minrw . ',MINRH=' . $minrh . ',MAXRW=' . $maxrw . ',MAXRH=' . $maxrh .
          ', RGBTH=' . $rgbth . ', DIRXTH=' . $dirxth . ', CLOSEXTH=' . $closexth . ', LOSTTH=' . $lostth . ';';
  $db->exec($sql);
  $sql = 'update T_RULE_TX set MVTH=' . $mvth . ',STOPTH=' . $stopth . ' where RTX_ID=0;';
  $db->exec($sql);
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP4"));
  SendSocketMsg($buf);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP5"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function advsHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $minrw = (int) $ps[0];
  $minrh = (int) $ps[1];
  $maxrw = (int) $ps[2];
  $maxrh = (int) $ps[3];
  $rgbth = (int) $ps[4];
  $deltystepth = (int) $ps[5];
  $deltyth = (int) $ps[6];

  $sql = 'update T_ADVS_PARAM set MINRW=' . $minrw . ',MINRH=' . $minrh . ',MAXRW=' . $maxrw . ',MAXRH=' . $maxrh .
          ', RGBTH=' . $rgbth .', DELTYSTEPTH=' . $deltystepth .', DELTYTH=' . $deltyth . ';';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP6"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function advpHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $enable = (int) $ps[0];
  $minrw = (int) $ps[1];
  $minrh = (int) $ps[2];
  $rgbth = (int) $ps[3];

  $sql = 'update T_ADVP_PARAM set MINRW=' . $minrw . ',MINRH=' . $minrh . ', RGBTH=' . $rgbth .', ENABLE=' . $enable . ';';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP7"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function ptzHandle() {
  $ps = explode(',', $_POST["param"]);
  $ptz_id = (int) $ps[0];
  $action = (int) $ps[1];
  $buf = pack("CvCCCC", constant("CMD_SET_PTZ"), 4,constant("SUB_PTZ_CTRL"),$ptz_id,$action,0);
  SendSocketMsg($buf);
  echo "{\"msg\":\"ok\"}";
}

function ptzGetHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'update T_PTZPOS_R set STATUS=0;';
  $db->exec($sql);
  $ptz_id=(int)$_POST["param"];
  $buf = pack("CvCC", constant("CMD_SET_PTZ"), 2,constant("SUB_PTZ_GETPOS"),$ptz_id);
  SendSocketMsg($buf);
  sleep(2);
  $sql = 'select * from T_PTZPOS_R where POS_ID=1;';
  $result = $db->query($sql);
  $res = $result->fetchArray(SQLITE3_ASSOC);
  echo json_encode($res);
  $db->close();
}

function ptzSetHandle() {
  $ps = explode(',', $_POST["param"]);
  $ptz_id= (int) $ps[0];
  $yyyy = (int) $ps[1];
  $zzzz = (int) $ps[2];
  $pqrs = (int) $ps[3];
  $buf = pack("CvCCvvv", constant("CMD_SET_PTZ"), 8,constant("SUB_PTZ_SETPOS"),$ptz_id, $yyyy, $zzzz, $pqrs);
  SendSocketMsg($buf);
  echo "{\"msg\":\"ok\"}";
}

function ptzinitSaveHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $yyyy = (int) $ps[0];
  $zzzz = (int) $ps[1];
  $pqrs = (int) $ps[2];
  $sql = 'update T_PTZ_INIT set YYYY=' . $yyyy . ',ZZZZ=' . $zzzz . ', PQRS=' . $pqrs . ' where PTZ_ID=0;';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP8"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function txSaveHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $posxl=(int)$ps[0];
  $ptzxl=(int)$ps[1];
  $posxr=(int)$ps[2];
  $ptzxr=(int)$ps[3];
  $plus=(int)$ps[4];
  $ignoreh=(int)$ps[5];
  $sql = 'update T_RULE_TX set POSXL=' . $posxl . ',PTZXL=' . $ptzxl . ', POSXR=' . $posxr .',PTZXR=' . $ptzxr . ',PLUS=' . $plus . ' where RTX_ID=0;';
  $db->exec($sql);
  $sql = 'update T_ADVT_PARAM set IGNOREH=' . $ignoreh . ' where AT_ID=0;';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP9"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function GetTrackRule()
{
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'select * from V_CV_STRATEGY;';
  $result = $db->query($sql);
  $rows=array();
  while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
    $rows[]=$res;
  }
  echo json_encode($rows);
  $db->close();
}
function GetOneTrackRule()
{
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'select * from V_CV_STRATEGY where STR_ID='.$_POST["param"].';';
  $result = $db->query($sql);
  $row = $result->fetchArray(SQLITE3_ASSOC);
  echo json_encode($row);
  $db->close();
}
function EditTrackRule()
{
  $suc=1;
  $msg="suc";
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_REQUEST["param"]);
  $str_id=(int)$ps[0];
  $prio=(int)$ps[1];
  $action=(int)$ps[2];
  $ct_id=(int)$ps[3];
  $win0_ch=(int)$ps[4];
  $win1_ch=(int)$ps[5];
  $win2_ch=(int)$ps[6];
  $win3_ch=(int)$ps[7];
  $keep=(int)$ps[8];
  $nst_id=(int)$ps[9];
  $sql='update T_CV_STRATEGY set PRIO='.$prio.',ACTION='.$action.',CT_ID='.$ct_id.
    ',WIN0_CH='.$win0_ch.',WIN1_CH='.$win1_ch.',WIN2_CH='.$win2_ch.',WIN3_CH='.$win3_ch.
    ',KEEP='.$keep.',NST_ID='.$nst_id.' where STR_ID='.$str_id.";";
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_TRACK"), 1, constant("SUB_TRACK_UP10"));
  SendSocketMsg($buf);
  echo "{\"SUC\":\"$suc\",\"MSG\":\"$msg\"}";
}
function debugHandle()
{
  $buf = pack("CvCC", constant("CMD_SET_TRACK"), 2, constant("SUB_TRACK_DEBUG"),(int)$_REQUEST["param"]);
  SendSocketMsg($buf);
  echo "{\"msg\":\"ok\"}";
}
function getStuGrid() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $idx = (int) $_POST["param"];
  $idx=$idx-1;
  $sql = 'select * from T_RULE_GRID where GRID_ID='.$idx.';';
  $result = $db->query($sql);
  $res = $result->fetchArray(SQLITE3_ASSOC);
  echo json_encode($res);
  $db->close();
}
function setStuGrid() {
  $ps = explode(',', $_POST["param"]);
  $idx = (int) $ps[0];
  $idx=$idx-1;
  $yyyy = (int) $ps[1];
  $zzzz = (int) $ps[2];
  $pqrs = (int) $ps[3];
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'update T_RULE_GRID set YYYY=' . $yyyy . ', ZZZZ=' . $zzzz . ', PQRS=' . $pqrs . ' where GRID_ID='.$idx.';';
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"更新成功！\"}";
}
function setStuPQRS() {
  $ps = explode(',', $_POST["param"]);
  $idx = (int) $ps[0];
  $w = (int) $ps[1];
  $h = (int) $ps[2];
  $pqrs = (int) $ps[3];
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'update T_WH_PQRS set W=' . $w . ', H="' . $h . '", PQRS="' . $pqrs . '" where WP_ID='.$idx.';';
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"更新成功！\"}";
}
if (isset($_POST["cmdtype"])) {
  $rt = $_POST["cmdtype"];
  switch ($rt) {
    case 1:
      baseHandle();
      break;
    case 2:
      advtHandle();
      break;
    case 3:
      advsHandle();
      break;
    case 4:
      ptzHandle();
      break;
    case 5:
      ptzGetHandle();
      break;
    case 6:
      ptzSetHandle();
      break;
    case 7:
      ptzinitSaveHandle();
      break;
    case 8:
      txSaveHandle();
      break;
    case 9:
      advpHandle();
      break;
    case 10:
      GetTrackRule();
      break;
    case 11:
      GetOneTrackRule();
      break;
    case 12:
      EditTrackRule();
      break;
    case 13:
      debugHandle();
      break;
    case 14:
      getStuGrid();
      break;
    case 15:
      setStuGrid();
      break;
    case 16:
      setStuPQRS();
      break;
  }
}
?>
