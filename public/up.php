<?php
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>升级文件</title>
    <script src="js/common.js"></script>
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
    <form action="actup.php" method="post" enctype="multipart/form-data">
      <br/>选择上传文件：<input id="upfile" name="upfile"  type="file" /><br/>
      目标地址(包括文件名):<input id="path" name="path" size="100" type="text" /><br/>
      <input type="submit" value="上传" onClick="return CheckInput()"/>
    </form>
  </body>
</html>