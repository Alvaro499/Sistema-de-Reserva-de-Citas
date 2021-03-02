<?php 
 require("../../data/data_usuarios.php");
 require("../../sesion/C_Sesion.php");

 $correo = $_POST["correo"];
 $pass =  $_POST["contra"];

    $objeto = new D_Usuarios();
    $objSesion = new C_Sesion();
    $info = $objeto->consultarUsuario($correo,$pass);

    if($info==0){
        echo 0;
    }else if($info==3){
        echo 3;
    }else if($info==4){
        echo 4;
    } 
    else{


        $objSesion->inicializar();
        foreach($info as $value){
            $objSesion->cargarSesion("cedula", $value["cedula"]);
            $objSesion->cargarSesion("nombre", $value["nombre"]);
            $objSesion->cargarSesion("correo", $value["correo"]);
            $objSesion->cargarSesion("idrol", $value["idroles"]);

            if ($value["pass_temp"] == 0){
                $objeto->actu_pass_temp($correo);
                echo 2; //Direcciona a crear la contraseña por primera vez
            }else{
                echo 1;//Direcciona al inicio del sistema
            }
        }
    }

 
?>