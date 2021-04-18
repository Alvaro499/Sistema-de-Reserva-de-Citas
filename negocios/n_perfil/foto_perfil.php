<?php

require("../../data/data_perfil.php");
require("../../sesion/C_Sesion.php");

$archivo = $_FILES["agregar_foto"]["name"];//nombre archivo
$ruta_archivo = $_FILES["agregar_foto"]["tmp_name"];//ruta del archivo

//Variables de sesion: usar cedula
$sesion = new C_Sesion();
$sesion->inicializar();

$funct_perfil = new D_Perfil();

function foto_perfil($nom_extension, $ruta){

    if (!empty($nom_extension)) {

        if(is_uploaded_file($ruta)){
    
            $destino = "../../assets/fotos_perfil/"; //carpeta donde se guadaran las fotos
            $union = $destino . $nom_extension;

            if (move_uploaded_file($ruta, $union)) {
                //echo "Exito al subir la foto";
                return true;
            }else{
                //echo "Error al subir la foto";
                return false;
            }
            
        }
            
    }else{
       // echo "Seleccione una imagen para colocar como foto de perfil en esta cuenta";
    }

}

$select_foto = foto_perfil($archivo,$ruta_archivo);

//Validar la funcion para subir la imagen
if ($select_foto) {

    $subir_foto = $funct_perfil->actualizarFoto($archivo,$_SESSION["cedula"]);

    if ($subir_foto) {
        echo 1; //la foto de perfil ha sido actualizada con exito
    }else{
        echo 2; //No se ha podido actualizar la foto de perfil
    }
    
}else{
    echo 3; //La foto seleccionado no ha sido guardad
}

?>