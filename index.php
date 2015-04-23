<?php

require "Slim/Slim.php";

 \Slim\Slim::registerAutoLoader();

 $app= new \Slim\Slim();

 define("lol", true);

class ResourceNotFoundException extends Exception {}
$authentication = function (){
	$app = \Slim\Slim:: getInstance();
	$user =$app->request->headers->get('HTTP_USER');
	$pass = $app ->request->headers->get('HTTP_PASS');
	$pass= sha1($pass);
	
	//validamos usuario 
	//$isvalid=
	 //R::findOne('keys', 'user=?')
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT username, hashedPassword FROM usuario where username=? AND  hashedPassword=? ");
		$dbh->bindParam(1, $user);
		$dbh->bindParam(2, $pass);
		$dbh->execute();
		$validacion = $dbh->fetchAll(PDO::FETCH_ASSOC);
		$connection = null;
		if($validacion=="" || $validacion==false){
		$app->status(401);
		echo json_encode(array('status' => "error", 'mensaje'=> "Usuario o password no valido." ));
		$app->stop();
		}
		else{
				
		}
	}
	catch(PDOException $e)
	{
		$app->status(401);
		echo json_encode(array('status' => "error", 'mensaje'=> $e->getMessage() ));
		$app->stop();
	}
		
		

	
};
/*
  $app->get("/", $authentication, function() use($app){
 
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT idPaciente, tipo, nombreCompleto, telefono, email FROM  pacientes  ");
		$dbh->execute();
		$encuesta = $dbh->fetchAll(PDO::FETCH_ASSOC);
		
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode($encuesta));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}

 });
*/
 require "app/libs/connect.php";
 require "app/routes/apibene.php";
 require "app/routes/apiqueue.php";
 require "app/routes/apiAdmin.php";
 require "app/routes/apiClient.php";
 require "app/routes/apiProduct.php";
 require "app/routes/apiUser.php";
 require "app/routes/apiFAQ.php";
 require "app/routes/apiCotizacion.php";
 require "app/routes/apiVenta.php";
 require "app/routes/apiChat.php";
 






 $app->run();


?>

