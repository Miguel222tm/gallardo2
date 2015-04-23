<?php
$app->get("/cotizacion/", function()  use ($app) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM cotizacion	");
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
// trae todas las cotizaciones por el id de cotizacion
$app->get("/cotizacionusuario/:id", function($id) use($app)
{
	$arreglo= explode(",", $id);
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT *  FROM cotizacion WHERE idCotizacion=? AND username=?");
		$dbh->bindParam(1, $arreglo[0]);
		$dbh->bindParam(2, $arreglo[1]);
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


// trae por cliente
$app->get("/cotizacion/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT *  FROM cotizacion WHERE idCotizacion=?");
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
$app->post("/cotizacion/", function() use($app){
	$idCotizacion= $app->request->post("idCotizacion");
	$username= $app->request->post("username");
	$date= $app->request->post("date");
	$idProduct= $app->request->post("idProduct");
	$cantidadProducto=$app->request->post("cantidadProducto");
	$totalIndividual =$app->request->post("totalIndividual");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO cotizacion(idCotizacion, username, date, idProduct, cantidadProducto, totalIndividual) VALUES(?,?,?,?,?,?)");
		$dbh->bindParam(1, $idCotizacion);
		$dbh->bindParam(2, $username);
		$dbh->bindParam(3,$date);
		$dbh->bindParam(4, $idProduct);
		$dbh->bindParam(5,$cantidadProducto);
		$dbh->bindParam(6, $totalIndividual);

		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"cotizacion added succesfully", "idProduct"=> $idProduct)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});
/*
$app->put("/cotizacion/", function() use($app)
{
	$idCotizacion= $app->request->post("idCotizacion");
	$username= $app->request->post("username");
	$date= $app->request->post("date");
	$idProduct= $app->request->post("idProduct");
	$cantidadProducto=$app->request->post("cantidadProducto");
	$totalIndividual =$app->request->post("totalIndividual");


	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE product SET description= ?, supplier = ?, stock=?, price=? WHERE idProduct = ?");
       	
		$dbh->bindParam(1, $descripcion);
		$dbh->bindParam(2,$supplier);
		$dbh->bindParam(3, $stock);
		$dbh->bindParam(4,$price);
		$dbh->bindParam(5, $idProduct);
	
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modifico el producto: ".$idProduct)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});*/

$app->delete("/cotizacion/:id", function($id) use($app){
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("DELETE FROM cotizacion WHERE idCotizacion = ?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'mensaje'=> 'se ha borrado con éxito la cotizacion con el id: '. $id)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}


});













?>