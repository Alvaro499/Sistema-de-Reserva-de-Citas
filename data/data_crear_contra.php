<?php

require("../db/db_access.php");

class D_Crear_Contra{

    private $cargarConexion;
    private $objConexion;
    private $objSesion;

    public function __construct(){

        $this->objConexion = new Conexion();

        $this->cargarConexion = $this->objConexion->conectar();

    }

    public function VerificarUsuario($correo, $contra){
        try{
         
            $query = $this->cargarConexion->prepare("SELECT `cedula`, `password` FROM usuarios WHERE correo='$correo'");

            $query->execute();
            $resultado = $query->fetchAll();
            
            if(count($resultado)>0){
                $pass;
            foreach($resultado as $value){
                $pass = $value["password"];
            }
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
    
    public function actu_pass_temp($correo, $nueva){
        try{
            $act = $this->cargarConexion->prepare("UPDATE `usuarios` SET `pass_temp`=1,`password`='$nueva'  WHERE correo='$correo'");
            $resultado = $act->execute(); 
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    public function recuperarContra($correo){

        try{
            $act = $this->cargarConexion->prepare("SELECT `cedula` ,`correo` FROM `usuarios` WHERE correo='$correo'");
            $resultado = $act->execute(); 
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }

    }
    
    public function getcedula($correo){

        try{
            $act = $this->cargarConexion->prepare("SELECT `cedula` FROM `usuarios` WHERE correo='$correo'");
            $resultado = $act->execute(); 
            $resultado = $act->fetchAll();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }

    }

}//Cierre de D_Crear_Contra
?>