
<?php

	require("../includes/header.php");
     require "../calls/callChat.php";

    $chat= new callChat();
?>


        <div id="page-wrapper">

            <div class="container-fluid">


            <?php   
                    if (!isset($_POST['btnEnviar'])) {
                        # code...
                    
   

    }
    ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chat
                            <small>xd</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


                <?php
                    if (isset($_POST['btnBorrar'])) {
                        $chat->deleteChat($_POST['idChat']);

                         echo "<script>document.location=('adminChat.php'); </script>";   

                        # code...
                    }


                       if (isset($_POST['btnEntrar']) ) {
                             $idChat= $_POST['idChat'];
    $username= $_SESSION['user'];
    $status=true;
    $tipoChat=false;
    $tipoUsuario=1;
    $chat->crearChat($idChat, $username, $status, $tipoChat, $tipoUsuario);

    $_SESSION['chatRoom']=$idChat; 




                                ?>
                                     <!-- /.row -->
                <div id="cerrar"></div>
                        <form role="form" action="actionChat.php" method="POST">
                        
                      <div class="form-group">
                                <label>Usuarios</label>
                                <textarea id="usuarios" class="form-control" rows="2" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label>Text area</label>
                                <textarea id="chat" class="form-control" rows="15" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <input class="form-control" type="text" name="mensaje"  required>
                                
                            </div>

                            
                            <input type="text" name="idChat" value="<?php echo $_SESSION['chatRoom']; ?>">
                            <button type="submit" class="btn btn-default" name="btnEnviar">Enviar</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


            <?php
                       }



                            if ( isset($_POST['btnEnviar'])) {
                                 $_SESSION['chatRoom']=$_POST['idChat'];
                                 $idChat=$_SESSION['chatRoom']; 
                                 $username= $_SESSION['user'];
                                 $mensaje=$_POST['mensaje'];
                                 $fecha=date('g:i:s');

                            $chat->postMensaje($idChat, $username, $mensaje, $fecha) ;
                           ?>
                                 <div id="cerrar"></div>
                        <form role="form" action="actionChat.php" method="POST">
                        
                      <div class="form-group">
                                <label>Usuarios</label>
                                <textarea id="usuarios" class="form-control" rows="2" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label>Text area</label>
                                <textarea id="chat" class="form-control" rows="15" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mensaje</label>
                                <input class="form-control" type="text" name="mensaje"  required>
                                
                            </div>

                            
                            <input type="text" name="idChat" value="<?php echo $_SESSION['chatRoom']; ?>">
                            <button type="submit" class="btn btn-default" name="btnEnviar">Enviar</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                            }
                    
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
