<?php

// trae al queue con su code para verificar
$app->get("/queue/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT username, hashedPassword, status, type FROM queue WHERE code=?");
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
$app->post("/queue/", function() use($app){
	$code= $app->request->post("code");
	$email= $app->request->post("email");
	$hashedPassword= $app->request->post("hashedPassword");
	$pass= sha1($hashedPassword);
	$type= $app->request->post("type");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO queue(code,username,hashedPassword,type) VALUES(?,?,?,?)");
		$dbh->bindParam(1, $code);
		$dbh->bindParam(2, $email);
		$dbh->bindParam(3, $pass);
		$dbh->bindParam(4,$type);
		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"queue added succesfully", "queue"=> $email)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});


$app->put("/queue/", function() use($app)
{
	$code= $app->request->put("code");
	$status= $app->request->put("status");
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE queue SET status= ? WHERE code = ?");
        $dbh->bindParam(1, $status);
		$dbh->bindParam(2,$code);
	
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modificó el queue con el code: ".$code)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});







?>