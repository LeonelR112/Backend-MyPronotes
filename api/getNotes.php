<?php
    include "../libs/log.php";
    require "../classes/Conexion.php";
    require "../classes/Note.php";
    require_once "../config.php";
    require_once "../libs/validarToken.php";
    header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Allow: GET, POST, OPTIONS, PUT, DELETE");
	$method = $_SERVER['REQUEST_METHOD'];
	if($method == "OPTIONS") {
	    die();
	}

    $headers = apache_request_headers();

    if(!isset($headers['Authorization'])){
        $response = array(
            "status" => "error",
            "response" => "header_authorization_not_exist",
            "code" => "400"
        );
        http_response_code(400);
        header('Content-Type: application/json');
        $json = json_encode($response);
        print $json;
        die();
    }

    $Token = $headers['Authorization']; //recivo el token por header
    $validationToken = validarToken($Token); //validar el token, si es válido devuelve la información del usuario, si es inválido devuelve un false

    if(!$validationToken){
        //token inválido o ha expirado
        $response = array(
            "status" => "Unauthorized",
            "response" => "Token_expired_or_not_valid",
            "code" => "401"
        );
        http_response_code(401);
        header('Content-Type: application/json');
        $json = json_encode($response);
        print $json;
        die();
    }
    else{
        //token válido, se procede a enviar todas las notas del usuario recibido por el TOKEN
        $id_user = $validationToken->id;

        try{
            $Note = new Note;
            $notes = $Note->getNotesByIdUser($id_user);
        
            $responseJSON = json_encode($notes);
            http_response_code(200);
            header('Content-Type: application/json');
            print $responseJSON;
    
        }
        catch(PDOException $e){
            echo "Ha ocurrido un error";
            loger($e->getMessage());
        }
    
    }

    

?>