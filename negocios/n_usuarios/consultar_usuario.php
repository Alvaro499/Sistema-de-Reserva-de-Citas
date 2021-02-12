<?php 
 require("../../data/data_usuarios.php");

 $correo = $_POST["correo"];
 $pass =  $_POST["pass"];

 if(!empty($correo) && !empty($pass)){

    $objeto = new D_Usuarios();
    $info = $objeto->consultarUsuario($correo,$pass);

    foreach($info as $value){
        echo "Nombre " . $value["nombre"] . " Pass_Temporal " . $value["tipo"] . " rol " . $value["rol"];
    }
    

 }else{
     echo "Fallo Inicio de Sesión";
 }
?>