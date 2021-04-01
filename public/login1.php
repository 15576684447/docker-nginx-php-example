<?php
if (isset($_POST["uname"]) && isset($_POST["upass"])) {
  $name = $_POST["uname"];
  $pass = $_POST["upass"];
  require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');
  $conn = new SQLite3(constant("CSDB"));
  //error_log(print_r("Have open SQLites", true));
  /*
  class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('../database/cst.db');
      }
   }
   $conn = new MyDB();
   */
  
  $sql = 'select U_NAME from T_USERS where U_NAME="' . $name . '" and U_PASS="' . $pass . '";';
  $result = $conn->query($sql);
  $res = $result->fetchArray(SQLITE3_ASSOC);
  if (isset($res['U_NAME'])) {
    session_start();
    $buf = pack("CvC", 0x15, 1, 1);
    SendSocketMsg($buf);
    $_SESSION['cur_uname'] = $res['U_NAME'];
    if($res['U_NAME']=='admin')
      echo("<script type='text/javascript'> location.href='live.php';</script>");
    else
      echo("<script type='text/javascript'> location.href='voduser.php';</script>");
  } else {
    echo("<script type='text/javascript'> alert('用户名或密码错误！');location.href='login.php';</script>");
  }
  $conn->close();
}
?>
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
    <title></title>

    <!-- main JS libs -->
    <script src="js/libs/modernizr.min.js"></script>
    <script src="js/libs/jquery-1.11.3.min.js"></script>
    <script src="js/libs/jquery-ui.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>

    <!-- Style CSS -->
    <link href="css/bootstrap.css" media="screen" rel="stylesheet">
    <link href="style.css" media="screen" rel="stylesheet">

    <!-- scripts -->
    <script src="js/general.js"></script>

    <!-- Include all needed stylesheets and scripts here -->
    <script src="js/jquery.powerful-placeholder.min.js"></script>
    <style type="text/css">
      .wc{width:600px;margin: 0 auto; text-align: center; padding-top: 80px;}
      .login-style{width: 100%;border-radius: 0px;margin-bottom: 1px;}
      .login-txt{height:30px;margin-top:10px; text-align: center;font-size: 16px;}
      .login-center{width:600px;margin-left: auto;margin-right: auto;margin-top: 20px;}
      .login-row {float:left;margin:10px 0px;width:100%;}
      .login-label {float:right;padding:10px 5px 0 0;text-align:right;}
      .login-item {float:right;width:80%;padding-right: 100px;}
      .login-item input{width: 100%;}
    </style>
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
        <div class="wc">
          <div class="widget-container boxed vh-style1">
            <div class="login-txt">系统登录</div>
          </div>
          <div class="widget-container boxed vh-style1">
            <div class="login-center">
              <form method="post" action="login.php">
                <div class="login-row">
                  <div class="login-item"><input type="text" name="uname" ></div>
                  <div class="login-label">用户：</div>
                </div>
                <div class="login-row">
                  <div class="login-item"><input type="password" name="upass" ></div>
                  <div class="login-label">密码：</div>
                </div>
                <div class="login-row">
                  <div class="login-item">
                    <button class="btn2" type="submit" style="width:100px;" >LOGIN</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div><!--/ container -->
    </div>
  </body>
</html>