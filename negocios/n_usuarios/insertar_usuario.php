<?php

    require("../../data/data_usuarios.php");

    if(!empty($_POST["cedula"]) && !empty($_POST["nombre_usuario"]) && !empty($_POST["apell1"]) && !empty($_POST["apell2"]) && !empty($_POST["email"]) && !empty($_POST["cel_1"]) && !empty($_POST["cel_2"]) && !empty($_REQUEST["rol"])){

        echo "Exito <br>";

        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre_usuario"];
        $apellido1 = $_POST["apell1"];
        $apellido2 = $_POST["apell2"];
        $email = $_POST["email"];
        $celular = $_POST["cel_1"];
        $celular_op = $_POST["cel_2"];
        $rol = $_REQUEST["rol"];

        $contra = "123";

        $usuarios = new D_Usuarios();
        $insertarUsuario = $usuarios->insertarUsuario($cedula,$nombre,$apellido1,$apellido2,$email,$celular,$celular_op,$contra);
        $insertarRol = $usuarios->insertarRolUsuario($rol,$cedula);
        
        if($insertarUsuario && $insertarRol){

            echo "Inserción exitosa en la tabla Usuarios y rol-usuarios <br>";
            


        }else{
            echo "Error en la inserción <br>";
        }

    }else{
        echo "Fallo";
    }
?>