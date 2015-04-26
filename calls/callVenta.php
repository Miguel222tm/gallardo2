<?php
require ("../includes/constantes.php");


class callVenta{


	public function postVenta($codigoPedido, $idCotizacion, $username, $totalDinero, $status, $date){


	     $data = array("codigoPedido" => $codigoPedido,"idCotizacion" => $idCotizacion,"username" => $username,"totalDinero" => $totalDinero, "status"=> $status, "date"=>$date);
        $ch = curl_init($GLOBALS['crudlink']."venta/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
            
          var_dump($response);
        }

	}


	        public function getVentas()
    {
        $ch = curl_init($GLOBALS['crudlink']."venta/");
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array("USER:".$_SESSION['user'],"PASS:".$_SESSION['pass']));        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
            return($response);
        }
    }

    public function getVenta($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."venta/$id");
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array("USER:".$_SESSION['user'],"PASS:".$_SESSION['pass']));        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
            return($response);
        }
    }



      /////////////////////////////////////////////////////////////////////
    public function putVenta( $codigoPedido, $status, $updateDate){
       $data = array("codigoPedido" => $codigoPedido,"status" => $status,"updateDate" => $updateDate);

              $ch= curl_init($GLOBALS['crudlink']."venta/");
       //curl_setopt($ch, CURLOPT_HTTPHEADER, array("USER:".$_SESSION['user'],"PASS:".$_SESSION['pass']));

       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
            var_dump($response);
        }

    }// termina postear Encuesta



        public function deleteProduct($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."product/$id");
       // curl_setopt($ch, CURLOPT_HTTPHEADER, array("USER:".$_SESSION['user'],"PASS:".$_SESSION['pass']));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $response = curl_exec($ch);
        curl_close($ch);
        if(!$response) 
        {
            return false;
        }
        else
        {
           
            var_dump($response);
        }
    }// termina delete product







}



?>