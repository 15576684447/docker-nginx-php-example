<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#tb_up" data-toggle="tab">上传台标</a>
        </li>
        <li>
          <a href="#pos1" data-toggle="tab">左上位置</a>
        </li>
        <li>
          <a href="#pos2" data-toggle="tab">左下位置</a>
        </li>
        <li>
          <a href="#pos3" data-toggle="tab">右上位置</a>
        </li>
        <li>
          <a href="#pos4" data-toggle="tab">右下位置</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="tb_up">
          <div class="form-center">
            <div class="form-row">
              <div class="form-img">
                <img src="/images/vh/tb.jpg"/>
              </div>
            </div>
            <form action="uptb.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-item">注:只支持JPG格式图片，尺寸小于400*400范围</div>
              </div>
              <div class="form-row">
                <div class="form-item">
                  <input id="file" type="file" name="file" accept=".jpg"/>
                </div>
              </div>
              <div class="form-row"></div>
              <div class="form-item">
                <span class="btn btn-acute">
                  <input type="submit"  value="上传图片" onClick="return CheckInput()"></span>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="pos1">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_x1"></div>
              <div class="form-label">坐标X：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_y1"></div>
              <div class="form-label">坐标Y：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="posBtnClick(1)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pos2">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_x2"></div>
              <div class="form-label">坐标X：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_y2"></div>
              <div class="form-label">坐标Y：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="posBtnClick(2)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pos3">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_x3"></div>
              <div class="form-label">坐标X：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_y3"></div>
              <div class="form-label">坐标Y：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="posBtnClick(3)">更新配置</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pos4">
          <div class="form-center">
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_x4"></div>
              <div class="form-label">坐标X：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="text" id="pos_y4"></div>
              <div class="form-label">坐标Y：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="posBtnClick(4)">更新配置</button>
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
$sql = "select * from T_TBPOS_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['TBP_ID'])) {
    echo 'document.getElementById("pos_x'.$res["TBP_ID"].'").value="' . $res["POS_X"].  '";' . PHP_EOL;
    echo 'document.getElementById("pos_y'.$res["TBP_ID"].'").value="' . $res["POS_Y"].  '";' . PHP_EOL;
  }
}
$db->close();
?>
  function posBtnClick(tbp_id)
  {
    var params="";
    params+=tbp_id+",";
    params+=document.getElementById("pos_x"+tbp_id).value+",";
    params+=document.getElementById("pos_y"+tbp_id).value;
    ajaxGetData("actsys.php",8,params,HandleAjaxResult);
  };
  function CheckInput()
  {
    if(document.getElementById("file").value=="")
    {
      alert("请选择台标文件！");
      return false;
    }
    return true;
  }
  document.getElementById("nav6").style.color="#eee";
</script>
</body>
</html>