<?php
 //require("../includes/sesionAdmin.php");
 session_start();
	require("../includes/header.php");
    require( "../calls/callUser.php");


        $admin = new callUser();
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Perfil
                            <small>Datos personales</small>
                        </h1>
                        <?php  
                    

                        $datos= $admin->getAdmin($_SESSION['user']);

                        $json= json_decode($datos, true);

                     
                        
                       

                        ?>

                         <form role="form" action="perfil.php" method="POST">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="username" value="<?php  
                        echo $_SESSION['user'];
                        ?>"readonly>
                                
                            </div>
                             <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="Name"  value="<?php  echo $json['Name']; ?>"required>
                                
                            </div>
                             <div class="form-group">
                                <label>lastName</label>
                                <input class="form-control"  name="lastName" value="<?php  echo $json['lastName']; ?>" required>
                                
                            </div>

                           
                            

                            <button type="submit"  name="btn" class="btn btn-default">Actualizar informacion</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php 

                        if(isset($_POST['btn'])){

                            $admin->putAdmin($_SESSION['user'], $_POST['Name'], $_POST['lastName']);

                             echo "<script type='text/javascript'> alert('perfil actualizado'); document.location=('perfil.php'); </script>";   



                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
