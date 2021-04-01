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
	require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/fileLen.php');
?>

<!-- main JS libs -->
<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/jquery-1.11.3.min.js"></script>
<script src="js/jquery.datatables.min.js"></script>
<script src="js/libs/jquery-ui.1.11.4.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>

<!-- Style CSS -->
<link href="css/bootstrap.css" media="screen" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet">
<link href="css/jquery.dataTables.css" media="screen" rel="stylesheet">


<link rel="stylesheet" href="css/playback.css" type="text/css" media="screen, projection" />

<!-- scripts -->
<script src="js/general.js"></script>

<!-- Include all needed stylesheets and scripts here -->

<script src="js/jquery.customInput.js"></script>
<script src="jscolor/jscolor.js" type="text/javascript"></script>
<script src="js/ajaxfunc.js"></script>
<script src="js/common.js"></script>
<script type="text/javascript" src="player/jwplayer.js"></script>


<script type="text/javascript" src="js/timebar.js"></script>


<!--此处程序是获得视频时间条的程序，GetMovePlaybackTime(szGetTime)是ActiveX里面的接口函数-->
    <script for = "timebar" event ="GetMovePlaybackTime(szGetTime)">  
        TimebarMouseUp(szGetTime);
        //timeBarMouseUp(szGetTime);
        //alert(szGetTime);
    </script>

<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">.gradient {filter: none !important;}</style>
<![endif]-->
</head>

<body onLoad="load()">
<div class="body_wrap">
  <div class="mycontainer">
    <div class="dropdown-wrap boxed-velvet vh-style0">
      <div class="head_logo"></div>
      <ul class="dropdown inner clearfix">
        <li>
          <a href="live4.php">
            <span>导播</span>
          </a>
        </li>
        <li>
          <a href="vod.php">
            <span style="color:#3ebcef;">点播</span>
          </a>
        </li>
        <li>
          <a href="sys_audio.php">
            <span>配置</span>
          </a>
        </li>
<?php
/*
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = 'select TRACK from T_MISC_PARAM where MISC_ID=1;';
$track = $db->querySingle($sql);
*/
$track=1;
if($track>0)
{
  echo "<li>".PHP_EOL;
  echo '  <a href="track_base.php">'.PHP_EOL;
  echo "    <span>跟踪</span>".PHP_EOL;
  echo "  </a>".PHP_EOL;
  echo "</li>".PHP_EOL;
}
/*
$db->close();
*/
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

	

<!--*************************************** START contentleft div ***************************************
*********************************************************************************************************************-->
	
	<div id="container">
		<div id="content" class="contentleft">
			<div id="dvVideo">
				<div id="playbackwin" class="playbackplugin" style="display: block">
				</div>
			<!--
				<div class="toolbar">
					<div class="toolleft">
						<div onClick="StartPlayBack()" class="buttonmouseout" jquery17105825209487418324="3">
							<span id="play" title="播放" class="play"></span>
						</div>
						<div onClick="StopPlayBack()" class="buttonmouseout" jquery17105825209487418324="4">
							<span id="stop" title="" class="stop"></span>
						</div>
						<div onClick="PlayBackSlowly()" class="buttonmouseout" jquery17105825209487418324="5">
							<span id="SlowlyForward" title="" class="slowlyforwarddisable"></span>
						</div>
						<div onClick="PlayBackFast()" class="buttonmouseout" jquery17105825209487418324="6">
							<span id="FastForward" title="" class="fastforwarddisable"></span>
						</div>
						<div onClick="PlayBackFrame()" class="buttonmouseout" jquery17105825209487418324="7">
							<span id="SingleFrame" title="" class="singleframedisable"></span>
						</div>
						<div class="volumemouseout" jquery17105825209487418324="13">
							<div onClick="OpenSound()" id="opensound" title="" class="sounddisable">
							</div>
							<div id="volumeDiv" title="0" class="left">
								<div id="volumeDiv_wrapper" style="position: relative">
									<div id="volumeDiv_slider" class="imageslider1" style="position: absolute">
									</div>
									<div id="volumeDiv_bar" title="0" class="imageBar2" style="position: absolute; left: 0px">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="toolright">
						<div onClick="setEZoom()" id="dvEZoom" class="buttonmouseout displaynone" style="display: none"
							jquery17105825209487418324="8">
							<span id="dvEZoomBtn" title="" class="disEZoom" name="dvEZoomBtn"></span>
						</div>
						<div onClick="CapturePicture()" class="buttonmouseout" jquery17105825209487418324="9">
							<span id="capture" title="" class="capturedisable"></span>
						</div>
						<div class="buttonmouseout" style="display: none" jquery17105825209487418324="10">
							<span id="record" title="" class="recorddisable"></span>
						</div>
						<div onClick="PlayBackSaveFile()" class="buttonmouseout" jquery17105825209487418324="11">
							<span id="download" title="下载录像" class="download"></span>
						</div>
						<div onClick="downloadGo('picture')" class="buttonmouseout" style="display: none" jquery17105825209487418324="12">
							<span id="picturedownload" title="下载图片" class="picturedownload"></span>
						</div>
					</div>
				</div>

				<div id="playbackbar" class="timebar">     
				<script type="text/javascript">
				if(navigator.appName == "Microsoft Internet Explorer")
				{
				  document.write("<object classid='clsid:E7EF736D-B4E6-4A5A-BA94-732D71107808' width='864px' height='70px' codebase='' standby='Waiting...' id='timebar' name='timebar' align='center' ><param name='activextype' value='3'></object>");
				}
				else
				{
				  document.write("<canvas id='timebar' width='864px' height='70px'></canvas>")
				}
				</script>
				</div>
				-->
				<div>
					<div class="buttonmouseout" jquery17105825209487418324="3">
						<span id="play" title="播放" class="play" onClick="StartPlayBack(this)"></span>
					</div>
					<div class="buttonmouseout" jquery17105825209487418324="4">
						<span id="stop" title="停止" class="stop"  onClick="StopPlayBack(this)"></span>
					</div>
					
					<div style="float:right">
						<div onClick="changeSoundStatus(this)" id="opensound" title="" class="opensound">
						</div>
						<div class="voiceBar" style="height: 15px; width: 150px; float:right; margin-top:5px">
							<progress value="50" max="100" style="height: 5px; width: 150px; float:right; margin-top:5px" id="p2">
							</progress>
						</div>
					</div>
				</div>
				<div class="ts" style="height: 10px; width: 864px;margin-top:15px">
					<progress value="59" max="1000" style="height: 5px; width: 864px; background-color:#FFFFFF" id="p1">
					</progress>
					<div style="height: 20px;margin-top:5px">
					<span>
					<input type="text" id="timestamp1" value="00:00:00" style="height: 20px;width: 100px; float:left" readonly="true"/> 
					<input type="text" id="timestamp2" value="23:59:59" style="height: 20px;width: 100px; float:right" readonly="true"/>
					</span>
					</div>
				</div>
				
			</div>
		</div>

		
		<div class="contentright">
			<div id="div1" class="widthpercent100">
				<iframe id="calendar" style="height: 300px; width: 218px; background-color:#FFFFFF" border="0" 
				src="params/Calendar.htm"
					frameborder="0" scrolling="no"></iframe>
			</div>
			
			<div style="display: block; height: 280px; width:280px; margin-top:20px" class="file-list" id="filelist">
				<div><span><label name="title">文件列表</label></span><span>  </span><input type="button" value="全部选中" onClick="AllCheckedFun()"/><span>  </span><input type="button" value="取消全选" onClick="AllCanceledFun()"/><span>  </span><input type="button" value="删除" onClick="DeleteFileFun()"/>
				</div>
				<div id="listarea" style="margin-top:5px; background-color:#fff; height:255px; width:270px; overflow:auto">
				<iframe id="FileList" style="height: 2500px; width: 270px; background-color:#FFFFFF" border="0" 
				src="fileList.php" frameborder="0" scrolling="no"></iframe>
				</div>
            </div>
		</div>
		<div id="clear">
    </div>


</div>
	
<!--*************************************** close contentRight div ***************************************
****************************************************************************************************************-->	
  <!--/ container -->
  </div>
</div>
<script>
var test=100;
var date="";
var TimeBar=document.getElementById("timebar");
var nIntervId;
var fileLen;
var playFlag=0;

function setCookie(c_name, value, expiredays){
　　　　var exdate=new Date();
　　　　exdate.setDate(exdate.getDate() + expiredays);
　　　　document.cookie=c_name+ "=" + escape(value) + ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
　　}

function getCookie(c_name){
　　　　if (document.cookie.length>0){　　//先查询cookie是否为空，为空就return ""
　　　　　　c_start=document.cookie.indexOf(c_name + "=")　　//通过String对象的indexOf()来检查这个cookie是否存在，不存在就为 -1　　
　　　　　　if (c_start!=-1){ 
　　　　　　　　c_start=c_start + c_name.length+1　　//最后这个+1其实就是表示"="号啦，这样就获取到了cookie值的开始位置
　　　　　　　　c_end=document.cookie.indexOf(";",c_start)　　//其实我刚看见indexOf()第二个参数的时候猛然有点晕，后来想起来表示指定的开始索引的位置...这句是为了得到值的结束位置。因为需要考虑是否是最后一项，所以通过";"号是否存在来判断
　　　　　　　　if (c_end==-1) c_end=document.cookie.length　　
　　　　　　　　return unescape(document.cookie.substring(c_start,c_end))　　//通过substring()得到了值。想了解unescape()得先知道escape()是做什么的，都是很重要的基础，想了解的可以搜索下，在文章结尾处也会进行讲解cookie编码细节
　　　　　　} 
　　　　}
　　　　return ""
　　}

function clearCookie(name) {  
    setCookie(name, "", -1);  
}  

function load()
{
	//alert("load");
	nIntervId = setInterval(SyscParams, 500);
	
	
	set_progress_max(0);
	set_progress_val(0);
	playFlag=0;//stop play
	progressBarId=setInterval(set_progress,1000);
}

function resetProgress(val)
{
	set_progress_max(val);
	set_progress_val(0);
	playFlag=1;//start play
	document.getElementById("play").className="pause";
}
/*该函数用于同步两个iframe的日期变量，这里设置了一个定时器，每200ms执行一次同步，这种方式主要是为了兼容谷歌浏览器，否则可以直接在iframe中访问父窗口*/
function SyscParams()
{
	if(document.getElementById("calendar").contentWindow.DateChangeFlag==1)
	{
		document.getElementById("calendar").contentWindow.DateChangeFlag=0;
		//sysc_param
		document.getElementById("FileList").contentWindow.date=document.getElementById("calendar").contentWindow.CurrentDate;
		document.getElementById("FileList").contentWindow.reload_list();
	}
	/*这个主要是从actlive.php中获取文件长度并更新到进度条*/
	if(fileLen=getCookie("FileLen"))
	{
		//alert(fileLen);
		clearCookie("FileLen");
		resetProgress(fileLen);
	}
}

/*播放器嵌入设置*/
function playbackWindow(streamurl,streamname)
{
  jwplayer("playbackwin").setup({
    flashplayer: "player/player.swf",
    'rtmp.tunneling':false,
    controlbar: 'none',
    stretching:"EXACTFIT",
    screencolor:'0X000000',

    streamer:streamurl,
    file:streamname,
 
    width:864,
    height:486
  });
  jwplayer("playbackwin").onReady(function (){
    this.play();
  });
}


playbackWindow("rtmp://live.hkstv.hk.lxdns.com/live/","hks");

function AllCheckedFun()
{
	//window.frames['FileList'].FileListAllCheckBoxOn();
	document.getElementById("FileList").contentWindow.FileListAllCheckBoxOn();
}

function AllCanceledFun()
{
	//window.frames['FileList'].FileListAllCheckBoxOff();
	document.getElementById("FileList").contentWindow.FileListAllCheckBoxOff();
}

function DeleteFileFun()
{
	//window.frames['FileList'].FileListDelete();
	document.getElementById("FileList").contentWindow.FileListDelete();
}

function set_progress()
{
	if(playFlag==1)
	{
		var max=document.getElementById("p1").max;
		var current=$("#p1").val();
		if(current+1==max)
		{
			document.getElementById("play").className="play";
			playFlag=0;
		}
			
		$("#p1").val(current+1);
		//alert(getTimeStamp(current+1));
		document.getElementById("timestamp1").value=getTimeStamp(current+1);
	}
}

function set_progress_max(max)
{
	document.getElementById("p1").max=max;
	document.getElementById("timestamp2").value=getTimeStamp(max);
}

function set_progress_val(val)
{
	document.getElementById("p1").value=val;
	document.getElementById("timestamp1").value=getTimeStamp(val);
}
//timestamp click
var w_width = $('.ts').width();//拿到容器宽度，即为进度条总长度
$(".ts").click(function(){
	var event = window.event || arguments.callee.caller.arguments[0];
	var x=event.offsetX;
	var y=event.offsetY;
	//alert(x+'_'+y+'_'+w_width);
	var val=((x/w_width).toFixed(2))*(document.getElementById("p1").max);
	document.getElementById("p1").value=val;
	//alert((x/w_width).toFixed(2));
	ajaxGetData("actlive.php",102,val,HandleNoResult);
});

//voice click
var div_width = $('.voiceBar').width();//拿到容器宽度，即为进度条总长度
$(".voiceBar").click(function(){
	var event = window.event || arguments.callee.caller.arguments[0];
	var x=event.offsetX;
	var y=event.offsetY;
	//alert(x+'_'+y+'_'+w_width);
	var val=((x/div_width).toFixed(2))*(document.getElementById("p2").max);
	document.getElementById("p2").value=val;
	//alert((x/w_width).toFixed(2));
	ajaxGetData("actlive.php",103,val,HandleNoResult);
});

function getTimeStamp(seconds)
{
	var ts="";
	var second=parseInt(seconds%60);
	var minute=parseInt(seconds/60%60);
	var hour=parseInt(seconds/3600);
	if(hour<10)
		ts+='0'+hour+':';
	else
		ts+=hour+':';
		
	if(minute<10)
		ts+='0'+minute+':';
	else
		ts+=minute+':';
		
	if(second<10)
		ts+='0'+second;
	else
		ts+=second;
		
	return ts;
}

function StartPlayBack(obj)
{
	//alert(obj.className);
	if(obj.className=="play")
	{
		ajaxGetData("actlive.php",104,obj.className,HandleNoResult);
		obj.className="pause";
		playFlag=1;
	}
	else
	{
		ajaxGetData("actlive.php",104,obj.className,HandleNoResult);
		obj.className="play";
		playFlag=0;
	}
}

function StopPlayBack(obj)
{
	ajaxGetData("actlive.php",104,obj.className,HandleNoResult);
	document.getElementById("play").className="play";
	set_progress_max(0);
	set_progress_val(0);
	playFlag=0;
}

function changeSoundStatus(obj)
{
	if(obj.className=="opensound")
	{
		obj.className="closesound";
		ajaxGetData("actlive.php",104,obj.className,HandleNoResult);
	}
	else
	{
		obj.className="opensound";
		ajaxGetData("actlive.php",104,obj.className,HandleNoResult);
	}
}
</script>
</body>
</html>
