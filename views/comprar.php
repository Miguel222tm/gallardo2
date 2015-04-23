
<?php
require("../includes/sesionclient.php");
	require("../includes/headerClient.php");
    require ("../calls/callVenta.php");
    require ("../calls/callProducto.php");
        require ("../calls/callCotizacion.php");

          require '../PHPMailer-master/PHPMailerAutoload.php';


    $stockProductos= new callProducto();

    $cotizacion= new callCotizacion();



    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    /*
    Banco   Sitio   Información de las Cuentas
Banamex     Cuenta 558 / 7459363
Bancomer        Convenio CIE 0688509
HSBC        Recepción automatizada de pagos (RAP) Transacción 5503 Clave 7608
Santander       Convenio pago referenciado 1056
Banorte     Emisora 27731
    */

}
    $venta= new callVenta();


?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comprar
                            <small> Pedido completado.</small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->

                 
                <?php
                    if (isset($_POST['btnComprar'])) {

                        $totaldinero= $_POST['totalDinero'];
                        $idCotizacion= $_SESSION['cotizacion'];
                        $username= $_SESSION['user'];
                        $codigoPedido= generateRandomString();

                  
                        $todasCotizaciones= $cotizacion->getCotizacion($_SESSION['cotizacion']);

                        $jsonTodasCotizaciones= json_decode($todasCotizaciones,true);
                       // echo $todasCotizaciones;

                        foreach ($jsonTodasCotizaciones as $key => $value) {
                                echo "id Cotizacion: ".$value['idCotizacion']."<br>";
                                echo "id Prodcto: ".$value['idProduct']."<br>";
                                echo "Cantidad: ".$value['cantidadProducto']."<br>";
                                 $producto= $stockProductos->getProduct($value['idProduct']);
                                 $jsonproducto= json_decode($producto,true);
                                    // vamos a modificar la cantidad de stock
                                 $updateStock= $jsonproducto['stock']-$value['cantidadProducto'];
                                 echo "cantidad restante".$updateStock."<br><br>"; 

                                 if($jsonproducto['stock']>=$value['cantidadProducto']){
                                 $stockProductos->putStock($value['idProduct'],$updateStock);
                             }else{
                                echo "<script type='text/javascript'> alert('el pedido con el id:".$idCotizacion." no puede procesar porque la cantidad de unidades que solicitaste del producto: (".$jsonproducto['description'].")es mayor al del almacen ');  </script>"; 
                             }

                        }

                        //[{"idCotizacion":"FHR8xR8QOo","username":"dgallardoc@outlook.com","date":"2015-04-23","idProduct":"OmBJ8Q","cantidadProducto":"6","totalIndividual":"7200"}]
                           $venta->postVenta($codigoPedido,$idCotizacion, $username, $totaldinero, 1,date('Y-m-d'));

                        #modificar cantidades de productos disponibles en stock en base a este pedido





                        #renovamos variable cotizacion
                        $_SESSION['cotizacion']=generateRandomString();
                          

$mail = new PHPMailer();  
 
$mail->IsSMTP();  // telling the class to use SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "whitedb.noreply@gmail.com"; // SMTP username
$mail->Password = "whitedb2015"; // SMTP password 
$mail->FromName = 'whitedb.noreply@gmail.com'; 
$mail->From     = "whitedb.noreply@gmail.com";  //sender
$mail->AddAddress($_SESSION['user']);  //receiver

                            $mail->Subject  = "Registro de pedido";
                            $mail->Body     = " Hola estimado cliente,\n tu pedido tiene el siguiente id:".$codigoPedido."  , \n su ficha de pago la podra encontrar en el apartado de pedidos \n Saludos cordiales, White DB inc."; 

                             if(!$mail->Send()) {
                                 echo 'Se encontró un error, por favor hacer de nuevo su registro.';
                            //echo 'Mailer error: ' . $mail->ErrorInfo;
                             } else {
                                echo 'Se ha enviado un correo a su mail para confirmar su cuenta.';
                                
                                } 

echo "<script type='text/javascript'> alert('pedido realizado con exito'); document.location=('comprar.php'); </script>"; 
                      /* public function postVenta($codigoPedido, $idCotizacion, $username, $totalDinero, $status, $date){


                        echo ' <div class="panel-body">';
                        echo '<div class="list-group">';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.date('Y-m-d').'</span>';
                        echo ' <i class="fa fa-fw fa-calendar"></i> Fecha de inicio del pedido
                                    </a>';

                      
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$codigoPedido.'</span>';
                        echo ' <i class="fa fa-fw fa-file"></i> Numero de Folio: 
                                    </a>';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$username.'</span>';
                        echo ' <i class="fa fa-fw fa-user"></i> Usuario: 
                                    </a>';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$idCotizacion.'</span>';
                        echo ' <i class="fa fa-fw fa-check"></i> Numero de Cotización: 
                                    </a>';
                        echo '<a class="list-group-item">';
                        echo '<span class="badge">'.$totaldinero.'</span>';
                        echo ' <i class="fa fa-fw fa-money"></i> Total a pagar: 
                                    </a>';*/
                    }else{
                        $pedidos= $venta->getVenta($_SESSION['user']);
                       $jsonpedidos= json_decode($pedidos, true);
                       foreach ($jsonpedidos as $key => $value) {
                        
                        
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
                                <div class="text-right">
                                       <a href="ficha.html" >Ficha de pago</a></div>
                            </div>
                        </div>
                    </div>';



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
