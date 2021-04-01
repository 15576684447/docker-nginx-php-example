<?php
header("Content-type: text/json; charset=utf8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

function UpdateAudioConfig() {
  $ps = explode(',', $_POST["param"]);
  $samprate = (int)$ps[0];
  $mode = (int)$ps[1];
  $buf = pack("CvCvC", constant("CMD_SET_AIN"), 4,constant("SUB_AIN_PARAM"),$samprate,$mode);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}
function aoutHandle(){
  $ps = explode(',', $_POST["param"]);
  $out_en = (int)$ps[0];
  $hdmi_en = (int)$ps[1];
  $out_vol = (int)$ps[2];
  $buf = pack("CvCCCC", constant("CMD_SET_AOUT"), 4,constant("SUB_AOUT_PARAM"),$out_en,$hdmi_en,$out_vol);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}

function UpdateEncConfig() {
  $ps = explode(',', $_POST["param"]);
  $venc_id = (int)$ps[0];
  $enable = (int)$ps[1];
  $wh_id = (int)$ps[2];
  $coderate = (int)$ps[3];
  $framerate = (int)$ps[4];
  $iframe = (int)$ps[5];
  $level = (int)$ps[6];
  if($iframe>8)$iframe=8;
  $buf = pack("CvCCCvCCCC", constant("CMD_SET_VENC"), 9, constant("SUB_VENC_PARAM"), $venc_id,$framerate,$coderate,$wh_id,$iframe,$enable,$level);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}
function UpdateComSrc() {
  $ps = explode(',', $_POST["param"]);
  $com_id = (int)$ps[0];
  $win0_ch = (int)$ps[1];
  $win1_ch = (int)$ps[2];
  $win2_ch = (int)$ps[3];
  $win3_ch = (int)$ps[4];
  $win4_ch = (int)$ps[5];
  $win5_ch = (int)$ps[6];
  $win6_ch = (int)$ps[7];
  $win7_ch = (int)$ps[8];
  $buf = pack("CvCCCCCCCCCC", constant("CMD_SET_VCOM"), 6, constant("SUB_VCOM_CH"), 
    $com_id,$win0_ch,$win1_ch,$win2_ch,$win3_ch,$win4_ch,$win5_ch,$win6_ch,$win7_ch);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}
function UpdateOut() {
  $ps = explode(',', $_POST["param"]);
  $out_id = (int)$ps[0];
  $vof_id = (int)$ps[1];
  $bright = (int)$ps[2];
  $contrast = (int)$ps[3];
  $color = (int)$ps[4];
  $sat = (int)$ps[5];
  $vinmap = (int)$ps[6];
  if($out_id==1)
  {
    if($vinmap==1)
    {
      $vof_id=12;
      shell_exec("touch /opt/local/guard/guard_qs");
    }
    else
    {
      shell_exec("rm -f /opt/local/guard/guard_qs");
      shell_exec("killall qs");
    }    
  }
  $buf = pack("CvCCCCCCCC", constant("CMD_SET_VOUT"), 8, constant("SUB_VOUT_PARAM"),
    $out_id,$vof_id,$bright,$contrast,$color,$sat,$vinmap);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}
function UpdateVit() {
  $vit_id = (int)$_POST["param"];
  $buf = pack("CvCC", constant("CMD_SET_VIN"),2,constant("SUB_VIN_VIT"),$vit_id);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}
function tbposHandle() {
  $ps = explode(',', $_POST["param"]);
  $tbp_id = (int)$ps[0];
  $pos_x = (int)$ps[1];
  $pos_y = (int)$ps[2];
  $buf = pack("CvCCvv", constant("CMD_SET_TB"), 6, constant("SUB_TB_POS"),$tbp_id,$pos_x,$pos_y);
  SendSocketMsg($buf);
  echo "{\"msg\":\"更新成功！\"}";
}
function UpdateSubtitle() {
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
  $fam_id = (int) $ps[1];
  $alpha = (int) $ps[2];
  $txt_col = hexdec($ps[3]);
  $fontsize = (int) $ps[4];
  $scroll = (int) $ps[5];
  $tit_txt = $ps[6];
  $tit_txt_len=mb_strlen($tit_txt,'utf8');
  $max_len=1920/$fontsize;
  if($tit_txt_len>$max_len)
    $tit_txt=mb_substr($tit_txt,0,$max_len,'utf8');
  $txtw=mb_strlen($tit_txt,'utf8')*($fontsize);
  $txth=$fontsize+10;
  $sql = 'update T_SUBTITLE_PARAM set FAM_ID=' . $fam_id . ', ALPHA=' . $alpha .', TXT_COL=' . $txt_col .
    ', FONTSIZE=' . $fontsize .', TXTW=' . $txtw .', TXTH=' . $txth .', TXTY=' . $fontsize .', SCROLL=' . $scroll .
    ', TXT="' . $tit_txt .'", ENABLE=' . $enable . ' where TIT_ID=1;';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvCC", constant("CMD_SET_TIT"),2,constant("SUB_TIT_EN"),$enable);
  SendSocketMsg($buf);
  echo "{\"msg\":\"字幕更新成功！\"}";
}

function HTPICHandle() {
  $ps = explode(',', $_POST["param"]);
  $htpic = (int) $ps[0];
  $htdur = (int) $ps[1];
  if($htdur<=0) $htdur=1;
  if($htdur>5) $htdur=5;
  $buf = pack("CvCCC", constant("CMD_SET_HT"),3,constant("SUB_HT_PIC"),$htpic,$htdur);
  SendSocketMsg($buf);
  echo '{"msg":"更新成功!"}';
}
function UpdateRtsp() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $dec_id = (int) $ps[0];
  $enable = (int) $ps[1];
  $link = $ps[2];
  $sql = 'update T_DEC_PARAM set ENABLE=' . $enable . ', LINK="' . $link . '" where DEC_ID=' . $dec_id . ';';
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"配置更新成功！\"}";
}
function UpdateRtmp() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $ro_id = (int) $ps[0];
  $enable = (int) $ps[1];
  $link = $ps[2];
  $mode = (int) $ps[3];
  $tsip = $ps[4];
  $tsport = (int) $ps[5];
  $ttl = (int) $ps[6];
  if($ttl<1)$ttl=1;
  $sql = 'update T_LIVE_PARAM set ENABLE=' . $enable . ', LINK="' . $link .
     '",MODE=' . $mode . ', TSIP="' . $tsip .'",TSPORT='.$tsport .',TTL='.$ttl.' where RO_ID=' . $ro_id . ';';
  $db->exec($sql);
  $db->close();
  //$buf = pack("CvCC", constant("CMD_SET_LIVE"), 2, constant("SUB_LIVE_PARAM"), $ro_id);
  //SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}
function ftpsvrHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $svr_ip=$ps[0];
  $svr_port = (int) $ps[1];
  $ftp_user = $ps[2];
  $ftp_pass = $ps[3];
  $ftp_path = $ps[4];
  $sql = "update T_UPLOAD_PARAM set SVR_PORT=" . $svr_port . ",SVR_IP='" . $svr_ip 
    . "',FTP_USER='" . $ftp_user. "',FTP_PASS='" . $ftp_pass. "',FTP_PATH='" . $ftp_path. "';";
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"配置更新成功！\"}";
}

function ftpautoHandle() {
  $ps = explode(',', $_POST["param"]);
  $enable=(int)$ps[0];
  $upmode = (int) $ps[1];
  $hour = (int)$ps[2];
  $buf = pack("CvCCCC", constant("CMD_SET_FTP"), 4, constant("SUB_FTP_AUTO"), $enable,$upmode,$hour);
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function rsHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $rs_id = (int) $ps[0];
  $baudrate = (int) $ps[1];
  $databits = (int) $ps[2];
  $stopbits = $ps[3];
  $parity = (int) $ps[4];
  $sql = 'update T_RS_PARAM set BAUDRATE=' . $baudrate . ',DATABITS=' . $databits .
          ', STOPBITS=' . $stopbits . ', PARITY=' . $parity . ' where RS_ID=' . $rs_id . ';';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_INT"),1,constant("SUB_INT_RS"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"串口配置更新成功！\"}";
}

function ptzHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $ptz_id = (int) $ps[0];
  $pspeed = (int) $ps[1];
  $tspeed = (int) $ps[2];
  $ptzway = (int) $ps[3];
  $rs_id = (int) $ps[4];
  $addr485 = (int) $ps[5];
  $ipaddr = $ps[6];
  $port = (int) $ps[7];
  $sql = 'update T_PTZ_PARAM set PSPEED=' . $pspeed . ', TSPEED=' . $tspeed . 
     ', PTZWAY=' . $ptzway . ', RS_ID=' . $rs_id . ', ADDR485=' . $addr485 . 
     ',IPADDR="' . $ipaddr . '", PORT=' . $port . ' where PTZ_ID='.$ptz_id.';';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvCC", constant("CMD_SET_PTZ"),2,constant("SUB_PTZ_PARAM"),$ptz_id);
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}
function netHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $ip = $ps[0];
  $mask = $ps[1];
  $gate = $ps[2];
  $dns1 = $ps[3];
  $dns2 = $ps[4];
  $sql = 'update T_NET_PARAM set IP="' . $ip . '", MASK="' . $mask . '", GATE="' . $gate . '", DNS1="' . $dns1 . '", DNS2="' . $dns2 . '" where NET_ID=1';
  $db->exec($sql);
  $db->close();
  shell_exec('echo ifconfig eth0 ' . $ip . ' netmask ' . $mask . ' > /etc/init.d/net0init');
  shell_exec("echo route add default gw " . $gate . " >> /etc/init.d/net0init");
  shell_exec('chmod +x /etc/init.d/net0init');
  shell_exec('echo nameserver ' . $dns1 . ' > /etc/resolv.conf');
  shell_exec("echo nameserver " . $dns2 . " >> /etc/resolv.conf");
  echo "{\"msg\":\"网络配置更新成功！\"}";
}
function UpdatePass() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $uid = (int)$ps[0];
  $pass=$ps[1];
  $sql = 'update T_USERS set U_PASS="' . $pass . '" where U_ID='.$uid.';';
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"密码更新成功！\"}";
}
function SetSysTime() {
  $ps = explode(',', $_POST["param"]);
  $year = ((int) $ps[0]) % 100;
  $mon = ((int) $ps[1]) % 13;
  $day = ((int) $ps[2]) % 32;
  $hour = ((int) $ps[3]) % 24;
  $min = ((int) $ps[4]) % 60;
  $sec = ((int) $ps[5]) % 60;
  shell_exec("settime " . $year . " " . $mon . " " . $day . " " . $hour . " " . $min . " " . $sec);
  echo "{\"msg\":\"时间更新成功！\"}";
}
function titleHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  for ($i = 0; $i < count($ps); $i++) {
    $sql = 'update T_TITLE_PARAM set TITLE="' . $ps[$i] . '" where TIT_ID=' . ($i+1) . ';';
    $db->exec($sql);
  }
  $db->close();
  echo "{\"msg\":\"配置更新成功！\"}";
}
function ruleHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $db_id = (int) $ps[0];
  $enc = (int) $ps[1];
  $out = (int) $ps[2];
  $cmd = $ps[3];
  $ct_id = (int) $ps[4];
  $win0_ch = (int) $ps[5];
  $win1_ch = (int) $ps[6];
  $win2_ch = (int) $ps[7];
  $win3_ch = (int) $ps[8];
  $sql = 'update T_DB_RULE set CMD="' . $cmd . '", CT_ID=' . $ct_id .
    ', WIN0_CH=' . $win0_ch . ', WIN1_CH=' . $win1_ch . ', WIN2_CH=' . $win2_ch . 
    ', WIN3_CH=' . $win3_ch . ', ENC=' . $enc .', OUT=' . $out . 
     ' where DB_ID=' . $db_id . ';';
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"配置更新成功！\"}";
}
function udp_portHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $udp_port = (int)$_POST["param"];
  $sql = 'update T_MISC_PARAM set UDP_PORT=' .$udp_port. ' where MISC_ID=1;';
  $db->exec($sql);
  $db->close();
  echo "{\"msg\":\"监听端口更新成功,请重启设备生效！\"}";
}
function resetdbHandle() {
  $dir = (int)$_POST["param"];
  if($dir>0)
  {
    shell_exec("cp -f /opt/local/db/cst.init /opt/local/db/cst.db");
    $info="已恢复为出厂设置,请重启设备生效！";
  }
  else
  {
    shell_exec("cp -f /opt/local/db/cst.db /opt/local/db/cst.init");
    $info="已保存为出厂设置！";
  }
  echo "{\"msg\":\"$info\"}";
}
function upgradeHandle() {
  $up_id = (int)$_POST["param"];
  if($up_id==0)
  {
    shell_exec("rm -rf /opt/local/upgrade");
    shell_exec("mkdir /opt/local/upgrade");
    $info="升级环境准备成功！";
  }
  else
  {
    if(file_exists("/opt/local/upgrade/upgrade.tar"))
    {
      shell_exec("cd /opt/local/upgrade/ && tar xvf upgrade.tar");
      if(file_exists("/opt/local/upgrade/upgrade.sh"))
      {
        shell_exec("chmod +x /opt/local/upgrade/upgrade.sh");
        shell_exec("/opt/local/upgrade/upgrade.sh");
        $info="恭喜，升级成功！";
      }
      else
      {
        $info="upgrade.sh文件不存在！";
      }
    }
    else
    {
      $info="upgrade.tar文件不存在！";
    }
  }
  echo "{\"msg\":\"$info\"}";
}
function GetCtrlRule()
{
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'select * from V_CTRL_RULE;';
  $result = $db->query($sql);
  $rows=array();
  while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
    $rows[]=$res;
  }
  echo json_encode($rows);
  $db->close();
}
function GetOneCtrlRule()
{
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $sql = 'select rowid as ROW_ID,CMD,TYPE_ID,CODE_ID,WIN0_CH,WIN1_CH,WIN2_CH,WIN3_CH,RE,REMSG from T_CTRL_RULE where rowid='.$_POST["param"].';';
  $result = $db->query($sql);
  $row = $result->fetchArray(SQLITE3_ASSOC);
  echo json_encode($row);
  $db->close();
}
function DelCtrlRule() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_REQUEST["param"]);
  for ($i = 0; $i < count($ps); $i++) {
    $row_id=(int)$ps[$i];
    $sql = 'delete from T_CTRL_RULE where rowid='.$row_id.';';
    $db->exec($sql);
  }
  echo "{\"msg\":\"删除成功！\"}";
}
function EditCtrlRule()
{
  $suc=1;
  $msg="suc";
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_REQUEST["param"]);
  $row_id=(int)$ps[0];
  $cmd=$ps[1];
  $type_id=(int)$ps[2];
  $code_id=(int)$ps[3];
  $win0_ch=(int)$ps[4];
  $win1_ch=(int)$ps[5];
  $win2_ch=(int)$ps[6];
  $win3_ch=(int)$ps[7];
  $re=(int)$ps[8];
  $remsg=$ps[9];
  if($row_id>0)
  {
    $sql='update T_CTRL_RULE set CMD="'.$cmd.'",TYPE_ID='.$type_id.',CODE_ID='.$code_id.
    ',WIN0_CH='.$win0_ch.',WIN1_CH='.$win1_ch.',WIN2_CH='.$win2_ch.',WIN3_CH='.$win3_ch.
    ',RE='.$re.',REMSG="'.$remsg.'" where rowid='.$row_id.";";
    $db->exec($sql);
  }
  else
  {
    $sql = 'select count(*) from T_CTRL_RULE where CMD="'.$cmd.'";';
    $recnum = $db->querySingle($sql);
    if($recnum==0)
    {
      $sql='insert into T_CTRL_RULE values("'.$cmd.'",'.$type_id.','.$code_id.','.
        $win0_ch.','.$win1_ch.','.$win2_ch.','.$win3_ch.','.$re.',"'.$remsg.'");';
      $db->exec($sql);
    }
    else
    {
      $suc=0;
      $msg='添加失败! 此命令串已存在!';
    }
  }
  $db->close();
  echo "{\"SUC\":\"$suc\",\"MSG\":\"$msg\"}";
}

function MiscHandle() {
  //$db = new SQLite3(constant("CSDB"));
  $db = new MyDB();
  $ps = explode(',', $_POST["param"]);
  $format = (int) $ps[0];
  $rectime = (int) $ps[1];
  $flash = (int)$ps[2];
  $ctrllen = (int)$ps[3];
  $bkpic = (int)$ps[4];
  $sql = 'update T_MISC_PARAM set RECFORMAT=' .$format. ',RECTIME='.$rectime.',FLASH='.$flash.',CTRLLEN='.$ctrllen.',BKPIC='.$bkpic.' where MISC_ID=1;';
  $db->exec($sql);
  $db->close();
  $buf = pack("CvC", constant("CMD_SET_SYS"),1,constant("SUB_SYS_MISC"));
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功!\"}";
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

function FormatDisk() {
  $suc=1;
  $info="硬盘格式化提交成功!";
  if(file_exists("/tmp/formating"))
  {
    $suc=0;
    $info="硬盘格式化正在进行,不可重复提交!";
  }
  if(file_exists("/mnt/format.done"))
  {
    $suc=0;
    $info="硬盘刚格式化完,尚未重启,请重启!";
    
    //$db = new SQLite3(constant("CSDB"));
	$db = new MyDB();
    $sql = 'delete from T_REC_FILE;';
    $db->exec($sql);
    $db->close();
  }
  if($suc==1)
  {
    shell_exec("/bin/partition.sh");
    shell_exec("/bin/format.sh > /dev/null 2>&1 &");
  }
  echo "{\"suc\":\"" . $suc . "\",\"info\":\"" . $info . "\"}";
}


function sdiFormatHandle() {
  $ps = explode(',', $_POST["param"]);
  $vin_id = (int) $ps[0];
  $fmt_id = (int) $ps[1];
  $buf = pack("CvCCC", constant("CMD_SET_VIN"),3,constant("SUB_VIN_FMT"),$vin_id,$fmt_id);
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}

function hdmi1Handle() {
  $hdmi1 = (int) $_POST["param"];
  $buf = pack("CvCC", constant("CMD_SET_VOUT"),2,constant("SUB_VOUT_HDMI1"),$hdmi1);
  SendSocketMsg($buf);
  echo "{\"msg\":\"配置更新成功！\"}";
}
if (isset($_POST["cmdtype"])) {
  $rt = $_POST["cmdtype"];
  switch ($rt) {
    case 1:
      UpdateAudioConfig();
      break;
    case 2:
      UpdateEncConfig();
      break;
    case 3:
      UpdateComCur();
      break;
    case 4:
      UpdateComSrc();
      break;
    case 6:
      UpdateOut();
      break;
    case 7:
      UpdateVit();
      break;
    case 8:
      tbposHandle();
      break;
    case 9:
      aoutHandle();
      break;
    case 20:
      UpdateSubtitle();
      break;
    case 31:
      HTPICHandle();
      break;
    case 50:
      UpdateRtsp();
      break;
    case 51:
      UpdateRtmp();
      break;
    
    case 53:
      rsHandle();
      break;
    case 54:
      ptzHandle();
      break;
    case 55:
      netHandle();
      break;
    case 56:
      UpdatePass();
      break;
    case 57:
      SetSysTime();
      break;
    case 58:
      titleHandle();
      break;
    case 59:
      ruleHandle();
      break;
    case 60:
      udp_portHandle();
      break;
    case 62:
      resetdbHandle();
      break;
    case 63:
      upgradeHandle();
      break;
    case 70:
      GetCtrlRule();
      break;
    case 71:
      GetOneCtrlRule();
      break;
    case 72:
      DelCtrlRule();
      break;
    case 73:
      EditCtrlRule();
      break;
    case 74:
      MiscHandle();
      break;
    case 75:
      pingHandle();
      break;
    case 76:
      FormatDisk();
      break;
    case 77:
      sdiFormatHandle();
      break;
    case 80:
      ftpsvrHandle();
      break;
    case 81:
      ftpautoHandle();
      break;
    case 82:
      hdmi1Handle();
      break;
  }
}
?>
