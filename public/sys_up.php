<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#out1" data-toggle="tab">FTP服务器</a>
        </li>
        <li>
          <a href="#out2" data-toggle="tab">上传配置</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="out1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="svr_ip"></div>
              <div class="form-label">服务器IP：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="svr_port"></div>
              <div class="form-label">端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ftp_user"></div>
              <div class="form-label">FTP用户名：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ftp_pass"></div>
              <div class="form-label">FTP密码：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ftp_path"></div>
              <div class="form-label">上传路径：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="upsvrBtnClick()">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="out2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable" type="checkbox"  id="enable" >
                  <label for="enable">使能定时上传</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="hour">
                  <option style="background-color: #444c55;font-size: 20px;" value='21'>晚上21点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='22'>晚上22点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='23'>晚上23点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='0'>凌晨0点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='1'>凌晨1点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>凌晨2点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>凌晨3点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='4'>凌晨4点</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='5'>凌晨5点</option>
                </select>
              </div>
              <div class="form-label">上传时间：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="autoBtnClick()">更新配置</button>
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
$sql = "select * from T_UPLOAD_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['UP_ID'])) {
    echo 'document.getElementById("svr_ip").value="' . $res['SVR_IP'] . '";' . PHP_EOL;
    echo 'document.getElementById("svr_port").value="' . $res['SVR_PORT'] . '";' . PHP_EOL;
    echo 'document.getElementById("ftp_user").value="' . $res['FTP_USER'] . '";' . PHP_EOL;
    echo 'document.getElementById("ftp_pass").value="' . $res['FTP_PASS'] . '";' . PHP_EOL;
    echo 'document.getElementById("ftp_path").value="' . $res['FTP_PATH'] . '";' . PHP_EOL;
  }
}
$sql = "select * from T_UPLOAD_AUTO;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['UA_ID'])) {
    if ($res['ENABLE'] > 0)
    {
      echo 'document.getElementById("enable").checked=true;' . PHP_EOL;
    }
    echo 'jsSelectItemByValue(document.getElementById("hour"),' . $res['HOUR'] . ');' . PHP_EOL;
  }
}
$db->close();
?>
  function upsvrBtnClick()
  {
    var params="";
    params+=document.getElementById("svr_ip").value+",";
    params+=document.getElementById("svr_port").value+",";
    params+=document.getElementById("ftp_user").value+",";
    params+=document.getElementById("ftp_pass").value+",";
    params+=document.getElementById("ftp_path").value;
    ajaxGetData("actsys.php",80,params,HandleAjaxResult);
  }
  function autoBtnClick()
  {
    var params="";
    if(document.getElementById("enable").checked==true)
      params+="1,1,";
    else
      params+="0,1,";
    params+=document.getElementById("hour").value;
    ajaxGetData("actsys.php",81,params,HandleAjaxResult);
  }
  document.getElementById("nav10").style.color="#eee";
</script>
</body>
</html>