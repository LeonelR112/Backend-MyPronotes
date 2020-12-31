<?php

    $response = array(
        "status" => "error",
        "code" => "400",
        "response" => "bad_request"
    );

    $json = json_encode($response);
    http_response_code(400);
    header("Content-Type: application/json");
    print $json;
    

?> 