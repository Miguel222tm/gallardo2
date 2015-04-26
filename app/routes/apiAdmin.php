<?php
$app->get("/admin/", function() use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT username, Name, lastName FROM Administrator ");
		
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
$app->get("/admin/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT Name, lastName FROM Administrator WHERE username=?");
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
$app->post("/admin/", function() use($app){
	$username= $app->request->post("username");
	$Name= $app->request->post("Name");
	$lastName= $app->request->post("lastName");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO Administrator(username, Name, lastName) VALUES(?,?,?)");
		$dbh->bindParam(1, $username);
		$dbh->bindParam(2, $Name);
		$dbh->bindParam(3,$lastName);
		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"admin added succesfully", "queue"=> $username)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->put("/admin/", function() use($app)
{
	$username = $app->request->put("username");
    $name= $app->request->put('Name');
	$lastName=$app->request->put("lastName");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE Administrator SET Name= ?, lastName = ? WHERE username = ?");
        $dbh->bindParam(1, $name);
		$dbh->bindParam(2, $lastName);
		$dbh->bindParam(3, $username);
	
	
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modifico el admin: ".$username)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});


$app->delete("/admin/:id", function($id) use($app){

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("DELETE FROM Administrator WHERE username = ?");
		$dbh->bindParam(1, $id);
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'mensaje'=> 'se ha borrado con éxito el administrador con el id: '. $id)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}


});








?>