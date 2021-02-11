<?php

    require("../../db/db_access.php");
    class D_Usuarios{

        private $cargarConexion;
        private $objConexion;

        public function __construct(){

            $this->objConexion = new Conexion();

            $this->cargarConexion = $this->objConexion->conectar();
        }

        public function insertarUsuario($cedula,$nombre,$apellido1,$apellido2,$email,$celular,$celular_op,$contra){

            try {
                $insertar = $this->cargarConexion->prepare("INSERT INTO `usuarios`(`cedula`, `nombre`, `apellido1`, `apellido2`, `celular`, `celular_opcional`, `correo`, `password`, `pass_temp`) VALUES (`$cedula`,`$nombre`,`$apellido1`,`$apellido2`,`$celular`,`$celular_op`,`$email`,`$contra`,`0`)");

                $resultado = $insertar->execute();
                return $resultado;

            } catch (PDOException $e) {
                echo "La inserción de usuario falló:" . $e->getMessage();
            }
        }
    }

?>