<?php

$app ->post("/login/", function() use($app){
	$user= $app->request->post("username");
	$contra= $app->request->post("hashedPassword");
	$pas= sha1($contra);
		try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT type FROM users WHERE username=? AND hashedPassword=? ");
		$dbh->bindParam(1, $user);
		$dbh->bindParam(2, $contra);
		$dbh->execute();
		$login = $dbh->fetch(PDO::FETCH_ASSOC);
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		if($login!=false)
		$app->response->body(json_encode($login));

		
	} catch (PDOException $e) {
		echo "error login.";
		
	}

});



// trae al queue con su code para verificar
$app->get("/user/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT username, hashedPassword, type FROM users WHERE username=?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$resultado = $dbh->fetchAll(PDO::FETCH_ASSOC);
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode($resultado));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});






/*****  insert usuario*/
$app->post("/users/", function() use($app){
	$username= $app->request->post("username");
	$pass= $app->request->post("hashedPassword");
	
	$type= $app->request->post("type");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO users(username,hashedPassword,type) VALUES(?,?,?)");
		$dbh->bindParam(1, $username);
		$dbh->bindParam(2, $pass);
		$dbh->bindParam(3,$type);
		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"user added succesfully", "user"=> $username)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});







?>