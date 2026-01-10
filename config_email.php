<?php
/**
 * Configuración de Email
 * Este archivo centraliza la configuración de correo para facilitar 
 * el cambio entre entorno local y producción (InfinityFree)
 */

class EmailConfig {
    
    public static function getConfig() {
        // Detectar si estamos en local o producción
        $isLocal = ($_SERVER['HTTP_HOST'] == 'localhost' || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);
        
        if ($isLocal) {
            // ===== CONFIGURACIÓN LOCAL (XAMPP + Gmail) =====
            return [
                'host' => 'smtp.gmail.com',
                'username' => 'sistemareservas.cg@gmail.com',
                'password' => 'srcg12345',
                'port' => 587,
                'encryption' => PHPMailer::ENCRYPTION_STARTTLS,
                'from_email' => 'sistemareservas.cg@gmail.com',
                'from_name' => 'SRCG'
            ];
        } else {
            // ===== CONFIGURACIÓN INFINITYFREE (Producción) =====
            // NOTA: Por ahora usa Gmail también en producción
            return [
                'host' => 'smtp.gmail.com',
                'username' => 'sistemareservas.cg@gmail.com',
                'password' => 'srcg12345',
                'port' => 587,
                'encryption' => PHPMailer::ENCRYPTION_STARTTLS,
                'from_email' => 'sistemareservas.cg@gmail.com',
                'from_name' => 'SRCG'
            ];
        }
    }
}
?>
