<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
      //require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/corp.php');
      //echo "<title>录播一体机-" . constant("CORP") . "</title>";
    ?>
    <!-- main JS libs -->
    <script src="js/libs/modernizr.min.js"></script>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/libs/jquery-ui.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>

    <!-- Style CSS -->
    <link href="css/bootstrap.css" media="screen" rel="stylesheet">
    <link href="style_track.css" media="screen" rel="stylesheet">

    <!-- scripts -->
    <script src="js/general.js"></script>

    <!-- Include all needed stylesheets and scripts here -->
    <script src="js/jquery.customInput.js"></script>
    <script src="js/jquery.powerful-placeholder.min.js"></script>
    <link rel="stylesheet" href="css/cusel.css">
    <script src="js/cusel-min.js"></script>
    <script src="js/ajaxfunc.js"></script>
    <script src="js/common.js"></script>


    <!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {filter: none !important;}
    </style>
    <![endif]-->
  </head>

  <body>
    <div class="body_wrap">
      <div class="mycontainer">
        <div class="dropdown-wrap boxed-velvet vh-style0">
          <div class="head_logo"></div>
          <ul class="dropdown inner clearfix">
            <li><a href="track_base.php"><span style="color:#3ebcef;">跟踪配置</span></a></li>
            <li><a href="track_t.php"><span>老师调试</span></a></li>
            <li><a href="track_s.php"><span>学生调试</span></a></li>
            <li><a href="track_rule.php"><span>跟踪策略</span></a></li>
            <li><a href="live.php"><span>返回主页</span></a></li>
          </ul>
        </div>
        <div class="tabs_framed boxed vh-style1">
          <div class="inner">
            <ul class="tabs clearfix">
              <li class="active"><a href="#general" data-toggle="tab">全局配置</a></li>
              <li><a href="#teacher" data-toggle="tab">教师配置</a></li>
              <li><a href="#stu" data-toggle="tab">学生配置</a></li>
              <li><a href="#ppt" data-toggle="tab">PPT配置</a></li>
            </ul>
            <div class="tab-content boxed clearfix vh-style0 vh-minh">
              <div class="tab-pane fade in active" id="general">
                <div class="form-center">
                  <div class="form-row">
                    <div class="form-item">
                      <div class="input_styled rowCheckbox checkbox-large">
                        <input name="enable" type="checkbox"  id="enable" >
                        <label for="enable">使能跟踪</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <div class="input_styled rowCheckbox checkbox-large">
                        <input name="debug" type="checkbox"  id="debug" >
                        <label for="debug">开启调试模式</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <select class="select_styled" id="mode">
                        <option style="background-color: #444c55;font-size: 20px;" value="1">云台追踪模式</option>
                        <option style="background-color: #444c55;font-size: 20px;" value="2">远近切换模式</option>
                        <option style="background-color: #444c55;font-size: 20px;" value="3">综合跟踪模式</option>
                      </select>
                    </div>
                    <div class="form-label">跟踪模式*:</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <select class="select_styled" id="cam_id">
                        <option style="background-color: #444c55;font-size: 20px;" value="0">预案1</option>
                        <option style="background-color: #444c55;font-size: 20px;" value="1">预案2</option>
                      </select>
                    </div>
                    <div class="form-label">云台预案*:</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <button class="btn2" type="button" style="width:100px;" onclick="baseBtnClick()">更新配置</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="teacher">
                <div class="form-center">
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="minrw1"></div>
                    <div class="form-label">最小分割宽度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="minrh1"></div>
                    <div class="form-label">最小分割高度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="maxrw1"></div>
                    <div class="form-label">最大分割宽度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="maxrh1"></div>
                    <div class="form-label">最大分割高度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="rgbth1"></div>
                    <div class="form-label">RGB阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="dirxth1"></div>
                    <div class="form-label">水平方向变化阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="closexth1"></div>
                    <div class="form-label">水平接近阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="lostth1"></div>
                    <div class="form-label">老师离开判断次数：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="mvth"></div>
                    <div class="form-label">老师移动判断参数：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="stopth"></div>
                    <div class="form-label">老师静止判断参数：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <button class="btn2" type="button" style="width:100px;" onclick="advtBtnClick()">更新配置</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="stu">
                <div class="form-center">
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="minrw2"></div>
                    <div class="form-label">最小分割宽度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="minrh2"></div>
                    <div class="form-label">最小分割高度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="maxrw2"></div>
                    <div class="form-label">最大分割宽度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="maxrh2"></div>
                    <div class="form-label">最大分割高度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="rgbth2"></div>
                    <div class="form-label">RGB阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="deltystepth"></div>
                    <div class="form-label">Y轴单次变化阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="deltyth"></div>
                    <div class="form-label">Y轴变化总阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <button class="btn2" type="button" style="width:100px;" onclick="advsBtnClick()">更新配置</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="ppt">
                <div class="form-center">
                  <div class="form-row">
                    <div class="form-item">
                      <div class="input_styled rowCheckbox checkbox-large">
                        <input name="pptenable" type="checkbox"  id="pptenable" >
                        <label for="pptenable">使能PPT</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="minrw3"></div>
                    <div class="form-label">最小分割宽度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="minrh3"></div>
                    <div class="form-label">最小分割高度：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item"><input type="text" id="rgbth3"></div>
                    <div class="form-label">RGB阀值：</div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <button class="btn2" type="button" style="width:100px;" onclick="advpBtnClick()">更新配置</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="widget-container boxed vh-style1">
          <div class="inner vh-center">
            <span>Powered By <?php echo constant("CORP"); ?></span>
          </div>
        </div>
        <script>
<?php
/*
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = 'select * from T_TRACK_BASE;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['TB_ID'])) {
  if ($res['ENABLE'] == 1) {
    echo 'document.getElementById("enable").checked=true;' . PHP_EOL;
  }
  if ($res['DEBUG'] == 1) {
    echo 'document.getElementById("debug").checked=true;' . PHP_EOL;
  }
  echo 'jsSelectItemByValue(document.getElementById("mode"),' . $res['MODE'] . ');' . PHP_EOL;
  echo 'jsSelectItemByValue(document.getElementById("cam_id"),' . $res['CAM_ID'] . ');' . PHP_EOL;
}
$sql = "select * from T_ADVT_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['AT_ID'])) {
    echo 'document.getElementById("minrw1").value="' . $res['MINRW'] . '";' . PHP_EOL;
    echo 'document.getElementById("minrh1").value="' . $res['MINRH'] . '";' . PHP_EOL;
    echo 'document.getElementById("maxrw1").value="' . $res['MAXRW'] . '";' . PHP_EOL;
    echo 'document.getElementById("maxrh1").value="' . $res['MAXRH'] . '";' . PHP_EOL;
    echo 'document.getElementById("rgbth1").value="' . $res['RGBTH'] . '";' . PHP_EOL;
    echo 'document.getElementById("dirxth1").value="' . $res['DIRXTH'] . '";' . PHP_EOL;
    echo 'document.getElementById("closexth1").value="' . $res['CLOSEXTH'] . '";' . PHP_EOL;
    echo 'document.getElementById("lostth1").value="' . $res['LOSTTH'] . '";' . PHP_EOL;
  }
}
$sql = "select * from T_ADVS_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['AS_ID'])) {
    echo 'document.getElementById("minrw2").value="' . $res['MINRW'] . '";' . PHP_EOL;
    echo 'document.getElementById("minrh2").value="' . $res['MINRH'] . '";' . PHP_EOL;
    echo 'document.getElementById("maxrw2").value="' . $res['MAXRW'] . '";' . PHP_EOL;
    echo 'document.getElementById("maxrh2").value="' . $res['MAXRH'] . '";' . PHP_EOL;
    echo 'document.getElementById("rgbth2").value="' . $res['RGBTH'] . '";' . PHP_EOL;
    echo 'document.getElementById("deltystepth").value="' . $res['DELTYSTEPTH'] . '";' . PHP_EOL;
    echo 'document.getElementById("deltyth").value="' . $res['DELTYTH'] . '";' . PHP_EOL;
  }
}
$sql = "select * from T_ADVP_PARAM;";
$result = $db->query($sql);
while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
  if (isset($res['AP_ID'])) {
    if ($res['ENABLE'] == 1) {
      echo 'document.getElementById("pptenable").checked=true;' . PHP_EOL;
    }
    echo 'document.getElementById("minrw3").value="' . $res['MINRW'] . '";' . PHP_EOL;
    echo 'document.getElementById("minrh3").value="' . $res['MINRH'] . '";' . PHP_EOL;
    echo 'document.getElementById("rgbth3").value="' . $res['RGBTH'] . '";' . PHP_EOL;
  }
}
$sql = 'select * from T_RULE_TX where RTX_ID=0;';
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['RTX_ID'])) {
  echo 'document.getElementById("mvth").value="' . $res['MVTH'] . '";' . PHP_EOL;
  echo 'document.getElementById("stopth").value="' . $res['STOPTH'] . '";' . PHP_EOL;
}
$db->close();
*/
?>

  function baseBtnClick()
  {
    var params="";
    if(document.getElementById("enable").checked)
      params+="1,";
    else
      params+="0,";
    if(document.getElementById("debug").checked)
      params+="1,";
    else
      params+="0,";
    params+=document.getElementById("mode").value+",";
    params+=document.getElementById("cam_id").value;
    ajaxGetData("acttrack.php",1,params,HandleAjaxResult);
  }
  function advtBtnClick()
  {
    var params="";
    params+=document.getElementById("minrw1").value+",";
    params+=document.getElementById("minrh1").value+",";
    params+=document.getElementById("maxrw1").value+",";
    params+=document.getElementById("maxrh1").value+",";
    params+=document.getElementById("rgbth1").value+",";
    params+=document.getElementById("dirxth1").value+",";
    params+=document.getElementById("closexth1").value+",";
    params+=document.getElementById("lostth1").value+",";
    params+=document.getElementById("mvth").value+",";
    params+=document.getElementById("stopth").value;
    ajaxGetData("acttrack.php",2,params,HandleAjaxResult);
  }
  function advsBtnClick()
  {
    var params="";
    params+=document.getElementById("minrw2").value+",";
    params+=document.getElementById("minrh2").value+",";
    params+=document.getElementById("maxrw2").value+",";
    params+=document.getElementById("maxrh2").value+",";
    params+=document.getElementById("rgbth2").value+",";
    params+=document.getElementById("deltystepth").value+",";
    params+=document.getElementById("deltyth").value;
    ajaxGetData("acttrack.php",3,params,HandleAjaxResult);
  }
  
  function advpBtnClick()
  {
    var params="";
    if(document.getElementById("pptenable").checked)
      params+="1,";
    else
      params+="0,";
    params+=document.getElementById("minrw3").value+",";
    params+=document.getElementById("minrh3").value+",";
    params+=document.getElementById("rgbth3").value;
    ajaxGetData("acttrack.php",9,params,HandleAjaxResult);
  }
        </script>
      </div><!--/ container -->
    </div>
  </body>
</html>