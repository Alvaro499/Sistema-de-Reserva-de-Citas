<?php

    require("../../data/data_citas.php");

    $nombre = $_POST["nombre"];
    $presencial = $_POST["presencial"];
    $personas = $_POST["personas"];
    $virtual = $_POST["virtual"];
    $link = $_POST["link"];
    $id = $_POST["id"];

    $citas = new D_Citas();
    $aceptar = $citas->aceptarCita($nombre,$presencial,$personas,$virtual,$link,$id);
    

    if ($aceptar) {
        $actualizar = $citas->actualizarCita($id);
        if ($acutalizar) {
            echo 1; //la cita fue creada
        }else{
            echo 2; //cita no actualizada
        }
    }else{
        echo 3; //la cita no fue creada
    }

?>