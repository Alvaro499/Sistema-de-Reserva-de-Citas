<?php 

    class C_Sesion{ 

        public function inicializar(){
            session_start();
        }
        public function cargarSesion($nombre, $valor){
            $_SESSION["$nombre"] = $valor;
        }
        public function destruirSesion(){
            session_unset();
            session_destroy();
        }

    }

?>