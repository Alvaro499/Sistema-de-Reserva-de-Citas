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

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="../../assets/img/logo.png">
            
                        <hr style="border: 1px solid #262261;">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente <strong>""</strong>, GAPA le da la bienvenida al Sistema de Reservas de Citas de la empresa, para nosotros en un gusto que haya aceptado adquirir dicho servicio.</p>
            
                            <p style="font-size: 1.4rem">Su contraseña para el inicio de sesión es: <strong>""</strong>
            
                            <p style="font-size: 1.4rem">Recuerde que despues de iniciar sesión por primera vez podrá crear una nueva contraseña a su gusto.</p>
            
                            <p style="font-size: 1.4rem">Cualquier duda o consulta que presente puede consultar con nosotros por cualquier medio, ya sea por correo electrónico, llamando a servicio al cliente o visitando nuestras oficinas.</p>
            
                            <span style="font-size: 1.3rem">Visite nuestra página en: ""</span>
            
                            <h3 style="font-size: 1.3rem">¡Estamos para servirle!</h3>
            
                    <footer>
            
                        <div>
                            <hr style="border: 1px solid #262261">
                            <span style="font-size: 1.3rem">*Servicio al cliente: <strong>2543-453</strong></span>
                            <br>
                            <span style="font-size: 1.3rem">*Correo para consultas: srcg@gmail.com</span>
                        </div>
                        
                    </footer>
                        </div>	
                    </div>
                    
                </div>
            </body>');

                $email->send();

                echo "Mensaje enviado";

            }catch (Exception $e) {
                echo "El mensaje no se pudo enviar. Error: $email->ErrorInfo";
            }

        }//cierre funcion envioContra
        

    }

    

?>