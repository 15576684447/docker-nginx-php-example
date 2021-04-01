<?php
//error_reporting(0); 
date_default_timezone_set("UTC");
header("Content-type: text/json; charset=utf8");
//require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/fileLen.php');

/*
function liveHandle() {
  $enable=(int) $_POST["param"];
  $buf = pack("CvCC", constant("CMD_SET_LIVE"), 2, constant("SUB_LIVE_EN"), $enable);
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}

function recHandle() {
  $status = (int) $_POST["param"];
  $buf = pack("CvCC", constant("CMD_SET_REC"), 2, constant("SUB_REC_CTRL"),$status);
  SendSocketMsg($buf);
  $tmp = @disk_free_space("/mnt");
  $leftspace = round(($tmp / (1024 * 1024 * 1024)), 2) . "G";
  //echo '{"status":"' . $status . '","leftspace":"' . $leftspace . '"}';
}

function recmodeHandle() {
  $buf = pack("CvCC", constant("CMD_SET_SYS"),2,constant("SUB_SYS_RECMODE"),(int) $_POST["param"]);
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}

function dbautoHandle() {
  $buf = pack("CvCC", constant("CMD_SET_SYS"),2,constant("SUB_SYS_DBAUTO"),(int) $_POST["param"]);
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}

function tbHandle() {
  $posid = (int) $_POST["param"];
 // $tb_en = $posid > 0? 1:0;
 // $buf = pack("CvCCC", constant("CMD_SET_TB"),3,constant("SUB_TB_EN"),$tb_en,$posid);
 $buf="tbpos".':'.$posid;
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}

function setComMode() {
  $comid = (int) $_POST["param"];

 // $buf = pack("CvCC", constant("CMD_SET_VCOM"), 2,constant("SUB_VCOM_MODE2"), $comid);
	$buf="vmode".':'.$comid;
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}

function thHandle() {
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
  $txt1 = $ps[1];
  $txt2 = $ps[2];
  $txt3 = $ps[3];
  $txt4 = $ps[4];
  $sql = 'select FONTSIZE from T_RECTXT_PARAM where TXT_ID=1;';
  $fontsize = $db->querySingle($sql);
  $txtw=mb_strlen($txt1,'utf8')*($fontsize);
  $txtx=(1920-$txtw)/2;
  $sql = "update T_RECTXT_PARAM set TXTX=" . $txtx . " where TXT_ID=1;";
  $db->exec($sql);
  $sql = "update T_RECTXT_PARAM set TXT='" . $txt1 . "' where TXT_ID=1 or TXT_ID=6;";
  $db->exec($sql);

  $sql = 'select FONTSIZE from T_RECTXT_PARAM where TXT_ID=2;';
  $fontsize = $db->querySingle($sql);
  $txtw=mb_strlen($txt2,'utf8')*($fontsize);
  $txtx=(1920-$txtw)/2;
  $sql = "update T_RECTXT_PARAM set TXTX=" . $txtx . " where TXT_ID=2;";
  $db->exec($sql);
  $sql = "update T_RECTXT_PARAM set TXT='" . $txt2 . "' where TXT_ID=2 or TXT_ID=7;";
  $db->exec($sql);

  $sql = 'select FONTSIZE from T_RECTXT_PARAM where TXT_ID=3;';
  $fontsize = $db->querySingle($sql);
  $txtw=mb_strlen($txt3,'utf8')*($fontsize);
  $txtx=(1920-$txtw)/2;
  $sql = "update T_RECTXT_PARAM set TXTX=" . $txtx . " where TXT_ID=3;";
  $db->exec($sql);
  $sql = "update T_RECTXT_PARAM set TXT='" . $txt3 . "' where TXT_ID=3 or TXT_ID=8;";
  $db->exec($sql);

  $sql = 'select FONTSIZE from T_RECTXT_PARAM where TXT_ID=4;';
  $fontsize = $db->querySingle($sql);
  $txtw=mb_strlen($txt4,'utf8')*($fontsize);
  $txtx=(1920-$txtw)/2;
  $sql = "update T_RECTXT_PARAM set TXTX=" . $txtx . " where TXT_ID=4;";
  $db->exec($sql);
  $sql = "update T_RECTXT_PARAM set TXT='" . $txt4 . "' where TXT_ID=4 or TXT_ID=9;";
  $db->exec($sql);
  $db->close();
  $buf = pack("CvCC", constant("CMD_SET_HT"),2,constant("SUB_HT_EN"),$enable);
  SendSocketMsg($buf);
  //echo '{"enable":"'.$enable.'","msg":"更新成功!"}';
}
function titHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $enable = (int) $ps[0];
  $txt_col = hexdec($ps[1]);
  $fam_id = (int) $ps[2];
  $fontsize = (int) $ps[3];
  $tit_txt = $ps[4];
  $tit_txt_len=mb_strlen($tit_txt,'utf8');
  $max_len=1920/$fontsize;
  if($tit_txt_len>$max_len)
    $tit_txt=mb_substr($tit_txt,0,$max_len,'utf8');
  $txtw=mb_strlen($tit_txt,'utf8')*($fontsize);
  $txth=$fontsize+10;
  $sql = 'update T_SUBTITLE_PARAM set FAM_ID=' . $fam_id . ', TXT_COL=' . $txt_col .
    ', FONTSIZE=' . $fontsize .', TXTW=' . $txtw .', TXTH=' . $txth .', TXTY=' . $fontsize .
    ', TXT="' . $tit_txt .'", ENABLE=' . $enable . ' where TIT_ID=1;';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvCC", constant("CMD_SET_TIT"),2,constant("SUB_TIT_EN"),$enable);
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}
function volHandle() {
  $ps = explode(',', $_POST["param"]);
  $chid = (int) $ps[0];
  $vol = (int)$ps[1];
  $buf = pack("CvCCC", constant("CMD_SET_AIN"), 3, constant("SUB_AIN_VOL"), $chid, $vol);
  SendSocketMsg($buf);
  //echo "{\"msg\":\"ok\"}";
}
*/
function ptzHandle() {
  $ps = explode(',', $_POST["param"]);
  $ptz_id=(int) $ps[0];
  $cmd = (int) $ps[1];
  $num = (int) $ps[2];
  $msg="ptz".':'.$ptz_id.":".$cmd.":".$num;
  SendSocketMsg($msg);
  echo "{\"msg\":\"ok\"}";
}

function areaHandle() {
	$chid=(int) $_POST["param"];
	$buf="areaDbClick".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"$chid\"}";
}
function out1Handle() {
	$chid=(int) $_POST["param"];
	$buf="areaClick".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"$chid\"}";
}

 function presetHandle()
 {
   $ps = explode(',', $_POST["param"]);
   $ptz_num=(int)$ps[0];
   $preset_mode=(int) $ps[1];
   $preset_num = (int) $ps[2];
   $buf="preset".':'.$ptz_num.":".$preset_mode.":".$preset_num; 
   SendSocketMsg($buf);
   echo "{\"msg\":\"ok\"}";
  }


  /****playback*****/
/**点击文件名后，发送文件对应的id，并播放对应文件**/
function HandleFileListPlayFun()
{
	$chid=(int) $_POST["param"];
	$buf="PlaybackItem".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"ok\"}";
}
/*点击删除后，会将选中的条目删除，并刷新数据库*/
function HandleFileListDeleteFun()
{
	$chid=$_POST["param"];
	$buf="FilelistDelete".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"ok\"}";
}
/*回放时间条，点击时间条对应位置，会跳转到对应时间点，并发送时间戳给下位机*/
function HandlePlayBackTimeStampFun()
{
	$chid=(int) $_POST["param"];
	$buf="PlaybackTimeStamp".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"ok\"}";
	error_log(print_r("jump to timestamp $chid", true));
}
/*音量控制，发送设置的音量值至下位机*/
function HandleVoiceBarFun()
{
	$chid=(int) $_POST["param"];
	$buf="PlaybackVoiceBar".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"ok\"}";
}
/*回放工具条设置，播放、暂停、停止、静音等*/
function HandlePlaybackToolBarFun()
{
	$chid=$_POST["param"];
	$buf="PlaybackToolBar".':'.$chid;
	SendSocketMsg($buf);
	echo "{\"msg\":\"ok\"}";
}


class MyDB extends SQLite3
{
  function __construct()
  {
	 $this->open('./database/mydatabase.db');
	 
  }
}
/*获取要检索数据库文件的ID，并返回其文件长度*/
function HandlePlaybackTimebar()
{
	$file_id=(int) $_POST["param"];
	$db = new MyDB();
	if(!$db){
	  echo $db->lastErrorMsg();
	} 
	$sql = 'select time from record where id='.$file_id.';';
	$fileLen = $db->querySingle($sql);
	$db->close();
	if($fileLen>0)
	{
		setFileLen($fileLen);
		$buf="PlaybackFileID".':'.$file_id;
		SendSocketMsg($buf);
	}
	echo "{\"msg\":\"ok\"}";
}

if (isset($_POST["cmdtype"])) {
  $rt = $_POST["cmdtype"];
  switch ($rt) {
    case 1:
      liveHandle();
      break;
    case 2:
      recHandle();
      break;
    case 3:
      dbautoHandle();
      break;
    case 4:
      recmodeHandle();
      break;

    case 10:
      tbHandle();
      break;
    
    case 20:
      setComMode();
      break;
    
    case 30:
      thHandle();
      break;
    case 31:
      titHandle();
      break;
    case 32:
      volHandle();
      break;
    case 33:
      ptzHandle();
      break;
    case 35:
      areaHandle();
      break;
    case 37:
      out1Handle();
      break;
    case 40:
      presetHandle();
      break;
	  
	  /****playback****/
	case 100:
		HandleFileListPlayFun();
		break;
	case 101:
		HandleFileListDeleteFun();
		break;
	case 102:
		HandlePlayBackTimeStampFun();
		break;
	case 103:
		HandleVoiceBarFun();
		break;
	case 104:
		HandlePlaybackToolBarFun();
		break;
	case 200:
		HandlePlaybackTimebar();
		break;
  }
}
?>
