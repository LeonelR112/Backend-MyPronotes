<?php
//depende de config.php

function validarToken($token){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URINETLIFY);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: " . $token));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);
    $info = curl_getinfo($ch);

    if($info['http_code'] == 200){
        $response = json_decode($json);
        return $response;
    }
    else{
        return false;
    }
}

?>