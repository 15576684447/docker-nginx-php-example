<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#dvi" data-toggle="tab">VGA/HDMI</a>
        </li>
        <li>
          <a href="#sdi1" data-toggle="tab">SDI1</a>
        </li>
        <li>
          <a href="#sdi2" data-toggle="tab">SDI2</a>
        </li>
        <li>
          <a href="#sdi3" data-toggle="tab">SDI3</a>
        </li>
        <li>
          <a href="#sdi4" data-toggle="tab">SDI4</a>
        </li>
        <li>
          <a href="#sdi5" data-toggle="tab">SDI5</a>
        </li>
        <li>
          <a href="#sdi6" data-toggle="tab">SDI6</a>
        </li>
        <li>
          <a href="#rtsp1" data-toggle="tab">网络流</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="dvi">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input disabled="disabled" type="text" id="fmt_name1"></div>
              <div class="form-label">输入制式：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="vit_id">
                  <option style="background-color: #444c55;font-size: 20px;" value='1'>VGA</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>HDMI</option>
                </select>
              </div>
              <div class="form-label">输入接口:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vin0BtnClick()">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sdi1">
          <div class="form-center">
          <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="fmt_id2">
                  <option style="background-color: #444c55;font-size: 20px;" value="91">SDI_1080P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="90">SDI_1080P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="89">SDI_1080P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="88">SDI_1080P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="87">SDI_1080P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="86">SDI_1080I60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="85">SDI_1080I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="84">SDI_720P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="83">SDI_720P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="82">SDI_720P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="81">SDI_720P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="80">SDI_720P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="79">SDI_576I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="78">SDI_480I60</option>
                </select>
              </div>
              <div class="form-label">输入制式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vinBtnClick(2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sdi2">
          <div class="form-center">
          <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="fmt_id3">
                  <option style="background-color: #444c55;font-size: 20px;" value="91">SDI_1080P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="90">SDI_1080P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="89">SDI_1080P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="88">SDI_1080P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="87">SDI_1080P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="86">SDI_1080I60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="85">SDI_1080I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="84">SDI_720P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="83">SDI_720P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="82">SDI_720P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="81">SDI_720P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="80">SDI_720P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="79">SDI_576I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="78">SDI_480I60</option>
                </select>
              </div>
              <div class="form-label">输入制式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vinBtnClick(3)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sdi3">
          <div class="form-center">
          <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="fmt_id4">
                  <option style="background-color: #444c55;font-size: 20px;" value="91">SDI_1080P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="90">SDI_1080P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="89">SDI_1080P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="88">SDI_1080P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="87">SDI_1080P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="86">SDI_1080I60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="85">SDI_1080I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="84">SDI_720P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="83">SDI_720P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="82">SDI_720P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="81">SDI_720P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="80">SDI_720P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="79">SDI_576I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="78">SDI_480I60</option>
                </select>
              </div>
              <div class="form-label">输入制式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vinBtnClick(4)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sdi4">
          <div class="form-center">
          <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="fmt_id5">
                  <option style="background-color: #444c55;font-size: 20px;" value="91">SDI_1080P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="90">SDI_1080P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="89">SDI_1080P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="88">SDI_1080P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="87">SDI_1080P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="86">SDI_1080I60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="85">SDI_1080I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="84">SDI_720P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="83">SDI_720P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="82">SDI_720P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="81">SDI_720P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="80">SDI_720P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="79">SDI_576I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="78">SDI_480I60</option>
                </select>
              </div>
              <div class="form-label">输入制式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vinBtnClick(5)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sdi5">
          <div class="form-center">
          <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="fmt_id6">
                  <option style="background-color: #444c55;font-size: 20px;" value="91">SDI_1080P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="90">SDI_1080P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="89">SDI_1080P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="88">SDI_1080P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="87">SDI_1080P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="86">SDI_1080I60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="85">SDI_1080I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="84">SDI_720P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="83">SDI_720P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="82">SDI_720P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="81">SDI_720P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="80">SDI_720P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="79">SDI_576I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="78">SDI_480I60</option>
                </select>
              </div>
              <div class="form-label">输入制式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vinBtnClick(6)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="sdi6">
          <div class="form-center">
          <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="fmt_id7">
                  <option style="background-color: #444c55;font-size: 20px;" value="91">SDI_1080P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="90">SDI_1080P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="89">SDI_1080P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="88">SDI_1080P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="87">SDI_1080P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="86">SDI_1080I60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="85">SDI_1080I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="84">SDI_720P60</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="83">SDI_720P50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="82">SDI_720P30</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="81">SDI_720P25</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="80">SDI_720P24</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="79">SDI_576I50</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="78">SDI_480I60</option>
                </select>
              </div>
              <div class="form-label">输入制式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="vinBtnClick(7)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="rtsp1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable1" type="checkbox"  id="enable1" >
                  <label for="enable1">使能网络流输入</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="link1"></div>
              <div class="form-label">码流链接：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="status1" type="checkbox" disabled="disabled" id="status1" >
                  <label for="status1">连接状态</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rtspBtnClick(1)">更新配置</button>
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
$sql = "select VIN_ID,FMT_NAME from V_VIN_PARAM_R where VIN_ID=1;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['VIN_ID'])) {
    echo 'document.getElementById("fmt_name' . $res['VIN_ID'] . '").value="' . $res['FMT_NAME'] . '";' . PHP_EOL;
  }
}
$sql = "select * from T_VIN_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['VIN_ID'])) {
    if($res['VIN_ID']>1)
      echo 'jsSelectItemByValue(document.getElementById("fmt_id' . $res['VIN_ID'] . '"),' . $res['FMT_ID'] . ');' . PHP_EOL;
    else
      echo 'jsSelectItemByValue(document.getElementById("vit_id"),' . $res['VIT_ID']  . ');' . PHP_EOL;
  }
}
$sql = "select * from T_DEC_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['DEC_ID'])) {
    if ($res['ENABLE'] > 0) {
      echo 'document.getElementById("enable' . $res['DEC_ID'] . '").checked=true;' . PHP_EOL;
    }
    if ($res['STATUS'] > 0) {
      echo 'document.getElementById("status' . $res['DEC_ID'] . '").checked=true;' . PHP_EOL;
    }
    echo 'document.getElementById("link' . $res['DEC_ID'] . '").value="' . $res['LINK'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
function vin0BtnClick()
{
  ajaxGetData("actsys.php",7,document.getElementById("vit_id").value+"",HandleAjaxResult);
}
function vinBtnClick(vin_id)
{
  ajaxGetData("actsys.php",77,vin_id+","+document.getElementById("fmt_id"+vin_id).value,HandleAjaxResult);
}
function rtspBtnClick(dec_id)
{
  var params="";
  params+=dec_id+",";
  if(document.getElementById("enable"+dec_id).checked)
    params+="1,";
  else
    params+="0,";
  params+=document.getElementById("link"+dec_id).value;
  ajaxGetData("actsys.php",50,params,HandleAjaxResult);
}
document.getElementById("nav2").style.color="#eee";
</script>
</body>
</html>