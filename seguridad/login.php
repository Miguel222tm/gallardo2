<?php

 
require("../calls/all.php");


function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

	//Reanuda la sesión
	session_start();

if (isset($_POST["username"])) {
		$username = $_POST["username"];
	} else {
		$username = "";
	}

	if (isset($_POST["hashedPassword"])) {
		$password = $_POST["hashedPassword"];
	} else {
		$password = "";

	}



$pas= sha1($password);

$cliente= new crudLogin();

 
$objeto= $cliente->loginUsuario($username,$pas);

//$usuario= $curl->
$validar= json_decode($objeto, true); // para validar tenemos que decodificar el json para usarlo

echo $objeto;

if($objeto!=null){ //eres un admin?

$_SESSION["autentica"] = "whiteDBClient";
	
	//a redireccionar a sus diferentes tipos de usuarios
	
$_SESSION['user']=$username;
		$_SESSION['pass']=$password;

		if ($validar['type']==2) {
			# code...
		$_SESSION["tipo"] ="2"; // eres el tipo 1 que garantiza que eres el admin
			
		$_SESSION['cotizacion']= generateRandomString();
		$_SESSION['chatRoom']= generateRandomString();
	

		header("Location: ../views/clienthome.php");
	}
	if ($validar['type']==1) {
			# code...
		$_SESSION["tipo"] ="1"; // eres el tipo 1 que garantiza que eres el admin?	
		header("Location: ../views/adminhome.php");
	}
	
}
else // no dar acceso
{ header("Location: ../login.html");}













?>