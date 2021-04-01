<?php
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>混屏窗口位置</title>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/common.js"></script>
    <script src="js/ajaxfunc.js"></script>
  </head>
  <body>
    <br>
    <label>分屏类型:</label>
    <select id="ct_id"  onchange="onCTIDchange()">
      <option value='0'>单分屏</option>
      <option value='1'>两分屏</option>
      <option value='2'>画外画</option>
      <option value='3'>画中画</option>
      <option value='4'>1+2分屏</option>
      <option value='5'>四分屏</option>
    </select><br>
    窗口1位置X:<input id="win0_x" size="50" type="text" /><br>
    窗口1位置Y:<input id="win0_y" size="50" type="text" /><br>
    窗口1宽度W:<input id="win0_w" size="50" type="text" /><br>
    窗口1高度H:<input id="win0_h" size="50" type="text" /><br>
    窗口2位置X:<input id="win1_x" size="50" type="text" /><br>
    窗口2位置Y:<input id="win1_y" size="50" type="text" /><br>
    窗口2宽度W:<input id="win1_w" size="50" type="text" /><br>
    窗口2高度H:<input id="win1_h" size="50" type="text" /><br>
    窗口3位置X:<input id="win2_x" size="50" type="text" /><br>
    窗口3位置Y:<input id="win2_y" size="50" type="text" /><br>
    窗口3宽度W:<input id="win2_w" size="50" type="text" /><br>
    窗口3高度H:<input id="win2_h" size="50" type="text" /><br>
    窗口4位置X:<input id="win3_x" size="50" type="text" /><br>
    窗口4位置Y:<input id="win3_y" size="50" type="text" /><br>
    窗口4宽度W:<input id="win3_w" size="50" type="text" /><br>
    窗口4高度H:<input id="win3_h" size="50" type="text" /><br>
    <input type="button" value="更新配置" onclick="updPosbtnClick()"/>
    <script>
    
      function HandleUpdate()
      {
        alert("设置成功！");
      }
      function HandleCTIDChange(com)
      {
        document.getElementById("win0_x").value=com.WIN0_X;
        document.getElementById("win0_y").value=com.WIN0_Y;
        document.getElementById("win0_w").value=com.WIN0_W;
        document.getElementById("win0_h").value=com.WIN0_H;
        document.getElementById("win1_x").value=com.WIN1_X;
        document.getElementById("win1_y").value=com.WIN1_Y;
        document.getElementById("win1_w").value=com.WIN1_W;
        document.getElementById("win1_h").value=com.WIN1_H;
        document.getElementById("win2_x").value=com.WIN2_X;
        document.getElementById("win2_y").value=com.WIN2_Y;
        document.getElementById("win2_w").value=com.WIN2_W;
        document.getElementById("win2_h").value=com.WIN2_H;
        document.getElementById("win3_x").value=com.WIN3_X;
        document.getElementById("win3_y").value=com.WIN3_Y;
        document.getElementById("win3_w").value=com.WIN3_W;
        document.getElementById("win3_h").value=com.WIN3_H;
      }
      function onCTIDchange()
      {
        var ctid=document.getElementById("ct_id").value;
        ajaxGetData("actbk.php",8,ctid,HandleCTIDChange);
      }
      function updPosbtnClick()
      {
        var params="";
        params+=document.getElementById("ct_id").value+",";
        params+=document.getElementById("win0_x").value+",";
        params+=document.getElementById("win0_y").value+",";
        params+=document.getElementById("win0_w").value+",";
        params+=document.getElementById("win0_h").value+",";
        params+=document.getElementById("win1_x").value+",";
        params+=document.getElementById("win1_y").value+",";
        params+=document.getElementById("win1_w").value+",";
        params+=document.getElementById("win1_h").value+",";
        params+=document.getElementById("win2_x").value+",";
        params+=document.getElementById("win2_y").value+",";
        params+=document.getElementById("win2_w").value+",";
        params+=document.getElementById("win2_h").value+",";
        params+=document.getElementById("win3_x").value+",";
        params+=document.getElementById("win3_y").value+",";
        params+=document.getElementById("win3_w").value+",";
        params+=document.getElementById("win3_h").value;
        ajaxGetData("actbk.php",9,params,HandleAjaxResult);
      }
    </script>
  </body>
</html>