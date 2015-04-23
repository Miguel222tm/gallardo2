<?php
require ("../includes/constantes.php");


class callProducto{


	public function postProducto($idProduct, $descripcion, $supplier, $stock, $price){

		/*$idProduct= $app->request->post("idProduct");
	$descripcion= $app->request->post("descripcion");
	$supplier= $app->request->post("supplier");
	$stock= $app->request->post("stock");
	$price=$app->request->post("price");*/

	     $data = array("idProduct" => $idProduct,"descripcion" => $descripcion,"supplier" => $supplier,"stock" => $stock, "price"=> $price);
        $ch = curl_init($GLOBALS['crudlink']."product/");
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


	        public function getProductos()
    {
        $ch = curl_init($GLOBALS['crudlink']."product/");
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

    public function getProduct($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."product/$id");
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
    public function putProduct( $idProduct, $descripcion, $supplier, $stock, $price){
       $data = array("idProduct" => $idProduct,"descripcion" => $descripcion,"supplier" => $supplier,"stock" => $stock, "price"=> $price);

              $ch= curl_init($GLOBALS['crudlink']."product/");
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

          /////////////////////////////////////////////////////////////////////
    public function putStock( $idProduct, $stock){
       $data = array("idProduct" => $idProduct,"stock" => $stock);

              $ch= curl_init($GLOBALS['crudlink']."product/stock/");
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
    }// termina delete encuesta







}



?>