<?php 
 require("../data/data_usuarios.php");
 require("../sesion/C_Sesion.php");

 $nueva = $_POST["nueva"];
 $actual =  $_POST["actual"];

    $objeto = new D_Usuarios();
    $objSesion = new C_Sesion();
    $objSesion->inicializar(); //Inicializando la sesion 
    $info = $objeto->verificarUsuario($_SESSION["correo"],$actual); //Aqui se confirma la contraseña vieja


    if($info==1){
        $contra2 = password_hash($nueva, PASSWORD_DEFAULT, ["cost"=>5]); //Incrita la contraseña que digite el usuario
        $crear = $objeto->actu_pass_temp($_SESSION["correo"],$contra2); //Aqui se actualiza la contra y el dato binario (0 y 1)     
        if($crear==1){
          echo 0; // contraseña correcta  
        }else{
          echo 5;//Actualizar no funciono
        }
    }else if($info==0){
        echo 1; // No exite la contraseña
    }else if($info==3){
        echo 3; //No exite el usuario
    } 
    else{
        echo 4; // Erro desconocido
    }
    

 
?>