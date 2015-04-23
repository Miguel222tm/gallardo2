<?php
	require("../calls/callRegist.php");
	     require '../PHPMailer-master/PHPMailerAutoload.php';
  

	$registro = new callRegist();

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


	// nos sirve el mail, password, code lo crearemos a continuacion y el tipo, ya lo demas es basura para validar
	# code...
	$pass= sha1($_POST['hashedPassword']);
	$type=2;

	$code= generateRandomString();
	

	
	  $mail = new PHPMailer();  
 
$mail->IsSMTP();  // telling the class to use SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "vector.noreply@gmail.com"; // SMTP username
$mail->Password = "vector2015"; // SMTP password 
$mail->FromName = 'Vector'; 
$mail->From     = "vector.noreply@gmail.com";  //sender
$mail->AddAddress($_POST['email']);  //receiver

							$mail->Subject  = "Registro sitio white DB";
							$mail->Body     = " Hola estimado cliente, para completar tu registro tienes que dar click a la siguiente liga -> http://localhost/gallardo/confirmation.php?code=".$code; 

							 if(!$mail->Send()) {
           						 echo 'Se encontró un error, por favor hacer de nuevo su registro.';
            				//echo 'Mailer error: ' . $mail->ErrorInfo;
           					 } else {
            					echo 'Se ha enviado un correo a su mail para confirmar su cuenta.';
            					 $registrar= $registro->validacion($code, $_POST['email'], $_POST['hashedPassword'], $type);
            					 $client= $registro->postCliente($_POST['email'], $_POST['Name'], $_POST['lastName'], $_POST['rfc'], $_POST['address']);
            					}



	$jsonRegist= json_decode($registrar,true);





?>