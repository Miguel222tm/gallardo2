<?php
	require ("../calls/callRegist.php");
	if (isset($_GET['code'])) {

		$code= $_GET['code'];

		$confirm= new callRegist();

		$infoUser= $confirm->getQueue($code);



		$jsoninfo= json_decode($infoUser,true);

		$username="";
		$hashedPassword="";
		$status="";
		$type="";

		foreach ($jsoninfo as $key => $value) {
			$username=$value['username'];
			$hashedPassword=$value['hashedPassword'];
			$status= $value['status'];
			$type=$value['type'];
		}

		if($status==0){
		$confirm->postUser($username, $hashedPassword, $type);
		$confirm->putValidacion($code,1);
		}else{
			echo "Este correo ya ha sido activado anteriormente";
		}	





	}





?>