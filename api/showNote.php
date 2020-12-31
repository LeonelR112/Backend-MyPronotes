<?php

    include "../libs/log.php";
    require "../classes/Conexion.php";
    require "../classes/Note.php";
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }

    try{
        $id = $_GET['id'];
        $Note = new Note;
        $getNote = $Note->showNote($id);
        

        if(!$getNote){
            $response = array(
                "status" => "error",
                "code" => "400",
                "response" => "id_not_exist"
            );

            $responseJson = json_encode($response);
            http_response_code(400);
            header('Content-Type: application/json');
            print $responseJson;
            
        }
        else{
            $json = json_encode($getNote);

            http_response_code(200);
            header('Content-Type: application/json');
            print $json;
        }


    }
    catch(PDOException $e){
        echo "Ha ocurrido un error interno.";
        loger($e->getMessage());
    }

?>