<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/socket.php');

if(isset($_REQUEST["code"]))
{
  $db = new SQLite3(constant("CSDB"));
  $cmd=$_REQUEST["code"];
  $sql = 'select * from T_DB_RULE where CMD="'.$cmd.'";';
  $result = $db->query($sql);
  $row = $result->fetchArray(SQLITE3_ASSOC);
  if(isset($row["DB_ID"]))
  {
    $ct_id=$row["CT_ID"];
    $win0_ch=$row["WIN0_CH"];
    $win1_ch=$row["WIN1_CH"];
    $win2_ch=$row["WIN2_CH"];
    $win3_ch=$row["WIN3_CH"];
    if($row["ENC"]>0)
    {
      $buf = pack("CvCCCCC", constant("SET_COM_WIN_SRC"), 5, ($ct_id+1),$win0_ch,$win1_ch,$win2_ch,$win3_ch);
      SendSocketMsg($buf);
    }
    if($row["OUT"]>0)
    {
      $buf = pack("CvCCCCC", constant("SET_LOCAL_WIN_SRC"), 5, ($ct_id+7),$win0_ch,$win1_ch,$win2_ch,$win3_ch);
      SendSocketMsg($buf);
    }
  }
  $db->close();
}
?>
