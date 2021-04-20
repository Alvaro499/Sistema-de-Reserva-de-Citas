<?php 
 require("../../data/data_usuarios.php");
 require("../../sesion/C_Sesion.php");

 $correo = $_POST["correo"];
 $pass =  $_POST["contra"];

    $objeto = new D_Usuarios();
    $objSesion = new C_Sesion();
    $info = $objeto->consultarUsuario($correo,$pass);

    if($info==0){
        echo 0; // contraseña incorrecta
    }else if($info==3){
        echo 3; //no existe el usuario
    }else if($info==4){
        echo 4; //error desconocido
    } 
    else{

        //si el correo y contrasena son correctos, la funcion devuelve el arreglo con la info del usuario
        $objSesion->inicializar();
        foreach($info as $value){
            $objSesion->cargarSesion("cedula", $value["cedula"]);
            $objSesion->cargarSesion("nombre", $value["nombre"]);
            $objSesion->cargarSesion("correo", $value["correo"]);
            $objSesion->cargarSesion("idrol", $value["idroles"]);
            $objSesion->cargarSesion("img_perfil", $value["img_perfil"]);

            if ($value["pass_temp"] == 0){
                echo 2; //Direcciona a crear la contraseña por primera vez
            }else{
                echo 1;//Direcciona al inicio del sistema
            }
        }
    }

 
?>