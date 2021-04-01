<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('./database/mydatabase.db');
      }
   }
   
   $chid=8;

	//echo "<script>alert('hello')</script>";//call js function
	$db = new MyDB();
	if(!$db){
	  echo $db->lastErrorMsg();
	} 
	$sql = "select time from record where id=".$chid.";";
	$fileLen = $db->querySingle($sql);
	$db->close();
	
	echo "FileLen=".$fileLen."\n";
	echo "operation done successfully\n";
	
   
   
   /*
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   
	$sql = 'select * from T_USERS ;';
	$result = $db->query($sql);
	//$res = $result->fetchArray(SQLITE3_ASSOC);
	while($row = $result->fetchArray(SQLITE3_ASSOC))
	{
		echo "U_NAME= ".$row['U_NAME']."\n";
		echo "U_PASS= ".$row['U_PASS']."\n";
	}
	
	echo "operation done successfully\n";
	//echo $result;
	*/
?>
</body>
</html>