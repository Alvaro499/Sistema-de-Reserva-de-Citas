<?php 
    require("../../data/data_citas.php");
    require("correo_citas.php");


    $id = $_POST["id"];
    $cedula = $_POST["cedula"];



    $correo = new N_Correo_Citas();
    $delete = new D_Citas();
    $datos_usuario = $delete->get_cliente2($cedula);
    $nombre_cliente;
    $apellido;
    $correo_cliente;
    $fecha;
    $hora;
    foreach($datos_usuario as $value){
        $nombre_cliente = $value["nombre"];
        $apellido = $value["apellido1"];
        $correo_cliente = $value["correo"];
        $fecha = $value["fecha"];
        $hora = $value["hora"];
    }
    $rechazar = $correo->Cita_Rechazada($nombre_cliente,$apellido,$correo_cliente,$fecha,$hora);
    if ($rechazar) {    
        //$eliminar = $delete->delete_citas($id);
        $eliminar = $delete->actualizarCitaEliminada($id);
        if($eliminar){
            echo 1;
        }
    }else{
        echo 2;
    }
    



?>