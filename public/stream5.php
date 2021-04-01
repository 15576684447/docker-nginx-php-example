<?php
$vw = 1280;
$vh = 720;
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = 'select IP from T_NET_PARAM where NET_ID=1;';
$ip = $db->querySingle($sql);
$db->close();
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>预监流</title>
    <script type="text/javascript" src="player/jwplayer.js"></script>
    <style>
      html, body {
        padding: 0px;
        margin: 0px;
        text-align: center;
      }
      .video-back{width: 1280px;height: 720px;margin-left: auto;margin-right: auto;}
    </style>
  </head>
  <body scroll="no">
    <div class="video-back"><div id="playwin"></div></div>
    <script>
<?php
echo 'streamplay("rtmp://' . $ip . '/live","stream9",' . $vw . ',' . $vh . ');' . PHP_EOL;
?>
  function streamplay(streamurl,streamname,vw,vh)
  {
    jwplayer("playwin").setup({
      flashplayer: "/player/player.swf",
      'rtmp.tunneling':false,
      controlbar: 'none',
      bufferlength:0.001,
      stretching:"EXACTFIT",
      screencolor:'0X000000',
      streamer:streamurl,
      file:streamname,
      width:vw,
      height:vh
    });
    jwplayer("playwin").onReady(function (){
      this.play();
    });
  }
    </script>

  </body>
</html>