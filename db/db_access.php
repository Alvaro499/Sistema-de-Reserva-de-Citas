<?php

    class Conexion{

        private $server = "localhost";
        private $user = "root";
        private $pass = "";
        private $dbname = "srcg";


        public function conectar(){

            try {
                
                $conect = new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->user,$this->pass);

                $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $conect;

            } catch (PDOException $e) {
                echo "Conexión falló:" . $e->getMessage();
            }

        }
    }

?>