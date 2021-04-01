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
<script src="js/libs/jquery-1.11.3.min.js"></script>
<script src="js/jquery.datatables.min.js"></script>
<script src="js/libs/jquery-ui.1.11.4.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>

<!-- Style CSS -->
<link href="css/bootstrap.css" media="screen" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet">
<link href="css/jquery.dataTables.css" media="screen" rel="stylesheet">

<!-- scripts -->
<script src="js/general.js"></script>

<!-- Include all needed stylesheets and scripts here -->
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

<body oncontextmenu=self.event.returnValue=false>
<div class="body_wrap">
  <div class="mycontainer">

    <div class="dropdown-wrap boxed-velvet vh-style0">
      <div class="head_logo"></div>
      <ul class="dropdown inner clearfix">
        <li>
          <a href="voduser.php">
            <span style="color:#3ebcef;">点播</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span>user▼</span>
          </a>
          <ul>
            <li>
              <a href="login.php" onclick="logOut()">注销系统</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="v-content boxed vod-con">
      <div class="voduser-back">
        <div class="voduser-win" id="playwin"></div>
      </div>
      <div class="widget-container vh-style1">
        <button class="btn2" type="button" style="width:100px;margin:10px 10px 10px 420px;" onclick="vodpreBtnClick(8)">实时高流预览</button>
        <button class="btn2" type="button" style="width:100px;margin:10px 10px;" onclick="vodpreBtnClick(9)">实时中流预览</button>
        <button class="btn2" type="button" style="width:100px;margin:10px 10px;" onclick="vodpreBtnClick(10)">实时低流预览</button>
      </div>
      <table cellpadding="0" cellspacing="0" border="0" class="hover row-border" id="files_dt">
        <thead>
          <tr>
            <th>ID</th>
            <th>文件名称</th>
            <th>时长</th>
            <th>文件大小</th>
            <th>时间</th>
            <th>已上传</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody id="Filetable">
        </tbody>
      </table>
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
function logOut()
{
  if(confirm("确定要退出系统吗？")==true)
  {
    window.location.href="login.php";
  }
}
function HandleLoadFiles(Files)
  {
    //$('#files_dt').dataTable().fnClearTable();
    var Filehtml="";
    for(var i=0; i<Files.length; i++)
    {
      var ctime=new Date(Files[i].CTIME*1000);
      Filehtml+="<tr><td>"+Files[i].ROW_ID+"</td>";
      Filehtml+="<td>"+Files[i].NAME+"</td>";
      Filehtml+="<td>"+Files[i].DUR+"</td>";
      Filehtml+="<td>"+parseInt(Files[i].SIZE/1024)+"KB</td>";
      Filehtml+="<td>"+ctime.getUTCFullYear()+"-"+
              (ctime.getUTCMonth()+1)+"-"+
              ctime.getUTCDate()+" "+
              ctime.getUTCHours()+":"+
              ctime.getUTCMinutes()+":"+
              ctime.getUTCSeconds()+"</td>";
      Filehtml+="<td>"+Files[i].UP+"</td>";
      Filehtml+="<td><img style='cursor:pointer;' onclick=playImgBtnClick('"+Files[i].NAME+"') src='images/vh/play_icon.png' title='播放' >";
      Filehtml+="<a href='/video/"+Files[i].NAME+"'><img src='images/vh/down_icon.png' title='下载' ></a>";
      Filehtml+="</td></tr>";
    }
    document.getElementById("Filetable").innerHTML = Filehtml;

    $('#files_dt').dataTable( {
    "bAutoWidth": false,
    "bProcessing": true,
    "bJQueryUI": true,
    "bDestroy": true,
    "aLengthMenu":[[20, 50, 100, -1], [20, 50, 100, "All"]],
    "aaSorting":[[0,'desc']],
    "iDisplayLength": 20,
    "bSortClasses":false,
    "sPaginationType": "full_numbers",
    "oLanguage": {
      "sProcessing": "正在加载中......",
      "sLengthMenu": "每页显示条数: _MENU_ ",
      "sZeroRecords": "对不起，查询不到相关数据！",
      "sEmptyTable": "表中无数据存在！",
      "sInfo": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录",
      "sInfoEmpty": "当前显示 0 条，共 0 条记录",
      "sInfoFiltered": "数据表中共为 _MAX_ 条记录",
      "sSearch": "搜索:",
      "oPaginate": {
        "sFirst" : "第一页",
        "sPrevious" : "上一页",
        "sNext" : "下一页",
        "sLast" : "最后一页"
      }
    }
    }); 
  }
  function LoadFiles(rowid)
  {
    ajaxGetData("actvod.php",1,"0",HandleLoadFiles);
  }
  function playvod(streamurl,streamname)
  {
    jwplayer("playwin").setup({
      flashplayer: "player/player.swf",
      'rtmp.tunneling':false,
      controlbar: 'bottom',
      bufferlength:0.001,
      stretching:"EXACTFIT",
      screencolor:'0X000000',
      streamer:streamurl,
      file:streamname,
      width:960,
      height:540
    });
    jwplayer("playwin").onReady(function (){
      this.play();
    });
  }
  function playImgBtnClick(fname)
  {
    var url="rtmp://"+location.hostname+":19350/live/";

    var ext=fname.substring(fname.length-3,fname.length);
    ext=ext.toLowerCase();
    var sname="";
    if(ext=="mp4")
      sname="mp4:"+fname;
    else
      sname="flv:"+fname;
    $( "#voddlg" ).dialog( "open" );
    playvod(url,sname);
  }
  function vodpreBtnClick(sid)
  {
    var url="rtmp://"+location.hostname+"/live/";
    var sname="stream"+sid;
    $( "#voddlg" ).dialog( "open" );
    playvod(url,sname);
  }
jQuery(document).ready(function() {
  $( "#voddlg" ).dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    closeOnEscape:false,
    width:965,
    height:576,
    close:function(){
     jwplayer("playwin").stop();
    }
  });
  vodpreBtnClick(10);
});
LoadFiles(); 
</script>
</body>
</html>