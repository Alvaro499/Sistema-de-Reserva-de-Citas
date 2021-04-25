<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Administración y Rervación de Citas</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_rce/bridge.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/toastr/toastr.min.css">
</head>

<body>

    <?php 
		require_once("../../sesion/C_Sesion.php");

		$inicio = new C_Sesion();
		$inicio->inicializar();
		
		if(!isset($_SESSION["cedula"])) {
			header("Location: ../login/sesion.php");
		}else {
			
		}     

	?>

	<div class="container">
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa" tabindex="0">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v"><a href="../inicio/index.php" tabindex="0"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v"><a href="../correos/correos.php" tabindex="0"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v"><a href="../registro.registro.php" tabindex="0"><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v"><a href="#" tabindex="0"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v"><a href="../analitica_web/analitica.php" tabindex="0"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v"><a href="../calendario/calendario.php" tabindex="0"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v"><a href="../guia_web/guia_web.php" tabindex="0"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
					<!-- <li class="li_v"><a href="#"><span><img src="iconos/formulario.svg" aria-hidden="true" class="icono_v"></span>Asistencia Técnica</a></li> -->
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Esconder menú / Mostrar menú" tabindex="0"></button>
				</div>

				<ul>
					<li class="li_h idioma"><a href="#" tabindex="0"><img src="../../assets/iconos/idioma.svg" alt="Cambiar Idioma"></a></li>
					<li class="li_h notifi"><a href="#" v><img src="../../assets/iconos/bell.svg" alt="Notifaciones"></a></li>
					<li class="li_h usuario"><img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="usuario" alt="Foto de Perfil" tabindex="0"></li>
					<li class="li_h nombre"><div class="userNmae"><?php echo $_SESSION["nombre"] ?></div>
						<ul>
							<li>
								<div id="perfil" class="cont_perfil">
									<a class="config_options" href="../perfil/perfil.php"><span><i class="fas fa-user-edit"></i></span>Mi perfil</a>
									<a class="config_options" href="../logout.php"><span><i class="fas fa-sign-out-alt"></i></span>Cerrar sesión</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</nav>


			<!-- SubMenu de Atajos (Menu Horizontal Negro) -->
			<div class="submenu_h">
				
				<a href="../inicio/index.php" tabindex="0"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php" tabindex="0"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<section class="admin_citas">
                <h1 tabindex="0">Reservas pendientes</h1>
                <div id="reservas">
                <?php 
                require("../../negocios/n_citas/admin_citas.php");
                $citas = new N_Admin_Citas();
                $datos= $citas->get_citas();
                foreach($datos as $values)
                {
                ?>
                    <div class="card-reserva">
                        <h3><?php echo "Área de " . $values["area_servicio"]; ?></h3>
                        <p><strong tabindex="0">Usuario:</strong> <?php echo $values["nombre"]; ?></p>
                        <p><strong tabindex="0">Asunto:</strong> <?php echo $values["asunto"]; ?></p>
                        <p><strong tabindex="0">Fecha:</strong> <?php echo $values["fecha"]; ?></p>
                        <p><strong tabindex="0">Hora:</strong> <?php echo $values["hora"]; ?></p>
                        <p><strong tabindex="0">Medio de reunión: </strong><?php echo $values["medio"]; ?></p>
                        <p><strong tabindex="0">Mensaje:</strong> <?php echo $values["comentario"]; ?></p>
                        <!-- <button id="descargar" class="btn file">Descargar</button> -->
                        <button id="rechazar" class="btn danger" onclick='rechazar(<?php echo $values["idcitas_cliente"];?>, "<?php echo $values["cedula"];?>");' tabindex="0">Rechazar</button>
                        <button id="aceptar" class="btn success" onclick='aceptar(<?php echo $values["idcitas_cliente"];?>,"<?php echo $values["medio"];?>","<?php echo $values["cedula"];?>");' tabindex="0">Aceptar</button>
                    </div>
                <?php }?>
                    

                    <!-- <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn file">Descargar</button>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn file">Descargar</button>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div> -->
                    
                    
                </div>
            </section>
			
		</main>

	</div>


	
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
    <script type="text/javascript">
	function aceptar(id,medio,cedula)
    {
        window.location="reserva_aceptada.php?id="+id+"&medio="+medio+"&cedula="+cedula;
            // $.ajax({
            //     type: "POST",
            //     url:"../../negocios/n_citas/metodos_citas.php",
            //     data: datos,
            //     //Métodos
            //     success: function(data){
            //         if(data==1){
            //             toastr.success("Se guardo exitosamente","Éxitos");
            //         }else if(data==2){
            //             toastr.error("Ese usuario ya hiciste","Error");
            //         }else{
            //             toastr.error("Error desconocido","Error");
            //         }
            //     }
            // })   
    }

    function rechazar(id,cedula){
        let dato_id = "id="+id +
        "&cedula="+cedula;


         $.ajax({
                type: "POST",
                url:"../../negocios/n_citas/eliminar_cita.php",
                data: dato_id,
                //Métodos
                success: function(data){
                    if(data==1){
                        toastr.success("Se rechazó exitosamente","Éxitos",{positionClass: "toast-bottom-right", showDuration: "400"});
                        location.reload();
                    }else if(data==2){
                        toastr.error("Error al rechazar cita","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
                    }else{
                        toastr.error("Error desconocido"+data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
                    }
                }
            })
    }
    
</script>
</body>
</html>
