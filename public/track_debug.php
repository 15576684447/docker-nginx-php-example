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
    <?php
      require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/corp.php');
      echo "<title>录播一体机-" . constant("CORP") . "</title>";
    ?>
    <!-- main JS libs -->
    <script src="js/libs/modernizr.min.js"></script>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/libs/jquery-ui.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>

    <!-- Style CSS -->
    <link href="css/bootstrap.css" media="screen" rel="stylesheet">
    <link href="style_track.css" media="screen" rel="stylesheet">

    <!-- scripts -->
    <script src="js/general.js"></script>

    <!-- Include all needed stylesheets and scripts here -->
    <script src="js/jquery.customInput.js"></script>
    <script src="js/jquery.powerful-placeholder.min.js"></script>
    <link rel="stylesheet" href="css/cusel.css">
    <script src="js/cusel-min.js"></script>
    <script src="js/ajaxfunc.js"></script>
    <script src="js/common.js"></script>
    <script type="text/javascript" src="player/jwplayer.js"></script>

    <!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {filter: none !important;}
    </style>
    <![endif]-->
  </head>

  <body>
    <div class="body_wrap">
      <div class="mycontainer">
        <div class="dropdown-wrap boxed-velvet vh-style0">
          <div class="head_logo"></div>
          <ul class="dropdown inner clearfix">
            <li><a href="track_base.php"><span>跟踪配置</span></a></li>
            <li><a href="track_t.php"><span style="color:#3ebcef;">老师调试</span></a></li>
            <li><a href="track_s.php"><span>学生调试</span></a></li>
            <li><a href="track_rule.php"><span>跟踪策略</span></a></li>
            <li><a href="live.php"><span>返回主页</span></a></li>
          </ul>
        </div>
        <div class="v-content">
          <div class="v-left">
            <div class="widget-container boxed vh-style1">
              <div class="vh-row">
                <button class="btn2" type="button" style="width:100px;margin:0 20px 0 10px;" onclick="playTrackBtnClick()">教师全景</button>
                <button class="btn2" type="button" style="width:100px;margin:0 100px 0 0;" onclick="playCtrlBtnClick()">教师近景</button>
                <input type="checkbox" id="crossshow" style="display:none">
                <img id="crossshowimg" onclick="crossshowClick()" src="images/track/pos.png" title="显示坐标" style="opacity:0.5">
                <input type="checkbox" id="txshow" style="display:none">
                <img id="txshowimg" onclick="txshowClick()" src="images/track/tx.png" title="显示水平区域" style="opacity:0.5">
                <input type="checkbox" id="tyshow" style="display:none">
                <img id="tyshowimg" onclick="tyshowClick()" src="images/track/ty.png" title="显示讲台边缘" style="opacity:0.5">
              </div>
            </div>
            <div class="widget-container boxed vh-style1">
              <div class="vh-row">
                <div class="vh-label">X:</div><div class="vh-item"><input type="text" id="posx" readonly="readonly"></div>
                <div class="vh-label">Y:</div><div class="vh-item"><input type="text" id="posy" readonly="readonly"></div>
              </div>
            </div>
            <div class="widget-container boxed v-leftvh">
              <div class="video-win" id="playwin1"></div>
              <div class="video-mask" id="playmask">
                <div class="x_line" id="linex"></div>
                <div class="y_line" id="liney"></div>
                <div class="lineh" id="x1_line"></div>
                <div class="lineh" id="x2_line"></div>
                <div class="linev2" id="ih_line"></div>
              </div>
            </div>
            <div class="widget-container boxed v-leftvh">
              <div class="video-win" id="playwin2"></div>
            </div>
            <div class="widget-container boxed vh-style1">
              <div class="vh-row">
                <div class="vh-label">水平:</div><div class="vh-item"><input type="text" id="yyyy" ></div>
                <div class="vh-label">竖直:</div><div class="vh-item"><input type="text" id="zzzz" ></div>
                <div class="vh-label">景深:</div><div class="vh-item"><input type="text" id="pqrs" ></div>
                <button class="btn2" type="button" style="width:80px;margin-left: 20px;" onclick="getPTZPosBtnClick()">获取</button>
                <button class="btn2" type="button" style="width:80px;margin-left: 20px;" onclick="setPTZPosBtnClick()">设置</button>
              </div>
            </div>
            <div class="widget-container boxed vh-style1">
              <div class="vh-row">
                <img onMouseDown="ptzOnMouseDown(0)" onMouseUp="ptzOnMouseUpPT()" src="images/track/left.png" title="左">
                <img onMouseDown="ptzOnMouseDown(4)" onMouseUp="ptzOnMouseUpPT()" src="images/track/right.png" title="右">
                <img onMouseDown="ptzOnMouseDown(2)" onMouseUp="ptzOnMouseUpPT()" src="images/track/up.png" title="上">
                <img onMouseDown="ptzOnMouseDown(6)" onMouseUp="ptzOnMouseUpPT()" src="images/track/down.png" title="下">
                <img onMouseDown="ptzOnMouseDown(8)" onMouseUp="ptzOnMouseUpZoom()" src="images/track/out.png" title="ZOOM OUT">
                <img onMouseDown="ptzOnMouseDown(9)" onMouseUp="ptzOnMouseUpZoom()" src="images/track/in.png" title="ZOOM IN">
              </div>
            </div>
          </div>
          <div class="v-right">
            <div class="tabs_framed boxed v-righth">
              <div class="inner">
                <ul class="tabs clearfix">
                  <li class="active"><a href="#initpos" data-toggle="tab">初始位置</a></li>
                  <li><a href="#areax" data-toggle="tab">老师区域设置</a></li>
                </ul>
                <div class="tab-content boxed clearfix v-righth1">
                  <div class="tab-pane fade in active" id="initpos">
                    <div class="form-center v-rightw">
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="yyyy0"></div>
                        <div class="form-label">水平：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="zzzz0"></div>
                        <div class="form-label">垂直：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="pqrs0"></div>
                        <div class="form-label">景深：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item">
                          <button class="btn2" type="button" style="width:100px;" onclick="saveinitBtnClick()">保存配置</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="areax">
                    <div class="form-center v-rightw">
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="posxl"></div>
                        <div class="form-label">左侧X坐标：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="ptzxl"></div>
                        <div class="form-label">左侧云台坐标：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="posxr"></div>
                        <div class="form-label">右侧X坐标：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="ptzxr"></div>
                        <div class="form-label">右侧云台坐标：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="plus"></div>
                        <div class="form-label">校正系数：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="ignoreh"></div>
                        <div class="form-label">讲台边沿坐标：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item">
                          <button class="btn2" type="button" style="width:100px;" onclick="saveareaxBtnClick()">保存配置</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="clear"></div>
        <div class="widget-container boxed vh-style1">
          <div class="inner vh-center">
            <span>Powered By <?php echo constant("CORP"); ?></span>
          </div>
        </div>
      </div><!--/ container -->
    </div>
    <script>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = 'select * from T_PTZ_INIT where PTZ_ID=0;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['PTZ_ID'])) {
  echo 'document.getElementById("yyyy0").value="' . $res['YYYY'] . '";' . PHP_EOL;
  echo 'document.getElementById("zzzz0").value="' . $res['ZZZZ'] . '";' . PHP_EOL;
  echo 'document.getElementById("pqrs0").value="' . $res['PQRS'] . '";' . PHP_EOL;
}
$sql = 'select * from T_RULE_TX where RTX_ID=0;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['RTX_ID'])) {
  echo 'document.getElementById("posxl").value="' . $res['POSXL'] . '";' . PHP_EOL;
  echo 'document.getElementById("ptzxl").value="' . $res['PTZXL'] . '";' . PHP_EOL;
  echo 'document.getElementById("posxr").value="' . $res['POSXR'] . '";' . PHP_EOL;
  echo 'document.getElementById("ptzxr").value="' . $res['PTZXR'] . '";' . PHP_EOL;
  echo 'document.getElementById("plus").value="' . $res['PLUS'] . '";' . PHP_EOL;
}
$sql = 'select AT_ID,IGNOREH from T_ADVT_PARAM;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['AT_ID'])) {
  echo 'document.getElementById("ignoreh").value="' . $res['IGNOREH'] . '";' . PHP_EOL;
}
$db->close();
?>
function streamplay1(streamurl,streamname,vw,vh)
{
  jwplayer("playwin1").setup({
    flashplayer: "player/player.swf",
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
  jwplayer("playwin1").onReady(function (){
    this.play();
  });
}
function streamplay2(streamurl,streamname,vw,vh)
{
  jwplayer("playwin2").setup({
    flashplayer: "player/player.swf",
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
  jwplayer("playwin2").onReady(function (){
    this.play();
  });
}
  function playTrackBtnClick()
  {
    streamplay1("rtmp://"+location.host+"/live","stream2",640,360);
  }
  function playCtrlBtnClick()
  {
    streamplay2("rtmp://"+location.host+"/live","stream0",640,360);
  }

  function ptzOnMouseDown(action)
  {
    ajaxGetData("acttrack.php",4,""+action,HandleNoResult);
  }
  function ptzOnMouseUpPT()
  {
    ajaxGetData("acttrack.php",4,"10",HandleNoResult);
  }
  function ptzOnMouseUpZoom()
  {
    ajaxGetData("acttrack.php",4,"11",HandleNoResult);
  }
  function HandleGetPTZPos(ptz)
  {
    if(ptz.STATUS==0)
    {
      alert("获取云台位置信息失败！请检查云台的连接配置是否有误！");
      return;
    }
    document.getElementById("yyyy").value=ptz.YYYY;
    document.getElementById("zzzz").value=ptz.ZZZZ;
    document.getElementById("pqrs").value=ptz.PQRS;
  }
  function getPTZPosBtnClick()
  {
    ajaxGetData("acttrack.php",5,"0",HandleGetPTZPos);
  }
  function setPTZPosBtnClick()
  {
    if(!isNum(document.getElementById("yyyy").value))return;
    if(!isNum(document.getElementById("zzzz").value))return;
    if(!isNum(document.getElementById("pqrs").value))return;
    var params="";
    params+=document.getElementById("yyyy").value+",";
    params+=document.getElementById("zzzz").value+",";
    params+=document.getElementById("pqrs").value;
    ajaxGetData("acttrack.php",6,params,HandleNoResult);
  }
  function saveinitBtnClick()
  {
    var params="";
    params+="";
    params+=document.getElementById("yyyy0").value+",";
    params+=document.getElementById("zzzz0").value+",";
    params+=document.getElementById("pqrs0").value;
    ajaxGetData("acttrack.php",7,params,HandleAjaxResult);
  }
  function saveareaxBtnClick()
  {
    var params="";
    params+=document.getElementById("posxl").value+",";
    params+=document.getElementById("ptzxl").value+",";
    params+=document.getElementById("posxr").value+",";
    params+=document.getElementById("ptzxr").value+",";
    params+=document.getElementById("plus").value+",";
    params+=document.getElementById("ignoreh").value;
    ajaxGetData("acttrack.php",8,params,HandleAjaxResult);
  }
    </script>
  </body>

  <div class="pos_info" id="cross">x:y=<strong id="xy_val"></strong></div>
  <script>
    function crossshowClick(){
      if($("[id='crossshow']:checkbox").is(":checked"))
      {
        $("[id='crossshow']:checkbox").prop("checked",false);
        $("img[id='crossshowimg']").css({"border":"1px solid","opacity":"0.5"});
        document.getElementById("cross").style.display="none";
        document.getElementById("linex").style.display="none";
        document.getElementById("liney").style.display="none";
      }
      else
      {
        $("[id='crossshow']:checkbox").prop("checked",true);
        $("img[id='crossshowimg']").css({"border":"1px solid #FF6600","opacity":"1"});
        document.getElementById("cross").style.display="block";
        document.getElementById("linex").style.display="block";
        document.getElementById("liney").style.display="block";
      }
    }
    function txshowClick(){
      if($("[id='txshow']:checkbox").is(":checked"))
      {
        $("[id='txshow']:checkbox").prop("checked",false);
        $("img[id='txshowimg']").css({"border":"1px solid","opacity":"0.5"});
        document.getElementById("x1_line").style.display="none";
        document.getElementById("x2_line").style.display="none";
      }
      else
      {
        $("[id='txshow']:checkbox").prop("checked",true);
        $("img[id='txshowimg']").css({"border":"1px solid #FF6600","opacity":"1"});
        document.getElementById("x1_line").style.display="block";
        document.getElementById("x2_line").style.display="block";
        tmpval=document.getElementById("posxl").value;
        if(isNum(tmpval))
          document.getElementById("x1_line").style.left=tmpval+"px";
        tmpval=document.getElementById("posxr").value;
        if(isNum(tmpval))
          document.getElementById("x2_line").style.left=tmpval+"px";
      }
    }
    function tyshowClick(){
      if($("[id='tyshow']:checkbox").is(":checked"))
      {
        $("[id='tyshow']:checkbox").prop("checked",false);
        $("img[id='tyshowimg']").css({"border":"1px solid","opacity":"0.5"});
        document.getElementById("ih_line").style.display="none";
      }
      else
      {
        $("[id='tyshow']:checkbox").prop("checked",true);
        $("img[id='tyshowimg']").css({"border":"1px solid #FF6600","opacity":"1"});
        document.getElementById("ih_line").style.display="block";
        tmpval=document.getElementById("ignoreh").value;
        if(isNum(tmpval))
          document.getElementById("ih_line").style.top=tmpval+"px";
      }
    }
    function maskMouseMove(event){
      if(!$("[id='crossshow']:checkbox").is(":checked")) return;
      var event = window.event || event;
      var linex = document.getElementById("linex"),
      liney = document.getElementById("liney"),
      cross = document.getElementById("cross"),
      mask=document.getElementById("playmask"),
      masktop=mask.getBoundingClientRect().top,
      maskleft=mask.getBoundingClientRect().left,
      maskheight=mask.getBoundingClientRect().height,
      maskwidth=mask.getBoundingClientRect().width,
      top = (event.clientY - masktop) > (maskheight/2) ? -30 : 10,
      left = (event.clientX - maskleft) > (maskwidth/2) ? -120 : 20;
     
      document.getElementById("xy_val").innerHTML = parseInt(event.clientX- maskleft)+":"+parseInt(event.clientY - masktop);
     
      cross.style.top = event.clientY + top + "px";
      cross.style.left = event.clientX + left + "px";
     
      linex.style.top = (event.clientY - masktop) + "px";
      liney.style.left = (event.clientX - maskleft) + "px";
    }
    function maskMouseClick(event){
      if(!$("[id='crossshow']:checkbox").is(":checked")) return;
      var event = window.event || event;
      var mask=document.getElementById("playmask"),
      masktop=mask.getBoundingClientRect().top,
      maskleft=mask.getBoundingClientRect().left;
     
      document.getElementById("posx").value = parseInt(event.clientX- maskleft);
      document.getElementById("posy").value = parseInt(event.clientY - masktop);
    }
    document.getElementById("playmask").onmousemove = maskMouseMove;
    document.getElementById("playmask").onclick = maskMouseClick;
  </script>
</html>