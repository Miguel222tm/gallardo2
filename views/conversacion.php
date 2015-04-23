<?php
	require "../calls/callChat.php";
	session_start();

	$chat= new callChat();

	$c= $chat->getMensajes($_SESSION['chatRoom']);
	$json= json_decode($c, true);

	foreach ($json as $key => $value) {
		echo "".$value['username']."(".$value['fecha']." ):".$value['mensaje']." \n";
	}

?>