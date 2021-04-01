<?php
date_default_timezone_set("UTC");
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="widget-container boxed sys-righth">
    <div class="form-center">
      <div class="form-row"></div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="devid" disabled="disabled" value="<?php echo date('Y-m-d H:i:s', time()); ?>"></div>
        <div class="form-label">当前时间：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="year"></div>
        <div class="form-label">年：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="mon"></div>
        <div class="form-label">月：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="day"></div>
        <div class="form-label">日：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="hour"></div>
        <div class="form-label">时：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="min"></div>
        <div class="form-label">分：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="sec"></div>
        <div class="form-label">秒：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <button class="btn2" type="button" style="width:100px;" onclick="timeBtnClick()">更新时间</button>
        </div>
      </div>
    </div>
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
function timeBtnClick()
  {
    if(!isNum(document.getElementById("year").value))
    {
      alert("年输入有误，请检查！");
      document.getElementById("year").focus();
      return; 
    }
    if(!isNum(document.getElementById("mon").value))
    {
      alert("月输入有误，请检查！");
      document.getElementById("mon").focus();
      return; 
    }
    if(!isNum(document.getElementById("day").value))
    {
      alert("日输入有误，请检查！");
      document.getElementById("day").focus();
      return; 
    }
    if(!isNum(document.getElementById("hour").value))
    {
      alert("时输入有误，请检查！");
      document.getElementById("hour").focus();
      return; 
    }
    if(!isNum(document.getElementById("min").value))
    {
      alert("分输入有误，请检查！");
      document.getElementById("min").focus();
      return; 
    }
    if(!isNum(document.getElementById("sec").value))
    {
      alert("秒输入有误，请检查！");
      document.getElementById("sec").focus();
      return; 
    }
    var params="";
    params+=document.getElementById("year").value+",";
    params+=document.getElementById("mon").value+",";
    params+=document.getElementById("day").value+",";
    params+=document.getElementById("hour").value+",";
    params+=document.getElementById("min").value+",";
    params+=document.getElementById("sec").value;
    ajaxGetData("actsys.php",57,params,HandleAjaxResult);
  }
  document.getElementById("nav16").style.color="#eee";
</script>
</body>
</html>