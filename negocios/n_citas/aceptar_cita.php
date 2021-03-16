<?php

    require("../../data/data_citas.php");
    require("correo_citas.php");

    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $presencial = $_POST["presencial"];
    $personas = $_POST["personas"];
    $virtual = $_POST["virtual"];
    $link = $_POST["link"];
    $id = $_POST["id"];

    $citas = new D_Citas();
    $correo = new N_Correo_Citas();
    $aceptar = $citas->aceptarCita($nombre,$presencial,$personas,$virtual,$link,$id);
    $datos = $citas->get_cliente($cedula);

    //--------------------------
    $correo_cliente;
    $nombre_cliente;
    $fecha;
    foreach($datos as $value){
        $nombre_cliente=$value["nombre"];
        $correo_cliente=$value["correo"];
        $fecha=$value["fecha"];
    }
    $correo->Cita_Aceptada($nombre_cliente,$correo_cliente,$fecha);
    //----------------------
    if ($aceptar) {
        $actualizar = $citas->actualizarCita($id);
        if ($actualizar) {
            echo 1; //la cita fue creada
        }else{
            echo 2; //cita no actualizada
        }
    }else{
        echo 3; //la cita no fue creada
    }

?>