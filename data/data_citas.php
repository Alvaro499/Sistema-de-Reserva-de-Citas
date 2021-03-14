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

    public function admin_citas(){
        try{
            $query = $this->cargarConexion->prepare("SELECT user.nombre, citas.idcitas_cliente, citas.asunto, citas.comentario,citas.fecha, citas.hora, citas.medio, citas.url_archivo, citas.area_servicio FROM citas_cliente AS citas, usuarios AS user WHERE citas.estado_cita=0 AND user.cedula=citas.idusuarios");
            $resultado = $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }
    
    public function delete_citas($id){
        try{
            $query = $this->cargarConexion->prepare("DELETE FROM `citas_cliente` WHERE `idcitas_cliente`='$id'");
            $resultado = $query->execute();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    public function aceptarCita($nombre, $oficina, $cant_personas, $plataforma, $link, $id){
        try{
            $query = $this->cargarConexion->prepare("INSERT INTO `detalles_cita`(`nombre_empleado`, `ubicacion_presencial`, `cantidad_personas`, `plataforma`, `url_reunion`, `idcitas_cliente`) VALUES ('$nombre','$oficina','$cant_personas','$plataforma','$link','$id')");
            $resultado = $query->execute();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    public function actualizarCita($id){
        try{
            $query = $this->cargarConexion->prepare("UPDATE `citas_cliente` SET `estado_cita`=1 WHERE `idcitas_cliente`= '$id'");
            $resultado = $query->execute();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }
}
?>