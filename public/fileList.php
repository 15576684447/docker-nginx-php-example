<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/FileList.css" media="screen" rel="stylesheet">

<!-- main JS libs -->
<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/jquery-1.11.3.min.js"></script>
<script src="js/libs/jquery-ui.1.11.4.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>
<!-- scripts -->
<script src="js/general.js"></script>
<!-- Include all needed stylesheets and scripts here -->
<script src="js/ajaxfunc.js"></script>
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">.gradient {filter: none !important;}</style>
<![endif]-->
</head>

<body onload="load_list()">

<!--
<div><span><label name="title">视频文件列表</label></span><span>  </span><input type="button" value="全部选中"/><span>  </span><input type="button" value="删除条目"></div>
-->
<!--
<div style="display: block; height: 280px;margin-top:20px" class="file-list" id="ListArea">
</div>
-->

<?php
$fileLen=0;
   class MyDB extends SQLite3
   {
      function __construct()
      {
		 $this->open('./database/mydatabase.db');
		 
      }
   }
   $string = $_COOKIE["save_date"];
   $date = substr($string,-8,4).'_'.substr($string,-4);
	//echo $date;
	$begin=$date."_0000";
	$end=$date."_2359";
	echo $begin."-".$end;
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } 
	$sql = 'select * from record where time>10;';
	$result = $db->query($sql);
	/*print html*/
	echo "<div style='display: block; height: 280px; width: 250px; margin-top: 0px' class='file-list' id='ListArea'>";
	while($row = $result->fetchArray(SQLITE3_ASSOC))
	{

		$str="".$row['id']."-".$row['filename']."\n";
		echo "<div class='FileList' id=".$row['id']."><input type='checkbox' class='filecheck'/><span ondblclick='DBClickFun(this)' onclick='ClickFun(this)' onmouseenter='MouseEnterFun(this)' onmouseleave='MouseLeaveFun(this)'>".$row['filename']."</span></div>";
		//echo $str;
	}
	echo "</div>";
	$db->close();
?>

<script>
var date;
var fileTotalTime=60;
var getFileTotalTimeFlag=false;
var date_cookie="save_date";
var op_id=0;
/********************************************/
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

function setCookie(c_name, value, expiredays){
　　　　var exdate=new Date();
　　　　exdate.setDate(exdate.getDate() + expiredays);
　　　　document.cookie=c_name+ "=" + escape(value) + ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
　　}
/******************************************************/

/******************************************************/
//exe when load html
//we get cookie and initialize date
function load_list()
{
	var ret;
	
	if((ret=getCookie(date_cookie)))
	  {
		  date=ret;
	  }
	  else
	  {
		  
	  }
	  //alert("load_list"+date);
}
//make the html reload
//we get date and save it to cookie,then we reload the windows
function reload_list()
{
	setCookie(date_cookie,date);
	window.location.reload();
}
/********************根据父级ID和下级className找元素*********************/
  function byClass2(parentID,oClass){//局部获取类名，parev1_namentID为你传入的父级ID
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
/**************************************************************************/
function DBClickFun(obj)
{
	//双击显示当前FileList的id，用于检索数据库
	//alert(obj.parentNode.id);
	ajaxGetData("actlive.php",200,obj.parentNode.id,HandleNoResult);

	/*
	var fileLen="<?php 
	//usleep(1000);
	$file_id=5;
	$fileLen=0;
	$db = new MyDB();
	if(!$db){
	  echo $db->lastErrorMsg();
	} 
	$sql = 'select time from record where id='.$file_id.';';
	$fileLen = $db->querySingle($sql);
	$db->close();
	echo "fileID=";
	echo $file_id;
	echo ";fileLen=";
	echo $fileLen;
	
	?>";
	alert(fileLen);*/
}
/****
功能测试：
单机第一个：全部选中
单机第二个：全部取消选中
单机第三个：将选中的ID组成字符串
*****/
function ClickFun(obj)
{
	//alert("ok");
	//alert(obj.innerHTML);
	//alert(obj.parentNode.id);
	/*
	if(obj.parentNode.id==0)
		FileListAllCheckBoxOn();
	else if(obj.parentNode.id==1)
		FileListAllCheckBoxOff();
	else if(obj.parentNode.id==2)
		FileListDelete();
	*/
}

function MouseEnterFun(obj)
{
	//鼠标进入后，使得背景变灰色
	obj.style.backgroundColor='#ccc';
}

function MouseLeaveFun(obj)
{
	//鼠标离开时，使得背景恢复白色
	obj.style.backgroundColor='#fff';
}

function FileListAllCheckBoxOn()
{
	//从父界面获取时间元素
	//var date = parent.date;
	//alert(date);
	
	//使得checkbox全部选中
	var fileListCheckBox = byClass2("ListArea","filecheck");
	//alert(fileListCheckBox.length);
    for(var i=0;i<fileListCheckBox.length;i++)
	{
		fileListCheckBox[i].checked=true;
	}
}

function FileListAllCheckBoxOff()
{
	//使得checkbox全部取消选中
	var fileListCheckBox = byClass2("ListArea","filecheck");
	//alert(fileListCheckBox.length);
    for(var i=0;i<fileListCheckBox.length;i++)
	{
		fileListCheckBox[i].checked=false;
	}
}

function FileListDelete()
{
	//将选中的checkbox对应的id号组成一个字符串，待发送给下位机操作数据库
	var fileListCheckBox = byClass2("ListArea","filecheck");
	var str="";
	for(var i=0;i<fileListCheckBox.length;i++)
	{
		if(fileListCheckBox[i].checked==true)
		{
			/********此处需要执行php语言以操作数据库*********/
			/*****或者和下位机交互，让下位机执行删除操作****/
			str+=fileListCheckBox[i].parentNode.id+'/';
		}
	}
	if(str.length>1)
		ajaxGetData("actlive.php",101,str,HandleNoResult);
	alert(str);
}

function getFileLen()
{
	/*
	fileTotalTime="<?php echo $fileLen?>";
	getFileTotalTimeFlag=true;
	alert(fileTotalTime);
	*/
}
</script>
</body>
</html>