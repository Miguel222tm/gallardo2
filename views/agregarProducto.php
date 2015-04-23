<?php
require("../includes/header.php");
require ("../calls/callProducto.php");

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
                <?php  if (!isset($_POST['description'])) {
                	# code...
                ?>
   						<form role="form" action="agregarProducto.php" method="POST">

                            <div class="form-group">
                                <label>Descripción</label>
                                <input class="form-control" name="description" required>
                                
                            </div>
                             <div class="form-group">
                                <label>Provedor</label>
                                <input class="form-control" name="supplier" required>
                                
                            </div>
                             <div class="form-group">
                                <label>Cantidad</label>
                                <input class="form-control" type="number" name="stock" required>
                                
                            </div>
                              <div class="form-group">
                                <label>Precio</label>
                                <input class="form-control" type="number" name="price" required>
                                
                            </div>

                            

                            <button type="submit" class="btn btn-default">Guardar producto</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>


                        <?php
                        }else{

                        	#codigo agregar a tablas

                        	$producto= new callProducto();
                        	$idProduct= generateRandomString();

                        	$producto->postProducto($idProduct, $_POST['description'], $_POST['supplier'], $_POST['stock'], $_POST['price']);
                        		  echo "<script type='text/javascript'> alert('producto creado con éxito'); document.location=('agregarProducto.php'); </script>";	


                        	}?>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php


require("../includes/footer.php");
?>


