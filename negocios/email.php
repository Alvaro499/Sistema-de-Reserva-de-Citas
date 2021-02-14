<?php

    require("../assets/PHPMAILER/src/PHPMAILER.php");

    require("../assets/PHPMAILER/src/SMTP.php");

    class N_EnvioEmail{

        $email - new PHPmailer();

        public function envioContra($correo,$contra,$nombre){

            try {
                $email->SMTPdEBUG = SMTP::DEBUG_SERVER;

                $email->isSMTP();

                $email->Host = "smtp/gmail.com";

                $email->SMTPAuth = true;

                $email->Username = "sistemareservas.cg@gmail.com";
                $email->Password = "srcg12345";

                $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                $email->Port = 587;

                $email->setFrom("sistemareservas.cg@gmail.com", "SRCG");

                $email->addAddress("", "SRCG");

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->Subject = "Envío de contraseña para el accesso al Sistema de Reservas de Citas Gapa";

                $mail->Body = "<b>Estimado cliente 'Pepe' mediante este correo le entregamos la contrasena para que pueda tener accesos a su cuenta del SRCG.</b>
                
                Su contrasena es: 232334fekfn4 <br>
                
                Enlace a la pagina:";

                $email->send();

                echo "Mensaje enviado";

            }catch (Exception $e) {
                echo "El mensaje no se pudo enviar. Error: $email->ErrorInfo";
            }

        }//cierre funcion envioContra
        

    }

    

?>