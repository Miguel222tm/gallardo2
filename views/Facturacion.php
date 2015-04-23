
<?php
//require("../includes/sesionAdmin.php");
	require("../includes/header.php");
    require ("../calls/callVenta.php");

    $ventas= new callVenta();

    $todasVentas= $ventas->getVentas();


    /*
      $estado="";
                        if($value['status']==1){
                            $estado="Pendiente de pago";
                        }
                         if($value['status']==2){
                            $estado="Procesando envio";
                        } if($value['status']==3){
                            $estado="Enviando";
                        }
                         if($value['status']==4){
                            $estado="Entregado";
                        }
    */
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Facturación
                            <small>Pedidos</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                   $json= json_decode($todasVentas,true);

                   foreach ($json as $key => $value) {
                    echo '<form action="../put/facturacion.php" method="POST" >';


                        echo ' <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Información de pedido</h3>
                            </div>';


                            echo ' <div class="panel-body">';
                        echo '<div class="list-group">';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$value['date'].'</span>';
                        echo ' <i class="fa fa-fw fa-calendar"></i> Fecha de inicio del pedido
                                    </a>';

                      
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$value['codigoPedido'].'</span>';
                        echo ' <i class="fa fa-fw fa-file"></i> Numero de Folio: 
                                    </a>';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$value['username'].'</span>';
                        echo ' <i class="fa fa-fw fa-user"></i> Usuario: 
                                    </a>';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$value['idCotizacion'].'</span>';
                        echo ' <i class="fa fa-fw fa-check"></i> Numero de Cotización: 
                                    </a>';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge"> $'.$value['totalDinero'].'</span>';
                        echo ' <i class="fa fa-fw fa-money"></i> Total a pagar: 
                                    </a>';

                        echo '<a class="list-group-item">';
                        $estado="";
                        if($value['status']==1){
                            $estado="Pendiente de pago";
                        }
                         if($value['status']==2){
                            $estado="Procesando envio";
                        } if($value['status']==3){
                            $estado="Enviando";
                        }
                         if($value['status']==4){
                            $estado="Entregado";
                        }
                        echo '<span class="badge">'.$estado.'</span>';
                        echo ' <i class="fa fa-fw fa-truck"></i> Estatus del pedido: 
                                    </a>';

                            echo '</div>
                                <div class="text-right">';
                                       
echo '<input type="hidden" name="codigoPedido" value='.$value['codigoPedido'].'>   </input>';
                    echo '<input type="hidden" name="status" value='.$value['status'].'>   </input>';
                  echo '<input type="hidden" name="username" value='.$value['username'].'>   </input>';
                    
                   echo ' <button type="submit" class="btn btn-default" name="editStatus">Modificar Estado del Pedido</button>';
                                       echo '</div>
                            </div>
                        </div>
                    </div>';

                    
                           
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
