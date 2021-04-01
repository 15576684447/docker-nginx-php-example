<?php
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>出厂设置</title>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/common.js"></script>
    <script src="js/ajaxfunc.js"></script>
  </head>
  <body>
    <br>
    <label>版本管理:</label>
    <select id="vm">
    <option value='0'>VH版本</option>
    <option value='1'>VM版本</option>
    </select>
    <input type="button" value="更新版本" onclick="vmBtnClick()"/><br><br>
    <label>跟踪管理:</label>
    <select id="track">
    <option value='0'>不带跟踪版本</option>
    <option value='1'>带跟踪版本</option>
    </select>
    <input type="button" value="更新跟踪版本" onclick="trackBtnClick()"/><br><br>
    <script>
      function vmBtnClick()
      {
        ajaxGetData("actbk.php",11,document.getElementById("vm").value,HandleAjaxResult);
      }
      function trackBtnClick()
      {
        ajaxGetData("actbk.php",12,document.getElementById("track").value,HandleAjaxResult);
      }
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$db = new SQLite3(constant("CSDB"));
$sql = "select * from T_MISC_PARAM;";
$result = $db->query($sql);
$res = $result->fetchArray(SQLITE3_ASSOC);
if (isset($res['MISC_ID'])) {
  echo 'jsSelectItemByValue(document.getElementById("vm"),' . $res['VM'] . ');' . PHP_EOL;
  echo 'jsSelectItemByValue(document.getElementById("track"),' . $res['TRACK'] . ');' . PHP_EOL;
}
$db->close();
?>
    </script>
  </body>
</html>