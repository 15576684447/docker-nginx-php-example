<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

function rec_handle()
{
  if (!isset($_REQUEST["action"])) {
    echo "{ \"value\":\"-1\",\"info\":\"action not found!\" }";
    return;
  }
  $action = (int)$_REQUEST["action"];
  if($action==1)
  {
    if (!isset($_REQUEST["recname"])) {
      echo "{ \"value\":\"-1\",\"info\":\"no recname found!\" }";
      return;
    }
    $recname = $_REQUEST["recname"];
    $buf = pack("CvCCa".strlen($recname), constant("CMD_SET_REC"), 2 + strlen($recname), constant("SUB_REC_NAME"),$action,$recname);
  }
  else
  {
    $buf = pack("CvCC", constant("CMD_SET_REC"), 2, constant("SUB_REC_NAME"),$action);
  }
  SendSocketMsg($buf);
  //$db = new SQLite3(constant("CSDB"));
  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open($_SERVER['DOCUMENT_ROOT'] . '/database/cst.db');
      }
   }
  $db = new MyDB();
  $db->busyTimeout(5000);
  $sql = "select TASKIDX from T_MISC_PARAM where MISC_ID=1;";
  $taskidx = $db->querySingle($sql);
  $db->close();
  echo "{\"value\":\"0\",\"desProID\":\"".$taskidx."\"}";
}
function live_handle()
{
  if (!isset($_REQUEST["action"])) {
    echo "{ \"value\":\"-1\",\"info\":\"action not found!\" }";
    return;
  }
  $action = (int)$_REQUEST["action"];
  $buf = pack("CvCC", constant("CMD_SET_LIVE"), 2, constant("SUB_LIVE_EN"), $action);
  SendSocketMsg($buf);
  echo "{\"value\":\"0\",\"info\":\"suc\"}";
}
function vm_handle()
{
  if (!isset($_REQUEST["action"])) {
    echo "{ \"value\":\"-1\",\"info\":\"action not found!\" }";
    return;
  }
  $action = (int)$_REQUEST["action"];
  $buf = pack("CvCC", constant("CMD_SET_SYS"), 2, constant("SUB_SYS_VM"), $action);
  SendSocketMsg($buf);
  echo "{\"value\":\"0\",\"info\":\"suc\"}";
}
if (isset($_REQUEST["m"])) {
  $cmd = $_REQUEST["m"];
  switch ($cmd) {
    case 'rec':
      rec_handle();
      break;
    case 'live':
      live_handle();
      break;
    case 'vm':
      vm_handle();
      break;
    default:
      echo "{
    \"value\":\"254\",
    \"info\":\"command " . $cmd . " not support!\"
  }";
  }
} else {
  echo "{
    \"value\":\"255\",
    \"info\":\"no command found!\"
  }";
}
?>