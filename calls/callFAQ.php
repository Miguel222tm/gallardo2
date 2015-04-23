<?php
require ("../includes/constantes.php");


class callFAQ{


	public function postFAQ($idFAQ, $pregunta, $respuesta){

	

	     $data = array("idFAQ" => $idFAQ,"pregunta" => $pregunta,"respuesta" => $respuesta);
        $ch = curl_init($GLOBALS['crudlink']."faq/");
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


	        public function getFaqs()
    {
        $ch = curl_init($GLOBALS['crudlink']."faq/");
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
    public function getFaq($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."faq/$id");
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
    public function putFAQ($idFAQ, $pregunta, $respuesta){
      $data = array("idFAQ" => $idFAQ,"pregunta" => $pregunta,"respuesta" => $respuesta);
              $ch= curl_init($GLOBALS['crudlink']."faq/");
       
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



        public function deleteFAQ($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."faq/$id");
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