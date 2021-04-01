<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/devid.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/inc/ver.php');

echo '{"dtid":"12","devtype":"VHR2030C","devid":"' . constant("DEVID") . '","ver":"' . constant("VER") . '"}';
?>
