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
    require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/corp.php');
    echo "<title>录播一体机-" . constant("CORP") . "</title>";
?>
    <!-- main JS libs -->
    <script src="js/libs/modernizr.min.js"></script>
    <script src="js/libs/jquery-1.10.0.js"></script>
    <script src="js/libs/jquery-ui.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>

    <!-- Style CSS -->
    <link href="css/bootstrap.css" media="screen" rel="stylesheet">
    <link href="style.css" media="screen" rel="stylesheet">

    <!-- scripts -->
    <script src="js/general.js"></script>

    <!-- Include all needed stylesheets and scripts here -->
    <!-- Progress Bars -->
    <script src="js/progressbar.js"></script>
    <script src="js/ajaxfunc.js"></script>
    <style type="text/css">
      .reset-bottom{ margin-top:300px;}
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

        <!--- HEADER -->

        <div class="content container_12">
          <div style="height:200px; text-align:center;">正在重启，请稍侯...</div>
          <div class="progressbars">
            <div id="progressBar1" class="progressbar">
              <span class="mark-left">0%</span>
              <span class="mark-right">100%</span>
              <div class="percent"></div>
              <div class="pbar"></div>
              <div class="elapsed"></div>
              <div class="remained"></div>
            </div>
            <script type="text/javascript">
              $(document).ready(function() {
                $('#progressBar1').anim_progressbar({
                  totaltime: 40
                });
              });
            </script>
          </div> 
        </div>
        <script> 
          function HandleReset()
          {
            setTimeout("GotoDefault()",40000);
          }
          ajaxGetData("actbk.php",6,"0",HandleReset);
          function GotoDefault()
          {
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
$conn = new SQLite3(constant("CSDB"));
$query = 'select IP from T_NET_PARAM where NET_ID=1;';
$ip = $conn->querySingle($query);
$conn->close();
echo 'window.location.href="http://' . $ip . '/login.php";' . PHP_EOL;
?>
              }
        </script>
        <div class="widget-container reset-bottom">
          <div class="inner vh-center">
            <span>Powered By <?php echo constant("CORP"); ?></span>
          </div>
        </div>
      </div><!--/ container -->
    </div>
  </body>
</html>