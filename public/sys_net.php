<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#net1" data-toggle="tab">网口配置</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="net1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ip1"></div>
              <div class="form-label">IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="mask1"></div>
              <div class="form-label">掩码：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="gate1"></div>
              <div class="form-label">网关：</div>
            </div>
            <div class="form-row">
              <div class="form-item"><input type="text" id="dns11"></div>
              <div class="form-label">主DNS：</div>
            </div>
            <div class="form-row">
              <div class="form-item"><input type="text" id="dns21"></div>
              <div class="form-label">备DNS：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="netBtnClick(1)">更新配置</button>
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
$sql = 'select * from T_NET_PARAM;';
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['NET_ID'])) {
    echo 'document.getElementById("ip' . $res['NET_ID'] . '").value="' . $res['IP'] . '";' . PHP_EOL;
    echo 'document.getElementById("mask' . $res['NET_ID'] . '").value="' . $res['MASK'] . '";' . PHP_EOL;
    echo 'document.getElementById("gate' . $res['NET_ID'] . '").value="' . $res['GATE'] . '";' . PHP_EOL;
    echo 'document.getElementById("dns1' . $res['NET_ID'] . '").value="' . $res['DNS1'] . '";' . PHP_EOL;
    echo 'document.getElementById("dns2' . $res['NET_ID'] . '").value="' . $res['DNS2'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
  function netBtnClick(net_id)
  {
    var host_=document.getElementById("ip"+net_id);
    var mask_=document.getElementById("mask"+net_id);
    var gate_=document.getElementById("gate"+net_id);
    var dns1_=document.getElementById("dns1"+net_id);
    if((isIP(host_.value)==false)||(isIP(mask_.value)==false)||(isIP(gate_.value)==false)||(isIP(dns1_.value)==false))
    {
      alert("你输入的IP格式不合法，请检查你的输入！");
      return false;
    }
    var params="";
    params+=document.getElementById("ip"+net_id).value+",";
    params+=document.getElementById("mask"+net_id).value+",";
    params+=document.getElementById("gate"+net_id).value+",";
    params+=document.getElementById("dns1"+net_id).value+",";
    params+=document.getElementById("dns2"+net_id).value;
    ajaxGetData("actsys.php",55,params,HandleAjaxResult);
  }
  document.getElementById("nav15").style.color="#eee";
</script>
</body>
</html>