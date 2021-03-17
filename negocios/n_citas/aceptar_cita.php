<?php

    require("../../data/data_citas.php");
    require("correo_citas.php");

    $cedula = $_POST["cedula"];
    $nombre_empleado = $_POST["nombre"];
    $presencial = $_POST["presencial"];
    $personas = $_POST["personas"];
    $virtual = $_POST["virtual"];
    $link = $_POST["link"];
    $id = $_POST["id"];

    $citas = new D_Citas();
    $correo = new N_Correo_Citas();
    $aceptar = $citas->aceptarCita($nombre_empleado,$presencial,$personas,$virtual,$link,$id);
    $datos = $citas->get_cliente($cedula);

    //--------------------------
    $nombre_cliente;
    $apellido;
    $correo_cliente;
    $area;
    $fecha;
    $hora;
    $medio;
    foreach($datos as $value){
        $nombre_cliente = $value["nombre"];
        $apellido = $value["apellido1"];
        $correo_cliente = $value["correo"];
        $area = $value["area_servicio"];
        $fecha = $value["fecha"];
        $hora = $value["hora"];
        $medio = $value["medio"];

    }
    $correo->Cita_Aceptada($nombre_cliente,$apellido,$correo_cliente,$area,$fecha,$hora,$medio,$nombre_empleado,$virtual,$link,$presencial,$personas);
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