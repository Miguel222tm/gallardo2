<?php
require ("../includes/constantes.php");


class callChat{


	public function crearChat($idChat, $username, $status, $tipoChat, $tipoUsuario){

        /*$idChat= $app->request->post("idChat");
    $username= $app->request->post("username");
    $status= $app->request->post("status");
    $tipoChat= $app->request->post("tipoChat");
    $tipoUsuario=$app->request->post("tipoUsuario");
*/

         $data = array("idChat" => $idChat,"username" => $username,"status" => $status,"tipoChat" => $tipoChat, "tipoUsuario"=> $tipoUsuario);
        $ch = curl_init($GLOBALS['crudlink']."chat/");
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

    public function postMensaje($idChat, $username, $mensaje, $fecha){

        /*  $idChat= $app->request->post("idChat");
    $username= $app->request->post("username");
    $mensaje= $app->request->post("mensaje");
    $fecha= $app->request->post("fecha");

*/

         $data = array("idChat" => $idChat,"username" => $username,"mensaje" => $mensaje,"fecha" => $fecha);
        $ch = curl_init($GLOBALS['crudlink']."mensajes/");
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


	        public function getChats()
    {
        $ch = curl_init($GLOBALS['crudlink']."chat/");
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

    
       public function getMensajes($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."mensajes/$id");
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




    public function getChat($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."chat/$id");
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



      ///////////////////////////////////   $idChat = $app->request->put("idChat");

    //$status=$app->request->put("status");//////////////////////////////////
    public function putStatusChat( $idChat, $status){
       $data = array("idChat" => $idChat,"status" => $status);

              $ch= curl_init($GLOBALS['crudlink']."chat/");
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

    }//

     



        public function deleteChat($id)
    {
        $ch = curl_init($GLOBALS['crudlink']."chat/$id");
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