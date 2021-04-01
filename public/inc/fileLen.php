<?php
$fileLen=0;
$fileLen_Flag=0;

function setFileLen($fileLength)
{
	$fileLen=$fileLength;
	$fileLen_Flag=1;
	//echo "<script type='text/javascript'>alert('测试');</script>";
	error_log(print_r("printf $fileLen", true));
	setcookie("FileLen",$fileLen);
}

function getFileLen()
{
	if($fileLen_Flag==1)
	{
		$fileLen_Flag=0;
		echo $fileLen;
	}
	else
	{
		echo 0;
	}
}

function printFileLen()
{
	if($fileLen_Flag==1)
	{
		$fileLen_Flag=0;
		error_log(print_r("dsl print $fileLen", true));
	}
}
?>