<?php

if(!defined("lol")) die("Acceso denegado");
//////////////////////////////// metodos GET ///////////////////////////////////////////////////////////////

/*  SOLO TESTING */

$app->get("/", function() use($app)  {echo '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=pages/index.html">
<title>SB Admin 2</title>
<script language="javascript">
    window.location.href = "login.html"
</script>
</head>
<body>

</body>
</html>
';
//bjbjhu
});

/*$appbene->get("/login/", function()  use ($appbene) 
{
	try{
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT username, hashedPassword FROM usuario	");
		$dbh->execute();
		$encuesta = $dbh->fetch();
		$connection = null;

		$appbene->response->headers->set("Content-type", "application/json");
		$appbene->response->status(200);
		$appbene->response->body(json_encode($encuesta));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}	

});
*/

















?>


