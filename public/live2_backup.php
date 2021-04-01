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
  echo "<title>直录播跟踪一体机-" . constant("CORP") . "</title>";
  error_log(print_r("This is the debug message", true));
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
<script type="text/javascript" src="player/jwplayer.js"></script>
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">.gradient {filter: none !important;}</style>
<![endif]-->
</head>
<body scroll="no" oncontextmenu=self.event.returnValue=false>
<div class="body_wrap">
  <div class="mycontainer">
    <div class="dropdown-wrap boxed-velvet vh-style0">
      <div class="head_logo"></div>
      <ul class="dropdown inner clearfix">
        <li>
          <a href="live2.php">
            <span style="color:#3ebcef;">导播</span>
          </a>
        </li>
        <li>
          <a href="live2.php">
            <span>点播</span>
          </a>
        </li>
        <li>
         <a href="live2.php">
            <span>配置</span>
          </a>
       </li>
<?php
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
  echo '  <a href="live2.php">'.PHP_EOL;
  echo "    <span>跟踪</span>".PHP_EOL;
  echo "  </a>".PHP_EOL;
  echo "</li>".PHP_EOL;
}
?>
        <li>
          <a href="#">
            <span>admin▼</span>
          </a>
          <ul>
            <li>
              <a href="login.php" onClick="logOut()">注销系统</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="v-content">
	  <div class="v-leftleft">
	  	<div class="v-info">


			<ul class="tabs clearfix">
			  <li>
                <a href="#effct" data-toggle="tab">特效</a>
              </li>
              <li>
                <a href="#info" data-toggle="tab">信息</a>
              </li>
			  <li>
                <a href="#video" data-toggle="tab">视频</a>
              </li>
              <li class="active">
                <a href="#setting" data-toggle="tab">设置</a>
              </li>
            </ul>
		  	<div class="tab-content boxed clearfix v-righttabh">

			
			  <div class="tab-pane fade" id="effct">
                <div class="form-center">
				  <div class="effect-row">
					<input type="radio" value="0" id="tb0" name="effection" style="display:none">
					<img id="tbimg0" onClick="tbposImgClick(0)" src="images/vh/tb0.png" title="无台标" style="opacity:0.5">
					<input type="radio" value="1" id="tb1" name="effection" style="display:none">
					<img id="tbimg1" onClick="tbposImgClick(1)" src="images/vh/tb1.png" title="台标左上" style="opacity:0.5">
					<input type="radio" value="2" id="tb2" name="effection" style="display:none">
					<img id="tbimg2" onClick="tbposImgClick(2)" src="images/vh/tb2.png" title="台标左下" style="opacity:0.5">

					<input type="radio" value="3" id="tb3" name="effection" style="display:none">
					<img id="tbimg3" onClick="tbposImgClick(3)" src="images/vh/tb3.png" title="台标右上" style="opacity:0.5">
					<input type="radio" value="4" id="tb4" name="effection" style="display:none">
					<img id="tbimg4" onClick="tbposImgClick(4)" src="images/vh/tb4.png" title="台标右下" style="opacity:0.5">
					<input type="radio" value="4" id="vm4" name="effection" style="display:none">
					<img id="vmimg2" onClick="vmodeImgClick(2)" src="images/vh/vm3.png" title="画中画" style="opacity:0.5">

					<input type="radio" value="2" id="vm2" name="effection" style="display:none">
					<img id="vmimg3" onClick="vmodeImgClick(3)" src="images/vh/vm1.png" title="两分屏" style="opacity:0.5">
					<input type="radio" value="3" id="vm3" name="effection" style="display:none">
					<img id="vmimg4" onClick="vmodeImgClick(4)" src="images/vh/vm2.png" title="画外画" style="opacity:0.5">
					<input type="radio" value="5" id="vm5" name="effection" style="display:none">
					<img id="vmimg5" onClick="vmodeImgClick(5)" src="images/vh/vm4.png" title="三分屏" style="opacity:0.5">

					<input type="radio" value="6" id="vm6" name="effection" style="display:none">
					<img id="vmimg6" onClick="vmodeImgClick(6)" src="images/vh/vm5.png" title="四分屏" style="opacity:0.5">
					<input type="radio" value="7" id="vm7" name="effection" style="display:none">
					<img id="vmimg7" onClick="vmodeImgClick(7)" src="images/vh/vm7.png" title="六分屏" style="opacity:0.5">
					<input type="radio" value="8" id="vm8" name="effection" style="display:none">
					<img id="vmimg8" onClick="vmodeImgClick(8)" src="images/vh/vm8.png" title="八分屏" style="opacity:0.5">
				  </div>
                </div>
              </div>
			
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
					  <input type="text" id="txt1" onKeyPress="return /[\w\u4e00-\u9fa5]/.test(String.fromCharCode(window.event.keyCode))" >
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
					<div class="tit_subbtn">
					  <button class="btn_preset" type="button" style="width:120px;" onClick="infoBtnClick()">更新片头片尾</button>
					</div>
				  </div>
                </div>
              </div>

			  <div class="tab-pane fade" id="video">
                <div class="form-center">
				  <div class="form-row">
					<div class="font-label1">存储：</div>
					
				  </div>
				  <div class="form-row">
					<div class="font-label1">类型：</div>
					<div class="field_select font-select">
					  <select class="select_styled" id="video_type">
						<option style="background-color: #444c55;font-size: 20px;" value="0">电影</option>
						<option style="background-color: #444c55;font-size: 20px;" value="1">资源</option>
						<option style="background-color: #444c55;font-size: 20px;" value="2">自定义</option>
					  </select>
					</div>
				  </div>
				  <div class="form-row">
					<div class="font-label1">方式：</div>
					<div class="field_select font-select">
					  <select class="select_styled" id="play_mode">
						<option style="background-color: #444c55;font-size: 20px;" value="0">手动</option>
						<option style="background-color: #444c55;font-size: 20px;" value="1">自动</option>
						<option style="background-color: #444c55;font-size: 20px;" value="2">半自动</option>
					  </select>
					</div>
				  </div>
                </div>
              </div>
			  

              <div class="tab-pane fade in active" id="setting">
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
				  </div>
				  <div class="form-row">
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
				  <div class="form-row">
					<div class="tit_subbtn">
					  <button class="btn_preset" type="button" style="width:80px;" onClick="titBtnClick()">提交</button>
					</div>
				  </div>

				<div class="form-row">
					  <div class="au-label">LINE-IN1</div>
					  <div class="au-bar">
						<div class="vol_bar" id="vol0"></div>
					  </div>
				 </div>
				 <div class="form-row">
					  <div class="au-label">LINE-IN2</div>
					  <div class="au-bar">
						<div class="vol_bar" id="vol1"></div>
					  </div>
				 </div>
				 <div class="form-row">
					  <div class="au-label">混音通道</div>
					  <div class="au-bar">
						<div class="vol_bar" id="vol2"></div>
					  </div>
				 </div>
                </div>
              </div>
            </div>
		  </div>
	  </div>
      <div class="v-left">
        <div class="widget-container boxed v-leftvh">
          <div class="video-win" id="playwin"></div>
          <div class="video-mask"></div>
        </div>
        <div class="widget-container boxed vh-style1">
          <div class="vh-row">
          <button class="toolbarbtn" id="ro_en" type="button" style="margin-left:280px;background-image:url(images/toolbar/live_start.png);background-repeat:no-repeat;" onClick="rtmpbtnClick()"></button>
          <button name="recbtn" value="0" type="button" class="toolbarbtn" id="recbtn" style="margin-left:50px;background-image:url(images/toolbar/record_start.png);background-repeat:no-repeat;" onClick="recbtnClick()"></button>
          <button class="toolbarbtn" id="paubtn" value="0" type="button" style="margin-left:50px;background-image:url(images/toolbar/play.png);background-repeat:no-repeat;" onClick="paubtnClick()"></button>
          
		  <button class="btn2" id="recbtn" type="button" style="width:60px;margin-left:10px;display:none" onClick="recbtnClick()"></button>
          <button class="btn2" id="paubtn" type="button" style="width:60px;margin-left:2px;display:none" onClick="paubtnClick()"></button>
          <button class="btn_info" id="rec_info" disabled="disabled" type="button" style="display:none">[0G/00:00:00]</button>


          </div>
        </div>
		
		<!---video style-->
		<!--
		<div class="widget-container boxed vh-style1">
          <div class="vh-rowr">
            <input type="radio" value="0" id="tb0" name="tbpos" style="display:none">
            <img id="tbimg0" onClick="tbposImgClick(0)" src="images/vh/tb0.png" title="无台标" style="opacity:0.5">
            <input type="radio" value="1" id="tb1" name="tbpos" style="display:none">
            <img id="tbimg1" onClick="tbposImgClick(1)" src="images/vh/tb1.png" title="台标左上" style="opacity:0.5">
			<input type="radio" value="2" id="tb2" name="tbpos" style="display:none">
            <img id="tbimg2" onClick="tbposImgClick(2)" src="images/vh/tb2.png" title="台标左下" style="opacity:0.5">
            <input type="radio" value="3" id="tb3" name="tbpos" style="display:none">
            <img id="tbimg3" onClick="tbposImgClick(3)" src="images/vh/tb3.png" title="台标右上" style="opacity:0.5">
            <input type="radio" value="4" id="tb4" name="tbpos" style="display:none">
            <img id="tbimg4" onClick="tbposImgClick(4)" src="images/vh/tb4.png" title="台标右下" style="opacity:0.5">

            <input type="radio" value="4" id="vm4" name="vmode" style="display:none">
            <img id="vmimg4" onClick="vmodeImgClick(4)" src="images/vh/vm3.png" title="画中画" style="opacity:0.5">
            <input type="radio" value="2" id="vm2" name="vmode" style="display:none">
            <img id="vmimg2" onClick="vmodeImgClick(2)" src="images/vh/vm1.png" title="两分屏" style="opacity:0.5">
            <input type="radio" value="3" id="vm3" name="vmode" style="display:none">
            <img id="vmimg3" onClick="vmodeImgClick(3)" src="images/vh/vm2.png" title="画外画" style="opacity:0.5">
            <input type="radio" value="5" id="vm5" name="vmode" style="display:none">
            <img id="vmimg5" onClick="vmodeImgClick(5)" src="images/vh/vm4.png" title="三分屏" style="opacity:0.5">
            <input type="radio" value="6" id="vm6" name="vmode" style="display:none">
            <img id="vmimg6" onClick="vmodeImgClick(6)" src="images/vh/vm5.png" title="四分屏" style="opacity:0.5">
            <input type="radio" value="7" id="vm7" name="vmode" style="display:none">
            <img id="vmimg7" onClick="vmodeImgClick(7)" src="images/vh/vm7.png" title="六分屏" style="opacity:0.5">
            <input type="radio" value="8" id="vm8" name="vmode" style="display:none">
            <img id="vmimg8" onClick="vmodeImgClick(8)" src="images/vh/vm8.png" title="八分屏" style="opacity:0.5">
          </div>
        </div>
		-->
		
      </div>

      <div class="v-right">
        
        <div class="tabs_framed boxed v-righth">
          <div class="inner">
            <div class="tab-content boxed clearfix v-righttabh">
			
			
			<div class="tab-pane fade in active" id="ptz">
                <div class="form-center">
				

                  <div class="ptz_row1">
                    <div class="control_unit">
                      <div class="control_direction">
                        <div class="control_01" onMouseDown="ptzOnMouseDown(1)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_02" onMouseDown="ptzOnMouseDown(2)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_03" onMouseDown="ptzOnMouseDown(3)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_04" onMouseDown="ptzOnMouseDown(0)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_05" onMouseDown="ptzOnMouseDown(4)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_06" onMouseDown="ptzOnMouseDown(7)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_07" onMouseDown="ptzOnMouseDown(6)" onMouseUp="ptzOnMouseUpPT()"></div>
                        <div class="control_08" onMouseDown="ptzOnMouseDown(5)" onMouseUp="ptzOnMouseUpPT()"></div>
                      </div>
                    </div>
					
                    <div class="ptz_misc">

						<button class="btn2" type="button" style="width:48px;background-image:url(images/ptz/large1.png);background-repeat:no-repeat;" onMouseDown="ptzOnMouseDown(8)" onMouseUp="ptzOnMouseUpZoom()"></button>
                        <button class="btn2" type="button" style="width:48px;margin-left:30px;background-image:url(images/ptz/small1.png);background-repeat:no-repeat;" onMouseDown="ptzOnMouseDown(9)" onMouseUp="ptzOnMouseUpZoom()"></button>
                    </div>
					<div class=" ptz-button">
                    <button class="btn_preset" id="prebtn" type="button" style="float: none; margin:0 auto; width:120px;background-color: #5b6267;display:block;" onClick="preBtnClick()">调用预置位</button>
                  	</div>
                  </div>
	   			  <div class=" ptz-pretit">		

                <div style="display: block; height: 203px;" class="ptzpanes" id="pane1">
                    <div id="PresetArea">
                    <div class="presetunset"><span class="presetnum">1</span><span class="presetname">预置点 1</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">2</span><span class="presetname">预置点 2</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">3</span><span class="presetname">预置点 3</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">4</span><span class="presetname">预置点 4</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">5</span><span class="presetname">预置点 5</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">6</span><span class="presetname">预置点 6</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">7</span><span class="presetname">预置点 7</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">8</span><span class="presetname">预置点 8</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">9</span><span class="presetname">预置点 9</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">10</span><span class="presetname">预置点 10</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">11</span><span class="presetname">预置点 11</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">12</span><span class="presetname">预置点 12</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">13</span><span class="presetname">预置点 13</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">14</span><span class="presetname">预置点 14</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">15</span><span class="presetname">预置点 15</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">16</span><span class="presetname">预置点 16</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">17</span><span class="presetname">预置点 17</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">18</span><span class="presetname">预置点 18</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">19</span><span class="presetname">预置点 19</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">20</span><span class="presetname">预置点 20</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">21</span><span class="presetname">预置点 21</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">22</span><span class="presetname">预置点 22</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">23</span><span class="presetname">预置点 23</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">24</span><span class="presetname">预置点 24</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">25</span><span class="presetname">预置点 25</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">26</span><span class="presetname">预置点 26</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">27</span><span class="presetname">预置点 27</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">28</span><span class="presetname">预置点 28</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">29</span><span class="presetname">预置点 29</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">30</span><span class="presetname">预置点 30</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">31</span><span class="presetname">预置点 31</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">32</span><span class="presetname">预置点 32</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">33</span><span class="presetname">预置点 33</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">34</span><span class="presetname">预置点 34</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">35</span><span class="presetname">预置点 35</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">36</span><span class="presetname">预置点 36</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">37</span><span class="presetname">预置点 37</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">38</span><span class="presetname">预置点 38</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">39</span><span class="presetname">预置点 39</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">40</span><span class="presetname">预置点 40</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">41</span><span class="presetname">预置点 41</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">42</span><span class="presetname">预置点 42</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">43</span><span class="presetname">预置点 43</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">44</span><span class="presetname">预置点 44</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">45</span><span class="presetname">预置点 45</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">46</span><span class="presetname">预置点 46</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">47</span><span class="presetname">预置点 47</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">48</span><span class="presetname">预置点 48</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">49</span><span class="presetname">预置点49</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">50</span><span class="presetname">预置点 50</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">51</span><span class="presetname">预置点 51</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">52</span><span class="presetname">预置点 52</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">53</span><span class="presetname">预置点 53</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">54</span><span class="presetname">预置点 54</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">55</span><span class="presetname">预置点 55</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">56</span><span class="presetname">预置点 56</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">57</span><span class="presetname">预置点 57</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">58</span><span class="presetname">预置点 58</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">59</span><span class="presetname">预置点 59</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">60</span><span class="presetname">预置点 60</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">61</span><span class="presetname">预置点 61</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">62</span><span class="presetname">预置点 62</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">63</span><span class="presetname">预置点 63</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">64</span><span class="presetname">预置点 64</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">65</span><span class="presetname">预置点 65</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">66</span><span class="presetname">预置点 66</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">67</span><span class="presetname">预置点 67</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">68</span><span class="presetname">预置点 68</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">69</span><span class="presetname">预置点 69</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">70</span><span class="presetname">预置点 70</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">71</span><span class="presetname">预置点 71</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">72</span><span class="presetname">预置点 72</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">73</span><span class="presetname">预置点 73</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">74</span><span class="presetname">预置点 74</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">75</span><span class="presetname">预置点 75</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">76</span><span class="presetname">预置点 76</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">77</span><span class="presetname">预置点 77</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">78</span><span class="presetname">预置点 78</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">79</span><span class="presetname">预置点 79</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">80</span><span class="presetname">预置点 80</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">81</span><span class="presetname">预置点 81</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">82</span><span class="presetname">预置点 82</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">83</span><span class="presetname">预置点 83</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">84</span><span class="presetname">预置点 84</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">85</span><span class="presetname">预置点 85</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">86</span><span class="presetname">预置点 86</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">87</span><span class="presetname">预置点 87</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">88</span><span class="presetname">预置点 88</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">89</span><span class="presetname">预置点 89</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">90</span><span class="presetname">预置点 90</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">91</span><span class="presetname">预置点 91</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">92</span><span class="presetname">预置点 92</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">93</span><span class="presetname">预置点 93</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">94</span><span class="presetname">预置点 94</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">95</span><span class="presetname">预置点 95</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">96</span><span class="presetname">预置点 96</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">97</span><span class="presetname">预置点 97</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">98</span><span class="presetname">预置点 98</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">99</span><span class="presetname">预置点 99</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">100</span><span class="presetname">预置点 100</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">101</span><span class="presetname">预置点 101</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">102</span><span class="presetname">预置点 102</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">103</span><span class="presetname">预置点 103</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">104</span><span class="presetname">预置点 104</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">105</span><span class="presetname">预置点 105</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">106</span><span class="presetname">预置点 106</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">107</span><span class="presetname">预置点 107</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">108</span><span class="presetname">预置点 108</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">109</span><span class="presetname">预置点 109</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">110</span><span class="presetname">预置点 110</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">111</span><span class="presetname">预置点 111</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">112</span><span class="presetname">预置点 112</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">113</span><span class="presetname">预置点 113</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">114</span><span class="presetname">预置点 114</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">115</span><span class="presetname">预置点 115</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">116</span><span class="presetname">预置点 116</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">117</span><span class="presetname">预置点 117</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">118</span><span class="presetname">预置点 118</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">119</span><span class="presetname">预置点 119</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">120</span><span class="presetname">预置点 120</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">121</span><span class="presetname">预置点 121</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">122</span><span class="presetname">预置点 122</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">123</span><span class="presetname">预置点 123</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">124</span><span class="presetname">预置点 124</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">125</span><span class="presetname">预置点 125</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">126</span><span class="presetname">预置点 126</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">127</span><span class="presetname">预置点 127</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">128</span><span class="presetname">预置点 128</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">129</span><span class="presetname">预置点 129</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">130</span><span class="presetname">预置点 130</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">131</span><span class="presetname">预置点 131</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">132</span><span class="presetname">预置点 132</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">133</span><span class="presetname">预置点 133</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">134</span><span class="presetname">预置点 134</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">135</span><span class="presetname">预置点 135</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">136</span><span class="presetname">预置点 136</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">137</span><span class="presetname">预置点 137</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">138</span><span class="presetname">预置点 138</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">139</span><span class="presetname">预置点 139</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">140</span><span class="presetname">预置点 140</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">141</span><span class="presetname">预置点 141</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">142</span><span class="presetname">预置点 142</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">143</span><span class="presetname">预置点 143</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">144</span><span class="presetname">预置点 144</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">145</span><span class="presetname">预置点 145</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">146</span><span class="presetname">预置点 146</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">147</span><span class="presetname">预置点 147</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">148</span><span class="presetname">预置点 148</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">149</span><span class="presetname">预置点 149</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">150</span><span class="presetname">预置点 150</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">151</span><span class="presetname">预置点 151</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">152</span><span class="presetname">预置点 152</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">153</span><span class="presetname">预置点 153</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">154</span><span class="presetname">预置点 154</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">155</span><span class="presetname">预置点 155</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">156</span><span class="presetname">预置点 156</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">157</span><span class="presetname">预置点 157</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">158</span><span class="presetname">预置点 158</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">159</span><span class="presetname">预置点 159</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">160</span><span class="presetname">预置点 160</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">161</span><span class="presetname">预置点 161</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">162</span><span class="presetname">预置点 162</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">163</span><span class="presetname">预置点 163</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">164</span><span class="presetname">预置点 164</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">165</span><span class="presetname">预置点 165</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">166</span><span class="presetname">预置点 166</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">167</span><span class="presetname">预置点 167</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">168</span><span class="presetname">预置点 168</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">169</span><span class="presetname">预置点 169</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">170</span><span class="presetname">预置点 170</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">171</span><span class="presetname">预置点 171</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">172</span><span class="presetname">预置点 172</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">173</span><span class="presetname">预置点 173</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">174</span><span class="presetname">预置点 174</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">175</span><span class="presetname">预置点 175</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">176</span><span class="presetname">预置点 176</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">177</span><span class="presetname">预置点 177</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">178</span><span class="presetname">预置点 178</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">179</span><span class="presetname">预置点 179</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">180</span><span class="presetname">预置点 180</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">181</span><span class="presetname">预置点 181</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">182</span><span class="presetname">预置点 182</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">183</span><span class="presetname">预置点 183</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">184</span><span class="presetname">预置点 184</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">185</span><span class="presetname">预置点 185</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">186</span><span class="presetname">预置点 186</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">187</span><span class="presetname">预置点 187</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">188</span><span class="presetname">预置点 188</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">189</span><span class="presetname">预置点 189</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">190</span><span class="presetname">预置点 190</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">191</span><span class="presetname">预置点 191</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">192</span><span class="presetname">预置点 192</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">193</span><span class="presetname">预置点 193</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">194</span><span class="presetname">预置点 194</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">195</span><span class="presetname">预置点 195</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">196</span><span class="presetname">预置点 196</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">197</span><span class="presetname">预置点 197</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">198</span><span class="presetname">预置点 198</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">199</span><span class="presetname">预置点 199</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">200</span><span class="presetname">预置点 200</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">201</span><span class="presetname">预置点 201</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">202</span><span class="presetname">预置点 202</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">203</span><span class="presetname">预置点 203</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">204</span><span class="presetname">预置点 204</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">205</span><span class="presetname">预置点 205</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">206</span><span class="presetname">预置点 206</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">207</span><span class="presetname">预置点 207</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">208</span><span class="presetname">预置点 208</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">209</span><span class="presetname">预置点 209</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">210</span><span class="presetname">预置点 210</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">211</span><span class="presetname">预置点 211</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">212</span><span class="presetname">预置点 212</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">213</span><span class="presetname">预置点 213</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">214</span><span class="presetname">预置点 214</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">215</span><span class="presetname">预置点 215</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">216</span><span class="presetname">预置点 216</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">217</span><span class="presetname">预置点 217</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">218</span><span class="presetname">预置点 218</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">219</span><span class="presetname">预置点 219</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">220</span><span class="presetname">预置点 220</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">221</span><span class="presetname">预置点 221</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">222</span><span class="presetname">预置点 222</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">223</span><span class="presetname">预置点 223</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">224</span><span class="presetname">预置点 224</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">225</span><span class="presetname">预置点 225</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">226</span><span class="presetname">预置点 226</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">227</span><span class="presetname">预置点 227</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">228</span><span class="presetname">预置点 228</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">229</span><span class="presetname">预置点 229</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">230</span><span class="presetname">预置点 230</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">231</span><span class="presetname">预置点 231</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">232</span><span class="presetname">预置点 232</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">233</span><span class="presetname">预置点 233</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">234</span><span class="presetname">预置点 234</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">235</span><span class="presetname">预置点 235</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">236</span><span class="presetname">预置点 236</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">237</span><span class="presetname">预置点 237</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">238</span><span class="presetname">预置点 238</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">239</span><span class="presetname">预置点 239</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">240</span><span class="presetname">预置点 240</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">241</span><span class="presetname">预置点 241</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">242</span><span class="presetname">预置点 242</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">243</span><span class="presetname">预置点 243</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">244</span><span class="presetname">预置点 244</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">245</span><span class="presetname">预置点 245</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">246</span><span class="presetname">预置点 246</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">247</span><span class="presetname">预置点 247</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">248</span><span class="presetname">预置点 248</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">249</span><span class="presetname">预置点 249</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">250</span><span class="presetname">预置点 250</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">251</span><span class="presetname">预置点 251</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">252</span><span class="presetname">预置点 252</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">253</span><span class="presetname">预置点 253</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">254</span><span class="presetname">预置点 254</span><span></span><span></span><span></span></div><div class="presetunset"><span class="presetnum">255</span><span class="presetname">预置点 255</span><span></span><span></span><span></span></div>
                    </div>
                </div>
				  </div>
                </div>
              </div>

              <div class="tab-pane fade">
                <div class="form-center">
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
          <span class="area_tit" id="v1_name">教师近景</span>
          <input type="radio" value="0" id="pt0" name="ptzctrl" style="display:none">
          <img id="ptimg0" onClick="ptzctrlImgClick(0)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v2_name">教师全景</span>
          <input type="radio" value="1" id="pt1" name="ptzctrl" style="display:none">
          <img id="ptimg1" onClick="ptzctrlImgClick(1)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v3_name">学生近景</span>
          <input type="radio" value="2" id="pt2" name="ptzctrl" style="display:none">
          <img id="ptimg2" onClick="ptzctrlImgClick(2)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v4_name">学生全景</span>
          <input type="radio" value="3" id="pt3" name="ptzctrl" style="display:none">
          <img id="ptimg3" onClick="ptzctrlImgClick(3)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
        <div class="widget-container boxed vh-col6">
          <span class="area_tit" id="v5_name">片头画面</span>
          <input type="radio" value="4" id="pt4" name="ptzctrl" style="display:none">
          <img id="ptimg4" onClick="ptzctrlImgClick(4)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
        </div>
      </div>
      <div class="clear"></div>
      <div class="widget-container boxed vh-s6">
        <div class="video-s6" id="playw6"></div>
        <div class="s6-up">
          <div class="v-area" id="v1_area" onClick="areaClick(0)" onDblClick="areaDbClick(0)"></div>
          <div class="v-area" id="v2_area" onClick="areaClick(1)" onDblClick="areaDbClick(1)"></div>
          <div class="v-area" id="v3_area" onClick="areaClick(2)" onDblClick="areaDbClick(2)"></div>
          <div class="v-area" id="v4_area" onClick="areaClick(3)" onDblClick="areaDbClick(3)"></div>
          <div class="v-area6" id="v5_area" onClick="areaClick(4)" onDblClick="areaDbClick(4)"></div>
        </div>
        <div class="s6-mid">
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v6_name">板书视频</span>
            <input type="radio" value="5" id="pt5" name="ptzctrl" style="display:none">
          <img id="ptimg5" onClick="ptzctrlImgClick(5)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v7_name">教室全景</span>
            <input type="radio" value="6" id="pt6" name="ptzctrl" style="display:none">
          <img id="ptimg6" onClick="ptzctrlImgClick(6)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v8_name">教师电脑</span>
            <input type="radio" value="7" id="pt7" name="ptzctrl" style="display:none">
          <img id="ptimg7" onClick="ptzctrlImgClick(7)" src="images/vh/control.png" title="云台选择" style="border:1px solid;opacity:0.5">
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v9_name">巡视镜头</span>
          </div>
          <div class="widget-container boxed vh-col6">
            <span class="area_tit" id="v10_name">片尾画面</span>
          </div>
        </div>
        <div class="s6-down">
          <div class="v-area" id="v6_area" onClick="areaClick(5)" onDblClick="areaDbClick(5)"></div>
          <div class="v-area" id="v7_area" onClick="areaClick(6)" onDblClick="areaDbClick(6)"></div>
          <div class="v-area" id="v8_area" onClick="areaClick(7)" onDblClick="areaDbClick(7)"></div>
          <div class="v-area" id="v9_area" onClick="areaClick(8)" onDblClick="areaDbClick(8)"></div>
          <div class="v-area6" id="v10_area" onClick="areaClick(9)" onDblClick="areaDbClick(9)"></div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="widget-container boxed vh-style0">
      <div class="inner vh-center">
        <span>Powered By <?php echo constant("CORP"); ?></span>
      </div>
    </div>
  </div>
  <!--/ container -->
</div>

<script>
/****************************************/

var AddEventListener = function (element, eventName, listener) {
    if(element.addEventListener) 
        {
           element.addEventListener(eventName, listener,false);
        }
    else if(element.attachEvent) 
        {
           element.attachEvent("on" + eventName, listener);
        }
    else
        {
           element["on" + eventName] = listener;
        }
 };
                                                            
function byClass2(parentID,oClass){//局部获取类名，parentID为你传入的父级ID
    var parent=document.getElementById(parentID);
    var tags=parent.all?parent.all:parent.getElementsByTagName('*');
    var arr=[];
    for (var i = 0; i < tags.length; i++) {
        var reg=new RegExp('\\b'+oClass+'\\b','g');
        if (reg.test(tags[i].className)) {
           arr.push(tags[i]);
           };
        };
 return arr;//注意返回的也是数组，包含你传入的class所有元素；
}                                                                                                            

/****************************************/



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
  
  
  /***********************/
  
  var PreSet = byClass2("PresetArea","presetunset");
  for(var i=0;i<PreSet.length;i++)
  {
     AddEventListener(PreSet[i], 'click', function(e)
     {
         var e = e||window.Event;
         var Target = e.target||e.srcElement;
         var str =Target.firstChild.nodeValue;
         var presetnum = str.split(" ");
        // alert(presetnum[1]);
	ajaxGetData("actlive.php",40,ptz_id+","+window.preset+","+presetnum[1],HandleNoResult);
     });
                                                                                                                                                              
  }
  
  /***********************/
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
$db = new MyDB();
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
   // 'rtmp.tunneling':false,
   // controlbar: 'none',
   // bufferlength:<?php echo $buflen;?>,
    stretching:"EXACTFIT",
    screencolor:'0X000000',
	
	//streamer:'rtmp://live.hkstv.hk.lxdns.com/live/',
	//file:'hks',

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
   // 'rtmp.tunneling':false,
   // controlbar: 'none',
   // bufferlength:<?php echo $buflen;?>,
    stretching:"EXACTFIT",
    screencolor:'0X000000',

    streamer:streamurl,
    file:streamname,

	//streamer:'rtmp://live.hkstv.hk.lxdns.com/live/',
	//file:'hks',
 
    width:1198,
    height:300
  });
  jwplayer("playw6").onReady(function (){
    this.play();
  });
}
/*
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
*/


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
      $('#ro_en').css({"background-color":"#669999"});
	  $('#ro_en').css("background-image","url(images/toolbar/live_stop.png)");
    }
    else
    {
      $('#ro_en').css({"background-color":"#669999"});
	  $('#ro_en').css("background-image","url(images/toolbar/live_start.png)");
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
      $('#recbtn').css({"background-color":"#663366"});
      document.getElementById("paubtn").innerHTML="暂停";
      $('#paubtn').css({"background-color":"#663366"});
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
      $('#paubtn').css({"background-color":"#663366"});
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
/*
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
  */
  var params="";
  if(document.getElementById("recbtn").value == 0)
  {
    params+="1";
	document.getElementById("recbtn").value=1;
	$('#recbtn').css("background-image","url(images/toolbar/record_stop.png)");
  }
  else
  {
    params+="2";
	document.getElementById("recbtn").value=0;
	$('#recbtn').css("background-image","url(images/toolbar/record_start.png)");
  }
  /*
  if(document.getElementById("recbtn").innerHTML=="录制")
  {
    params+="1";
  }
  else
  {
    params+="2";
  }
  */
  ajaxGetData("actlive.php",2,params,HandleRecResult);
}

function paubtnClick()
{
/*
  if(document.getElementById("recbtn").innerHTML=="录制")
    return false;
  var params="";
  if(document.getElementById("paubtn").innerHTML=="暂停")
    params+="3";
  else
    params+="4";
	*/
	
  if(document.getElementById("recbtn").value==0)
    return false;
  var params="";
  if(document.getElementById("paubtn").value==0)
  {
  	params+="3";
	document.getElementById("paubtn").value=1;
	$('#paubtn').css("background-image","url(images/toolbar/pause.png)");
  }
  else
  {
  	params+="4";
	document.getElementById("paubtn").value=0;
	$('#paubtn').css("background-image","url(images/toolbar/play.png)");
  }
    
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
//	alert("tbid"+tbid);
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
	$('#prebtn').css({"background-color":"#663366"});
	$('#prebtn').css({"background-color":"#5b6267"});
  if(window.preset>0)
  {
	$('#prebtn').css({"background-color":"#663366"});
	$('#prebtn').text("设置预置位");
  }
  else
  {
  	$('#prebtn').css({"background-color":"#5b6267"});
 	$('#prebtn').text("调用预置位");
  }
 // alert("preset="+window.preset);
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
 // ajaxGetData("actlive.php",37,chid+"",HandleAreaDBResult);
}
//left end
<?php
$db = new MyDB();
$sql = 'select LIVE from T_MISC_PARAM where MISC_ID=1;';
$live = $db->querySingle($sql);
if (isset($live)) {
  echo 'window.live='.$live.';'. PHP_EOL;
  if ($live > 0) {
    echo "$('#ro_en').css({'background-color':'#669999'});". PHP_EOL;
  } else {
    echo "$('#ro_en').css({'background-color':'#669999'});". PHP_EOL;
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
//$db = new SQLite3(constant("CSDB"));
$db = new MyDB();
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
  /*
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
  */
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
  echo "$('#dbauto".$res['DBAUTO']."').css({'background-color':'#663366'});". PHP_EOL;
  
  echo 'window.recmode='.$res['RECMODE'].';'. PHP_EOL;
  echo "$('#recmode0').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#recmode1').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#recmode2').css({'background-color':'#5b6267'});". PHP_EOL;
  echo "$('#recmode".$res['RECMODE']."').css({'background-color':'#663366'});". PHP_EOL;
}
$sql = "select * from T_TITLE_PARAM where TIT_ID<9;";
$result = $db->query($sql);
/*
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['TIT_ID'])) {
    echo "document.getElementById('v" . $res['TIT_ID'] . "_name').innerHTML='" . $res['TITLE'] . "';" . PHP_EOL;
  }
}
*/
$db->close();
?>
playcom("rtmp://192.168.1.22/live","livestream1");
playsingle("rtmp://192.168.1.22/live","livestream2");

//playcom("rtmp://live.hkstv.hk.lxdns.com/live/","hks");
//playsingle("rtmp://live.hkstv.hk.lxdns.com/live/","hks");
</script>
</body>
</html>
