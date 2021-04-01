<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#ain" data-toggle="tab">音频输入</a>
        </li>
        <li>
          <a href="#aout" data-toggle="tab">音频输出</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="ain">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="samprate">
                  <option style="background-color: #444c55;font-size: 20px;" value="48000">48000</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="44100">44100</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="32000">32000</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="24000">24000</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="22050">22050</option>
                </select>
              </div>
              <div class="form-label">采样率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="mode">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">单声道</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">立体声</option>
                </select>
              </div>
              <div class="form-label">模式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
              <button class="btn2" type="button" style="width:100px;" onclick="audioBtnClick()">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="aout">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="out_en" type="checkbox"  id="out_en" >
                  <label for="out_en">使能音频环出*</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="hdmi_en" type="checkbox"  id="hdmi_en" >
                  <label for="hdmi_en">使能HDMI音频输出</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="out_vol"></div>
              <div class="form-label">环出音量(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="aoutBtnClick()">更新配置</button>
              </div>
            </div>
          </div>
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

$sql = "select * from T_AIN_PARAM where AIN_ID=1;";
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['AIN_ID'])) {
  echo 'jsSelectItemByValue(document.getElementById("samprate"),' . $res['SAMPRATE'] . ');' . PHP_EOL;
  echo 'jsSelectItemByValue(document.getElementById("mode"),' . $res['MODE'] . ');' . PHP_EOL;
}
$sql = "select * from T_AOUT_PARAM;";
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if ($res['OUT_EN'] > 0)
{
  echo 'document.getElementById("out_en").checked=true;' . PHP_EOL;
}
if ($res['HDMI_EN'] > 0)
{
  echo 'document.getElementById("hdmi_en").checked=true;' . PHP_EOL;
}
echo 'document.getElementById("out_vol").value="' . $res['OUT_VOL'] . '";' . PHP_EOL;
$db->close();

?>
  function audioBtnClick()
  {
    var params="";
    params+=document.getElementById("samprate").value+",";
    params+=document.getElementById("mode").value;
    ajaxGetData("actsys.php",1,params,HandleAjaxResult);
  }
  function aoutBtnClick()
  {
    var params="";
    if(document.getElementById("out_en").checked==true)
      params+="1,";
    else
      params+="0,";
    if(document.getElementById("hdmi_en").checked==true)
      params+="1,";
    else
      params+="0,";
    params+=document.getElementById("out_vol").value;
    ajaxGetData("actsys.php",9,params,HandleAjaxResult);
  }
  document.getElementById("nav1").style.color="#eee";
</script>
</body>
</html>