<?php

//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');

$first_file = $_FILES['file'];
if (!is_dir("/opt/local/upgrade"))
{
  $msg = '升级目录不存在，请确认升级准备是否成功！\r\n';
}
else
{
$msg = '上传结果：\r\n';
//处理上传的文件1
if ($first_file['error'] == UPLOAD_ERR_OK) {
  //上传文件1在服务器上的临时存放路径
  $temp_name = $first_file['tmp_name'];
  //移动临时文件夹中的文件1到存放上传文件的目录，并重命名为真实名称
  if(file_exists('/opt/local/upgrade/upgrade.tar'))
    unlink('/opt/local/upgrade/upgrade.tar');
  move_uploaded_file($temp_name, "/opt/local/upgrade/upgrade.tar");
  $msg = $msg . '  文件上传成功!\r\n';
} else {
  $msg = $msg . '  文件上传失败!\r\n';
}
}
echo("<script type='text/javascript'> alert('" . $msg . "');location.href='sys_misc.php?tab=upgrade';</script>");
?>