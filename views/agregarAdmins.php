
<?php
	require("../includes/header.php");
    require("../calls/callRegist.php");
    require '../PHPMailer-master/PHPMailerAutoload.php';
  




?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administradores
                            <small>agregar un nuevo administrador</small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row  todo -->
                <?php  if (!isset($_POST['username'])) {
                    # code...
                ?>
                        <form role="form" action="agregarAdmins.php" method="POST">

                               <div class="form-group">
                                <label>Nombre </label>
                                <input class="form-control" name="Name" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Apellido </label>
                                <input class="form-control" name="lastName" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="username" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                 <input class="form-control" type="password" name="hashedPassword" required>
                            </div>
                             
                            

                            <button type="submit" class="btn btn-default">Crear Admin</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }else{

                            #codigo agregar a tablas

                            $regist= new callRegist();
                            
                            $hashedPassword= sha1($_POST['hashedPassword']);
                            

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
$mail->FromName = 'white db'; 
$mail->From     = "whitedb.noreply@gmail.com";  //sender
$mail->AddAddress($_POST['username']);  //receiver

                            $mail->Subject  = "Registro sitio white DB";
                            $mail->Body     = " Hola estimado administrado, para entrar al sitio son los siguientes datos \n usuario : ". $_POST['username']. "\n password: ".$_POST['hashedPassword']. " \n por favor entrar en la siguiente liga \n  http://aplicaciones.tam.itesm.mx:8080/whitedb/login.html"; 

                             if(!$mail->Send()) {
                                 echo 'Se encontró un error, por favor hacer de nuevo su registro.';
                            //echo 'Mailer error: ' . $mail->ErrorInfo;
                             } else {
                                 $regist->postUser($_POST['username'],$hashedPassword, 1);
                            $regist->postAdmin($_POST['username'], $_POST['Name'],$_POST['lastName']);
                                 echo "<script type='text/javascript'> alert('Administrador creado con éxito'); document.location=('verAdmins.php'); </script>";  

                                }

                           

                            }?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
