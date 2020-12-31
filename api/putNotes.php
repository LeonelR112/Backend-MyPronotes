<?php
    //este archivo depende de handlerRequest.php

    $data = array(
        "id" => $idGet,
        "title" => $jsonRecived->body->title,
        "content" => $jsonRecived->body->content,
        "updated_at" => $jsonRecived->body->updated_at
    );

    //finalmente verificar si el id existe:
    $Conexion = Conexion::Conectar();
    $sql= "SELECT * from notes WHERE id = :id";
    $stmt = $Conexion->prepare($sql);
    $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount() < 1){
        //el recurso a actualizar no existe en la base de datos
        $setResponse = array(
            "status" => "error",
            "code" => "400",
            "response" => "resource_not_exist"
        );
        $json = json_encode($setResponse);

        http_response_code(400);
        header("Content-Type: application/json");
        print $json;
    }
    else{
        //el recurso a actualizar existe, se procede a modificar los datos
        try{
            $Note = new Note;
            $Note->modifyNote($data);

            $setResponse = array(
                "status" => "ok",
                "response" => array(
                    "id" => $data['id'],
                    "title" => $data['title'],
                    "content" => $data['content'],
                    "updated_at" => $data['updated_at']
                )
            );
            $json = json_encode($setResponse);
    
            http_response_code(200);
            header("Content-Type: application/json");
            print $json;
            loger("Se modifico una nota: id = " . $data['id']);

        }
        catch(PDOException $e){
            http_response_code(500);
            $response = array(
                "status" => "internal error",
                "response" => "server_error",
                "code" => "500"
            );

            loger($e->getMessage());
            header("Content-Type: application/json");
            $jsonResponse = json_encode($response);
            print $jsonResponse;
        }

    }

?>