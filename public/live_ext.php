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
<title>LIVE_EXT</title>
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
<script type="text/javascript" src="player/jwplayer.js"></script>
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">.gradient {filter: none !important;}</style>
<![endif]-->
<style>
  html, body {
    padding: 0px;
    margin: 0px;            
  }
</style>
</head>
<body scroll="no" oncontextmenu=self.event.returnValue=false>
<div class="body_wrap">
  <div class="mycontainer">
    <div class="v-content">
      <div class="v-left">
        <div class="widget-container boxed v-leftvh">
          <div class="video-win" id="playwin"></div>
          <div class="video-mask"></div>
        </div>
        <div class="widget-container boxed vh-style1">
          <div class="vh-row">
          <button class="btn2" id="ro_en" type="button" style="width:60px;margin-left:15px" onclick="rtmpbtnClick()">直播</button>
          <button class="btn2" id="recbtn" type="button" style="width:60px;margin-left:10px" onclick="recbtnClick()">录制</button>
          <button class="btn2" id="paubtn" type="button" style="width:60px;margin-left:2px" onclick="paubtnClick()">暂停</button>
          <button class="btn_info" id="rec_info" disabled="disabled" type="button">未录制[0G/00:00:00]</button>
          <button class="btn2" id="recmode0" type="button" style="width:50px;margin-left:10px" onclick="recmodeBtnClick(0)">电影</button>
          <button class="btn2" id="recmode1" type="button" style="width:50px;margin-left:2px" onclick="recmodeBtnClick(1)">资源</button>
          <button class="btn2" id="recmode2" type="button" style="width:60px;margin-left:2px" onclick="recmodeBtnClick(2)">自定义</button>
          <button class="btn2" id="dbauto0" type="button" style="width:50px;margin-left:10px" onclick="autobtnClick(0)">手动</button>
          <button class="btn2" id="dbauto1" type="button" style="width:50px;margin-left:2px" onclick="autobtnClick(1)">自动</button>
          <button class="btn2" id="dbauto2" type="button" style="width:60px;margin-left:2px" onclick="autobtnClick(2)">半自动</button>
          </div>
        </div>
      </div>

      <div class="v-right">
        <div class="widget-container boxed vh-style1">
          <div class="vh-rowr">
            <input type="radio" value="0" id="tb0" name="tbpos" style="display:none">
            <img id="tbimg0" onclick="tbposImgClick(0)" src="images/vh/tb0.png" title="无台标" style="opacity:0.5">
            <input type="radio" value="1" id="tb1" name="tbpos" style="display:none">
            <img id="tbimg1" onclick="tbposImgClick(1)" src="images/vh/tb1.png" title="台标左上" style="opacity:0.5">
            <input type="radio" value="2" id="tb2" name="tbpos" style="display:none">
            <img id="tbimg2" onclick="tbposImgClick(2)" src="images/vh/tb2.png" title="台标左下" style="opacity:0.5">
            <input type="radio" value="3" id="tb3" name="tbpos" style="display:none">
            <img id="tbimg3" onclick="tbposImgClick(3)" src="images/vh/tb3.png" title="台标右上" style="opacity:0.5">
            <input type="radio" value="4" id="tb4" name="tbpos" style="display:none">
            <img id="tbimg4" onclick="tbposImgClick(4)" src="images/vh/tb4.png" title="台标右下" style="opacity:0.5">
          </div>
        </div>
        <div class="widget-container boxed vh-style1">
          <div class="vh-rowr2">
            <input type="radio" value="4" id="vm4" name="vmode" style="display:none">
            <img id="vmimg4" onclick="vmodeImgClick(4)" src="images/vh/vm3.png" title="画中画" style="opacity:0.5">
            <input type="radio" value="2" id="vm2" name="vmode" style="display:none">
            <img id="vmimg2" onclick="vmodeImgClick(2)" src="images/vh/vm1.png" title="两分屏" style="opacity:0.5">
            <input type="radio" value="3" id="vm3" name="vmode" style="display:none">
            <img id="vmimg3" onclick="vmodeImgClick(3)" src="images/vh/vm2.png" title="画外画" style="opacity:0.5">
            <input type="radio" value="5" id="vm5" name="vmode" style="display:none">
            <img id="vmimg5" onclick="vmodeImgClick(5)" src="images/vh/vm4.png" title="三分屏" style="opacity:0.5">
            <input type="radio" value="6" id="vm6" name="vmode" style="display:none">
            <img id="vmimg6" onclick="vmodeImgClick(6)" src="images/vh/vm5.png" title="四分屏" style="opacity:0.5">
            <input type="radio" value="7" id="vm7" name="vmode" style="display:none">
            <img id="vmimg7" onclick="vmodeImgClick(7)" src="images/vh/vm7.png" title="六分屏" style="opacity:0.5">
            <input type="radio" value="8" id="vm8" name="vmode" style="display:none">
            <img id="vmimg8" onclick="vmodeImgClick(8)" src="images/vh/vm8.png" title="八分屏" style="opacity:0.5">
          </div>
        </div>
        <div class="tabs_framed boxed v-righth">
          <div class="inner">
            <ul class="tabs clearfix">
              <li>
                <a href="#info" data-toggle="tab">信息</a>
              </li>
              <li>
                <a href="#subtitle" data-toggle="tab">字幕</a>
              </li>
              <li>
                <a href="#audio" data-toggle="tab">音量</a>
              </li>
              <li class="active">
                <a href="#ptz" data-toggle="tab">云台</a>
              </li>
            </ul>
            <div class="tab-content boxed clearfix v-righttabh">
              <div class="tab-pane fade" id="info">
                <div class="form-center">
                  <div class="form-row">
                    <div class="input_styled rowCheckbox checkbox-large th_off">
                      <input name="thenable" type="checkbox"  id="thenable" >
                      <label for="thenable">使能片头片尾</label>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item2">
                      <input type="text" id="txt1" onkeypress="return /[\w\u4e00-\u9fa5]/.test(String.fromCharCode(window.event.keyCode))" >
                    </div>
                    <div class="form-label">主题：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item2">
                      <input type="text" id="txt2"></div>
                    <div class="form-label">主讲：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item2">
                      <input type="text" id="txt3"></div>
                    <div class="form-label">版权：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item2">
                      <input type="text" id="txt4"></div>
                    <div class="form-label">描述：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item2">
                      <button class="btn2" type="button" style="width:120px;" onclick="infoBtnClick()">更新片头片尾</button>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
              <div class="tab-pane fade" id="subtitle">
                <div class="form-center">
                  <div class="form-row">
                    <div class="input_styled rowCheckbox checkbox-large">
                      <input name="titenable" type="checkbox"  id="titenable" >
                      <label for="titenable">使能字幕</label>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="color-label">颜色：</div>
                    <div class="color-input">
                      <input type="text" class="colorpicker" id="txt_col" value="66ff00"></div>
                    <div class="font-label">字体：</div>
                    <div class="field_select font-select">
                      <select class="select_styled" id="fam_id">
                        <option style="background-color: #444c55;font-size: 20px;" value="8">黑体常规</option>
                        <option style="background-color: #444c55;font-size: 20px;" value="3">华文行楷</option>
                        <option style="background-color: #444c55;font-size: 20px;" value="5">华文琥珀</option>
                        <option style="background-color: #444c55;font-size: 20px;" value="6">华文彩云</option>
                      </select>
                      <input type="text" id="fontsize" style="display:none;">
                    </div>
                  </div>
                  <textarea rows="3" id="tit_txt" class="tit_area" maxLength="40"></textarea>
                  <div class="form-row">
                    <div class="tit_subbtn">
                      <button class="btn2" type="button" style="width:80px;" onclick="titBtnClick()">提交</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="audio">
                <div class="form-center audioh">
                  <div class="au-label">LINE-IN1</div>
                  <div class="au-bar">
                    <div class="vol_bar" id="vol0"></div>
                  </div>
                  <div class="au-label">LINE-IN2</div>
                  <div class="au-bar">
                    <div class="vol_bar" id="vol1"></div>
                  </div>
                  <div class="au-label">混音通道</div>
                  <div class="au-bar">
                    <div class="vol_bar" id="vol2"></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade in active" id="ptz">
                <div class="form-center">
                  <div class="ptz_row1">
                    <div class="control_unit">
                      <div class="control_direction">
                        <div class="control_01" onmousedown="ptzOnMouseDown(1)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_02" onmousedown="ptzOnMouseDown(2)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_03" onmousedown="ptzOnMouseDown(3)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_04" onmousedown="ptzOnMouseDown(0)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_05" onmousedown="ptzOnMouseDown(4)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_06" onmousedown="ptzOnMouseDown(7)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_07" onmousedown="ptzOnMouseDown(6)" onmouseup="ptzOnMouseUpPT()"></div>
                        <div class="control_08" onmousedown="ptzOnMouseDown(5)" onmouseup="ptzOnMouseUpPT()"></div>
                      </div>
                    </div>
                    <div class="ptz_misc">
                      <div class="ptz_subrow">
                        <button class="btn2" type="button" style="width:60px;" onMouseDown="ptzOnMouseDown(8)" onMouseUp="ptzOnMouseUpZoom()">放大</button>
                        <button class="btn2" type="button" style="width:60px;margin-left:10px;" onMouseDown="ptzOnMouseDown(9)" onMouseUp="ptzOnMouseUpZoom()">缩小</button>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div class=" ptz-pretit">
                    <button class="btn2" id="prebtn" type="button" style="float: none; margin:0 auto; width:120px;background-color: #5b6267;display:block;" onClick="preBtnClick()">预置位设置</button>
                  </div>
                  <div class="ptz_row1">
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(1)">01</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(2)">02</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(3)">03</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(4)">04</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(5)">05</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(6)">06</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(7)">07</button>
                    <button class="btn2" type="button" style="width:75px;margin:10px;" onclick="ptzPrePosBtnClick(8)">08</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="clear"></div>
    <div class="v-s6">
      <div class="vh-row6">
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v1_name">PPT</span>
          <input type="radio" value="0" id="pt0" name="ptzctrl" style="display:none">
          <img id="ptimg0" onclick="ptzctrlImgClick(0)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v2_name">老师近景</span>
          <input type="radio" value="1" id="pt1" name="ptzctrl" style="display:none">
          <img id="ptimg1" onclick="ptzctrlImgClick(1)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v3_name">老师全景</span>
          <input type="radio" value="2" id="pt2" name="ptzctrl" style="display:none">
          <img id="ptimg2" onclick="ptzctrlImgClick(2)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v4_name">学生近景</span>
          <input type="radio" value="3" id="pt3" name="ptzctrl" style="display:none">
          <img id="ptimg3" onclick="ptzctrlImgClick(3)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v5_name">学生全景</span>
          <input type="radio" value="4" id="pt4" name="ptzctrl" style="display:none">
          <img id="ptimg4" onclick="ptzctrlImgClick(4)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
      </div>
      <div class="clear"></div>
      <div class="widget-container boxed vh-s6">
        <div class="video-s6" id="playw6"></div>
        <div class="s6-up">
          <div class="v-area" id="v1_area" onclick="areaClick(0)" ondblclick="areaDbClick(0)"></div>
          <div class="v-area" id="v2_area" onclick="areaClick(2)" ondblclick="areaDbClick(2)"></div>
          <div class="v-area" id="v3_area" onclick="areaClick(3)" ondblclick="areaDbClick(3)"></div>
          <div class="v-area" id="v4_area" onclick="areaClick(4)" ondblclick="areaDbClick(4)"></div>
          <div class="v-area6" id="v5_area" onclick="areaClick(5)" ondblclick="areaDbClick(5)"></div>
        </div>
        <div class="s6-mid">
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v6_name">板书</span>
            <input type="radio" value="5" id="pt5" name="ptzctrl" style="display:none">
          <img id="ptimg5" onclick="ptzctrlImgClick(5)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v7_name">高拍仪</span>
            <input type="radio" value="6" id="pt6" name="ptzctrl" style="display:none">
          <img id="ptimg6" onclick="ptzctrlImgClick(6)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v8_name">巡视</span>
            <input type="radio" value="7" id="pt7" name="ptzctrl" style="display:none">
          <img id="ptimg7" onclick="ptzctrlImgClick(7)" src="images/vh/yg.png" title="云台选择" style="border:1px solid;opacity:0.5">
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v9_name">片头</span>
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v10_name">片尾</span>
          </div>
        </div>
        <div class="s6-down">
          <div class="v-area" id="v6_area" onclick="areaClick(6)" ondblclick="areaDbClick(6)"></div>
          <div class="v-area" id="v7_area" onclick="areaClick(7)" ondblclick="areaDbClick(7)"></div>
          <div class="v-area" id="v8_area" onclick="areaClick(9)" ondblclick="areaDbClick(9)"></div>
          <div class="v-area" id="v9_area" ></div>
          <div class="v-area6" id="v10_area" ></div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!--/ container -->
</div>

<script>
//ui ready
jQuery(document).ready(function() {
  $('#audio').addClass('active');
  $('#vol0').slider({
    min: 12,
    max: 20,
    value: 0,
    range: "min",
    animate: true,
    slide: function(event, ui) {
      setVolume(0,ui.value);
    }
  });
  $('#vol1').slider({
    min: 12,
    max: 20,
    value: 0,
    range: "min",
    animate: true,
    slide: function(event, ui) {
      setVolume(1,ui.value);
    }
  });
  $('#vol2').slider({
    min: 0,
    max: 20,
    value: 0,
    range: "min",
    animate: true,
    slide: function(event, ui) {
      setVolume(2,ui.value);
    }
  });
  $('#audio').removeClass('active');
  InitVol();
});

function logOut()
{
  if(confirm("确定要退出系统吗？")==true)
  {
    window.location.href="login.php";
  }
}
function ptzctrlImgClick(p_id)
{
  for (var i=0;i<8;i++)
  {
    if(i==p_id)
    {
      $("img[id='ptimg"+i+"']").css({"border":"1px solid #FF6600","opacity":"1"});
      $("input[id='pt"+i+"']").attr("checked","checked");
      window.ptz_id=i;
    }
    else
    {
      $("img[id='ptimg"+i+"']").css({"border":"1px solid","opacity":"0.5"});
      $("input[id='pt"+i+"']").removeAttr("checked");
    }
  }
}
//left begin
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = 'select FLASH from T_MISC_PARAM where MISC_ID=1;';
$flash = $db->querySingle($sql);
$buflen = 0.2;
$buflen = round($flash/1000,2);
$db->close();
?>
function playcom(streamurl,streamname)
{
  jwplayer("playwin").setup({
    flashplayer: "player/player.swf",
    'rtmp.tunneling':false,
    controlbar: 'none',
    bufferlength:<?php echo $buflen;?>,
    stretching:"EXACTFIT",
    screencolor:'0X000000',
    streamer:streamurl,
    file:streamname,
    width:767,
    height:432
  });
  jwplayer("playwin").onReady(function (){
    this.play();
  });
}
function playsingle(streamurl,streamname)
{
  jwplayer("playw6").setup({
    flashplayer: "player/player.swf",
    'rtmp.tunneling':false,
    controlbar: 'none',
    bufferlength:<?php echo $buflen;?>,
    stretching:"EXACTFIT",
    screencolor:'0X000000',
    streamer:streamurl,
    file:streamname,
    width:1198,
    height:300
  });
  jwplayer("playw6").onReady(function (){
    this.play();
  });
}

function rtmpbtnClick()
{
  var info="确认打开直播功能！？";
  if(window.live>0)
  {
    info="确认关闭直播功能！？";
  }
  if(confirm(info)==true)
  {
    window.live=1-window.live;
    if(window.live>0)
    {
      $('#ro_en').css({"background-color":"#00a8eb"});
    }
    else
    {
      $('#ro_en').css({"background-color":"#5b6267"});
    }
    ajaxGetData("actlive.php",1,window.live+"",HandleNoResult);
  }
}
function UpdateRecTimeStr()
{
  var tt = window.rectime;
  var hh = parseInt(tt / 3600); hh = hh > 9 ? hh : "0"+hh;
  var mm = parseInt(( tt - (hh * 3600) ) / 60); mm = mm > 9 ? mm : "0"+mm;
  var ss = tt % 60; ss = ss > 9 ? ss : "0"+ss;
  var rectime_str=hh + ":" + mm + ":" + ss;
  document.getElementById("rec_info").innerHTML=window.rec_desc+"["+window.leftspace+"/"+rectime_str+"]";
}
function HandleRecInfo(){
  window.rectime++;
  UpdateRecTimeStr();
}
function HandleRecResult(rec)
{
  window.leftspace=rec.leftspace;
  switch(rec.status)
  {
    case "1":
      document.getElementById("recbtn").innerHTML="停止";
      $('#recbtn').css({"background-color":"#ff0000"});
      document.getElementById("rec_info").innerHTML="录制中["+rec.leftspace+"/00:00:00]";
      if(window.rectimer != null){
        clearInterval(window.rectimer);
      }
      window.rectimer=setInterval(HandleRecInfo,1000);
      window.rectime=0;
      window.rec_desc="录制中";
      break;
    case "0":
    case "2":
      clearInterval(window.rectimer);
      window.rectimer=null;
      document.getElementById("recbtn").innerHTML="录制";
      $('#recbtn').css({"background-color":"#00a8eb"});
      document.getElementById("paubtn").innerHTML="暂停";
      $('#paubtn').css({"background-color":"#00a8eb"});
      window.rec_desc="未录制";
      document.getElementById("rec_info").innerHTML="未录制["+rec.leftspace+"/00:00:00]";
      break;
    case "3":
      window.rec_desc="暂停中";
      document.getElementById("paubtn").innerHTML="恢复";
      $('#paubtn').css({"background-color":"#0000ff"});
      HandleRecInfo();
      if(window.rectimer != null){
        clearInterval(window.rectimer);
      }
      //document.getElementById("rec_info").innerHTML="暂停["+rec.leftspace+"/"+rec.lefttime+"]";
      break;
    case "4":
      window.rec_desc="录制中";
      document.getElementById("paubtn").innerHTML="暂停";
      $('#paubtn').css({"background-color":"#00a8eb"});
      HandleRecInfo();
      if(window.rectimer != null){
        clearInterval(window.rectimer);
      }
      window.rectimer=setInterval(HandleRecInfo,1000);
      //document.getElementById("rec_info").innerHTML="录制中["+rec.leftspace+"/"+rec.lefttime+"]";
      break;
  }
}
function recbtnClick()
{
  var txt=$.trim($("#txt1").val());
  if(txt=="")
  {
    alert("课程主题将作为录制文件名,不能为空!");
    return false;
  }
  if(parseFloat(window.leftspace)<4)
  {
    alert("磁盘剩余空间小于4G!无法开启录制!");
    return false;
  }
  var params="";
  if(document.getElementById("recbtn").innerHTML=="录制")
  {
    params+="1";
  }
  else
  {
    params+="2";
  }
  ajaxGetData("actlive.php",2,params,HandleRecResult);
}

function paubtnClick()
{
  if(document.getElementById("recbtn").innerHTML=="录制")
    return false;
  var params="";
  if(document.getElementById("paubtn").innerHTML=="暂停")
    params+="3";
  else
    params+="4";
  ajaxGetData("actlive.php",2,params,HandleRecResult);
}
function autobtnClick(auto)
{
  window.dbauto=auto;
  $('#dbauto0').css({"background-color":"#5b6267"});
  $('#dbauto1').css({"background-color":"#5b6267"});
  $('#dbauto2').css({"background-color":"#5b6267"});
  $('#dbauto'+auto).css({"background-color":"#00a8eb"});
  ajaxGetData("actlive.php",3,window.dbauto+"",HandleNoResult);
}
function recmodeBtnClick(rec)
{
  window.recmode=rec;
  $('#recmode0').css({"background-color":"#5b6267"});
  $('#recmode1').css({"background-color":"#5b6267"});
  $('#recmode2').css({"background-color":"#5b6267"});
  $('#recmode'+rec).css({"background-color":"#00a8eb"});
  ajaxGetData("actlive.php",4,window.recmode+"",HandleNoResult);
}

//left end

function tbposImgClick(tbid){
  if(tbid==window.pos_id) return false;
  window.pos_id=tbid;
  $("img[id='tbimg"+tbid+"']").css({"border":"1px solid #FF6600","opacity":"1"});
  $("img[id='tbimg"+tbid+"']").siblings("img").css({"border":"1px solid","opacity":"0.5"});

  $("input[id='tb"+tbid+"']").attr("checked","checked");
  $("input[id='tb"+tbid+"']").siblings("input").removeAttr("checked");
  ajaxGetData("actlive.php",10,tbid+"",HandleNoResult);
}

function vmodeImgClick(comid){
  if(comid==window.com_id) return false;
  window.com_id=comid;
  $("img[id='vmimg"+comid+"']").css({"border":"1px solid #FF6600","opacity":"1"});
  $("img[id='vmimg"+comid+"']").siblings("img").css({"border":"1px solid","opacity":"0.5"});

  $("input[id='vm"+comid+"']").attr("checked","checked");
  $("input[id='vm"+comid+"']").siblings("input").removeAttr("checked");
  ajaxGetData("actlive.php",20,comid+"",HandleNoResult);
}

function infoBtnClick()
{
  if(document.getElementById("thenable").checked==true)
  {
    if(confirm("需要重新生成片头片尾，确认更新信息!?")==false)
      return false;
    if(document.getElementById("recbtn").innerHTML=="停止")
    {
      alert('此操作会生成片头片尾，请先停止录制！');
      return false;
    }
  }
  var params="";
  if(document.getElementById("thenable").checked==true)
    params+="1,";
  else
    params+="0,";
  params+=document.getElementById("txt1").value+",";
  params+=document.getElementById("txt2").value+",";
  params+=document.getElementById("txt3").value+",";
  params+=document.getElementById("txt4").value;
  ajaxGetData("actlive.php",30,params,HandleNoResult);
}
function titBtnClick()
{
  var tit_txt=$("#tit_txt").val($("#tit_txt").val().replace(/[\r\n]/g,""));
  if(tit_txt=="")
  {
    alert("字幕不能为空！")
    document.getElementById("tit_txt").focus();
    return false;
  }
  var params="";
  if(document.getElementById("titenable").checked==true)
    params+="1,";
  else
    params+="0,";
  params+=document.getElementById("txt_col").value+",";
  params+=document.getElementById("fam_id").value+",";
  params+=document.getElementById("fontsize").value+",";
  params+=document.getElementById("tit_txt").value;
  ajaxGetData("actlive.php",31,params,HandleNoResult);
}
function setVolume(chid,vol)
{
  ajaxGetData("actlive.php",32,chid+","+vol,HandleNoResult);
}
//PTZ begin
window.preset=0;
function preBtnClick()
{
  window.preset=1-window.preset;
  $('#prebtn').css({"background-color":"#5b6267"});
  $('#prebtn').css({"background-color":"#00a8eb"});
  if(window.preset>0)
  {
    $('#prebtn').css({"background-color":"#00a8eb"});
  }
  else
  {
    $('#prebtn').css({"background-color":"#5b6267"});
  }
}
window.ptz_id=0;
$("img[id='ptimg0']").css({"border":"1px solid #FF6600","opacity":"1"});
$("input[id='pt0']").attr("checked","checked");
function ptzOnMouseDown(action)
{
  ajaxGetData("actlive.php",33,window.ptz_id+","+action+",0",HandleNoResult);
}
function ptzOnMouseUpPT()
{
  ajaxGetData("actlive.php",33,window.ptz_id+",10,0",HandleNoResult);
}
function ptzOnMouseUpZoom()
{
  ajaxGetData("actlive.php",33,window.ptz_id+",11,0",HandleNoResult);
}
function ptzPrePosBtnClick(preid)
{
  var params="";
  if(window.preset==0)
    params+=window.ptz_id+",14,"+preid;
  else
    params+=window.ptz_id+",13,"+preid;
  ajaxGetData("actlive.php",33,params,HandleNoResult);
}
function HandleAreaDBResult()
{
  window.com_id=1;
  $("img[id='vmimg1']").css({"border":"1px solid #FF6600","opacity":"1"});
  $("img[id='vmimg1']").siblings("img").css({"border":"1px solid","opacity":"0.5"});

  $("input[id='vm1']").attr("checked","checked");
  $("input[id='vm1']").siblings("input").removeAttr("checked");
}

function areaDbClick(chid)
{
  ajaxGetData("actlive.php",35,chid+"",HandleAreaDBResult);
}
function areaClick(chid)
{
  ajaxGetData("actlive.php",37,chid+"",HandleAreaDBResult);
}
//left end
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = 'select LIVE from T_MISC_PARAM where MISC_ID=1;';
$live = $db->querySingle($sql);
if (isset($live)) {
  echo 'window.live='.$live.';'. PHP_EOL;
  if ($live > 0) {
    echo "$('#ro_en').css({'background-color':'#00a8eb'});". PHP_EOL;
  } else {
    echo "$('#ro_en').css({'background-color':'#5b6267'});". PHP_EOL;
  }
}
$sql = 'select COM_ID from T_VENC_PARAM where VENC_ID=8;';
$com_id = $db->querySingle($sql);
if (isset($com_id)) {
  echo 'window.com_id='.$com_id.';'.PHP_EOL;
  if($com_id>1)
  {
    echo '$("img[id=\'vmimg' . $com_id . '\']").css({"border":"1px solid #FF6600","opacity":"1"});' . PHP_EOL;
    echo '$("input[id=\'vm' . $com_id . '\']").attr("checked","checked");' . PHP_EOL;
  }
}
$sql = 'select ENABLE from T_RECEXT_PARAM where RE_ID=1;';
$ht_en = $db->querySingle($sql);
if ($ht_en>0) {
  echo 'document.getElementById("thenable").checked=true;' . PHP_EOL;
}
$sql = "select TXT_ID,TXT from T_RECTXT_PARAM where TXT_ID<5;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['TXT_ID'])) {
    echo 'document.getElementById("txt' . $res['TXT_ID'] . '").value="' . $res['TXT'] . '";' . PHP_EOL;
  }
}
$sql = 'select FAM_ID,TXT_COL,FONTSIZE,TXT,ENABLE from T_SUBTITLE_PARAM where TIT_ID=1;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['ENABLE'])) {
  if ($res['ENABLE'] > 0)
    echo 'document.getElementById("titenable").checked=true;' . PHP_EOL;
  echo 'jsSelectItemByValue(document.getElementById("fam_id"),' . $res['FAM_ID'] . ');' . PHP_EOL;
  echo 'document.getElementById("txt_col").value="' . dechex($res['TXT_COL']) . '";' . PHP_EOL;
  echo 'document.getElementById("fontsize").value="' . $res['FONTSIZE'] . '";' . PHP_EOL;
  echo 'document.getElementById("tit_txt").value="' . $res['TXT'] . '";' . PHP_EOL;
}
$sql = "select * from T_AIN_PARAM;";
$result = $db->query($sql);
echo "function InitVol() {" . PHP_EOL;
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['AIN_ID'])) {
  echo "$( '#vol0' ).slider( 'value', " . $res['VOL0'] . ");" . PHP_EOL;
  echo "$( '#vol1' ).slider( 'value', " . $res['VOL1'] . ");" . PHP_EOL;
  echo "$( '#vol2' ).slider( 'value', " . $res['VOL2'] . ");" . PHP_EOL;
}
echo "}" . PHP_EOL;
$db->close();
$db = new SQLite3(constant("CSDB"));
$sql = 'select * from T_TB_PARAM where TB_ID=1;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['TB_ID'])) {
  echo 'window.pos_id='. $res['TBP_ID'] . ";" . PHP_EOL;
  echo '$("img[id=\'tbimg' . $res['TBP_ID'] . '\']").css({"border":"1px solid #FF6600","opacity":"1"});' . PHP_EOL;
  echo '$("input[id=\'tb' . $res['TBP_ID'] . '\']").attr("checked","checked");' . PHP_EOL;
}
$sql = 'select * from T_MISC_PARAM where MISC_ID=1;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['MISC_ID'])) {
  echo 'rec_status=' . $res['REC_STATUS'] . ";" . PHP_EOL;
  $tmp = @disk_free_space("/mnt");
  $leftspace = round(($tmp / (1024 * 1024 * 1024)), 2);
  echo 'window.leftspace='.$leftspace.';'. PHP_EOL;
  switch ($res['REC_STATUS']) {
    case 1:
      echo 'document.getElementById("recbtn").innerHTML="停止";' . PHP_EOL;
      echo '$("#recbtn").css({"background-color":"#ff0000"});' . PHP_EOL;
      echo 'document.getElementById("rec_info").innerHTML="录制中['.$leftspace.'G/00:00:00]";'. PHP_EOL;
      //echo 'rectimer=setInterval("HandleRecInfo",3000);' . PHP_EOL;
      break;
    case 0:
    case 2:
      echo 'document.getElementById("recbtn").innerHTML="录制";' . PHP_EOL;
      echo 'document.getElementById("paubtn").innerHTML="暂停";' . PHP_EOL;
      echo 'document.getElementById("rec_info").innerHTML="未录制['.$leftspace.'G/00:00:00]";'. PHP_EOL;
      break;
    case 3:
      echo 'document.getElementById("recbtn").innerHTML="停止";' . PHP_EOL;
      echo 'document.getElementById("paubtn").innerHTML="恢复";' . PHP_EOL;
      echo '$("#recbtn").css({"background-color":"#ff0000"});' . PHP_EOL;
      echo '$("#paubtn").css({"background-color":"#0000ff"});' . PHP_EOL;
      echo 'document.getElementById("rec_info").innerHTML="暂停中['.$leftspace.'G/00:00:00]";'. PHP_EOL;
      break;
    case 4:
      echo 'document.getElementById("recbtn").innerHTML="停止";' . PHP_EOL;
      echo '$("#recbtn").css({"background-color":"#ff0000"});' . PHP_EOL;
      echo 'document.getElementById("paubtn").innerHTML="暂停";' . PHP_EOL;
      echo 'document.getElementById("rec_info").innerHTML="录制中['.$leftspace.'G/00:00:00]";'. PHP_EOL;
      break;
  }
  if($res['REC_STATUS']==1||$res['REC_STATUS']==4)
  {
    $rec_time=intval(time()-$res['REC_STIME']);
    echo 'window.rectime='.$rec_time.';'. PHP_EOL;
    echo 'window.rec_desc="录制中";'. PHP_EOL;
    echo 'UpdateRecTimeStr();'. PHP_EOL;
    echo 'window.rectimer=setInterval(HandleRecInfo,1000);'. PHP_EOL;
  }
  echo 'window.dbauto='.$res['DBAUTO'].';'. PHP_EOL;
  echo "$('#dbauto0').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#dbauto1').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#dbauto2').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#dbauto".$res['DBAUTO']."').css({'background-color':'#00a8eb'});". PHP_EOL;
  
  echo 'window.recmode='.$res['RECMODE'].';'. PHP_EOL;
  echo "$('#recmode0').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#recmode1').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#recmode2').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#recmode".$res['RECMODE']."').css({'background-color':'#00a8eb'});". PHP_EOL;
}
$sql = "select * from T_TITLE_PARAM where TIT_ID<9;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['TIT_ID'])) {
    echo "document.getElementById('v" . $res['TIT_ID'] . "_name').innerHTML='" . $res['TITLE'] . "';" . PHP_EOL;
  }
}
$db->close();
?>
playcom("rtmp://" +location.hostname+ "/live","stream10");
playsingle("rtmp://" +location.hostname+ "/live","stream11");
</script>
</body>
</html>