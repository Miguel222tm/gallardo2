<?php
$app->get("/product/", function()  use ($app) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT idProduct, description, supplier, stock, price FROM product	");
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
$app->get("/product/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT idProduct, description, supplier, stock, price FROM product WHERE idProduct=?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$resultado = $dbh->fetch(PDO::FETCH_ASSOC);
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
$app->get("/product/:id/venta", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT product.idProduct, product.stock FROM product, cotizacion WHERE idProduct=?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$resultado = $dbh->fetch(PDO::FETCH_ASSOC);
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
$app->post("/product/", function() use($app){
	$idProduct= $app->request->post("idProduct");
	$descripcion= $app->request->post("descripcion");
	$supplier= $app->request->post("supplier");
	$stock= $app->request->post("stock");
	$price=$app->request->post("price");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO product(idProduct, description, supplier, stock, price) VALUES(?,?,?,?,?)");
		$dbh->bindParam(1, $idProduct);
		$dbh->bindParam(2, $descripcion);
		$dbh->bindParam(3,$supplier);
		$dbh->bindParam(4, $stock);
		$dbh->bindParam(5,$price);

		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"idProduct added succesfully", "idProduct"=> $idProduct)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->put("/product/", function() use($app)
{
	$idProduct = $app->request->put("idProduct");
    $descripcion= $app-> request->put('descripcion');
		$supplier= $app->request->put("supplier");
	$stock= $app->request->put("stock");
	$price=$app->request->put("price");

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
});

$app->put("/product/stock/", function() use($app)
{
	$idProduct = $app->request->put("idProduct");
	$stock= $app->request->put("stock");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE product SET stock=? WHERE idProduct = ?");
       	
		$dbh->bindParam(1, $stock);
		$dbh->bindParam(2, $idProduct);
	
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
});

$app->delete("/product/:id", function($id) use($app){

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("DELETE FROM product WHERE idProduct = ?");
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