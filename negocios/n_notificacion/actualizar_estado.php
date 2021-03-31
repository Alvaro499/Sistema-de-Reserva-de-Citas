<?php 
require("../../data/data_notificacion.php");

$notifi = new D_Noti();
$id = $_POST["id"];
$notifi->actualizar_EstadoCita($id);
?>