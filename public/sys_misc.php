<?php
date_default_timezone_set("UTC");
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/devid.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/ver.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active" id="tab_miscinfo">
          <a href="#miscinfo" data-toggle="tab">其他参数</a>
        </li>
        <li id="tab_systime">
          <a href="#systime" data-toggle="tab">系统时间</a>
        </li>
        <li id="tab_devinfo">
          <a href="#devinfo" data-toggle="tab">设备信息</a>
        </li>
        <li id="tab_resetdb">
          <a href="#resetdb" data-toggle="tab">出厂设置</a>
        </li>
        <li id="tab_upgrade"><a href="#upgrade" data-toggle="tab">系统升级</a></li>
        <li id="tab_disk"><a href="#disk" data-toggle="tab">硬盘格式化</a></li>
        <li id="tab_halt">
          <a href="#halt" data-toggle="tab">关机重启</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="miscinfo">
          <div class="form-center">
            <div class="form-row">
            <div class="form-item"><span style="color:red;">注:录制周期*码率必须小于4G</span></div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="format">
                  <option style="background-color: #444c55;font-size: 20px;" value="0">mp4格式</option>
                  <option style="background-color: #444c55;font-size: 20px;" value="1">flv格式</option>
                </select>
              </div>
              <div class="form-label">录制文件格式:</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="rectime"></div>
              <div class="form-label">录制周期(秒)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="flash"></div>
              <div class="form-label">FLASH缓冲(毫秒)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ctrllen"></div>
              <div class="form-label">控制消息长度：</div>
            </div>
            <div class="form-row" style="display:none">
              <div class="form-item">
                <div class="input_styled rowCheckbox checkbox-red">
                  <input name="bkpic" type="checkbox"  id="bkpic" >
                  <label for="bkpic">启用混屏背景图片</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="miscBtnClick()">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="systime">
          <div class="form-center">
            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="curtime" disabled="disabled" value="<?php echo date('Y-m-d H:i:s', time()); ?>"></div>
              <div class="form-label">当前时间：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="year"></div>
              <div class="form-label">年：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="mon"></div>
              <div class="form-label">月：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="day"></div>
              <div class="form-label">日：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="hour"></div>
              <div class="form-label">时：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="min"></div>
              <div class="form-label">分：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="sec"></div>
              <div class="form-label">秒：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="timeBtnClick()">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="devinfo">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="devid" disabled="disabled" value="<?php echo constant("DEVID");?>" ></div>
              <div class="form-label">设备ID：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="ver" disabled="disabled" value="<?php echo constant("VER");?>" ></div>
              <div class="form-label">固件版本：</div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="resetdb">
          <div class="form-center">
            <div class="form-row">
              <div class="form-itemcenter">
                <button class="btn2" type="button" style="float:none;margin:0 auto;width:120px;" onclick="resetdbBtnClick(0)">保存出厂配置</button>
              </div>
            </div>
            <div class="form-row">
              <div class="form-itemcenter">
                <button class="btn2" type="button" style="float:none;margin:0 auto;width:120px;" onclick="resetdbBtnClick(1)">恢复出厂配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="upgrade">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:150px;" onclick="upgradeBtnClick(0)">1.准备升级环境</button>
              </div>
            </div>
            <div class="form-row"></div>
            <form action="actupgrade.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-item">
                  <div class="filediv">
                    <input class="filetxt" id="filetxt" type="text" readonly="true" value="请点击选择升级包文件!" />
                    <input class="upfile" id="file" name="file" type="file" accept=".tar" style="opacity:0;"/>
                  </div>
                </div>
              </div>
              <div class="form-item">
                <button class="btn2" type="submit" style="width:150px;" onClick="return CheckInput()">2.上传升级包</button>
              </div>
            </form>
            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:150px;" onclick="upgradeBtnClick(1)">3.执行升级</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="disk">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item"><span style="color:red;">注:硬盘格式化时间较长,请刷新查看当前状态</span></div>
            </div>
            <div class="form-row">
              <div class="form-item">
              <?php
              if(file_exists("/tmp/formating"))
               echo "正在格式化...";
              else if(file_exists("/mnt/format.done"))
               echo "格式化已完成,请重启设备!";
              else
               echo "未进行格式化操作";
              ?>
              <a href="sys_misc.php?tab=disk">刷新</a>
              </div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="formatBtnClick()">格式化硬盘</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="halt">
          <div class="form-center">
            <div class="form-row">
              <div class="form-itemcenter">
                <button class="btn2" type="button" style="float:none;margin:0 auto;width:100px;" onclick="rebootBtnClick()">重启系统</button>
              </div>
            </div>
            <div class="form-row">
              <div class="form-itemcenter">
                <button class="btn2" type="button" style="float:none;margin:0 auto;width:100px;" onclick="haltBtnClick()">关闭系统</button>
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
$sql = "select * from T_MISC_PARAM where MISC_ID=1;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['MISC_ID'])) {
    echo 'jsSelectItemByValue(document.getElementById("format"),' . $res['RECFORMAT'] . ');' . PHP_EOL;
    echo 'document.getElementById("rectime").value="' . $res['RECTIME'] . '";' . PHP_EOL;
    echo 'document.getElementById("flash").value="' . $res['FLASH'] . '";' . PHP_EOL;
    echo 'document.getElementById("ctrllen").value="' . $res['CTRLLEN'] . '";' . PHP_EOL;
    if ($res['BKPIC'] > 0)
    {
      echo 'document.getElementById("bkpic").checked=true;' . PHP_EOL;
    }
  }
}
$db->close();
?>
function miscBtnClick()
{
  var params="";
  params+=document.getElementById("format").value+",";
  params+=document.getElementById("rectime").value+",";
  params+=document.getElementById("flash").value+",";
  params+=document.getElementById("ctrllen").value;
  if(document.getElementById("bkpic").checked==true)
      params+=",1";
    else
      params+=",0";
  ajaxGetData("actsys.php",74,params,HandleAjaxResult);
}
jQuery(document).ready(function() {
  $('#file').change(function(){
    var filestr=$('#file').val();
    if(filestr=="")
    {
      filestr="请点击选择升级包文件!";
    }
    $('#filetxt').val(filestr);
  });
});
  function timeBtnClick()
  {
    if(!isNum(document.getElementById("year").value))
    {
      alert("年输入有误，请检查！");
      document.getElementById("year").focus();
      return; 
    }
    if(!isNum(document.getElementById("mon").value))
    {
      alert("月输入有误，请检查！");
      document.getElementById("mon").focus();
      return; 
    }
    if(!isNum(document.getElementById("day").value))
    {
      alert("日输入有误，请检查！");
      document.getElementById("day").focus();
      return; 
    }
    if(!isNum(document.getElementById("hour").value))
    {
      alert("时输入有误，请检查！");
      document.getElementById("hour").focus();
      return; 
    }
    if(!isNum(document.getElementById("min").value))
    {
      alert("分输入有误，请检查！");
      document.getElementById("min").focus();
      return; 
    }
    if(!isNum(document.getElementById("sec").value))
    {
      alert("秒输入有误，请检查！");
      document.getElementById("sec").focus();
      return; 
    }
    var params="";
    params+=document.getElementById("year").value+",";
    params+=document.getElementById("mon").value+",";
    params+=document.getElementById("day").value+",";
    params+=document.getElementById("hour").value+",";
    params+=document.getElementById("min").value+",";
    params+=document.getElementById("sec").value;
    ajaxGetData("actsys.php",57,params,HandleAjaxResult);
  }
  function resetdbBtnClick(dir)
  {
    if(dir>0)
      $info="此操作将恢复当前配置为出厂设置，确认要恢复出厂设置？";
    else
      $info="此操作将修改当前出厂设置，确认要保存到出厂设置？";
    if(confirm($info))
    {
      ajaxGetData("actsys.php",62,dir+"",HandleAjaxResult);
    }
  }

  function HandleForatResult(rst)
  {
    alert(rst.info);
  }
  function formatBtnClick()
  {
    if(confirm("确认要格式化硬盘吗？"))
    {
      ajaxGetData("actsys.php",76,"0",HandleForatResult);
    }
  }
  function rebootBtnClick()
  {
    if(confirm("确认要重启系统吗？"))
    {
      location.href="reset.php";
    }
  }
  function haltBtnClick()
  {
    if(confirm("确认要关闭系统吗？"))
    {
      ajaxGetData("actbk.php",7,"0",HandleNoResult);
    }
  }
  function CheckInput()
  {
    if(document.getElementById("file").value=="")
    {
      alert("请选择升级包文件！");
      return false;
    }
    return true;
  }
  function upgradeBtnClick(up_id)
  {
    ajaxGetData("actsys.php",63,up_id+"",HandleAjaxResult);
  }
  document.getElementById("nav18").style.color="#eee";
<?php
  if(isset($_REQUEST["tab"]))
  {
    echo "$('#miscinfo').removeClass('in active');".PHP_EOL;
    echo "$('#tab_miscinfo').removeClass('active');".PHP_EOL;
    echo "$('#".$_REQUEST["tab"]."').addClass('in active');".PHP_EOL;
    echo "$('#tab_".$_REQUEST["tab"]."').addClass('active');".PHP_EOL;
  }
?>
</script>
</body>
</html>