<?php 
require("../../data/data_notificacion.php");

$noti = new D_Noti();

$datos_noti=$noti->get_estado($_SESSION["cedula"]);

?>