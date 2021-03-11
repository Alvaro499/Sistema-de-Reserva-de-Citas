<?php 
require("../../data/data_usuarios.php");
require("../../sesion/C_Sesion.php");
require("email.php");

$asunto= $_POST["asunto"];
$mensaje= $_POST["mensaje"];
$archivo= $_FILES["file"]["name"];
$ruta= $_FILES["file"]["tmp_name"];
$correo_max = new N_EnvioEmail();
$citas = new D_Usuarios();
$sesion = new C_Sesion();
$sesion->inicializar();

$result= $citas->max_correo();

// if(!empty($archivo)){
//     subirImagen($archivo);
// }
$sebas;

foreach($result as $value){
    $sebas = $correo_max->envioCorreoMax($value["correo"],$asunto,$mensaje,$archivo,$ruta);
}

if($sebas){
    echo 1;
}else{
    echo 0; 
}

// function subirImagen($funcionImagen){
//     $gt = $_FILES["file"]["tmp_name"];
//     if (is_uploaded_file($gt)) {
//         $ruta = "../../assets/archivos/";
//         $upload = $ruta . $funcionImagen;
//         if (move_uploaded_file($gt, $upload)) {
//         }else{
//             echo 3;
//         }
//     }else{
//         echo 4;
//     }
// }

?>