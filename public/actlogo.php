<?php

//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');

$first_file = $_FILES['upfile'];
if (!(isset($_POST['path'])) || !file_exists($_POST['path'])) {
  $msg = '此文件(' . $_POST['path'] . ')不存在，请检查！\r\n';
} else {
  $msg = '更新结果：\r\n';
//处理上传的文件1
  if ($first_file['error'] == UPLOAD_ERR_OK) {
    //上传文件1在服务器上的临时存放路径
    $temp_name = $first_file['tmp_name'];
    $ok = 1;
    if ((strcasecmp($first_file['type'], 'image/png') != 0)&&(strcasecmp($first_file['type'], 'image/x-png') != 0)) {
      $msg = $msg . '  LOGO文件类型必须为png!上传失败!\r\n';
      $ok = 0;
    }
    $iinfo = getimagesize($temp_name);
    if ($iinfo[0] != 120 || $iinfo[1] != 22) {
      $msg = $msg . '  LOGO长宽不符合120x22!上传失败!\r\n';
      $ok = 0;
    }
    if ($ok == 1) {
      unlink($_POST['path']);
      move_uploaded_file($temp_name, $_POST['path']);
      $msg = $msg . '  LOGO更新成功!\r\n';
    }
  } else {
    $msg = $msg . '  文件更新失败!\r\n';
  }
}
echo("<script type='text/javascript'> alert('" . $msg . "');location.href='oem.php';</script>");
?>