<?php

    require("../../assets/PHPMAILER/src/PHPMAILER.php");

    require("../../assets/PHPMAILER/src/SMTP.php");

    require("../../config_email.php");

    class N_Correo_Citas{

        
        // ($nombre_cliente, $apellido, $correo, $area, $fecha, $hora,$medio,$nombre_empleado, $plataforma, $link, $oficina, $cantidad)
        public function Cita_Aceptada($nombre_cliente, $apellido, $correo, $area, $fecha, $hora,$medio,$nombre_empleado, $plataforma, $link, $oficina, $cantidad){
            
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

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->AddEmbeddedImage('../../assets/img/logo.png','logo');

                $email->Subject = utf8_decode("Aprobación de la capacitación por Gapa");

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="cid:logo">

                        </br>
                        <hr style="border: 1px solid #262261">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente ' . $nombre_cliente. ':</p>
            
                            <p style="font-size: 1.4rem">Para nosotros es un gusto informarle que la solicitud de su cita fue aprobada. La fecha de la misma ahora está pendiente para el día ' .$fecha  . ' a las ' .$hora. ' horas. El/la Licenciado ' .$nombre_empleado. ' será quien dirija dicha capacitacion.');

                            if ($medio == "Virtual") {
                                $email->Body.=utf8_decode('<p style="font-size: 1.4rem">La cita se llevará a cabo de manera virtual . Y la misma se realizará en la plataforma ' .$plataforma. ', el enlace de acceso será ' . $link . 
                                
                                 '<p style="font-size: 1.4rem">La cantidad de personas máxima es de ' . $cantidad . '.</p>

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
                            }else if ($medio == "Presencial") {
                                            $email->Body.=utf8_decode('<p style="font-size: 1.4rem">La cita se llevará a cabo de manera presencial en las oficinas de ' . $oficina . '. Cuando se acerque el día de la cita recibirá más información al respecto</p>

                                            <p style="font-size: 1.4rem">La cantidad de personas máxima es de ' . $cantidad . '.</p>

                                        <p style="font-size: 1.4rem">Le recordamos que debe guardar esta información con el fin de evitar posibles problemas el día de la capacitación.</p>
                    
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
                        }
                            

                            

                $email->send();

               return true;
            }catch (Exception $e) {
                return false;
            }
        }//cierre funcion envioContra

        public function Cita_Rechazada ($nombre_cliente,$apellido,$correo_cliente,$fecha,$hora) {

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

                $email->addAddress($correo_cliente);

                $email->Charset = "UTF-8";

                $email->isHTML(true);

                $email->AddEmbeddedImage('../../assets/img/logo.png','logo');

                $email->Subject = utf8_decode("Rechazo de la capacitación por Gapa");

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="cid:logo">

                        </br>
                        <hr style="border: 1px solid #262261">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente ' . $nombre_cliente. ':</p>
            
                            <p style="font-size: 1.4rem">Gapa le informa que su solicitud para una cita el día ' .$fecha  . ' a las ' .$hora. ' horas fue rechazada.

                            <p style="font-size: 1.4rem">Se le recomienda realizar una nueva solicitud teniendo en consideración las fechas y horarios que se encuentran en la sección de inicio de la plataforma</p>
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