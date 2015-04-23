
<?php
	//Reanuda la sesión
	session_start();
	//Verifica la sesión
	if($_SESSION["autentica"] != "whiteDBClient"){
		//Si la sesión no existe se redirecciona al inicio de sesión
		session_destroy();
		header("Location: ../seguridad/login.php");
	} else {
		//Si la sesión existe, pero no es de tipo Admin 1, se redirecciona al index.php
		// index.php redireccionará a la pantalla que corresponda al tipo de usuario
		if ($_SESSION["tipo"] != "1") {
			header("Location: ../seguridad/login.php");
		}
	}
?>
