<?php
    session_start(); //detectar las sesiones ya iniciadas
    session_unset(); //remover la sesion, mas no destruirla
    session_destroy() //destruir la sesion
    header("Location: login/sesion.php");
?>