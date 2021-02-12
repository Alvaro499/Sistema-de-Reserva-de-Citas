<?php 
 require("../../data/data_usuarios.php");

 $correo = $_POST["correo"];
 $pass =  $_POST["pass"];

 if(!empty($correo) && !empty($pass)){

    $objeto = new D_Usuarios();
    $info = $objeto->consultarUsuario($correo,$pass);

    if($info==0){
        echo "Usuario Incorrecto";
    }else if($info==3){
        echo "Usuario Incorrecto, No existe correo";
    }else{

    
        foreach($info as $value){
            echo "Nombre " . $value["nombre"] . " Pass_Temporal " . $value["pass_temp"];
        }
    }

 }else{
     echo "Fallo Inicio de Sesión";
 }
?>