<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/sys_front.php');
?>
<div class="sys-right">
  <div class="tabs_framed boxed sys-righth">
    <div class="inner">
      <ul class="tabs clearfix">
        <li class="active">
          <a href="#admin" data-toggle="tab">admin密码修改</a>
        </li>
        <li>
          <a href="#user" data-toggle="tab">user密码修改</a>
        </li>
      </ul>
      <div class="tab-content boxed clearfix sys-tabh">
        <div class="tab-pane fade in active" id="admin">
          <div class="form-center">
            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item">
                <input type="password" id="pass11"></div>
              <div class="form-label">新密码：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="password" id="pass12"></div>
              <div class="form-label">再次输入：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="passBtnClick(1)">更新密码</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="user">
          <div class="form-center">
            <div class="form-row"></div>
            <div class="form-row">
              <div class="form-item">
                <input type="password" id="pass21"></div>
              <div class="form-label">新密码：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <input type="password" id="pass22"></div>
              <div class="form-label">再次输入：</div>
            </div>
            <div class="form-row">
              <div class="form-item">
                <button class="btn2" type="button" style="width:100px;" onclick="passBtnClick(2)">更新密码</button>
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
function passBtnClick(uid)
{
  if(uid==1)
  {
    var pass1=document.getElementById("pass11").value;
    var pass2=document.getElementById("pass12").value;
  }
  else
  {
    var pass1=document.getElementById("pass21").value;
    var pass2=document.getElementById("pass22").value;
  }
  

  if(pass1.length==0)
  {
    alert("输入不能为空！");
    return false;
  }
  if(pass1!=pass2)
  {
    alert("两次输入的密码不相同，请检查你的输入！");
    return false;
  }
  ajaxGetData("actsys.php",56,uid+","+pass1,HandleAjaxResult);
}
  document.getElementById("nav16").style.color="#eee";
</script>
</body>
</html>