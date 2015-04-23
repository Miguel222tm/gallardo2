
<?php
require("../includes/sesionclient.php");
	require("../includes/headerClient.php");
     require ("../calls/callProducto.php");
     require ("../calls/callCotizacion.php");

     $cotizacion= new callCotizacion();
     $todasCotizaciones= $cotizacion->getCotizaciones();


?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Productos
                            <small> </small>
                        </h1>
                     
                    </div>
                </div>
                <!-- /.row -->
<?php 
                  $productos= new callProducto();

                $todos= $productos->getProductos();
                
               
                $jsontodos= json_decode($todos, true);

                foreach ($jsontodos as $key => $value) {
                    if($value['stock']>0){
                    echo '<form action="../put/cotizar.php" method="POST">';
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

                    echo '<button type="submit" name="btnCotizacion" class="btn btn-info">Agregar a Cotización</button>';
                    

                    echo '</form>';

                    echo '</div>';
                }
                }


                 ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
require("../includes/footer.php");
?>
