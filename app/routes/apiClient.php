<?php

// trae al queue con su code para verificar
$app->get("/client/:id", function($id) use($app)
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT Name, lastName, rfc, address FROM client WHERE username=?");
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
$app->post("/client/", function() use($app){
	$username= $app->request->post("username");
	$Name= $app->request->post("Name");
	$lastName= $app->request->post("lastName");
	$rfc= $app->request->post("rfc");
	$address=$app->request->post("address");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("INSERT INTO client(username, Name, lastName, rfc, address) VALUES(?,?,?,?,?)");
		$dbh->bindParam(1, $username);
		$dbh->bindParam(2, $Name);
		$dbh->bindParam(3,$lastName);
		$dbh->bindParam(4, $rfc);
		$dbh->bindParam(5,$address);

		$dbh->execute();
		$connection = null;

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" =>"client added succesfully", "queue"=> $username)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});


$app->put("/client/", function() use($app)
{
	$username = $app->request->put("username");
    $name= $app->request->put('Name');
		$lastName= $app->request->put("lastName");
	$rfc= $app->request->put("rfc");
	$address=$app->request->put("address");

	try{
		$connection = getConnection();
		$dbh = $connection->prepare("UPDATE client SET name= ?, lastName = ?, rfc=?, address=? WHERE username = ?");
        $dbh->bindParam(1, $name);
		$dbh->bindParam(2, $lastName);
		$dbh->bindParam(3, $rfc);
		$dbh->bindParam(4, $address);
		$dbh->bindParam(5, $username);
	
	
		$dbh->execute();
		$connection = null;
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("status" => "ok", 'msg'=> "se modifico el admin: ".$username)));
	}
	catch(PDOException $e)
	{
		echo "Error: jiprjirijrjirj " . $e->getMessage();
	}
	catch(Exception $c){
		echo "xd";
	}
});









?>