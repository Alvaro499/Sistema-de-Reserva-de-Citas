<?php

    require("../../data/data_usuarios.php");

    if(!empty($_POST["cedula"]) && !empty($_POST["nombre_usuario"]) && !empty($_POST["apell1"]) && !empty($_POST["apell2"]) && !empty($_POST["email"]) && !empty($_POST["cel_1"]) && !empty($_POST["cel_2"])){

        echo "Exito";

        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre_usuario"];
        $apellido1 = $_POST["apell1"];
        $apellido2 = $_POST["apell2"];
        $email = $_POST["email"];
        $celular = $_POST["cel_1"];
        $celular_op = $_POST["cel_2"];

        $contra = "123";

        $usuarios = new D_Usuarios();
        $insertar = $usuarios->insertarUsuario($cedula,$nombre,$apellido1,$apellido2,$email,$celular,$celular_op,$contra);

        

    }else{
        echo "Fallo";
    }
?>