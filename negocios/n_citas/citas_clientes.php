<?php 
require("../../data/data_citas.php");
require("../../sesion/C_Sesion.php");

$area= $_REQUEST["servicio"];
$asunto= $_POST["asunto_ct"];
$mensaje= $_POST["mensaje_ct"];
$archivo= $_FILES["file"]["name"];
$fecha= $_POST["fecha_ct"];
$hora= $_POST["hora_ct"];
$medio= $_REQUEST["medio_ct"];

$citas = new D_Citas();
$sesion = new C_Sesion();
$sesion->inicializar();

if(!empty($archivo)){
    subirImagen($archivo);
}
$result= $citas->insertarCitas($area, $asunto, $mensaje, $fecha, $hora,$medio, $archivo,$_SESSION["cedula"]);

if($result){
    echo 1;
}else{
    echo 0;
}

function subirImagen($funcionImagen){
    $gt = $_FILES["file"]["tmp_name"];
    if (is_uploaded_file($gt)) {
        $ruta = "../../assets/archivos/";
        $upload = $ruta . $funcionImagen;
        if (move_uploaded_file($gt, $upload)) {
        }else{
            echo 3;
        }
    }else{
        echo 4;
    }
}

?>