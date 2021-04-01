<?php

//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');

$first_file = $_FILES['upfile'];
if (!(isset($_POST['path']))|| !file_exists($_POST['path']))
{
  $msg = '此文件('.$_POST['path'].')不存在，请检查！\r\n';
}
else
{
$msg = '上传结果：\r\n';
//处理上传的文件1
if ($first_file['error'] == UPLOAD_ERR_OK) {
  //上传文件1在服务器上的临时存放路径
  $temp_name = $first_file['tmp_name'];
  //移动临时文件夹中的文件1到存放上传文件的目录，并重命名为真实名称
  unlink($_POST['path']);
  move_uploaded_file($temp_name, $_POST['path']);
  $msg = $msg . '  文件上传成功!\r\n';
} else {
  $msg = $msg . '  文件上传失败!\r\n';
}
}
echo("<script type='text/javascript'> alert('" . $msg . "');location.href='up.php';</script>");
?>