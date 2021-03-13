<?php 

require("../../data/data_citas.php");

class N_Admin_Citas 
{

public function get_citas(){
    $citas = new D_Citas();

    $datos = $citas->admin_citas();

    return $datos;
}

}
?>