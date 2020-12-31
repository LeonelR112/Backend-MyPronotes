<?php
    //este archivo depende de handlerRequest.php
    
    //se procede a verificar la existencia del recurso
    $Conexion = Conexion::Conectar();
    $sql = "SELECT * FROM notes WHERE id = :id";
    $stmt = $Conexion->prepare($sql);
    $stmt->bindParam(":id", $idGet, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount() < 1){
        //el recurso no existe
        $setResponse = array(
            "status" => "error",
            "code" => "400",
            "response" => "resource_not_exist"
        );   
        http_response_code(400);
        $json = json_encode($setResponse);
        header("Content-Type: application/json");
        print $json;
    }
    else{
        //el recurso existe, se procede a eliminar
        $Note = new Note;
        $status = $Note->deleteNote($idGet);
        
        if($status){
            //nota eliminada
            try{

                $setResponse = array(
                    "status" => "ok",
                    "response" => "resource_deleted"
                );
                $json = json_encode($setResponse);
                http_response_code(200);
                header("Content-Type: application/json");
                print $json;
                
                loger("Se ha eliminado una nota");
            }
            catch(PDOException $e){
                $setResponse = array(
                    "status" => "error",
                    "code" => "500",
                    "response" => "internal_error"
                );   
                http_response_code(500);
                $json = json_encode($setResponse);
                header("Content-Type: application/json");
                print $json;
                loger($e->getMessage());
            }
        }
        else{
            //algun error surgió
            $setResponse = array(
                "status" => "error",
                "code" => "500",
                "response" => "internal_error"
            );   
            http_response_code(500);
            $json = json_encode($setResponse);
            header("Content-Type: application/json");
            print $json;
        }
    }

?>