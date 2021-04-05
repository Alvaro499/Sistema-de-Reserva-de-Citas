<?php

    session_start();
    $parametro_ced = isset($_GET["cedula"]) ? $_GET["cedula"] : null;
		//se trae el parametro con el valor de la cedula enviado por el correo ejecutado por recuperar_contra/php
		
		if($parametro_ced == null){
			header("location: ../login/sesion.php");

		}else{

            $_SESSION["param_cedula"] = $parametro_ced;
            header("location: ../../ui/login/cambiar_contra.php");
        }
        
?>