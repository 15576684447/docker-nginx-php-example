<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active" id="tab_headpic1">
          <a href="#headpic1" data-toggle="tab">片头预案示例1</a>
        </li>
        <li id="tab_headpic2">
          <a href="#headpic2" data-toggle="tab">片头预案示例2</a>
        </li>
        <li id="tab_headpic3">
          <a href="#headpic3" data-toggle="tab">片头预案示例3</a>
        </li>
        <li id="tab_tailpic">
          <a href="#tailpic" data-toggle="tab">片尾预案示例</a>
        </li>
        <li id="tab_genht">
          <a href="#genht" data-toggle="tab">预案配置</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="headpic1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-imght">
                <img src="/images/ht/htpre1.jpg">
              </div>
            </div>
            <form action="upht1.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-item3">注:只支持JPG格式图片，建议使用1920*1080尺寸</div>
              </div>
              <div class="form-row">
                <div class="form-item3">
                  <div class="filediv">
                    <input class="filetxt" id="filetxt1" type="text" readonly="true" value="请点击选择背景JPEG图片!" />
                    <input class="upfile" id="htjpeg1" name="htjpeg1" type="file" accept=".jpg" style="opacity:0;"/>
                  </div>
                </div>
              </div>
              <div class="form-row"></div>
              <div class="form-item3">
                <button class="btn2" type="submit" style="width:100px;" onClick="return CheckInput(1)">更新图片</button>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="headpic2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-imght">
                <img src="/images/ht/htpre2.jpg">
              </div>
            </div>
            <form action="upht2.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-item3">注:只支持JPG格式图片，建议使用1920*1080尺寸</div>
              </div>
              <div class="form-row">
                <div class="form-item3">
                  <div class="filediv">
                    <input class="filetxt" id="filetxt2" type="text" readonly="true" value="请点击选择背景JPEG图片!" />
                    <input class="upfile" id="htjpeg2" name="htjpeg2" type="file" accept=".jpg" style="opacity:0;"/>
                  </div>
                </div>
              </div>
              <div class="form-row"></div>
              <div class="form-item3">
                <button class="btn2" type="submit" style="width:100px;" onClick="return CheckInput(2)">更新图片</button>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="headpic3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-imght">
                <img src="/images/ht/htpre3.jpg">
              </div>
            </div>
            <form action="upht3.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-item3">注:只支持JPG格式图片，建议使用1920*1080尺寸</div>
              </div>
              <div class="form-row">
                <div class="form-item3">
                  <div class="filediv">
                    <input class="filetxt" id="filetxt3" type="text" readonly="true" value="请点击选择背景JPEG图片!" />
                    <input class="upfile" id="htjpeg3" name="htjpeg3" type="file" accept=".jpg" style="opacity:0;"/>
                  </div>
                </div>
              </div>
              <div class="form-row"></div>
              <div class="form-item3">
                <button class="btn2" type="submit" style="width:100px;" onClick="return CheckInput(3)">更新图片</button>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="tailpic">
          <div class="form-center">
            <div class="form-row">
              <div class="form-imght">
                <img src="/images/ht/tailpre.jpg">
              </div>
            </div>
            <form action="uptail.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-item3">注:只支持JPG格式图片，建议使用1920*1080尺寸</div>
              </div>
              <div class="form-row">
                <div class="form-item3">
                  <div class="filediv">
                    <input class="filetxt" id="filetxt4" type="text" readonly="true" value="请点击选择背景JPEG图片!" />
                    <input class="upfile" id="htjpeg4" name="htjpeg4" type="file" accept=".jpg" style="opacity:0;"/>
                  </div>
                </div>
              </div>
              <div class="form-row"></div>
              <div class="form-item3">
                <button class="btn2" type="submit" style="width:100px;" onClick="return CheckInput(4)">更新图片</button>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="genht">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <select class="select_styled" id="cur">
                  <option style="background-color: #444c55;font-size: 20px;" value='1'>预案示例1</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='2'>预案示例2</option>
                  <option style="background-color: #444c55;font-size: 20px;" value='3'>预案示例3</option>
                </select>
              </div>
              <div class="form-label">当前预案：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="htdur"></div>
              <div class="form-label">片头片尾时长(秒)：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="genBtnClick()">更新配置</button>
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
    echo 'jsSelectItemByValue(document.getElementById("cur"),' . $res['HTPIC'] . ');' . PHP_EOL;
    echo 'document.getElementById("htdur").value="' . $res['HTDUR'] . '";' . PHP_EOL;
  }
}
$db->close();
?>
function CheckInput(htid)
{
  if(document.getElementById("htjpeg"+htid).value=="")
  {
    alert("请选择文件！");
    return false;
  }
  return true;
}
function genBtnClick()
{
  ajaxGetData("actsys.php",31,document.getElementById("cur").value+","+
    document.getElementById("htdur").value,HandleAjaxResult);
}
document.getElementById("nav8").style.color="#eee";
<?php
  if(isset($_REQUEST["tab"]))
  {
    echo "$('#headpic1').removeClass('in active');".PHP_EOL;
    echo "$('#tab_headpic1').removeClass('active');".PHP_EOL;
    echo "$('#".$_REQUEST["tab"]."').addClass('in active');".PHP_EOL;
    echo "$('#tab_".$_REQUEST["tab"]."').addClass('active');".PHP_EOL;
  }
?>
jQuery(document).ready(function() {
  $('#htjpeg1').change(function(){
    var filestr=$('#htjpeg1').val();
    if(filestr=="")
    {
      filestr="请点击选择背景JPEG图片!";
    }
    $('#filetxt1').val(filestr);
  });
  $('#htjpeg2').change(function(){
    var filestr=$('#htjpeg2').val();
    if(filestr=="")
    {
      filestr="请点击选择背景JPEG图片!";
    }
    $('#filetxt2').val(filestr);
  });
  $('#htjpeg3').change(function(){
    var filestr=$('#htjpeg3').val();
    if(filestr=="")
    {
      filestr="请点击选择背景JPEG图片!";
    }
    $('#filetxt3').val(filestr);
  });
  $('#htjpeg4').change(function(){
    var filestr=$('#htjpeg4').val();
    if(filestr=="")
    {
      filestr="请点击选择背景JPEG图片!";
    }
    $('#filetxt4').val(filestr);
  });
});
</script>
</body>
</html>