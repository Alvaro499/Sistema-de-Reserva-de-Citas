<?php 
require("../../data/data_usuarios.php");
require("../../sesion/C_Sesion.php");
require("email.php");

$asunto= $_POST["asunto"];
$mensaje= $_POST["mensaje"];
$archivo= $_FILES["file"]["name"]; //nombre archivo
$ruta = $_FILES["file"]["tmp_name"]; //ruta archivo
// $rutas = array();
$correo_max = new N_EnvioEmail();
$citas = new D_Usuarios();
$sesion = new C_Sesion();
$sesion->inicializar();

$result= $citas->max_correo();

$sebas;

foreach($result as $value){
    $sebas = $correo_max->envioCorreoMax($value["correo"],$asunto,$mensaje,$archivo,$ruta);
}

if($sebas){
    echo 1;
}else{
    echo 0; 
}

?>