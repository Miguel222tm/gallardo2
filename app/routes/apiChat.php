<?php
$app->get("/chat/", function()  use ($app) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM chatRoom GROUP BY idChat
			HAVING COUNT(*) >=1	");
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

$app->get("/mensajes/:id", function($id)  use ($app) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM mensajesChat	 WHERE idChat=?");
		$dbh->bindParam(1,$id);
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




// trae al queue con su code para verificar
$app->get("/chat/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM chatRoom WHERE idChat=?");
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
$app->post("/chat/", function() use($app){
	$idChat= $app->request->post("idChat");
	$username= $app->request->post("username");
	$status= $app->request->post("status");
	$tipoChat= $app->request->post("tipoChat");
	$tipoUsuario=$app->request->post("tipoUsuario");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO chatRoom(idChat, username, status, tipoChat, tipoUsuario) VALUES(?,?,?,?,?)");
		$dbh->bindParam(1, $idChat);
		$dbh->bindParam(2, $username);
		$dbh->bindParam(3,$status);
		$dbh->bindParam(4, $tipoChat);
		$dbh->bindParam(5,$tipoUsuario);

		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"Chat created succesfully", "idProduct"=> $idChat)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

/*****  insert usuario*/
$app->post("/mensajes/", function() use($app){
	$idChat= $app->request->post("idChat");
	$username= $app->request->post("username");
	$mensaje= $app->request->post("mensaje");
	$fecha= $app->request->post("fecha");


	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO mensajesChat(idChat, username, mensaje, fecha) VALUES(?,?,?,?)");
		$dbh->bindParam(1, $idChat);
		$dbh->bindParam(2, $username);
		$dbh->bindParam(3,$mensaje);
		$dbh->bindParam(4, $fecha);

		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"Chat created succesfully", "mensaje"=> $mensaje)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->put("/chat/", function() use($app)
{
	$idChat = $app->request->put("idChat");

	$status=$app->request->put("status");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE chatRoom SET status= ? WHERE idChat = ?");
       	
		$dbh->bindParam(1, $status);
		$dbh->bindParam(2,$idChat);
		
	
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modifico el estado del chat: ".$idChat)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});


$app->delete("/chat/:id", function($id) use($app){

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("DELETE FROM chatRoom WHERE idChat = ?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'mensaje'=> 'se ha borrado con éxito el Chat con el id: '. $id)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}


});













?>