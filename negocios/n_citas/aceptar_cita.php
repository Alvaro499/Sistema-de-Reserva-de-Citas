<?php

    require("../../data/data_citas.php");

    $nombre = $_POST["nombre"];
    $presencial = $_POST["presencial"];
    $personas = $_POST["personas"];
    $virtual = $_POST["virtual"];
    $link = $_POST["link"];

    $citas = new D_Citas();
    $aceptar = $citas->aceptarCita($nombre,$presencial,$personas,$virtual,$link);
    $actualizar = $citas->actualizarCita($id);


?>