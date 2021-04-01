<?php
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>后台调试</title>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/common.js"></script>
    <script src="js/ajaxfunc.js"></script>
    <script>
      function resetPwdBtnClick()
      {
        ajaxGetData("actbk.php",1,"0",HandleAjaxResult);
      }
      function updateMACBtnClick()
      {
        ajaxGetData("actbk.php",2,"0",HandleAjaxResult);
      }
      function iirBtnClick(to)
      {
        ajaxGetData("actbk.php",5,to+","+document.getElementById("iir").value,HandleAjaxResult);
      }
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
        ajaxGetData("actbk.php",10,document.getElementById("addr").value,HandlePingResult);
      }
    </script>
  </head>
  <body>
    <br>
    PING测试地址:<input id="addr" type="text" />
    <input type="button" value="PING测试" onclick="pingBtnClick()"/><br><br>
    <input type="button" value="复位admin密码" onclick="resetPwdBtnClick()"/><br><br>
    <input type="button" value="更新MAC地址" onclick="updateMACBtnClick()"/><br><br>
    消息打印:<input id="iir" type="text" />
    <input type="button" value="更新到CS" onclick="iirBtnClick(0)"/>
  </body>
</html>