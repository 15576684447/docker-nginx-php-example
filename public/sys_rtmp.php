<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active"><a href="#live1" data-toggle="tab">直播高流</a></li>
        <li><a href="#live2" data-toggle="tab">直播中流</a></li>
        <li><a href="#live3" data-toggle="tab">直播低流</a></li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="live1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable1" type="checkbox"  id="enable1" >
                  <label for="enable1">使能直播高流</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="mode1">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">RTMP推流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">TsOverUDP推流</option>
                </select>
              </div>
              <div class="form-label">推流方式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="link1"></div>
              <div class="form-label">RTMP链接：</div>
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
                <input type="text" id="tsip1"></div>
              <div class="form-label">TS推流IP：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tsport1"></div>
              <div class="form-label">TS推流端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ttl1"></div>
              <div class="form-label">TS组播TTL：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rtmpBtnClick(1)">更新配置</button>
              </div>
            </div>

            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item"><span style="color:red;">注:以下工具可用于检测联网状态</span></div>
            </div>
            <div class="form-row">
              <div class="form-item"><input type="text" id="addr"></div>
              <div class="form-label">目标地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="pingBtnClick()">PING测试</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="live2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable2" type="checkbox"  id="enable2" >
                  <label for="enable2">使能直播中流</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="mode2">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">RTMP推流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">TsOverUDP推流</option>
                </select>
              </div>
              <div class="form-label">推流方式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="link2"></div>
              <div class="form-label">RTMP链接：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="status2" type="checkbox" disabled="disabled" id="status2" >
                  <label for="status2">连接状态</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tsip2"></div>
              <div class="form-label">TS推流IP：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tsport2"></div>
              <div class="form-label">TS推流端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ttl2"></div>
              <div class="form-label">TS组播TTL：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rtmpBtnClick(2)">更新配置</button>
              </div>
            </div>

            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item"><span style="color:red;">注:以下工具可用于检测联网状态</span></div>
            </div>
            <div class="form-row">
              <div class="form-item"><input type="text" id="addr"></div>
              <div class="form-label">目标地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="pingBtnClick()">PING测试</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="live3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="enable3" type="checkbox"  id="enable3" >
                  <label for="enable3">使能直播低流</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="mode3">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">RTMP推流</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">TsOverUDP推流</option>
                </select>
              </div>
              <div class="form-label">推流方式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="link3"></div>
              <div class="form-label">RTMP链接：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="status3" type="checkbox" disabled="disabled" id="status3" >
                  <label for="status3">连接状态</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tsip3"></div>
              <div class="form-label">TS推流IP：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tsport3"></div>
              <div class="form-label">TS推流端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ttl3"></div>
              <div class="form-label">TS组播TTL：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="rtmpBtnClick(3)">更新配置</button>
              </div>
            </div>

            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item"><span style="color:red;">注:以下工具可用于检测联网状态</span></div>
            </div>
            <div class="form-row">
              <div class="form-item"><input type="text" id="addr"></div>
              <div class="form-label">目标地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="pingBtnClick()">PING测试</button>
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
$sql = "select * from T_LIVE_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['RO_ID'])) {
    if ($res['ENABLE'] > 0) {
      echo 'document.getElementById("enable' . $res['RO_ID'] . '").checked=true;' . PHP_EOL;
    }
    if ($res['STATUS'] > 0) {
      echo 'document.getElementById("status' . $res['RO_ID'] . '").checked=true;' . PHP_EOL;
    }
    echo 'document.getElementById("link' . $res['RO_ID'] . '").value="' . $res['LINK'] . '";' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("mode' . $res['RO_ID'] . '"),' . $res['MODE'] . ');' . PHP_EOL;
    echo 'document.getElementById("tsip' . $res['RO_ID'] . '").value="' . $res['TSIP'] . '";' . PHP_EOL;
    echo 'document.getElementById("tsport' . $res['RO_ID'] . '").value="' . $res['TSPORT'] . '";' . PHP_EOL;
    echo 'document.getElementById("ttl' . $res['RO_ID'] . '").value="' . $res['TTL'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
  function HandlePingResult(res)
  {
    var info="测试结果:";
    if(res.value>0)
    {
      info=info+"此地址无法PING通!";
    }
    else
    {
      info=info+"此地址能PING通!";
    }
    alert(info+'\n'+res.info);
  }
  function pingBtnClick()
  {
    ajaxGetData("actsys.php",75,document.getElementById("addr").value,HandlePingResult);
  }
  function rtmpBtnClick(ro_id)
  {
    var params="";
    params+=ro_id+",";
    if(document.getElementById("enable"+ro_id).checked)
      params+="1,";
    else
      params+="0,";
    params+=document.getElementById("link"+ro_id).value+",";
    params+=document.getElementById("mode"+ro_id).value+",";
    params+=document.getElementById("tsip"+ro_id).value+",";
    params+=document.getElementById("tsport"+ro_id).value+",";
    params+=document.getElementById("ttl"+ro_id).value;
    ajaxGetData("actsys.php",51,params,HandleAjaxResult);
  }
  document.getElementById("nav9").style.color="#eee";
</script>
</body>
</html>