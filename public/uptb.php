<?php

//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

$first_file = $_FILES['file'];
$upload_dir = '/opt/local/web/images/vh/'; //保存上传文件的目录
if (!file_exists($upload_dir)) {
  mkdir($upload_dir);
}
$msg = '上传结果：\r\n';
//处理上传的文件1
if ($first_file['error'] == UPLOAD_ERR_OK) {
  //上传文件1在服务器上的临时存放路径
  $temp_name = $first_file['tmp_name'];
  $ok=1;
  $iinfo = getimagesize($temp_name);
  if($iinfo[0]>400 || $iinfo[1]>400){
    $msg = $msg . '  文件长宽不得大于400!上传失败!\r\n';
    $ok=0;
  }
  if ($ok==1) {
    //移动临时文件夹中的文件1到存放上传文件的目录，并重命名为真实名称
    move_uploaded_file($temp_name, $upload_dir . 'tb.jpg');
    shell_exec("cp -f /opt/local/web/images/vh/tb.jpg /opt/local/mul/tb.jpg");
    $msg = $msg . '  台标文件上传成功!\r\n';
    $buf = pack("CvC", constant("CMD_SET_TB"), 1, constant("SUB_TB_GEN"));
    SendSocketMsg($buf);
  }
} else {
  $msg = $msg . '  台标文件上传失败!\r\n';
}
echo("<script type='text/javascript'> alert('" . $msg . "');location.href='sys_tb.php';</script>");
?>