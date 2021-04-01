<?php
function SendSocketMsg($msg)
{
	$sock = @socket_create(AF_INET,SOCK_DGRAM,0);
	if (!$sock) {
	    die("$errstr ($errno)");
	}
	
//	$buf=$msg.md5($msg,TRUE);
//$sendMsg="helloworld\n";
	if(!@socket_sendto($sock,$msg,strlen($msg),0,"127.0.0.1",36210)){
		//if(!@socket_sendto($sock,$msg,strlen($msg),0,"192.168.1.101",36210)){
	     socket_close($sock);
	     exit();
	}
	socket_close($sock);
}
?>