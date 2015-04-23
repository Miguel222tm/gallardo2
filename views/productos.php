
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
                            Productos
                            <small>Ver/Editar/Borrar</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <?php 

                $productos= new callProducto();

                $todos= $productos->getProductos();

               
                $jsontodos= json_decode($todos, true);

                foreach ($jsontodos as $key => $value) {
                    echo '<form action="../put/productos.php" method="POST">';
                    echo '<div class="panel panel-red"><div class="panel-heading">';
                    echo ' <h3 class="panel-title">'.$value['description'].'</h3> </div><div class="panel-body">';
                    echo '<strong>Provedor: </strong> '.$value['supplier'].'<br>';
                    echo '<strong>Cantidad:  </strong>'.$value['stock'].' unidades <br>';
                    echo '<strong> Precio: </strong> $'.$value['price'] .'<br> </div> ';
                    
                    
                    echo '<input type="hidden" name="idProduct" value="'.$value['idProduct'].'">';

                    echo '<input type="hidden" name="description" value="'.$value['description'].'">';

                    echo '<input type="hidden" name="supplier" value="'.$value['supplier'].'">';

                    echo '<input type="hidden" name="stock" value="'.$value['stock'].'">';

                    echo '<input type="hidden" name="price" value="'.$value['price'].'">';


                    echo '<button type="submit" name="btnEditar" class="btn btn-info">Editar</button>';
                    echo '<button type="submit" name="btnBorrar" class="btn btn-warning">Borrar</button>';

                    echo '</form>';

                    echo '</div>';

                }


                 ?>

                       


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
