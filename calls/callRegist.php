<?php
require ("../includes/constantes.php");


class callRegist{


public function validacion($code, $email, $hashedPassword, $type){

         $data = array("code" => $code,"email" => $email,"hashedPassword" => $hashedPassword,"type" => $type);
        $ch = curl_init($GLOBALS['crudlink']."queue/");
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
            
          return ($response);
        }
    }

    public function postCliente($username, $name, $lastname, $rfc, $address){
/*
	$username= $app->request->post("username");
	$Name= $app->request->post("Name");
	$lastName= $app->request->post("lastName");
	$rfc= $app->request->post("rfc");
	$address=$app->request->post("address");*/

         $data = array("username" => $username,"Name" => $name,"lastName" => $lastname,"rfc" => $rfc, "address"=> $address);
        $ch = curl_init($GLOBALS['crudlink']."client/");
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


        public function getQueue($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."queue/$id");
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

 public function postUser($username, $hashedPassword, $type){
/*
        $username= $app->request->post("username");
    $pass= $app->request->post("hashedPassword");
    
    $type= $app->request->post("type");

    */

         $data = array("username" => $username,"hashedPassword" => $hashedPassword,"type" => $type);
        $ch = curl_init($GLOBALS['crudlink']."users/");
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
     public function postAdmin($username, $Name, $lastName){
/*
        

    */

         $data = array("username" => $username,"Name" => $Name,"lastName" => $lastName);
        $ch = curl_init($GLOBALS['crudlink']."admin/");
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

      public function putValidacion($code, $status){
       $data = array('code' => $code, 'status' => $status);
       
       $ch= curl_init($GLOBALS['crudlink']."queue/");
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
    }














}

?>