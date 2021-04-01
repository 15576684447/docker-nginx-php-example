<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#ptz0" data-toggle="tab">VGA/HDMI云台</a>
        </li>
        <li>
          <a href="#ptz1" data-toggle="tab">SDI1云台</a>
        </li>
        <li>
          <a href="#ptz2" data-toggle="tab">SDI2云台</a>
        </li>
        <li>
          <a href="#ptz3" data-toggle="tab">SDI3云台</a>
        </li>
        <li>
          <a href="#ptz4" data-toggle="tab">SDI4云台</a>
        </li>
        <li>
          <a href="#ptz5" data-toggle="tab">SDI5云台</a>
        </li>
        <li>
          <a href="#ptz6" data-toggle="tab">SDI6云台</a>
        </li>
        <li>
          <a href="#ptz7" data-toggle="tab">网络流云台</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="ptz0">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed0"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed0"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway0">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id0">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4850"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr0"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port0"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(0)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed1"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed1"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway1">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id1">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4851"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr1"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port1"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(1)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed2"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed2"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway2">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id2">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4852"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr2"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port2"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed3"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed3"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway3">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id3">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4853"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr3"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port3"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(3)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz4">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed4"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed4"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway4">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id4">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4854"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr4"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port4"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(4)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz5">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed5"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed5"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway5">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id5">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4855"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr5"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port5"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(5)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz6">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed6"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed6"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway6">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id6">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4856"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr6"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port6"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(6)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="ptz7">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pspeed7"></div>
              <div class="form-label">云台水平速度(1-24)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="tspeed7"></div>
              <div class="form-label">云台垂直速度(1-20)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="ptzway7">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">串口方式(PTZOverRS)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">网口方式(PTZOverTCP)</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">网口方式(PTZOverUDP)</option>
                </select>
              </div>
              <div class="form-label">云台通信类型：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="rs_id7">
                  <option style="background-color: #444c55;font-size: 20px;" value="1">串口1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="2">串口2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="3">串口3</option>
                </select>
              </div>
              <div class="form-label">云台所连接串口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="addr4857"></div>
              <div class="form-label">云台485地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ipaddr7"></div>
              <div class="form-label">云台IP地址：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="port7"></div>
              <div class="form-label">云台监听端口：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="ptzBtnClick(7)">更新配置</button>
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
$sql = "select * from T_PTZ_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['PTZ_ID'])) {
    echo 'document.getElementById("pspeed' . $res['PTZ_ID'] . '").value="' . $res['PSPEED'] . '";' . PHP_EOL;
    echo 'document.getElementById("tspeed' . $res['PTZ_ID'] . '").value="' . $res['TSPEED'] . '";' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("ptzway' . $res['PTZ_ID'] . '"),' . $res['PTZWAY'] . ');' . PHP_EOL;
    echo 'jsSelectItemByValue(document.getElementById("rs_id' . $res['PTZ_ID'] . '"),' . $res['RS_ID'] . ');' . PHP_EOL;
    echo 'document.getElementById("addr485' . $res['PTZ_ID'] . '").value="' . $res['ADDR485'] . '";' . PHP_EOL;
    echo 'document.getElementById("ipaddr' . $res['PTZ_ID'] . '").value="' . $res['IPADDR'] . '";' . PHP_EOL;
    echo 'document.getElementById("port' . $res['PTZ_ID'] . '").value="' . $res['PORT'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
  function ptzBtnClick(ptzid)
  {
    var ipaddr=document.getElementById("ipaddr"+ptzid);
    if(isIP(ipaddr.value)==false)
    {
      alert("你输入的IP格式不合法，请检查你的输入！");
      ipaddr.focus();
      return false;
    }
    var params="";
    params+=ptzid+",";
    params+=document.getElementById("pspeed"+ptzid).value+",";
    params+=document.getElementById("tspeed"+ptzid).value+",";
    params+=document.getElementById("ptzway"+ptzid).value+",";
    params+=document.getElementById("rs_id"+ptzid).value+",";
    params+=document.getElementById("addr485"+ptzid).value+",";
    params+=document.getElementById("ipaddr"+ptzid).value+",";
    params+=document.getElementById("port"+ptzid).value;
    ajaxGetData("actsys.php",54,params,HandleAjaxResult);
  }
  document.getElementById("nav14").style.color="#eee";
</script>
</body>
</html>