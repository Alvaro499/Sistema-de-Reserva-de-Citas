<?php

    require("../../assets/PHPMAILER/src/PHPMAILER.php");

    require("../../assets/PHPMAILER/src/SMTP.php");

    class N_EnvioEmail{

        //$email = new PHPmailer();

        public function envioContra($correo,$contra,$nombre){
            
            $email = new PHPmailer();
            try {
                $email->SMTPdEBUG = SMTP::DEBUG_SERVER;

                $email->isSMTP();

                $email->Host = "smtp.gmail.com";

                $email->SMTPAuth = true;

                $email->Username = "sistemareservas.cg@gmail.com";
                $email->Password = "srcg12345";

                $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $email->Port = 587;

                $email->setFrom("sistemareservas.cg@gmail.com", "SRCG");

                $email->addAddress($correo, $nombre);

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->Subject = utf8_decode("Envío de contraseña para el accesso al Sistema de Reservas de Citas Gapa");

                $email->Body = utf8_decode("<b>Estimado cliente <strong>$nombre<strong>, mediante este correo le entregamos la contraseña para su acceso a la plataforma Sistema de Reservas Citas Gapa.</b>
                
                Su contraseña es: $contra </br>
                
                Enlace a nuestra pagina: ");

                $email->send();

                echo "Mensaje enviado";

            }catch (Exception $e) {
                echo "El mensaje no se pudo enviar. Error: $email->ErrorInfo";
            }

        }//cierre funcion envioContra
        

    }

    

?>