<?php
$app->get("/venta/", function()  use ($app) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM venta	");
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
$app->get("/venta/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM venta WHERE username=?");
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
$app->post("/venta/", function() use($app){
	$codigoPedido= $app->request->post("codigoPedido");
	$idCotizacion= $app->request->post("idCotizacion");
	$username= $app->request->post("username");
	$totalDinero= $app->request->post("totalDinero");
	$status=$app->request->post("status");
	$date=$app->request->post("date");

	

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO venta(codigoPedido, idCotizacion, username, totalDinero, status, date) VALUES(?,?,?,?,?,?)");
		$dbh->bindParam(1, $codigoPedido);
		$dbh->bindParam(2, $idCotizacion);
		$dbh->bindParam(3,$username);
		$dbh->bindParam(4, $totalDinero);
		$dbh->bindParam(5,$status);
		$dbh->bindParam(6,$date);

		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"venta added succesfully", "idProduct"=> $codigoPedido)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->put("/venta/", function() use($app)
{
	$codigoPedido= $app->request->post("codigoPedido");
	$status=$app->request->post("status");
	$updateDate=$app->request->post("updateDate");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE venta SET status= ?, updateDate = ? WHERE codigoPedido = ?");
       	
		$dbh->bindParam(1, $status);
		$dbh->bindParam(2,$updateDate);
		$dbh->bindParam(3, $codigoPedido);

		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modifico el status del pedido: ".$codigoPedido)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->delete("/venta/:id", function($id) use($app){

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("DELETE FROM venta WHERE codigoPedido = ?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'mensaje'=> 'se ha borrado con éxito el pedido con el id: '. $id)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}


});













?>