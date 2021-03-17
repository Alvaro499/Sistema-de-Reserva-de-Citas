<?php

    require("../../assets/PHPMAILER/src/PHPMAILER.php");

    require("../../assets/PHPMAILER/src/SMTP.php");

    class N_Correo_Citas{

        
        // ($nombre_cliente, $apellido, $correo, $area, $fecha, $hora,$medio,$nombre_empleado, $plataforma, $link, $oficina, $cantidad)
        public function Cita_Aceptada($nombre_cliente, $apellido, $correo, $area, $fecha, $hora,$medio,$nombre_empleado, $plataforma, $link, $oficina, $cantidad){
            
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

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->AddEmbeddedImage('../../assets/img/logo.png','logo');

                $email->Subject = utf8_decode("Aprobación de la capacitación de Gapa");

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="cid:logo">

                        </br>
                        <hr style="border: 1px solid #262261">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente ' . $nombre_cliente. '<strong>.</p>
            
                            <p style="font-size: 1.4rem">Para nosotros es un gusto informarle que la solicitud de cita para la capacitación del personal en el área de en su empresa fue aprobada. La fecha de dicha capacitación está pendiente para el día ' .$fecha  . ' a las ' .$hora. '.

                            <p style="font-size: 1.4rem">El Licenciado ' .$nombre_empleado. ' será el encargado de dirigir dicha capacitacion por medio ' .$medio. ' . La misma se realizará en la plataforma ' .$plataforma. '; el enlace de acceso será ' .$link.
                            
                            '<p style="font-size: 1.4rem"></p>. La cantidad de personas máxima es de ' .$cantidad. '.</p>

                            <p style="font-size: 1.4rem">Le recordamos que debe guardar esta información con el fin de evitar posibles problemas el día de la capacitación</p>
           
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

        public function Cita_Rechazada ($nombre_cliente,$apellido,$correo_cliente,$fecha,$hora) {

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

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->AddEmbeddedImage('../../assets/img/logo.png','logo');

                $email->Subject = utf8_decode("Aprobación de la capacitación de Gapa");

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="cid:logo">

                        </br>
                        <hr style="border: 1px solid #262261">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente ' . $nombre_cliente. '<strong>.</p>
            
                            <p style="font-size: 1.4rem">Gapa le informa que la solicitud de cita en la ' .$fecha  . ' a las ' .$hora. ' fue rechazada.

                            <p style="font-size: 1.4rem">Se le recomienda realizar una nueva solicitud teniendo en consideracion las citas que aparecen agendas en la parte calendario para que  ' .$nombre_empleado. ' será el encargado de dirigir dicha capacitacion por medio ' .$medio. ' . La misma se realizará en la plataforma ' .$plataforma. '; el enlace de acceso será ' .$link.
                            
                            '<p style="font-size: 1.4rem"></p>. La cantidad de personas máxima es de ' .$cantidad. '.</p>

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