<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="0"/>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/corp.php');
    echo "<title>录播一体机-" . constant("CORP") . "</title>";
    ?>
    <!-- main JS libs -->
    <script src="js/libs/modernizr.min.js"></script>
    <script src="js/libs/jquery-1.11.3.min.js"></script>
    <script src="js/libs/jquery-ui.1.11.4.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>

    <!-- Style CSS -->
    <link href="css/bootstrap.css" media="screen" rel="stylesheet">
    <link href="style.css" media="screen" rel="stylesheet">

    <!-- scripts -->
    <script src="js/general.js"></script>
    <!-- Include all needed stylesheets and scripts here -->
    <script src="js/jquery.customInput.js"></script>
    <script src="jscolor/jscolor.js" type="text/javascript"></script>
    <script src="js/ajaxfunc.js"></script>
    <script src="js/common.js"></script>
  <!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {filter: none !important;}
    </style>
    <![endif]-->
  </head>

  <body >
    <div class="body_wrap">
      <div class="mycontainer">
        <div class="dropdown-wrap boxed-velvet vh-style0">
          <div class="head_logo"></div>
          <ul class="dropdown inner clearfix">
            <li><a href="live.php"><span>导播</span></a></li>
            <li><a href="vod.php"><span>点播</span></a></li>
            <li><a href="sys_audio.php"><span style="color:#3ebcef;">配置</span></a></li>
<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
//$db = new SQLite3(constant("CSDB"));
class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open($_SERVER['DOCUMENT_ROOT'] . '/database/cst.db');
      }
   }
$db = new MyDB();

$sql = 'select TRACK from T_MISC_PARAM where MISC_ID=1;';
$track = $db->querySingle($sql);
if($track>0)
{
  echo "<li>".PHP_EOL;
  echo '  <a href="track_base.php">'.PHP_EOL;
  echo "    <span>跟踪</span>".PHP_EOL;
  echo "  </a>".PHP_EOL;
  echo "</li>".PHP_EOL;
}
$db->close();
?>
            <li><a href="#"><span>admin▼</span></a>
              <ul>
                <li>
                  <a href="login.php" onclick="logOut()">注销系统</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="v-content boxed sys-con">
          <div class="sys-left boxed sys-lefth">
            <div class="widget-container boxed row-lefth">
              <a href="sys_audio.php" id="nav1">音频配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_video.php" id="nav2">视频输入</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_enc.php" id="nav3">编码配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_com.php" id="nav4">分屏配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_out.php" id="nav5">视频输出</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_tb.php" id="nav6">台标配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_tit.php" id="nav7">字幕配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_ht.php" id="nav8">片头片尾</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_rtmp.php" id="nav9">直播配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_up.php" id="nav10">FTP上传</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_rs.php" id="nav11">接口配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_cmd.php" id="nav12">控制消息</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_ptz.php" id="nav14">云台配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_net.php" id="nav15">网络配置</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_pass.php" id="nav16">密码修改</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_title.php" id="nav17">通道命名</a>
            </div>
            <div class="widget-container boxed row-lefth">
              <a href="sys_misc.php" id="nav18">系统配置</a>
            </div>
          </div>