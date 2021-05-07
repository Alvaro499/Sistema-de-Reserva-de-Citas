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
            $insertar = $this->cargarConexion->prepare("INSERT INTO `citas_cliente`(`area_servicio`, `asunto`, `comentario`, `url_archivo`, `fecha`, `hora`, `medio`, `estado_cita`,`Estado_Notificacion`,`idusuarios`) VALUES ('$area','$asunto','$mensaje','$archivo','$fecha','$hora','$medio','0','0','$usuario')");

            $resultado = $insertar->execute();
            return $resultado;

        } catch (PDOException $e) {
           return $e;
        }
    }

    public function admin_citas(){
        try{
            $query = $this->cargarConexion->prepare("SELECT user.cedula, user.nombre, citas.idcitas_cliente, citas.asunto, citas.comentario,citas.fecha, citas.hora, citas.medio, citas.url_archivo, citas.area_servicio FROM citas_cliente AS citas, usuarios AS user WHERE citas.estado_cita=0 AND user.cedula=citas.idusuarios");
            $resultado = $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }
    
    // public function delete_citas($id){
    //     try{
    //         $query = $this->cargarConexion->prepare("DELETE FROM `citas_cliente` WHERE `idcitas_cliente`='$id'");
    //         $resultado = $query->execute();
    //         return $resultado;
    //     }catch(PDOException $e){
    //         echo "Error:" . $e->getMessage();
    //     }
    // }

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
            $query = $this->cargarConexion->prepare("UPDATE `citas_cliente` SET `estado_cita`=1, `Estado_Notificacion`=1  WHERE `idcitas_cliente`= '$id'");
            $resultado = $query->execute();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }
    
    public function actualizarCitaEliminada($id){
        try{
            $query = $this->cargarConexion->prepare("UPDATE `citas_cliente` SET `estado_cita`=2, `Estado_Notificacion`=2  WHERE `idcitas_cliente`= '$id'");
            $resultado = $query->execute();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    /*
        Consulta la información del usuario y la cita por medio de la cédula
    */
    public function get_cliente($ced){
        try{
            $query = $this->cargarConexion->prepare("SELECT user.nombre, user.correo, user.apellido1, citas.area_servicio, citas.fecha, citas.hora, citas.medio FROM citas_cliente AS citas, usuarios AS user WHERE user.cedula='$ced' AND user.cedula=citas.idusuarios");
            $resultado = $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }
    public function get_cliente2($ced){//Para enviar el correo de rechazar cita
        try{
            $query = $this->cargarConexion->prepare("SELECT user.nombre, user.correo, user.apellido1, citas.fecha, citas.hora FROM citas_cliente AS citas, usuarios AS user WHERE user.cedula='$ced' AND user.cedula=citas.idusuarios");
            $resultado = $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    //FCC: Funciones Consulta Calendario: obtener y mostrar las citas a los propios clientes

    public function get_cliente_calendary($ced){
        try {
            $query = $this->cargarConexion->prepare("SELECT citas.area_servicio, citas.fecha, citas.hora, detalles.nombre_empleado FROM citas_cliente AS citas, detalles_cita AS detalles WHERE citas.idusuarios = '$ced' AND citas.estado_cita = 1 AND detalles.idcitas_cliente = citas.idcitas_cliente ");
            $resultado = $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    //FCC: Funciones Consulta Calendario: obtener y mostrar las citas de los clientes a todos los empleados
    public function get_cliente_calendary_employer(){
        try {
            $query = $this->cargarConexion->prepare("SELECT citas.area_servicio, citas.fecha, citas.hora, user.nombre, user.apellido1, user.apellido2, detalles.nombre_empleado FROM citas_cliente AS citas, detalles_cita AS detalles, usuarios AS user WHERE citas.estado_cita = 1 AND citas.idusuarios = user.cedula AND citas.idcitas_cliente  = detalles.idcitas_cliente");
            $resultado = $query->execute();
            $resultado = $query->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    // public function estado_cita($ced){
    //     try {
    //         $query = $this->cargarConexion->prepare("SELECT `estado_cita` FROM `citas_cliente` WHERE `idusuarios` = '$ced' ");
    //         $resultado = $query->execute();
    //         $resultado = $query->fetchAll();
    //     } catch (PDOException $e) {
    //         echo "Error:" . $e->getMessage();
    //     }
    // }

    //FCC...
}
?>