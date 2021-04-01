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
<script src="js/jquery.customInput.js"></script>
<script src="js/ajaxfunc.js"></script>
<script src="js/common.js"></script>
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
          <a href="live.php">
            <span>导播</span>
          </a>
        </li>
        <li>
          <a href="vod.php">
            <span>点播</span>
          </a>
        </li>
        <li>
          <a href="sys_audio.php">
            <span>配置</span>
          </a>
        </li>
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
        <li>
          <a href="#">
            <span>admin▼</span>
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
      <div class="widget-container vh-style1">
        <div class="vh-row">
          <button class="btn2" type="button" style="width:80px;margin-left:10px;" onclick="addBtnClick()">添加</button>
          <button class="btn2" type="button" style="width:80px;margin-left:10px;" onclick="editBtnClick()">编辑</button>
          <button class="btn2" type="button" style="width:80px;margin-left:10px;" onclick="delBtnClick()">删除</button>
        </div>
      </div>
      <table cellpadding="0" cellspacing="0" border="0" class="hover row-border" id="rule_dt">
        <thead>
          <tr>
            <th>选择</th>
            <th>ID</th>
            <th>命令串</th>
            <th>类型</th>
            <th>控制码</th>
            <th>窗口1源</th>
            <th>窗口2源</th>
            <th>窗口3源</th>
            <th>窗口4源</th>
            <th>回应</th>
            <th>回应串</th>
          </tr>
        </thead>
        <tbody id="ruletable">
        </tbody>
      </table>
    </div>
    <div class="clear"></div>
    <div class="widget-container boxed vh-style0">
      <div class="inner vh-center">
        <span>
          Powered By
          <?php echo constant("CORP"); ?></span>
      </div>
    </div>
  </div>
  <!--/ container -->
</div>
<div id="ruledlg" title="控制消息">
  <div class="add-comment add-comment-velvet styled vh-style0" >
    <div class="comment-form">
      <div class="form-inner">
        <div class="field_text">
          <label>命令串:</label>
          <input type="text" style="display:none" id="row_id" />
          <input type="text" id="cmd_txt" />
        </div>
        <div class="field_text">
          <label>控制类型:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="type_id" onchange="type_idChange()">
              <option style="background-color: #444c55;font-size: 20px;" value="1">分屏切换</option>
              <option style="background-color: #444c55;font-size: 20px;" value="2">录制控制</option>
              <option style="background-color: #444c55;font-size: 20px;" value="3">直播控制</option>
              <option style="background-color: #444c55;font-size: 20px;" value="4">导播控制</option>
              <option style="background-color: #444c55;font-size: 20px;" value="5">关机控制</option>
              <option style="background-color: #444c55;font-size: 20px;" value="6">VGA锁定</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label>控制码:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="code_id">
              <option style="background-color: #444c55;font-size: 20px;" value='1'>单分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='2'>双分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='3'>画外画模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='4'>画中画模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='5'>1+2分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='6'>四分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='21'>录制开始</option>
              <option style="background-color: #444c55;font-size: 20px;" value='22'>录制停止</option>
              <option style="background-color: #444c55;font-size: 20px;" value='23'>录制暂停</option>
              <option style="background-color: #444c55;font-size: 20px;" value='24'>录制恢复</option>
              <option style="background-color: #444c55;font-size: 20px;" value='30'>直播关闭</option>
              <option style="background-color: #444c55;font-size: 20px;" value='31'>直播开启</option>
              <option style="background-color: #444c55;font-size: 20px;" value='40'>导播关闭</option>
              <option style="background-color: #444c55;font-size: 20px;" value='41'>导播开启</option>
              <option style="background-color: #444c55;font-size: 20px;" value='50'>关闭系统</option>
              <option style="background-color: #444c55;font-size: 20px;" value='60'>解锁VGA</option>
              <option style="background-color: #444c55;font-size: 20px;" value='61'>锁定VGA</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label>窗口1源:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="win0_ch">
              <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>RTSP</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label  >窗口2源:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="win1_ch">
              <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>RTSP</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label  >窗口3源:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="win2_ch">
              <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>RTSP</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label  >窗口4源:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="win3_ch">
              <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>RTSP</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='255'>无输入源</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label  >需要回应:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="re">
              <option style="background-color: #444c55;font-size: 20px;" value="0">否</option>
              <option style="background-color: #444c55;font-size: 20px;" value="1">是</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label>回应串:</label>
          <input type="text" id="remsg" />
        </div>
        <div class="clear"></div>
      </div>
      <div class="rowSubmit">
        <button class="btn2" type="button" style="float:right;width:100px;" onclick="dlg_ctrlBtnClick()">提交</button>
      </div>
    </div>
  </div>
</div>
<script>
function HandleLoadRules(Rules)
{
  var RuleHtml="";
  for(var i=0; i<Rules.length; i++)
  {
    RuleHtml+="<tr><td><input type='checkbox' name='ruleck' value='"+Rules[i].ROW_ID+"'/></td>";
    RuleHtml+="<td>"+Rules[i].ROW_ID+"</td>";
    RuleHtml+="<td>"+Rules[i].CMD+"</td>";
    RuleHtml+="<td>"+Rules[i].CTRL_TYPE+"</td>";
    RuleHtml+="<td>"+Rules[i].CODE_DESC+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN0_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN1_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN2_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN3_NAME+"</td>";
    if(Rules[i].RE>0)
      RuleHtml+="<td>是</td>";
    else
      RuleHtml+="<td>否</td>";
    RuleHtml+="<td>"+Rules[i].REMSG+"</td></tr>";
  }
  document.getElementById("ruletable").innerHTML = RuleHtml;

  $('#rule_dt').dataTable( {
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
function LoadRules()
{
  ajaxGetData("actsys.php",70,"0",HandleLoadRules);
}
function HandleDlgBtnAction(res)
{
  if(res.SUC>0)
  {
    location.reload();
  }
  else
  {
    alert(res.MSG);
  }
}
function dlg_ctrlBtnClick()
{
  if(document.getElementById("cmd_txt").value=="")
  {
    alert("命令串不能为空!");
    document.getElementById("cmd_txt").focus();
    return;
  }
  if((document.getElementById("re").value>0)&&
    (document.getElementById("remsg").value==""))
  {
    alert("回应串不能为空!");
    document.getElementById("remsg").focus();
    return;
  }
  var params="";
  params+=document.getElementById("row_id").value+",";
  params+=document.getElementById("cmd_txt").value+",";
  params+=document.getElementById("type_id").value+",";
  params+=document.getElementById("code_id").value+",";
  params+=document.getElementById("win0_ch").value+",";
  params+=document.getElementById("win1_ch").value+",";
  params+=document.getElementById("win2_ch").value+",";
  params+=document.getElementById("win3_ch").value+",";
  params+=document.getElementById("re").value+",";
  params+=document.getElementById("remsg").value;
  ajaxGetData("actsys.php",73,params,HandleDlgBtnAction);
}
function type_idChange()
{
  $("#code_id").empty();
  switch($("#type_id").val())
  {
    case '1':
    $("<option style='background-color: #444c55;font-size: 20px;' value='1'>单分屏模式</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='2'>双分屏模式</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='3'>画外画分屏模式</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='4'>画中画分屏模式</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='5'>1+2分屏模式</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='6'>四分屏模式</option>").appendTo("#code_id");
    break;
    case '2':
    $("<option style='background-color: #444c55;font-size: 20px;' value='21'>录制开始</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='22'>录制停止</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='23'>录制暂停</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='24'>录制恢复</option>").appendTo("#code_id");
    break;
    case '3':
    $("<option style='background-color: #444c55;font-size: 20px;' value='30'>直播关闭</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;f}}ont-size: 20px;' value='31'>直播开启</option>").appendTo("#code_id");
    break;
    case '4':
    $("<option style='background-color: #444c55;font-size: 20px;' value='40'>导播关闭</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;f}}ont-size: 20px;' value='41'>导播开启</option>").appendTo("#code_id");
    break;
    case '5':
    $("<option style='background-color: #444c55;font-size: 20px;' value='50'>关闭系统</option>").appendTo("#code_id");
    break;
    case '6':
    $("<option style='background-color: #444c55;font-size: 20px;' value='60'>解锁VGA</option>").appendTo("#code_id");
    $("<option style='background-color: #444c55;font-size: 20px;' value='61'>锁定VGA</option>").appendTo("#code_id");
    break;
  }
}
function addBtnClick()
{
  document.getElementById("row_id").value="0";
  document.getElementById("cmd_txt").value="";
  $("#type_id").val(1);
  $("#code_id").empty();
  $("<option style='background-color: #444c55;font-size: 20px;' value='1'>单分屏模式</option>").appendTo("#code_id");
  $("<option style='background-color: #444c55;font-size: 20px;' value='2'>双分屏模式</option>").appendTo("#code_id");
  $("<option style='background-color: #444c55;font-size: 20px;' value='3'>画外画模式</option>").appendTo("#code_id");
  $("<option style='background-color: #444c55;font-size: 20px;' value='4'>画中画模式</option>").appendTo("#code_id");
  $("<option style='background-color: #444c55;font-size: 20px;' value='5'>1+2分屏模式</option>").appendTo("#code_id");
  $("<option style='background-color: #444c55;font-size: 20px;' value='6'>四分屏模式</option>").appendTo("#code_id");
  $("#win0_ch").val(255);
  $("#win1_ch").val(255);
  $("#win2_ch").val(255);
  $("#win3_ch").val(255);
  $("#re").val(0);
  document.getElementById("remsg").value="";
  $( "#ruledlg" ).dialog( "open" );
}
function HandleEditRule(rule)
{
  document.getElementById("row_id").value=rule.ROW_ID;
  document.getElementById("cmd_txt").value=rule.CMD;
  $("#type_id").val(rule.TYPE_ID);
  type_idChange();
  $("#code_id").val(rule.CODE_ID);
  $("#win0_ch").val(rule.WIN0_CH);
  $("#win1_ch").val(rule.WIN1_CH);
  $("#win2_ch").val(rule.WIN2_CH);
  $("#win3_ch").val(rule.WIN3_CH);
  $("#re").val(rule.RE);
  document.getElementById("remsg").value=rule.REMSG;
  $( "#ruledlg" ).dialog( "open" );
}
function editBtnClick()
{
  var ckid=ckGetOneCheckedID("ruleck");
  if(ckid.length>0)
  {
    ajaxGetData("actsys.php",71,ckid+"",HandleEditRule);
  }
}
function HandleDelRuleResult()
{
  location.reload();
}
function delBtnClick()
{
  var ckids=ckGetAllCheckedID("ruleck");
  if(ckids.length>0 && confirm("确认删除所选记录？"))
  {
    ajaxGetData("actsys.php",72,ckids,HandleDelRuleResult);
  }
}

jQuery(document).ready(function() {
  $( "#ruledlg" ).dialog({
    closed:true,
    autoOpen: false,
    resizable: false,
    modal: true,
    closeOnEscape:false,
    width:800
  });
});
LoadRules();
</script>
</body>
</html>