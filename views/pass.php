
<?php
	
   require ("../calls/callUser.php");
    require("../calls/callRegist.php");
      require '../PHPMailer-master/PHPMailerAutoload.php';
   $user= new callUser();

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

?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Recuperar Password
                            <small></small>
                        </h1>
                        <form action="pass.php" method="POST">
                        <label>Correo:</label>
                        <input type="text"  name="username" >

                        <button name="btnRecuperar">Recuperar password</button>
                                </form>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                if (isset($_POST['btnRecuperar'])) {
                
                $usuario=$user->getClient($_POST['username']);
                    $json= json_decode($usuario,true);

                    if ($json['username']!="") {
                       

                        $code= generateRandomString();
$mail = new PHPMailer();  
 
$mail->IsSMTP();  // telling the class to use SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "whitedb.noreply@gmail.com"; // SMTP username
$mail->Password = "whitedb2015"; // SMTP password 
$mail->FromName = 'White DB'; 
$mail->From     = "whitedb.noreply@gmail.com";  //sender
$mail->AddAddress($_POST['username']);  //receiver

                            $mail->Subject  = "Registro sitio white DB";
                            $mail->Body     = " Hola estimado cliente, para completar tu cambio de password tienes que dar click a la siguiente liga -> http:/aplicaciones.tam.itesm.mx:8080/whitedb/seguridad/recuperar.php?code=".$code; 

                             if(!$mail->Send()) {
                                 echo 'Se encontró un error, por favor hacer de nuevo su registro.';
                            //echo 'Mailer error: ' . $mail->ErrorInfo;
                             } else {
                                echo 'Se ha enviado un correo a su mail para confirmar su cuenta.';
                                 $registrar= $registro->validacion($code, $_POST['username'], "2",1);
                                
                                }



                    }else{
                        echo "lo sentimos, usted no es un cliente de nuestro sistema.";
                    }


                }

                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
