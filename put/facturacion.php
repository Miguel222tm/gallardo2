
<?php
	require("../includes/header.php");
    require ("../calls/callVenta.php");
         require '../PHPMailer-master/PHPMailerAutoload.php';

?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Facturación
                            <small>Editar estatus</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../views/Facturacion.php">Facturación</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Editar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                 <!-- /.row -->
                <?php  if (isset($_POST['editStatus'])) {
                    # code...
                       
                                 

                ?>
                        <form role="form" action="facturacion.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $_POST['codigoPedido']; ?>" readonly>
                            <div class="form-group">
                                <label>Id de Pedido</label>
                                <input class="form-control" name="codigoPedido"  value="<?php echo $_POST['codigoPedido']; ?>"required>
                                
                            </div>
                                <div class="form-group">
                                <label>Cantidad</label>
                                <select class="form-control" name="status">
                                    <option value="1">pendiente de pago</option>
                                    <option value="2">procesando envio</option>
                                    <option value="3">Enviando</option>
                                    <option value="4">Entregado</option>

                                </select>
                            </div>
                             
                             <input type="hidden" class="form-control" name="email"  value="<?php echo $_POST['username']; ?>"required>
                                
                          
                            <button type="submit" class="btn btn-default" name="btnCambios">Guardar producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }
                  


                        if(isset($_POST['btnCambios'])){
                           $editStatus= new callVenta();

                           $editStatus->putVenta($_POST['codigoPedido'], $_POST['status'], date('y:m:d'));
           
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
$mail->FromName = 'WhiteDb'; 
$mail->From     = "whitedb.noreply@gmail.com";  //sender
$mail->AddAddress($_POST['email']);  //receiver
$mail->Subject  = "Cambio de estado del pedido sitio white DB";
                            $mail->Body     = " Hola estimado cliente, su pedido  ha cambiado de estado , por favor vea en el sitio la informacion completa "; 

                             if(!$mail->Send()) {
                                 echo 'Se encontró un error, por favor hacer de nuevo su registro.';
                            //echo 'Mailer error: ' . $mail->ErrorInfo;
                             } else {
                                echo 'Se ha enviado un correo a su mail para confirmar su cuenta.';
                                   echo "<script type='text/javascript'> alert('status editado con exito'); document.location=('../views/facturacion.php'); </script>";  

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
