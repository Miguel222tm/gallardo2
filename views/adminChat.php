
<?php
	require("../includes/header.php");
    require "../calls/callChat.php";


    $chats= new callChat();

    $todosChats = $chats->getChats();


?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Chats
                            <small>chats disponibles </small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <?php
                $json= json_decode($todosChats,true);

                foreach ($json as $key => $value) {
                    # code...
                    echo '<form action="actionChat.php" method="POST" >';
                   echo '<div class="col-sm-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">';

                            echo '<h3 class="panel-title">ID chat: '.$value['idChat'].'</h3>
                            </div>
                            <div class="panel-body">';
                                echo'  <button type="submit" name="btnEntrar" class="btn btn-default">Entrar</button>
                            <button type="submit" name="btnBorrar" class="btn btn-default">Borrar</button>';
                            echo ' </div>
                        </div>
                        
                    </div>';
                    echo '<input type="hidden" name="idChat" value="'.$value['idChat'].'">';
                    echo '</form>';

                        }   

                 ?>
                 

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
