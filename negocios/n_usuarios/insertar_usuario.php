<?php

    require("../../data/data_usuarios.php");

    if(!empty($_POST["cedula"]) && !empty($_POST["nombre_usuario"]) && !empty($_POST["apell1"]) && !empty($_POST["apell2"]) && !empty($_POST["email"]) && !empty($_POST["cel_1"]) && !empty($_REQUEST["rol"])){

        echo "Exito <br>";

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
        echo $contra;
        $contra2 = password_hash($contra, PASSWORD_DEFAULT, ["cost"=>5]);
        $insertarUsuario = $usuarios->insertarUsuario($cedula,$nombre,$apellido1,$apellido2,$email,$celular,$celular_op,$contra2);
        $insertarRol = $usuarios->insertarRolUsuario($rol,$cedula);
        
        if($insertarUsuario && $insertarRol){

            echo "Inserción exitosa en la tabla Usuarios y rol-usuarios <br>";
            
        }else{
            echo "Error en la inserción <br>";
        }

    }else{
        echo "Fallo";
    }


    function generar_contra(){
        $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789?!¡%$#¿';
        $longpalabra=4;
        for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
            $x = rand(0,$n);
            $pass.= $caracteres[$x];
        }
        return $pass;

    }
?>