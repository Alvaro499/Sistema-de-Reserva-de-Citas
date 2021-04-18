<?php

require("../../data/data_perfil.php");
require("../../sesion/C_Sesion.php");

//Variables de sesion: usar cedula
// $sesion = new C_Sesion();
// $sesion->inicializar();

$cedula = $_POST["cedula"];

$funct_perfil = new D_Perfil();

$mostrar = $funct_perfil->mostrarFoto($cedula);

foreach ($mostrar as $value) {
    
    if ($value["img_perfil"] == "usuario.svg") {
        
        echo 3; //Actualmente no tienes una foto de perfil
    }else {
        $eliminar = $funct_perfil->eliminarFoto($cedula);
        if ($eliminar) {
            echo 1; //Foto de perfil eliminada
        }else {
            echo 2; //La foto de perfil no podido ser eliminada
        }
    }
    
}
?>