<?php

require("../data/data_crear_contra.php");
require("../assets/PHPMAILER/src/PHPMAILER.php");
require("../assets/PHPMAILER/src/SMTP.php");

    
    function correoRecuperacion($cedula,$correo){

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

                $email->AddEmbeddedImage('../assets/img/logo.png','logo');

                $email->Subject = utf8_decode("Correo de recuperación de contraseña Sistema de Reservas de Citas Gapa");

                $email->Body = utf8_decode('<body style="font-family: Calibri; margin: 0; padding: 0">

                <div class="contenedor">
                    <div>
                        <img src="cid:logo">

                        </br>
                        <hr style="border: 1px solid #262261">
            
                        <div class="card">
            
                            <p style="font-size: 1.4rem">Estimado cliente, el Sistema de Reservas de Citas Gapa ha recibido la notificación de que su persona ha solicitado un cambio de contraseña.</p>
            
                            <p style="font-size: 1.4rem">Para lograr cambiar su contraseña por favor vaya al siguiente enlace: <a href="http://localhost/SRCG/negocios/n_usuarios/cambiar_contra_parametro.php?cedula='.$cedula.'">Recuperar contraseña</a></p>
            
                            <p style="font-size: 1.4rem">Cualquier duda o consulta que presente puede consultar con nosotros por cualquier medio, ya sea por correo electrónico, llamando a servicio al cliente o visitando nuestras oficinas.</p>
            
                            <span style="font-size: 1.3rem">Visite nuestra página en:  <a href="https://gapacr.com/">www.gapacr.com</a></span>
            
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

$correo = $_POST["correo_recuperacion"];

$objeto = new D_Crear_Contra();

$recuperacion =$objeto->recuperarContra($correo);

if($recuperacion){
    $ced = $objeto->getcedula($correo);
    $cedu;
    foreach($ced as $item){
        $cedu= $item["cedula"];
    }
    correoRecuperacion($cedu,$correo);
    return 0;
}else{
    return 1;
}

?>