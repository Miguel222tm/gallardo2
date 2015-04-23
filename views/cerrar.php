<?php
	require "../calls/callChat.php";
	session_start();

	$chat= new callChat();

 		$chat->deleteChat($_SESSION['chatRoom']);
	

?>