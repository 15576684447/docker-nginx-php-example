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
        <li><a href="track_base.php"><span>跟踪配置</span></a></li>
        <li><a href="track_t.php"><span>老师调试</span></a></li>
        <li><a href="track_s.php"><span>学生调试</span></a></li>
        <li><a href="track_rule.php"><span style="color:#3ebcef;">跟踪策略</span></a></li>
        <li><a href="live.php"><span>返回主页</span></a></li>
      </ul>
    </div>
    <div class="v-content boxed vod-con">
      <div class="widget-container vh-style1">
        <div class="vh-row">
          <button class="btn2" type="button" style="width:100px;" onclick="editBtnClick()">编辑</button>
        </div>
      </div>
      <table cellpadding="0" cellspacing="0" border="0" class="hover row-border" id="rule_dt">
        <thead>
          <tr>
            <th>选择</th>
            <th>ID</th>
            <th>当前场景</th>
            <th>事件</th>
            <th>优先级</th>
            <th>切换</th>
            <th>分屏</th>
            <th>窗口1源</th>
            <th>窗口2源</th>
            <th>窗口3源</th>
            <th>窗口4源</th>
            <th>维持时间</th>
            <th>目的场景</th>
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
<div id="ruledlg" title="跟踪策略">
  <div class="add-comment add-comment-velvet styled vh-style0" >
    <div class="comment-form">
      <div class="form-inner">
        <div class="field_text">
          <label>当前场景:</label>
          <input type="text" style="display:none" id="str_id" />
          <input type="text" disabled="disabled" id="st_id" />
        </div>
        <div class="field_text">
          <label>事件:</label>
          <input type="text" disabled="disabled" id="evt_id" />
        </div>
        <div class="field_text">
          <label>优先级:</label>
          <input type="text" id="prio" />
        </div>
        <div class="field_text">
          <label>切换:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="action" >
              <option style="background-color: #444c55;font-size: 20px;" value="0">否</option>
              <option style="background-color: #444c55;font-size: 20px;" value="1">是</option>
            </select>
          </div>
        </div>
        <div class="field_text">
          <label>分屏:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="ct_id">
              <option style="background-color: #444c55;font-size: 20px;" value='0'>单分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='1'>双分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='2'>画外画模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='3'>画中画模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='4'>1+2分屏模式</option>
              <option style="background-color: #444c55;font-size: 20px;" value='5'>四分屏模式</option>
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
          <label>维持时间:</label>
          <input type="text" id="keep" />
        </div>
        <div class="field_text">
          <label>目的场景:</label>
          <div class="field_select font-select">
            <select class="select_styled" id="nst_id" >
              <option style="background-color: #444c55;font-size: 20px;" value="0">老师电脑</option>
              <option style="background-color: #444c55;font-size: 20px;" value="1">老师近景</option>
              <option style="background-color: #444c55;font-size: 20px;" value="2">老师全景</option>
              <option style="background-color: #444c55;font-size: 20px;" value="3">学生近景</option>
              <option style="background-color: #444c55;font-size: 20px;" value="4">学生全景</option>
              <option style="background-color: #444c55;font-size: 20px;" value="5">板书场景</option>
            </select>
          </div>
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
    RuleHtml+="<tr><td><input type='checkbox' name='ruleck' value='"+Rules[i].STR_ID+"'/></td>";
    RuleHtml+="<td>"+Rules[i].STR_ID+"</td>";
    RuleHtml+="<td>"+Rules[i].STDESC+"</td>";
    RuleHtml+="<td>"+Rules[i].EVTDESC+"</td>";
    RuleHtml+="<td>"+Rules[i].PRIO+"</td>";
    if(Rules[i].ACTION>0)
      RuleHtml+="<td>是</td>";
    else
      RuleHtml+="<td>否</td>";
    RuleHtml+="<td>"+Rules[i].COM_TYPE+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN0_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN1_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN2_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].WIN3_NAME+"</td>";
    RuleHtml+="<td>"+Rules[i].KEEP+"秒</td>";
    RuleHtml+="<td>"+Rules[i].NSTDESC+"</td></tr>";
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
  ajaxGetData("acttrack.php",10,"0",HandleLoadRules);
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
  if(document.getElementById("prio").value=="")
  {
    alert("优先级不能为空!");
    document.getElementById("prio").focus();
    return;
  }
  if(document.getElementById("keep").value=="")
  {
    alert("维持时间不能为空!");
    document.getElementById("keep").focus();
    return;
  }
  var params="";
  params+=document.getElementById("str_id").value+",";
  params+=document.getElementById("prio").value+",";
  params+=document.getElementById("action").value+",";
  params+=document.getElementById("ct_id").value+",";
  params+=document.getElementById("win0_ch").value+",";
  params+=document.getElementById("win1_ch").value+",";
  params+=document.getElementById("win2_ch").value+",";
  params+=document.getElementById("win3_ch").value+",";
  params+=document.getElementById("keep").value+",";
  params+=document.getElementById("nst_id").value;
  ajaxGetData("acttrack.php",12,params,HandleDlgBtnAction);
}

function HandleEditRule(rule)
{
  document.getElementById("str_id").value=rule.STR_ID;
  document.getElementById("st_id").value=rule.STDESC;
  document.getElementById("evt_id").value=rule.EVTDESC;
  document.getElementById("prio").value=rule.PRIO;
  $("#action").val(rule.ACTION);
  $("#ct_id").val(rule.CT_ID);
  $("#win0_ch").val(rule.WIN0_CH);
  $("#win1_ch").val(rule.WIN1_CH);
  $("#win2_ch").val(rule.WIN2_CH);
  $("#win3_ch").val(rule.WIN3_CH);
  document.getElementById("keep").value=rule.KEEP;
  $("#nst_id").val(rule.NST_ID);
  $( "#ruledlg" ).dialog( "open" );
}
function editBtnClick()
{
  var ckid=ckGetOneCheckedID("ruleck");
  if(ckid.length>0)
  {
    ajaxGetData("acttrack.php",11,ckid+"",HandleEditRule);
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