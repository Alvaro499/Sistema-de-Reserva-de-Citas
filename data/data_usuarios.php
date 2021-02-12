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
                $insertar = $this->cargarConexion->prepare("INSERT INTO `usuarios`(`cedula`, `nombre`, `apellido1`, `apellido2`, `celular`, `celular_opcional`, `correo`, `password`, `pass_temp`) VALUES ('$cedula','$nombre','$apellido1','$apellido2','$celular','$celular_op','$email','$contra','0')");

                $resultado = $insertar->execute();
                return $resultado;

            } catch (PDOException $e) {
                echo "La inserción de usuario falló:" . $e->getMessage();
            }
        }


        public function insertarRolUsuario($rol,$cedrol){

            try {
                $insertarRol = $this->cargarConexion->prepare("INSERT INTO `usuario-rol`(`idroles`, `usuarios_cedula`) VALUES ('$rol','$cedrol')");

                $resultadoRol = $insertarRol->execute();
                return $resultadoRol;
            } catch (PDOException $e) {
                echo "La inserción del rol de usuario falló:" . $e->getMessage();
            }

        }

        public function consultarUsuario($correo, $contra){
            try{
                echo $correo . " ". $contra . "</br>";
                $query = $this->cargarConexion->prepare("SELECT user.nombre, user.pass_temp, ur.idroles FROM usuarios AS user, usuario_rol AS ur WHERE user.correo='$correo' AND user.password=$contra AND user.cedula='12345678' ");

                $query->execute();
                $resultado = $query->fetchAll();
                var_dump($resultado);
                foreach($resultado as $value){
                    echo "Nombre " . $value["user.nombre"] . " Pass_Temporal " . $value["user.pass_temp"] . " rol " . $value["ur.idroles"];
                }
                return $resultado;

            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }

        public function consultarUsuario2($correo, $contra){
            try{
                $query = $this->cargarConexion->prepare("SELECT
                user.nombre AS nombre,
                user.pass_temp AS tipo,
                ur.idroles AS rol
            FROM
                usuarios AS user
            INNER JOIN usuario_rol AS ur
            ON
                user.cedula = ur.usuarios_cedula
            WHERE
               
            user.correo='$correo' AND user.password=$contra");

                $query->execute();
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                var_dump($resultado);
                foreach($resultado as $value){
                    echo "Nombre " . $value["user.nombre"] . " Pass_Temporal " . $value["user.pass_temp"] . " rol " . $value["ur.idroles"];
                }

                return $resultado;

            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }

    }

?>