<?php

    require("../../data/data_usuarios.php");
    require("../email.php");


        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre_usuario"];
        $apellido1 = $_POST["apell1"];
        $apellido2 = $_POST["apell2"];
        $email = $_POST["email"];
        $celular = $_POST["cel_1"];
        $celular_op = $_POST["cel_2"];
        $rol = $_REQUEST["rol"];

        $usuarios = new D_Usuarios();
        $contra = generar_contra();
        
        $contra2 = password_hash($contra, PASSWORD_DEFAULT, ["cost"=>5]);
        $insertarUsuario = $usuarios->insertarUsuario($cedula,$nombre,$apellido1,$apellido2,$email,$celular,$celular_op,$contra2);
        
        if($insertarUsuario){
            $insertarRol = $usuarios->insertarRolUsuario($rol,$cedula);
        }

        if($insertarUsuario && $insertarRol){

            $contraTemporal = new N_EnvioEmail();

            $contraTemporal->envioContra($email,$contra,$nombre);
        }

        if($insertarUsuario && $insertarRol && $contraTemporal){
            echo 1; //Exito
        }else if($insertarUsuario!= true){
            echo 2; //Error en el insertar usuario
        }else if($insertarRol!= true){
            echo 3; //Error en el insertar usuario-rol
        }else if($contraTemporal!= true){
            echo 4; //Error en el envio de correo
        }else{
            echo 5; //Error desconocido
        }


    function generar_contra(){
        $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $longpalabra=4;
        for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
            $x = rand(0,$n);
            $pass.= $caracteres[$x];
        }
        return $pass;

    }
?>