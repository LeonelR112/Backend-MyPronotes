<?php
    //--JSON completo y validado---

    try{

        $data = array(
            "titulo" => $jsonRecived->body->title,
            "contenido" => $jsonRecived->body->content,
            "creado_en" => $jsonRecived->body->created_at,
            "actualizado_en" => $jsonRecived->body->updated_at,
            "id_user" => $validationToken->id
        );

        $Note = new Note;
        $setCreate = $Note->addNote($data);

        if($setCreate){
            $setResponse = array(
                "status" => "created",
                "response" => array(
                    "id" => $Note->getId(),
                    "title" => $Note->getTitle(),
                    "content" => $Note->getContent(),
                    "created_at" => $Note->getCreated_at(),
                    "updated_at" => $Note->getUpdated_at()
                )
            );

            http_response_code(201);
            header("Content-Type: application/json");
            $json = json_encode($setResponse);
            print $json;

            loger("Se creó una nota nueva: id = " . $Note->getId());
        }
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


?>