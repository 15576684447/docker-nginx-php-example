<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>

<div class="sys-right">
  <div class="widget-container boxed sys-righth">
    <div class="form-center">
      <div class="form-row">
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit1"></div>
        <div class="form-label">VGA/HDMI输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit2"></div>
        <div class="form-label">SDI1输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit3"></div>
        <div class="form-label">SDI2输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit4"></div>
        <div class="form-label">SDI3输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit5"></div>
        <div class="form-label">SDI4输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit6"></div>
        <div class="form-label">SDI5输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit7"></div>
        <div class="form-label">SDI6输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="tit8"></div>
        <div class="form-label">RTSP输入名称：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <button class="btn2" type="button" style="width:100px;" onclick="titleBtnClick()">更新配置</button>
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

<?php
//require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
//$db = new SQLite3(constant("CSDB"));
$db = new MyDB();
$sql = 'select * from T_TITLE_PARAM where TIT_ID<9;';
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['TIT_ID'])) {
    echo 'document.getElementById("tit' . $res['TIT_ID'] . '").value="' . $res['TITLE'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
function titleBtnClick()
{
  var params="";
  params+=document.getElementById("tit1").value+",";
  params+=document.getElementById("tit2").value+",";
  params+=document.getElementById("tit3").value+",";
  params+=document.getElementById("tit4").value+",";
  params+=document.getElementById("tit5").value+",";
  params+=document.getElementById("tit6").value+",";
  params+=document.getElementById("tit7").value+",";
  params+=document.getElementById("tit8").value;
  ajaxGetData("actsys.php",58,params,HandleAjaxResult);
}
document.getElementById("nav17").style.color="#eee";
</script>
</body>
</html>