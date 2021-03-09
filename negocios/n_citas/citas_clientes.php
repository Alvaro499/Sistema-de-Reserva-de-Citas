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

$result= $citas->insertarCitas($area, $asunto, $mensaje, $fecha, $hora,$medio, $archivo,$_SESSION["cedula"]);

if($result){
    echo 1;
}else{
    echo 0;
}

?>