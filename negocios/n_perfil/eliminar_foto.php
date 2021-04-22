<?php

require("../../data/data_perfil.php");
require("../../sesion/C_Sesion.php");

//Variables de sesion: usar cedula
$sesion = new C_Sesion();
$sesion->inicializar();

$cedula = $_POST["cedula"];

$funct_perfil = new D_Perfil();

$mostrar = $funct_perfil->mostrarFoto($cedula);

foreach ($mostrar as $value) {
    
    if ($value["img_perfil"] == "usuario.svg") {
        
        echo 4; //Actualmente no tienes una foto de perfil
    }else {
        $eliminar = $funct_perfil->eliminarFoto($cedula);
        if ($eliminar) {
            echo 5; //Foto de perfil eliminada

            //Cuando la foto sea acutualizada compararla con la variable de sesion de la foto de perfil
            $foto = $funct_perfil->mostrarFoto($_SESSION["cedula"]);

            foreach ($foto as $value) {
                $nom_foto = $value["img_perfil"];
            }
            if ($nom_foto != $_SESSION["img_perfil"]) {
            
                $_SESSION["img_perfil"] = $nom_foto;
            }

        }else {
            echo 6; //La foto de perfil no podido ser eliminada
        }
    }
    
}
?>