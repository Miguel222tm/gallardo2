
<?php
require("../includes/sesionclient.php");
	require("../includes/headerClient.php");
    require("../calls/callUser.php");

    $admin= new callUser();
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Perfil
                            <small></small>
                        </h1>
                     
                    </div>
                </div>
                <!-- /.row -->

                 <?php  
                    

                        $datos= $admin->getClient($_SESSION['user']);

                        $json= json_decode($datos, true);

                     
                       

                        ?>

                         <form role="form" action="clientPerfil.php" method="POST">

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

                              <div class="form-group">
                                <label>RFC</label>
                                <input class="form-control"  name="rfc" value="<?php  echo $json['rfc']; ?>" required>
                                
                            </div>

                              <div class="form-group">
                                <label>Address</label>
                                <input class="form-control"  name="address" value="<?php  echo $json['address']; ?>" required>
                                
                            </div>

                           
                            

                            <button type="submit"  name="btn" class="btn btn-default">Actualizar información</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php 

                        if(isset($_POST['btn'])){

                            $xd=$admin->pcliente($_SESSION['user'], $_POST['Name'], $_POST['lastName'], $_POST['rfc'], $_POST['address']);
                            echo $xd;
                             echo "<script type='text/javascript'> alert('perfil actualizado'); document.location=('clientPerfil.php'); </script>";   



                        }

                        ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
