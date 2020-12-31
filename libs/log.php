<?php

    date_default_timezone_set("America/Argentina/Buenos_Aires");

    function loger($msg){

        $date = new DateTime();
        $format = $date->format('d-m-Y H:i:s');
        $stringMsg = "[" . $format . "]: " . $msg . "\n";

        $fileOpen = fopen('../log.txt','a+');
        fwrite($fileOpen, $stringMsg);
        fclose($fileOpen);
    }

?>