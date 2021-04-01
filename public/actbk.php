<?php
date_default_timezone_set("UTC");
header("Content-type: text/json; charset=utf8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

//$k=$_REQUEST["mk"];
//ActionAckAlarmModule($k);
//DelSubdev();
//return;
function ResetAdminPwd() {
  //$db = new SQLite3(constant("CSDB"));
  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open($_SERVER['DOCUMENT_ROOT'] . '/database/cst.db');
      }
   }
  $db = new MyDB();
  $sql = "update T_USERS set U_PASS='admin' where U_ID=1;";
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"密码复位成功！\"}";
}

function UpdateMAC() {
  shell_exec("/etc/init.d/genmacset");
  echo "{\"msg\":\"MAC地址更新成功！\"}";
}
function InitDev() {
  $fp = fopen("/opt/local/web/inc/devid.php", "w");
  fwrite($fp, "<?php" . PHP_EOL);
  fwrite($fp, 'define("DEVID","VHR6000D' . date('ymdHis', time()) . '");' . PHP_EOL);
  fwrite($fp, "?>");
  fclose($fp);
  echo "{\"msg\":\"设备编号设置成功！\"}";
}
function UpdateInfo() {
  $fp = fopen("/opt/local/web/inc/corp.php", "w");
  fwrite($fp, "<?php" . PHP_EOL);
  fwrite($fp, 'define("CORP","' . $_POST["param"] . '");' . PHP_EOL);
  fwrite($fp, "?>");
  fclose($fp);
  echo "{\"msg\":\"OEM设置成功！\"}";
}
function iirHandle() {
  $ps = explode(',', $_POST["param"]);
  $to = (int) $ps[0];
  $iir = (int) $ps[1];
  $buf = pack("CvCV", constant("CMD_SET_SYS"), 5,constant("SUB_IIR_SET"),$iir);
  SendSocketMsg($buf);
  echo "{\"msg\":\"IIR设置成功！\"}";
}
function SysReset() {
  shell_exec("reboot");
  echo "{\"msg\":\"ok!\"}";
}
function SysHalt() {
  echo "{\"msg\":\"ok!\"}";
  shell_exec("halt");
}
function getComPos() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'select * from T_COM_PARAM where OEID=0 and CT_ID=' . $_POST["param"] . ';';
  $result = $db->query($sql);
  $res = $result->fetchArray(SQLITE3_ASSOC);
  echo json_encode($res);
  $db->close();
}

function updComPos() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $ct_id = (int) $ps[0];
  $win0_x = (int) $ps[1];
  $win0_y = (int) $ps[2];
  $win0_w = (int) $ps[3];
  $win0_h = (int) $ps[4];
  $win1_x = (int) $ps[5];
  $win1_y = (int) $ps[6];
  $win1_w = (int) $ps[7];
  $win1_h = (int) $ps[8];
  $win2_x = (int) $ps[9];
  $win2_y = (int) $ps[10];
  $win2_w = (int) $ps[11];
  $win2_h = (int) $ps[12];
  $win3_x = (int) $ps[13];
  $win3_y = (int) $ps[14];
  $win3_w = (int) $ps[15];
  $win3_h = (int) $ps[16];
  $sql = 'update T_COM_PARAM set WIN0_X=' . $win0_x . ', WIN0_Y=' . $win0_y . ', WIN0_W=' . $win0_w . ', WIN0_H=' . $win0_h .
          ',WIN1_X=' . $win1_x . ', WIN1_Y=' . $win1_y . ', WIN1_W=' . $win1_w . ', WIN1_H=' . $win1_h .
          ',WIN2_X=' . $win2_x . ', WIN2_Y=' . $win2_y . ', WIN2_W=' . $win2_w . ', WIN2_H=' . $win2_h .
          ',WIN3_X=' . $win3_x . ', WIN3_Y=' . $win3_y . ', WIN3_W=' . $win3_w . ', WIN3_H=' . $win3_h .
          ' where CT_ID=' . $ct_id;
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"更新成功!\"}";
}
function pingHandle() {
  $addr = $_POST["param"];
  exec("ping -c 1 {$addr}", $outcome, $status);
  if(is_array($outcome))
  {
    $info=implode('\n',$outcome);
  }
  else
  {
    $info=$outcome;
  }
  echo "{\"value\":\"" . $status . "\",\"info\":\"" . $info . "\"}";
}
function vmHandle()
{
  $action=(int)$_POST["param"];
  $buf = pack("CvCC", constant("CMD_SET_SYS"), 2, constant("SUB_SYS_VM"), $action);
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}
function trackHandle()
{
  $track=(int)$_POST["param"];
  $db = new SQLite3(constant("CSDB"));
  $sql = "update T_MISC_PARAM set TRACK=".$track.";";
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"配置更新成功！\"}";
}
if (isset($_POST["cmdtype"])) {
  $rt = $_POST["cmdtype"];
  switch ($rt) {
    case 1:
      ResetAdminPwd();
      break;
    case 2:
      UpdateMAC();
      break;
    case 3:
      InitDev();
      break;
    case 4:
      UpdateInfo();
      break;
    case 5:
      iirHandle();
      break;
    case 6:
      SysReset();
      break;
    case 7:
      SysHalt();
      break;
    case 8:
      getComPos();
      break;
    case 9:
      updComPos();
      break;
    case 10:
      pingHandle();
      break;
    case 11:
      vmHandle();
      break;
    case 12:
      trackHandle();
      break;
  }
}
?>
