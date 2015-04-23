<?php
require ("../includes/constantes.php");

class crudLogin{

     public function loginUsuario($username, $hashedPassword){

         $data = array("username" => $username, "hashedPassword" => $hashedPassword);
        $ch = curl_init($GLOBALS['crudlink']."login/");
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
            
          return($response);
        }
    }




}// termina crud Usuario


?>