<?php

    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    class Conexion{

        private function __construct(){
            //para evitar instancias
        }

        static function Conectar(){

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            $link = new PDO('mysql:host=' . $_ENV['HOST'] . ';dbname=' . $_ENV['DBNAME'] , $_ENV['USERDB'], $_ENV['PWSDB'], $opciones);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            return $link;

        }

    }

?>