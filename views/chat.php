<?php
require("../includes/sesionclient.php");
require("../includes/headerClient.php");
require ("../calls/callChat.php");
   
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


    $chat= new callChat();
   
       
?>

 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    <?php   
                    if (!isset($_POST['btnEnviar'])) {
                        # code...
                    
    $idChat= generateRandomString();
    $username= $_SESSION['user'];
    $status=true;
    $tipoChat=false;
    $tipoUsuario=1;
    $chat->crearChat($idChat, $username, $status, $tipoChat, $tipoUsuario);

    $_SESSION['chatRoom']=$idChat; 

    }
    

    ?>
                        <h1 class="page-header">
                            Chat  
                            <small></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <div id="cerrar"></div>
   						<form role="form" action="chat.php" method="POST">
                        
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

                            
                            <input type="hidden" name="idChat" value="<?php echo $_SESSION['chatRoom']; ?>">
                            <button type="submit" class="btn btn-default" name="btnEnviar">Enviar</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                            if ( isset($_POST['btnEnviar'])) {
                                 $_SESSION['chatRoom']=$_POST['idChat'];
                                 $idChat=$_SESSION['chatRoom']; 
                                 $username= $_SESSION['user'];
                                 $mensaje=$_POST['mensaje'];
                                 $fecha=date('g:i:s');

                            $chat->postMensaje($idChat, $username, $mensaje, $fecha) ;
                            }
                        ?>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php


require("../includes/footer.php");
?>


