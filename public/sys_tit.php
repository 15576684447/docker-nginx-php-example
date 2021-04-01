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
          <div class="input_styled rowCheckbox checkbox-red">
            <input name="enable" type="checkbox"  id="enable" >
            <label for="enable">使能字幕</label>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <div class="color-input">
            <input type="text" class="colorpicker" id="txt_col" value="66ff00"></div>
        </div>
        <div class="form-label">文字颜色：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <input type="text" id="alpha"></div>
        <div class="form-label">透明度(0为透明)：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <select class="select_styled" id="fam_id">
            <option style="background-color: #444c55;font-size: 20px;" value="8">黑体常规</option>
            <option style="background-color: #444c55;font-size: 20px;" value="3">华文行楷</option>
            <option style="background-color: #444c55;font-size: 20px;" value="5">华文琥珀</option>
            <option style="background-color: #444c55;font-size: 20px;" value="6">华文彩云</option>
          </select>
        </div>
        <div class="form-label">字体：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <select class="select_styled" id="fontsize">
            <option style="background-color: #444c55;font-size: 20px;" value="30">30</option>
            <option style="background-color: #444c55;font-size: 20px;" value="40">40</option>
            <option style="background-color: #444c55;font-size: 20px;" value="50">50</option>
            <option style="background-color: #444c55;font-size: 20px;" value="60">60</option>
            <option style="background-color: #444c55;font-size: 20px;" value="70">70</option>
            <option style="background-color: #444c55;font-size: 20px;" value="80">80</option>
          </select>
        </div>
        <div class="form-label">字体大小：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <div class="input_styled rowCheckbox checkbox-red">
            <input name="scroll" type="checkbox"  id="scroll" style="display:none">
            <label for="scroll" style="display:none">是否滚动</label>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <textarea rows="3" id="tit_txt" class="tit_area"></textarea>
        </div>
        <div class="form-label">字幕文字：</div>
      </div>
      <div class="form-row">
        <div class="form-item">
          <button class="btn2" type="button" style="width:100px;" onclick="titBtnClick()">更新配置</button>
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
$sql = 'select FAM_ID,TXT_COL,ALPHA,FONTSIZE,SCROLL,TXT,ENABLE from T_SUBTITLE_PARAM where TIT_ID=1;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['ENABLE'])) {
  if ($res['ENABLE'] > 0)
    echo 'document.getElementById("enable").checked=true;' . PHP_EOL;
  if ($res['SCROLL'] > 0)
    echo 'document.getElementById("scroll").checked=true;' . PHP_EOL;
  echo 'jsSelectItemByValue(document.getElementById("fam_id"),' . $res['FAM_ID'] . ');' . PHP_EOL;
  echo 'jsSelectItemByValue(document.getElementById("fontsize"),' . $res['FONTSIZE'] . ');' . PHP_EOL;
  echo 'document.getElementById("alpha").value="' . $res['ALPHA'] . '";' . PHP_EOL;
  echo 'document.getElementById("txt_col").value="' . dechex($res['TXT_COL']) . '";' . PHP_EOL;
  echo 'document.getElementById("tit_txt").value="' . $res['TXT'] . '";' . PHP_EOL;
}
$db->close();
?>
function titBtnClick()
{
  if(document.getElementById("tit_txt").value=="")
  {
    alert("字幕不能为空！")
    document.getElementById("tit_txt").focus();
    return false;
  }
  var params="";
  if(document.getElementById("enable").checked==true)
    params+="1,";
  else
    params+="0,";
  params+=document.getElementById("fam_id").value+",";
  params+=document.getElementById("alpha").value+",";
  params+=document.getElementById("txt_col").value+",";
  params+=document.getElementById("fontsize").value+",";
  if(document.getElementById("scroll").checked==true)
    params+="1,";
  else
    params+="0,";
  params+=document.getElementById("tit_txt").value;
  ajaxGetData("actsys.php",20,params,HandleAjaxResult);
}
document.getElementById("nav7").style.color="#eee";
</script>
</body>
</html>