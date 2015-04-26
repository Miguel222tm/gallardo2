
<?php
	require("../includes/header.php");
    require ("../calls/callUser.php");

    $admins= new callUser();

    $todos= $admins->getAdmins();
   
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administradores
                            <small></small>
                        </h1>
                            
                    </div>
                </div>
                <!-- /.row -->
                    <?php 


                    $jsontodos= json_decode($todos, true);
                foreach ($jsontodos as $key => $value) {
                    echo '<form action="verAdmins.php" method="POST">';
                    echo '<div class="panel panel-green"><div class="panel-heading">';
                    echo ' <h3 class="panel-title">'.$value['username'].'</h3> </div><div class="panel-body">';
                    echo 'Nombre: '.$value['Name'].'<br>';
                      echo 'Apellido : '.$value['lastName'].'<br>';
                    echo '</div> ';
                   
                    
                     echo '<input type="hidden" name="username" value="'.$value['username'].'">';
                    echo '<input type="hidden" name="Name" value="'.$value['Name'].'">';

                    echo '<input type="hidden" name="pregunta" value="'.$value['lastName'].'">';

                   

                  
                    echo '<button type="submit" name="btnBorrar" class="btn btn-default">Borrar</button>';

                    echo '</form>';

                    echo '</div>';

                }

                if(isset($_POST['btnBorrar'])){
                    $admins->deleteAdmin($_POST['username']);
                    $admins->deleteUser($_POST['username']);
                    echo '<script> document.location=("verAdmins.php");</script>';

                }

                    ?> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
