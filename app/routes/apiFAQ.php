<?php
$app->get("/faq/", function()  use ($app) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT idFAQ, pregunta, respuesta FROM faq	");
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
$app->get("/faq/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT idFAQ, pregunta, respuesta FROM faq	 WHERE idFAQ=?");
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
$app->post("/faq/", function() use($app){
	$idFAQ= $app->request->post("idFAQ");
	$pregunta= $app->request->post("pregunta");
	$respuesta= $app->request->post("respuesta");


	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO faq(idFAQ, pregunta, respuesta) VALUES(?,?,?)");
		$dbh->bindParam(1, $idFAQ);
		$dbh->bindParam(2, $pregunta);
		$dbh->bindParam(3,$respuesta);


		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"faq question added succesfully", "idProduct"=> $idFAQ)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->put("/faq/", function() use($app)
{
	$idFAQ= $app->request->put("idFAQ");
	$pregunta= $app->request->put("pregunta");
	$respuesta= $app->request->put("respuesta");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE faq SET pregunta= ?, respuesta = ? WHERE idFAQ = ?");
       	
		$dbh->bindParam(1, $pregunta);
		$dbh->bindParam(2,$respuesta);
		$dbh->bindParam(3, $idFAQ);
	
	
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modifico el FAQ con el id : ".$idFAQ)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->delete("/faq/:id", function($id) use($app){

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("DELETE FROM faq WHERE idFAQ = ?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'mensaje'=> 'se ha borrado con éxito el producto con el id: '. $id)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}


});













?>