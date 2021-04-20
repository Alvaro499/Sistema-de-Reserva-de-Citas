<?php

    require("../../db/db_access.php");
    class D_Usuarios{

        private $cargarConexion;
        private $objConexion;
        private $objSesion;

        public function __construct(){

            $this->objConexion = new Conexion();

            $this->cargarConexion = $this->objConexion->conectar();

            //$this->objSesion = new C_Sesion();


        }

        public function insertarUsuario($cedula,$nombre,$apellido1,$apellido2,$email,$celular,$celular_op,$contra){

            try {
                $insertar = $this->cargarConexion->prepare("INSERT INTO `usuarios`(`cedula`, `nombre`, `apellido1`, `apellido2`, `celular`, `celular_opcional`, `correo`, `password`, `pass_temp`,`img_perfil`) VALUES ('$cedula','$nombre','$apellido1','$apellido2','$celular','$celular_op','$email','$contra','0','usuario.svg')");

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
             //   echo $correo /*. " ". $contra */. "</br>";
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
                    
                    //seleccionar la info del usuario para luego usarlas en las variables de sesion
                    $query = $this->cargarConexion->prepare("SELECT user.nombre, user.correo, user.pass_temp, user.cedula, ur.idroles, user.img_perfil FROM usuarios AS user, usuario_rol AS ur WHERE user.correo='$correo' AND user.cedula=ur.usuarios_cedula ");

                    $query->execute();
                    $resultado = $query->fetchAll();

                    return $resultado;
                }else if($verificar==0){
                    return 0;// Contraseña incorrecta
                }else{
                    return 3;//No existe el usuario
                }
            }catch(PDOException $e){
                return 4; //Error desconocido
            }
        }
        public function actu_pass_temp($correo, $nueva){
            try{
                $act = $this->cargarConexion->prepare("UPDATE `usuarios` SET `pass_temp`=1,`password`='$nueva'  WHERE correo='$correo'");
                $resultado = $act->execute(); 
                return $resultado;
            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }
        public function max_correo(){
            try{
                $max = $this->cargarConexion->prepare("SELECT user.nombre, user.correo, user.cedula FROM usuarios AS user, usuario_rol AS ur WHERE ur.idroles =3 AND user.cedula=ur.usuarios_cedula");
                $resultado = $max->execute();
                $resultado = $max->fetchAll();
                return $resultado;
            }catch(PDOException $e){
                echo "Error:" . $e->getMessage();
            }
        }

    }//Cierre de D_Usuarios

?>