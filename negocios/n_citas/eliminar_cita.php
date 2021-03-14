<?php 
    require("../../data/data_citas.php");

    $id = $_POST["id"];

    $delete = new D_Citas();
    $eliminar = $delete->delete_citas($id);

    if ($eliminar) {
        echo 1;
    }else{
        echo 2;
    }
    



?>