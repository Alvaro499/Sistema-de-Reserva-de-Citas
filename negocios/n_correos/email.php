<?php

    require("../../assets/PHPMAILER/src/PHPMAILER.php");

    require("../../assets/PHPMAILER/src/SMTP.php");

    require("../../config_email.php");

    class N_EnvioEmail{

        //$email = new PHPmailer();

        public function envioCorreoMax($correo,$asunto,$mensaje,$archivo,$ruta){
            
            $email = new PHPmailer();
            try {              
                // Obtener configuración según el entorno
                $config = EmailConfig::getConfig();
                
                $email->SMTPdEBUG = SMTP::DEBUG_SERVER;

                $email->isSMTP();

                $email->Host = $config['host'];

                $email->SMTPAuth = true;

                $email->Username = $config['username'];
                $email->Password = $config['password'];

                $email->SMTPSecure = $config['encryption'];

                $email->Port = $config['port'];

                $email->setFrom($config['from_email'], $config['from_name']);

                $email->addAddress($correo);


                if(!empty($archivo)){
                    
                    $contador = 0;
                    foreach ($ruta as $rutas) {
                        $email->AddAttachment($rutas,$archivo[0]);
                        ++$contador;
                    }
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
            
                            <p style="font-size: 1.4rem">Estimados clientes<strong>.</p>
            
                            <p style="font-size: 1.4rem">' . $mensaje . '
           
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

               return true;
            }catch (Exception $e) {
                return false;
            }
            

        }//cierre funcion envioContra
        

    }

    

?>