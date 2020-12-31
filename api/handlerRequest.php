<?php
    include "../libs/log.php";
    require "../classes/Conexion.php";
    require "../classes/Note.php";
    include "../libs/validateJson.php";
    require_once "../config.php";
    require_once "../libs/validarToken.php";
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");

    //recibo todo los datos:
    $headers = apache_request_headers();
    $Token = $headers['Authorization']; //recibo el token por header
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

    $jsonRecived = json_decode(file_get_contents("php://input"));

    if(empty($jsonRecived)){
        //si el archivo json no fue enviado
        $response = array(
            "status" => "error",
            "response" => "JSON_not_shipped",
            "code" => "400"
        );
        http_response_code(400);
        header('Content-Type: application/json');
        $json = json_encode($response);
        print $json;
        die();
    }

    if(isset($jsonRecived->body->id)){
        $idGet = $jsonRecived->body->id;
        ####################################################
        ## Si el pedido es PUT o DELETE y viene con un id ##
        ####################################################
        if(is_numeric($idGet)){
            if(!isset($jsonRecived->method)){
                //no existe la propiedad 'method'
                $response = array(
                    "status" => "error",
                    "response" => "method_not_exist",
                    "code" => "400"
                );
                http_response_code(400);
                header('Content-Type: application/json');
                $json = json_encode($response);
                print $json;
                die();
            }

            //el id es un número
            switch ($jsonRecived->method) {
                case 'put':
                    
                    if(validateKeysJsonPut($jsonRecived)){
                        //claves válidas

                        if(validateJsonPut($jsonRecived)){
                            //datos correctos - se procede a modificar
                            require_once "putNotes.php";
                            
                        }
                        else{
                            //datos inválidos
                            $response = array(
                                "status" => "error",
                                "response" => "wrong_values",
                                "code" => "400"
                            );
                            http_response_code(400);
                            header('Content-Type: application/json');
                            $json = json_encode($response);
                            print $json;
                        }
                    }
                    else{
                        //faltan claves
                        $response = array(
                            "status" => "error",
                            "response" => "empty_values_or_wrong_values",
                            "code" => "400"
                        );
                        http_response_code(400);
                        header('Content-Type: application/json');
                        $json = json_encode($response);
                        print $json;
                    }

                break;

                case 'delete':
                    
                    require_once "deleteNotes.php";

                break;
                
                default:

                    $response = array(
                        "status" => "error",
                        "response" => "wrong_method",
                        "code" => "400"
                    );
                    http_response_code(400);
                    header('Content-Type: application/json');
                    $json = json_encode($response);
                    print $json;

                break;
            }

        }
        else{
            //no lo es
            $response = array(
                "status" => "error",
                "response" => "empty_id_value",
                "code" => "400"
            );
            http_response_code(400);
            header('Content-Type: application/json');
            $json = json_encode($response);
            print $json;
        }

    }
    else{
        ####################################
        ## Si el pedido es solamente POST ##
        ####################################

        $jsonRecived = json_decode(file_get_contents("php://input"));
        
        if(empty($jsonRecived)){
            $response = array(
                "status" => "error",
                "response" => "JSON_not_shipped",
                "code" => "400"
            );
            http_response_code(400);
            header('Content-Type: application/json');
            $json = json_encode($response);
            print $json;

        }
        else{
            //validar existencia de campos
            if(validateKeysJson($jsonRecived)){

                //validar campos
                if(validateJsonPost($jsonRecived)){
                    
                    //se crea la nota
                    require_once "postNotes.php";

                }
                else{
                    //valores incorrectos
                    $response = array(
                        "status" => "error",
                        "response" => "wrong_values",
                        "code" => "400"
                    );
                    http_response_code(400);
                    header('Content-Type: application/json');
                    $json = json_encode($response);
                    print $json;
                }

            }
            else{
                //valores erroneos o faltantes
                $response = array(
                    "status" => "error",
                    "response" => "empty_values_or_wrong_values",
                    "code" => "400"
                );
                http_response_code(400);
                header('Content-Type: application/json');
                $json = json_encode($response);
                print $json;
            }

        }

    }

?>