<?php 

require("../../db/db_access.php");
class D_Citas{

    private $cargarConexion;
    private $objConexion;
    private $objSesion;

    public function __construct(){

        $this->objConexion = new Conexion();

        $this->cargarConexion = $this->objConexion->conectar();

    }

    public function insertarCitas($area, $asunto, $mensaje, $fecha, $hora,$medio, $archivo, $usuario){

        try {
            $insertar = $this->cargarConexion->prepare("INSERT INTO `citas_cliente`(`area_servicio`, `asunto`, `comentario`, `url_archivo`, `fecha`, `hora`, `medio`, `estado_cita`,`idusuarios`) VALUES ('$area','$asunto','$mensaje','$archivo','$fecha','$hora','$medio','0','$usuario')");

            $resultado = $insertar->execute();
            return $resultado;

        } catch (PDOException $e) {
           return $e;
        }
    }
}
?>