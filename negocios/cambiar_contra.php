<?php

    require("../data/data_crear_contra.php");

    session_start();
    $cedula = $_SESSION["param_cedula"];
    $confirm =  $_POST["confirm"];

    $objeto = new D_Crear_Contra();

    $contra_encrypt = password_hash($confirm, PASSWORD_DEFAULT, ["cost"=>5]);
    $cambio_contra = $objeto->cambiarContra($cedula,$contra_encrypt);

    if ($cambio_contra) {
        
        session_unset();
        session_destroy();
        //header("Location: login/sesion.php");
        echo 0; //exito al cambiar contrasena

    }else{
        echo 1; //fallo al cambiar contrasena
    }




?>