<?php
require ("../includes/constantes.php");


class callCotizacion{


	public function postCotizacion($idCotizacion, $username, $date, $idProduct, $cantidadProducto, $totalIndividual){



	     $data = array("idCotizacion" => $idCotizacion,"username" => $username,"date" => $date,"idProduct" => $idProduct, "cantidadProducto"=> $cantidadProducto, "totalIndividual"=> $totalIndividual);
        $ch = curl_init($GLOBALS['crudlink']."cotizacion/");
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


	        public function getCotizaciones()
    {
        $ch = curl_init($GLOBALS['crudlink']."cotizacion/");
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

    public function getCotizacion($id){

      $ch = curl_init($GLOBALS['crudlink']."cotizacion/$id");
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
    public function putCotizacion( $idProduct, $descripcion, $supplier, $stock, $price){
       $data = array("idProduct" => $idProduct,"descripcion" => $descripcion,"supplier" => $supplier,"stock" => $stock, "price"=> $price);

              $ch= curl_init($GLOBALS['crudlink']."cotizacion/");
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



        public function deleteCotizacion($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."cotizacion/$id");
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
    }// termina delete encuesta







}



?>