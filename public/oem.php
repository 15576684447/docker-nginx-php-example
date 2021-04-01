<?php
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/corp.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>OEM配置</title>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/common.js"></script>
    <script src="js/ajaxfunc.js"></script>
    <script>
      function CheckInput()
      {
        path=document.getElementById("path").value;
        if(path=="")
        {
          alert("目标地址不能为空！");
          document.getElementById("path").focus();
          return false;
        }
        if(document.getElementById("upfile").value=="")
        {
          alert("请选择文件！");
          return false;
        }
        return true;
      }
    </script>
  </head>
  <body>
    <h1>更新LOGO</h1>
    <form action="actlogo.php" method="post" enctype="multipart/form-data">
      <input id="path" name="path" size="100" style="display:none" type="text" value="/opt/local/web/images/logo.png" />
      选择logo文件(png,WxH=120x22)：<input id="upfile" name="upfile" type="file" /><br>
      <input type="submit" value="上传LOGO" onClick="return CheckInput()"/>
    </form>
    <br><br>
    <h1>更新公司信息</h1>
    公司名称:<input id="corp" name="corp" size="50" type="text" value="<?php echo constant("CORP");?>"/><br/>
    <input type="button" value="更 新" onclick="UpdateInfo()">
    <script>
    
      function UpdateInfo()
      {
        if(document.getElementById("corp").value=="")
        {
          alert("公司名称不能为空！");
          document.getElementById("corp").focus();
          return false;
        }
        ajaxGetData("actbk.php",4,document.getElementById("corp").value,HandleAjaxResult);
      }
    </script>
  </body>
</html>