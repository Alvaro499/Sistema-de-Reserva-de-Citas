<?php

    require("../../assets/PHPMAILER/src/PHPMAILER.php");

    require("../../assets/PHPMAILER/src/SMTP.php");

    class N_EnvioEmail{

        //$email = new PHPmailer();

        public function envioCorreoMax($correo,$asunto,$mensaje,$archivo,$ruta){
            
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

                $email->addAddress($correo);

                if(!empty($archivo)){
                   $email->AddAttachment($ruta,$archivo);
                }

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->AddEmbeddedImage('../../assets/img/logo.png','logo');

                $email->Subject = utf8_decode($asunto);

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="cid:logo">

                        </br>
                        <hr style="border: 1px solid #262261">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente<strong>.</p>
            
                            <p style="font-size: 1.4rem">Gapa le informa: <strong>' . $mensaje . '</strong>

                            <p style="font-size: 1.4rem">Se adjunta el archivo para mayor información: <strong>' . $archivo . '</strong>
            
                            <h3 style="font-size: 1.3rem">¡Estamos para servirle!</h3>
            
                    <footer>
            
                        <div>
                            <hr style="border: 1px solid #262261">
                            <span style="font-size: 1.3rem">*Servicio al cliente: <strong>2543-453</strong></span>
                            </br>
                            <span style="font-size: 1.3rem">*Correo para consultas: srcg@gmail.com</span>
                        </div>
                        
                    </footer>
                        </div>	
                    </div>
                    
                </div>
            </body>');

                $email->send();

               return true;
            }catch (Exception $e) {
                return false;
            }
            

        }//cierre funcion envioContra
        

    }

    

?>