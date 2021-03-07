<?php 
require("../../data/data_citas.php");
require("../../sesion/C_Sesion.php");

$area= $_REQUEST["area"];
$asunto= $_POST["asunto"];
$mensaje= $_POST["mensaje"];
$archivo=null; //$_POST["q"];
$fecha= $_POST["fecha"];
$hora= $_POST["hora"];
$medio= $_REQUEST["medio"];

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