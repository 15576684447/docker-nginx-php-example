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
      //require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/corp.php');
      //echo "<title>录播一体机-" . constant("CORP") . "</title>";
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
            <li><a href="track_t.php"><span>老师调试</span></a></li>
            <li><a href="track_s.php"><span style="color:#3ebcef;">学生调试</span></a></li>
            <li><a href="track_rule.php"><span>跟踪策略</span></a></li>
            <li><a href="live.php"><span>返回主页</span></a></li>
          </ul>
        </div>
        <div class="v-content">
          <div class="v-left">
            <div class="widget-container boxed vh-style1">
              <div class="vh-row">
                <button class="btn2" type="button" style="width:100px;margin:0 10px 0 10px;" onclick="debugBtnClick(1)">开启调试流</button>
                <button class="btn2" type="button" style="width:100px;margin:0 10px 0 10px;" onclick="playTrackBtnClick()">学生全景</button>
                <button class="btn2" type="button" style="width:100px;margin:0 100px 0 10px;" onclick="playCtrlBtnClick()">学生近景</button>
                <input type="checkbox" id="crossshow" style="display:none">
                <img id="crossshowimg" onclick="crossshowClick()" src="images/track/pos.png" title="显示坐标" style="opacity:0.5">
                <input type="checkbox" id="netshow" style="display:none">
                <img id="netshowimg" onclick="netshowClick()" src="images/track/t3area.png" title="显示网格" style="opacity:0.5">
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
                <div class="x_line1" id="linex1"></div>
                <div class="x_line2" id="linex2"></div>
                <div class="x_line3" id="linex3"></div>
                <div class="x_line4" id="linex4"></div>
                <div class="x_line5" id="linex5"></div>
                <div class="x_line6" id="linex6"></div>
                <div class="x_line7" id="linex7"></div>
                <div class="x_line8" id="linex8"></div>
                <div class="x_line9" id="linex9"></div>
                <div class="y_line1" id="liney1"></div>
                <div class="y_line2" id="liney2"></div>
                <div class="y_line3" id="liney3"></div>
                <div class="y_line4" id="liney4"></div>
                <div class="y_line5" id="liney5"></div>
                <div class="y_line6" id="liney6"></div>
                <div class="y_line7" id="liney7"></div>
                <div class="y_line8" id="liney8"></div>
                <div class="y_line9" id="liney9"></div>
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
                  <li class="active"><a href="#areayyzz" data-toggle="tab">场景配置</a></li>
                </ul>
                <div class="tab-content boxed clearfix v-righth1">
                  <div class="tab-pane fade in active" id="areayyzz">
                    <div class="form-center v-rightw">
                      <div class="form-row">
                        <div class="form-item"><input disabled="disabled" type="text" id="grid_id"></div>
                        <div class="form-label">区域序号：</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="divy"></div>
                        <div class="form-label">云台水平:</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="divz"></div>
                        <div class="form-label">云台垂直:</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item"><input type="text" id="divpqrs"></div>
                        <div class="form-label">云台景深:</div>
                      </div>
                      <div class="form-row">
                        <div class="form-item">
                          <button class="btn2" type="button" style="width:60px;margin:0 10px;" title="从左侧获取" onclick="fromleftBtnClick()">-></button>
                          <button class="btn2" type="button" style="width:80px;margin:0 10px;" title="从数据库刷新" onclick="fromdbBtnClick()">刷新</button>
                          <button class="btn2" type="button" style="width:100px;margin:0 10px;" title="保存到数据库" onclick="saveyzBtnClick()">保存配置</button>
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
  function debugBtnClick(dbgtype)
  {
    ajaxGetData("acttrack.php",13,""+dbgtype,HandleNoResult);
  }
  function playTrackBtnClick()
  {
    streamplay1("rtmp://"+location.host+"/live","stream4",640,360);
  }
  function playCtrlBtnClick()
  {
    streamplay2("rtmp://"+location.host+"/live","stream3",640,360);
  }

  function ptzOnMouseDown(action)
  {
    ajaxGetData("acttrack.php",4,"3,"+action,HandleNoResult);
  }
  function ptzOnMouseUpPT()
  {
    ajaxGetData("acttrack.php",4,"3,10",HandleNoResult);
  }
  function ptzOnMouseUpZoom()
  {
    ajaxGetData("acttrack.php",4,"3,11",HandleNoResult);
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
    ajaxGetData("acttrack.php",5,"3",HandleGetPTZPos);
  }
  function setPTZPosBtnClick()
  {
    if(!isNum(document.getElementById("yyyy").value))return;
    if(!isNum(document.getElementById("zzzz").value))return;
    if(!isNum(document.getElementById("pqrs").value))return;
    var params="3,";
    params+=document.getElementById("yyyy").value+",";
    params+=document.getElementById("zzzz").value+",";
    params+=document.getElementById("pqrs").value;
    ajaxGetData("acttrack.php",6,params,HandleNoResult);
  }
  function fromleftBtnClick()
  {
    document.getElementById("divy").value=document.getElementById("yyyy").value;
    document.getElementById("divz").value=document.getElementById("zzzz").value;
    document.getElementById("divpqrs").value=document.getElementById("pqrs").value;
  }
  function HandleGetGrid(grid)
  {
    document.getElementById("divy").value=grid.YYYY;
    document.getElementById("divz").value=grid.ZZZZ;
    document.getElementById("divpqrs").value=grid.PQRS;
  }
  function fromdbBtnClick()
  {
    if(document.getElementById("grid_id").value=="")
    {
      alert("请选择区域序号!");
      return false;
    }
    var params=document.getElementById("grid_id").value;
    ajaxGetData("acttrack.php",14,params,HandleGetGrid);
  }
  function saveyzBtnClick()
  {
    if((document.getElementById("divy").value=="")||
      (document.getElementById("divz").value=="")||
      (document.getElementById("divpqrs").value==""))
    {
      alert("错误: 值不能为空!");
      return false;
    }
    var params="";
    params+=document.getElementById("grid_id").value+",";
    params+=document.getElementById("divy").value+",";
    params+=document.getElementById("divz").value+",";
    params+=document.getElementById("divpqrs").value;
    ajaxGetData("acttrack.php",15,params,HandleAjaxResult);
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
    
    function netshowClick(){
      if($("[id='netshow']:checkbox").is(":checked"))
      {
        $("[id='netshow']:checkbox").prop("checked",false);
        $("img[id='netshowimg']").css({"border":"1px solid","opacity":"0.5"});
        for (var i=1;i<10;i++)
        {
          document.getElementById("linex"+i).style.display="none";
          document.getElementById("liney"+i).style.display="none";
        }
      }
      else
      {
        $("[id='netshow']:checkbox").prop("checked",true);
        $("img[id='netshowimg']").css({"border":"1px solid #FF6600","opacity":"1"});
        for (var i=1;i<10;i++)
        {
          document.getElementById("linex"+i).style.display="block";
          document.getElementById("liney"+i).style.display="block";
        }
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
      var event = window.event || event;
      var mask=document.getElementById("playmask"),
      masktop=mask.getBoundingClientRect().top,
      maskleft=mask.getBoundingClientRect().left;
      var posx=parseInt(event.clientX- maskleft);
      var posy=parseInt(event.clientY - masktop);
      
      document.getElementById("grid_id").value = parseInt(posy/36)*10+parseInt(posx/64)+1;
      document.getElementById("divy").value = "";
      document.getElementById("divz").value = "";
      document.getElementById("divpqrs").value = "";

      if(!$("[id='crossshow']:checkbox").is(":checked")) return;
      document.getElementById("posx").value = posx;
      document.getElementById("posy").value = posy;
    }
    document.getElementById("playmask").onmousemove = maskMouseMove;
    document.getElementById("playmask").onclick = maskMouseClick;
  </script>
</html>