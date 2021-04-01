<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#rs1" data-toggle="tab">串口1配置</a>
        </li>
        <li>
          <a href="#rs2" data-toggle="tab">串口2配置</a>
        </li>
        <li>
          <a href="#rs3" data-toggle="tab">串口3配置</a>
        </li>
        <li>
          <a href="#udp" data-toggle="tab">UDP接口配置</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="rs1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="baudrate1">
                  <option style="background-color: #444c55;font-size: 20px;" value="115200">115200</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="38400">38400</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="19200">19200</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="9600">9600</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4800">4800</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2400">2400</option>
                </select>
              </div>
              <div class="form-label">串口1波特率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="databits1">
                  <option style="background-color: #444c55;font-size: 20px;" value="8">8</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="7">7</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="6">6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">5</option>
                </select>
              </div>
              <div class="form-label">串口1数据位：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="stopbits1">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">2</option>
                </select>
              </div>
              <div class="form-label">串口1停止位：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="parity1">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">无校验</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">偶校验</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">奇校验</option>
                </select>
              </div>
              <div class="form-label">串口1奇偶校验：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rsBtnClick(1)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="rs2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="baudrate2">
                  <option style="background-color: #444c55;font-size: 20px;" value="115200">115200</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="38400">38400</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="19200">19200</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="9600">9600</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4800">4800</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2400">2400</option>
                </select>
              </div>
              <div class="form-label">串口2波特率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="databits2">
                  <option style="background-color: #444c55;font-size: 20px;" value="8">8</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="7">7</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="6">6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">5</option>
                </select>
              </div>
              <div class="form-label">串口2数据位：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="stopbits2">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">2</option>
                </select>
              </div>
              <div class="form-label">串口2停止位：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="parity2">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">无校验</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">偶校验</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">奇校验</option>
                </select>
              </div>
              <div class="form-label">串口2奇偶校验：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rsBtnClick(2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="rs3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="baudrate3">
                  <option style="background-color: #444c55;font-size: 20px;" value="115200">115200</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="38400">38400</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="19200">19200</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="9600">9600</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="4800">4800</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2400">2400</option>
                </select>
              </div>
              <div class="form-label">串口3波特率:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="databits3">
                  <option style="background-color: #444c55;font-size: 20px;" value="8">8</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="7">7</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="6">6</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="5">5</option>
                </select>
              </div>
              <div class="form-label">串口3数据位：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="stopbits3">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">2</option>
                </select>
              </div>
              <div class="form-label">串口3停止位：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="parity3">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">无校验</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">偶校验</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">奇校验</option>
                </select>
              </div>
              <div class="form-label">串口3奇偶校验：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rsBtnClick(3)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="udp">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="udp_port"></div>
              <div class="form-label">监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="portBtnClick()">更新配置</button>
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
$sql = 'select * from T_RS_PARAM;';
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['RS_ID'])) {
    echo 'jsSelectItemByValue(document.getElementById("baudrate' . $res['RS_ID'] . '"),' . $res['BAUDRATE'] . ');' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("databits' . $res['RS_ID'] . '"),' . $res['DATABITS'] . ');' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("stopbits' . $res['RS_ID'] . '"),' . $res['STOPBITS'] . ');' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("parity' . $res['RS_ID'] . '"),' . $res['PARITY'] . ');' . PHP_EOL;
  }
}
$sql = 'select UDP_PORT from T_MISC_PARAM where MISC_ID=1;';
$udp_port = $db->querySingle($sql);
if (isset($udp_port)) {
  echo 'document.getElementById("udp_port").value="' . $udp_port . '";' . PHP_EOL;
}
$db->close();
?>
  function rsBtnClick(rs_id)
  {
    var params="";
    params+=rs_id+",";
    params+=document.getElementById("baudrate"+rs_id).value+",";
    params+=document.getElementById("databits"+rs_id).value+",";
    params+=document.getElementById("stopbits"+rs_id).value+",";
    params+=document.getElementById("parity"+rs_id).value;
    ajaxGetData("actsys.php",53,params,HandleAjaxResult);
  }
  function portBtnClick()
  {
    ajaxGetData("actsys.php",60,document.getElementById("udp_port").value+"",HandleAjaxResult);
  }
  document.getElementById("nav11").style.color="#eee";
</script>
</body>
</html>