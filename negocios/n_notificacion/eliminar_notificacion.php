<?php 
require("../../data/data_notificacion.php");
$delete = new D_Noti();
$id = $_POST["id"];
$eliminar = $delete->delete_citas($id);
?>