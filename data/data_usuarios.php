<?php

    require("../../db/db_access.php");
    // require("../ui/include.php");
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
                return true;

            } catch (PDOException $e) {
               return false;
            }
        }


        public function insertarRolUsuario($rol,$cedrol){

            try {
                $insertarRol = $this->cargarConexion->prepare("INSERT INTO `usuario_rol`(`idroles`, `usuarios_cedula`) VALUES ('$rol','$cedrol')");

                $resultadoRol = $insertarRol->execute();
                return $resultadoRol;
            } catch (PDOException $e) {
                return false;
            }

        }

        public function VerificarUsuario($correo, $contra){
            try{
                echo $correo /*. " ". $contra */. "</br>";
                $query = $this->cargarConexion->prepare("SELECT `cedula`, `password` FROM usuarios WHERE correo='$correo'");

                $query->execute();
                $resultado = $query->fetchAll();
                
                if(count($resultado)>0){
                    $pass;
                foreach($resultado as $value){
                    $pass = $value["password"];
                }
               // $pass = password_hash($pass, PASSWORD_DEFAULT,['cost'=> 5]);
                    if(password_verify($contra, $pass)){
                        return 1; //La contraseña es correcta
                    }else{
                        return 0; //La contraseña es incorecta
                    }
    
                }else{
                    return 3; //No existe el usuario
                }
            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }
        
        public function consultarUsuario($correo, $contra){
            try{
                $verificar=$this->VerificarUsuario($correo, $contra);
                if($verificar==1){
                    //echo $correo . " ". $contra . "</br>";
                    $query = $this->cargarConexion->prepare("SELECT user.nombre, user.pass_temp, ur.idroles FROM usuarios AS user, usuario_rol AS ur WHERE user.correo='$correo' AND user.cedula=ur.usuarios_cedula ");

                    $query->execute();
                    $resultado = $query->fetchAll();
                
                   /* foreach($resultado as $value){
                        echo "Nombre " . $value["nombre"] . " Pass_Temporal " . $value["pass_temp"] . " rol " . $value["idroles"];
                    }*/
                    return $resultado;
                }else if($verificar==0){
                    return 0;
                }else{
                    return 3;
                }
            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }
        public function actu_pass_temp($correo){
            try{
                $act = $this->cargarConexion->prepare("UPDATE `usuarios` SET `pass_temp`=1 WHERE correo='$correo'");
                $resultado = $act->execute(); 
                return $resultado;
            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }

    }//Cierre de D_Usuarios

?>