<?php
require("../includes/header.php");
require ("../calls/callProducto.php");


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
                <?php  if (isset($_POST['btnEditar'])) {
                	# code...
                       
                                 

                ?>
   						<form role="form" action="productos.php" method="POST">
                        <input type="text" name="id" value="<?php echo $_POST['idProduct']; ?>" readonly>
                            <div class="form-group">
                                <label>Descripción</label>
                                <input class="form-control" name="description"  value="<?php echo $_POST['description']; ?>"required>
                                
                            </div>
                             <div class="form-group">
                                <label>Provedor</label>
                                <input class="form-control" name="supplier" value="<?php echo $_POST['supplier'];?>" required>
                                
                            </div>
                             <div class="form-group">
                                <label>Cantidad</label>
                                <input class="form-control" type="number" name="stock"  value="<?php echo $_POST['stock'];?>"required>
                                
                            </div>
                              <div class="form-group">
                                <label>Precio</label>
                                <input class="form-control" type="number" name="price"  value="<?php echo $_POST['price'];?>"required>
                                
                            </div>

                            

                            <button type="submit" class="btn btn-default" name="btnCambios">Guardar producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }
                        if (isset($_POST['btnBorrar'])) {
                         
                            $borrar= new callProducto();

                            $borrar->deleteProduct($_POST['idProduct']);
                              echo "<script type='text/javascript'> alert('producto borrado con exito'); document.location=('../views/productos.php'); </script>";  

                        }


                        if(isset($_POST['btnCambios'])){
                            $edit= new callProducto();
                            $edit->putProduct($_POST['id'], $_POST['description'], $_POST['supplier'], $_POST['stock'], $_POST['price']);
                                   echo "<script type='text/javascript'> alert('producto editado con exito'); document.location=('../views/productos.php'); </script>";  



                        }

                        ?>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php


require("../includes/footer.php");
?>


