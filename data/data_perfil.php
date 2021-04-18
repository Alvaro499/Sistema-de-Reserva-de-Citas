<?php
    // require("../../db/db_access.php");
    require_once("../../db/db_access.php");

    class D_Perfil{

        private $cargarConexion;
        private $objConexion;
        private $objSesion;

        public function __construct(){
            $this->objConexion = new Conexion();
            $this->cargarConexion = $this->objConexion->conectar();
        }

        public function infoPerfil($cedula){
            try{
                $solicitar = $this->cargarConexion->prepare("SELECT `cedula`, `nombre`, `apellido1`, `apellido2`, `celular`, `celular_opcional`, `correo` FROM `usuarios` WHERE `cedula` ='$cedula'");
                $info = $solicitar->execute();
                $info = $solicitar->fetchAll();
                return $info;
            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
            
        }

        // public function fotoPerfil($foto,$cedula){
        //     try {
        //         $actualizar = $this->cargarConexion->prepare("UPDATE `usuarios` SET `img_perfil` = $foto WHERE `cedula` = '$cedula'");



        //     } catch (PDOException $e) {
        //         echo "Error:" . $e->getMessage();
        //     }
        // }

        public function mostrarFoto($cedula){
            try {
                $seleccionar = $this->cargarConexion->prepare("SELECT `img_perfil` FROM `usuarios` WHERE `cedula` = '$cedula'");
                $nombre_extension = $seleccionar->execute();
                $nombre_extension = $seleccionar->fetchAll();
                return $nombre_extension;

            } catch (PDOException $e) {
                echo "Error:" . $e->getMessage();
            }
        }

        //Cambiar la foto actual
        public function actualizarFoto($nom_extension,$cedula){
            try {
                $actualizar = $this->cargarConexion->prepare("UPDATE `usuarios` SET `img_perfil`='$nom_extension' WHERE `cedula` = '$cedula'");
                $info = $actualizar->execute();
                return $info;
                
            } catch (PDOException $e) {
                echo "Error:" . $e->getMessage();
            }
        }

        public function eliminarFoto($cedula){
            try {
                $actualizar = $this->cargarConexion->prepare("UPDATE `usuarios` SET `img_perfil`='usuario.svg' WHERE `cedula` = '$cedula'");
                $info = $actualizar->execute();
                return $info;
                
            } catch (PDOException $e) {
                echo "Error:" . $e->getMessage();
            }
        }
    }

?>