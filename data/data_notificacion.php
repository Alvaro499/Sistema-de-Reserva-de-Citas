<?php 

require("../../db/db_access.php");

 class D_Noti{
    
    private $cargarConexion;
    private $objConexion;
    private $objSesion;

    public function __construct(){

        $this->objConexion = new Conexion();

        $this->cargarConexion = $this->objConexion->conectar();
    }

    public function get_estado(){
        try{
        $query= $this->cargarConexion->prepare("SELECT `idcitas_cliente`,`area_servicio`,`Estado_Notificacion` FROM `citas_cliente` WHERE `Estado_Notificacion` !=3");
        $query->execute();
        $resultado = $query->fetchAll();
        return $resultado;
        }catch(PDOException $e){
            echo "Error:" . $e->getMessage();
        }
    }

    public function actualizar_EstadoCita($id){
        try{
            $query = $this->cargarConexion->prepare("UPDATE `citas_cliente` SET `Estado_Notificacion`=3  WHERE `idcitas_cliente`= '$id'");
            $resultado = $query->execute();
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
 }
?>