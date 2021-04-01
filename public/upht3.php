<?php

//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

$first_file = $_FILES['htjpeg3'];
$upload_dir = '/opt/local/web/images/ht/'; //保存上传文件的目录
if (!file_exists($upload_dir)) {
  mkdir($upload_dir);
}
$msg = '上传结果：\r\n';
//处理上传的文件1
if ($first_file['error'] == UPLOAD_ERR_OK) {
  //上传文件1在服务器上的临时存放路径
  $temp_name = $first_file['tmp_name'];
  //移动临时文件夹中的文件1到存放上传文件的目录，并重命名为真实名称
  move_uploaded_file($temp_name, $upload_dir . 'htpic3.jpg');
  shell_exec("/opt/local/im/bin/convert /opt/local/web/images/ht/htpic3.jpg -resize 600x338! /opt/local/web/images/ht/htpre3.jpg");
  shell_exec("/opt/local/im/bin/convert /opt/local/web/images/ht/htpic3.jpg -resize 320x180! /opt/local/web/images/ht/htpre3.png");
  //shell_exec("cp -f /opt/local/web/images/vh/src1.jpg /opt/local/mul/src1.jpg");
  $msg = $msg . '  文件上传成功!\r\n';
} else {
  $msg = $msg . '  文件上传失败!\r\n';
}
echo("<script type='text/javascript'> alert('" . $msg . "');location.href='sys_ht.php?tab=headpic3';</script>");
?>