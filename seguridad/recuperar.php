<?php
	require ("../calls/callRegist.php");
	require ("../calls/callUser.php");
	if (isset($_GET['code'])) {

		$code= $_GET['code'];

		$confirm= new callRegist();

		$infoUser= $confirm->getQueue($code);



		$jsoninfo= json_decode($infoUser,true);

		$username="";
		$hashedPassword="";
		$status="";
		$type="";

		foreach ($jsoninfo as $key => $value) {
			$username=$value['username'];
			$hashedPassword=$value['hashedPassword'];
			$status= $value['status'];
			$type=$value['type'];
		}

		if($status==0){
			echo "<form action='recuperar.php' method='POST' ";
			echo "<label> Correo :  </label>";
			echo '<input type="text" name="username" value="'.$username.'" readonly required><br><br><br>';
			echo 'Nueva password: <input type="password" name="pass"  required> <br>';
			echo 'Repita la password: <input type="password" name="retry"  required><br>';
			echo "<button > Cambiar password </button>";
			echo '</form>';

		}else{
			echo "Este correo ya ha sido activado anteriormente";
		}	





	}

	if (isset($_POST['retry']))  {
		
		$p1=$_POST['pass'];
		$p2 =$_POST['retry'];

		if($p1==$p2){
			$user= new callUser();
			$user->putPass($_POST['username'], $p2);
			 echo "<script type='text/javascript'> alert('password cambiada con exito'); document.location=('../login.html'); </script>";  

		}else{
		echo "su Password no coincide";
		 echo "<script type='text/javascript'> alert('Password no coinciden'); document.location=('recuperar.php'); </script>";  

	}
	}





?>