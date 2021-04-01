<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#out1" data-toggle="tab">VGA输出</a>
        </li>
        <li>
          <a href="#out2" data-toggle="tab">HDMI2输出</a>
        </li>
        <li>
          <a href="#out3" data-toggle="tab">HDMI1输出</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="out1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="vof_id1">
                  <option style="background-color: #444c55;font-size: 20px;" value='31'>AUTO</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='12'>1080P</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='8'>720P</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='17'>1024x768</option>
                </select>
              </div>
              <div class="form-label">输出分辩率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="bright1"></div>
              <div class="form-label">亮度：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="contrast1"></div>
              <div class="form-label">对比度：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="color1"></div>
              <div class="form-label">色调：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="sat1"></div>
              <div class="form-label">饱和度：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="vinmap1">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>混屏环出</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='1'>本地导播</option>
                </select>
              </div>
              <div class="form-label">源通道：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="outBtnClick(1)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="out2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="vof_id2">
                  <option style="background-color: #444c55;font-size: 20px;" value='31'>AUTO</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>1080P</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='8'>720P</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='17'>1024x768</option>
                </select>
              </div>
              <div class="form-label">输出分辩率：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="bright2"></div>
              <div class="form-label">亮度：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="contrast2"></div>
              <div class="form-label">对比度：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="color2"></div>
              <div class="form-label">色调：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="sat2"></div>
              <div class="form-label">饱和度：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="vinmap2">
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>VGA/HDMI</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>SDI1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>SDI2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>SDI3</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>SDI4</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='6'>SDI5</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='7'>SDI6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='9'>网络流</option>
                </select>
              </div>
              <div class="form-label">源通道：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="outBtnClick(2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="out3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="hdmi1">
                  <option style="background-color: #444c55;font-size: 20px;" value='1'>VGA输出</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>HDMI2输出</option>
                </select>
              </div>
              <div class="form-label">复制输出源：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="hdmi1BtnClick()">更新配置</button>
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
$sql = "select * from T_VOUT_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['VOUT_ID'])) {
    echo 'jsSelectItemByValue(document.getElementById("vof_id'.$res["VOUT_ID"].'"),' . $res['VOF_ID'] . ');' . PHP_EOL;
    echo 'document.getElementById("bright'.$res["VOUT_ID"].'").value="' . $res["BRIGHT"].  '";' . PHP_EOL;
    echo 'document.getElementById("contrast'.$res["VOUT_ID"].'").value="' . $res["CONTRAST"]. '";' . PHP_EOL;
    echo 'document.getElementById("color'.$res["VOUT_ID"].'").value="' . $res["COLOR"]. '";' . PHP_EOL;
    echo 'document.getElementById("sat'.$res["VOUT_ID"].'").value="' . $res["SATURATION"]. '";' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("vinmap'.$res["VOUT_ID"].'"),' . $res['VINMAP'] . ');' . PHP_EOL;
  }
}
$sql = 'select HDMI1 from T_MISC_PARAM where MISC_ID=1;';
$hdmi1 = $db->querySingle($sql);
echo 'jsSelectItemByValue(document.getElementById("hdmi1"),' . $hdmi1 . ');' . PHP_EOL;
$db->close();
?>
  function outBtnClick(vout_id)
  {
    var params="";
    params+=vout_id+",";
    params+=document.getElementById("vof_id"+vout_id).value+",";
    params+=document.getElementById("bright"+vout_id).value+",";
    params+=document.getElementById("contrast"+vout_id).value+",";
    params+=document.getElementById("color"+vout_id).value+",";
    params+=document.getElementById("sat"+vout_id).value+",";
    params+=document.getElementById("vinmap"+vout_id).value;
    ajaxGetData("actsys.php",6,params,HandleAjaxResult);
  };
  function hdmi1BtnClick()
  {
    ajaxGetData("actsys.php",82,document.getElementById("hdmi1").value+"",HandleAjaxResult);
  };
  
  document.getElementById("nav5").style.color="#eee";
</script>
</body>
</html>