<?php
require("../includes/sesionclient.php");
require("../includes/headerClient.php");
require ("../calls/callCotizacion.php");

    
    $cotizar= new callCotizacion();
?>
 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Agregar producto
                            <small>ingrese la siguiente información</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <?php  if (isset($_POST['btnCotizacion'])) {
                	# code...
                       
                                 
                   // echo date('Y-m-d H:i:s');
                ?>
   						<form role="form" action="cotizar.php" method="POST">
                        <input type="text" name="id" value="<?php echo $_SESSION['cotizacion']; ?>" readonly>
                            <div class="form-group">
                                <label>Id Producto</label>
                                <input class="form-control" name="idProduct"  value="<?php echo $_POST['idProduct']; ?>"required readonly>
                                
                            </div>
                              <div class="form-group">
                                <label>Descripción</label>
                                <input class="form-control" name="description"  value="<?php echo $_POST['description']; ?>"required readonly>
                                
                            </div>
                             <div class="form-group">
                                <label>Provedor</label>
                                <input class="form-control" name="supplier" value="<?php echo $_POST['supplier'];?>" required readonly>
                                
                            </div>
                           
                            <div class="form-group">
                                <label>Cantidad</label>
                                <select class="form-control" name="stock">
                                    <?php  
                                    for ($i=1; $i<=$_POST['stock'] ; $i++) { 
                                        echo '<option>'.$i.' </option>';
                                    }
                                    ?>
                                </select>
                            </div>
                              <div class="form-group">
                                <label>Precio</label>
                                <input class="form-control" type="number" name="price"  value="<?php echo $_POST['price'];?>"required readonly>
                                
                            </div>


                            <button type="submit" class="btn btn-default" name="btnCambios">Agregar producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }
                        if(isset($_POST['btnCambios'])){
                            

                            $cantidadIndividual= $_POST['stock']*$_POST['price'];
                            echo $cantidadIndividual;
                                #postCotizacion($idCotizacion, $username, $date, $idProduct, $cantidadProducto, $totalIndividual){


                           $cotizar->postCotizacion($_POST['id'], $_SESSION['user'], date('Y-m-d H:i:s'), $_POST['idProduct'], $_POST['stock'], $cantidadIndividual);
                                   echo "<script type='text/javascript'> alert(' producto agregado a cotizacion con exito'); document.location=('../views/clientCotizacion.php'); </script>";  



                        }

                        ?>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php


require("../includes/footer.php");
?>


