<?php 
 require("../../data/data_usuarios.php");

 $correo = $_POST["correo"];
 $pass =  $_POST["contra"];

    $objeto = new D_Usuarios();
    $info = $objeto->consultarUsuario($correo,$pass);

    if($info==0){
        echo 0;
    }else if($info==3){
        echo 3;
    }else if($info==4){
        echo 4;
    } 
    else{

        foreach($info as $value){
        
            if ($value["pass_temp"] == 0){
                //$objeto->actu_pass_temp($correo);
                echo 2; //Direcciona a crear la contraseña por primera vez
            }else{
                echo 1;//Direcciona al inicio del sistema
            }
        }
    }

 
?>