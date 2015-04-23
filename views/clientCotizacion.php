
<?php
require("../includes/sesionclient.php");
	require("../includes/headerClient.php");
    require ("../calls/callCotizacion.php");
    require ("../calls/callProducto.php");
    $cotizacion= new callCotizacion();

    $todos= $cotizacion->getCotizacion($_SESSION['cotizacion']);
    $product= new callProducto();

    $totaldinero=0;





?>
    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Cotizacion
                            <small></small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row -->
            <?php

            $jsontodos= json_decode($todos, true);
       

            foreach ($jsontodos as $key => $value) {

                $prod= $product->getProduct($value['idProduct']);
                $jsonProd= json_decode($prod,true);

                
                    echo '<div class="panel panel-green"><div class="panel-heading">';
                    echo ' <h3 class="panel-title">'.$jsonProd['description'].'</h3> </div><div class="panel-body">';
                    echo '';
                    echo 'cantidad: '.$value['cantidadProducto']." unidades <br>";
                    echo 'total individual: '.$value['totalIndividual'].'<br>';
                    echo '</div> ';
                   
                    
                    
                    echo '<input type="hidden" name="idCotizacion" value="'.$_SESSION['cotizacion'].'">';
                     echo '<input type="hidden" name="username" value="'.$value['idProduct'].'">';
                      echo '<input type="hidden" name="date" value="'.$value['date'].'">';
                         echo '<input type="hidden" name="idProduct" value="'.$value['idProduct'].'">';
                            echo '<input type="hidden" name="cantidadProducto" value="'.$value['cantidadProducto'].'">';
                             echo '<input type="hidden" name="totalIndividual" value="'.$value['totalIndividual'].'">';
                    //echo '<button type="submit" name="btnEditar" class="btn btn-info">Editar</button>';
                   // echo '<button type="submit" name="btnBorrar" class="btn btn-default">Borrar</button>';
 

                    echo '</div>';

                    $totaldinero = $totaldinero+$value['totalIndividual'];
            }

                   
                if($totaldinero>100){
            ?>

                 <div class="list-group">   
                 <form action="comprar.php" method="POST">
                            <a  class="list-group-item active"><strong> Costos totales de la cotización </strong></a>
                            <a  class="list-group-item"><strong>Subtotal: $</strong> <?php echo $totaldinero; ?></a>
                            <a  class="list-group-item"><strong>IVA (15%) $</strong> <?php  $iva= $totaldinero*0.15; echo $iva;   ?></a>
                            <a  class="list-group-item"><strong>Costo de envio $</strong> <?php  $envio=100; echo $envio;?></a>
                            <a  class="list-group-item"><strong>Total: $</strong> <?php $t= $totaldinero+$iva+$envio; echo $t; ?></a>
                            <input  type="hidden" name="totalDinero" value="<?php echo $t; ?>" required> </input>
                            <button type="submit" name="btnComprar" class="btn btn-info">Completar pedido.</button>
                            </form>
                        </div>

                        <?php 
                         }?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php 

require("../includes/footer.php");
?>
