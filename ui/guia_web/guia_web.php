<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Analítica Web</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/guia_web/bridge.css">
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
				<img src="../../assets/img/logo.png" alt="Logo de la empresa">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v li_inicio"><a href="../inicio/index.php" key="inicio" class="lang"><span class="icono"><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span class="icono">Inicio</a></li>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_correos"><a href="../correos/correos.php" key="correo" class="lang"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<?php } ?>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_registro"><a href="../registro/registro.php" key="registro" class="lang"><span class="icono"><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<?php } ?>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_citas"><a href="../rce/administracion_citas.php" key="citas" class="lang"><span class="icono"><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<?php }else if($_SESSION["idrol"] == 3){ ?>
						<li class="li_v li_citas"><a href="../rcc/reserva_cc.php" key="citas" class="lang"><span class="icono"><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<?php } ?>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_analitica"><a href="../analitica_web/analitica.php" key="analitica web" class="lang"><span class="icono"><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<?php } ?>

					<li class="li_v li_calendario"><a href="../calendario/calendario.php" key="calendario" class="lang"><span class="icono"><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<?php if($_SESSION["idrol"] == 3){ ?>
					<li class="li_v li_guia"><a href="../guia_web/guia_web.php" key="guia web" class="lang"><span class="icono"><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
					<?php } ?>
				</ul>	
			</nav>

		</header>


		<header id="menu_h" tabindex="0">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Esconder menu vertical"></button>
				</div>

				<ul>
					<li class="li_h idioma" tabindex="0">
						<div class="menu_idiomas">
							<a href="#" class="translate" id="es" title="Español" tabindex="0" class="idiomas"><img src="../../assets/iconos/idioma.svg" alt="Cambiar idioma a español"></a>
						</div>
						<div class="menu_idiomas">
							<a href="#" class="translate" id="en" title="English USA" tabindex="0"><img src="../../assets/iconos/usa.svg" alt="Change language to english"></a>
						</div>

					</li>
					<li class="li_h notifi menu__item container-submenu" id="notifica" tabindex="0"><a href="#"><img src="../../assets/iconos/bell.svg" alt="Notificaciones"></a>
						<div class="sub-menu-1" id="submenu1">
							<ul class="submenu">
								<?php 
								// require("../../negocios/n_notificacion/notificaciones.php");
								require("../../negocios/n_notificacion/notificaciones.php");
								$notifi = $datos_noti;

								//Numero de notificaciones
								$num_notifi = count($notifi);
							
								foreach($notifi as $values){
								?>
								<li class="menu_item" tabindex="0">
									<?php if($values["Estado_Notificacion"]==0){?>
										<a href="" class="menu__link lang" key="solicitud enviada" onclick='actualizar_estado(<?php echo $values["idcitas_cliente"]; ?>);'>Su solicitud fue enviada</a>
									<?php }?>
									<?php if($values["Estado_Notificacion"]==1){?>
										<a href="" class="menu__link lang" key="solicitud aceptada" onclick='actualizar_estado_aceptado(<?php echo $values["idcitas_cliente"]; ?>);'>Su solicitud para una capacitación fue aceptada. Tema: <strong class="lang_php" key=""><?php echo $values["area_servicio"];?></strong></a>
									<?php }?>
									<?php if($values["Estado_Notificacion"]==2){?>
										<a href="" class="menu__link lang" key="solicitud rechazada" onclick='actualizar_estado_rechazado(<?php echo $values["idcitas_cliente"]; ?>);'>Su solicitud para una capacitación fue rechazada. Tema: <strong class="lang_php" key=""><?php echo $values["area_servicio"];?></strong></a>
									<?php }?>
								</li>
								<?php }?>
							</ul>
						</div>
						<div id="container_ctn_notifi">
							
							<span id="cnt_notifi"><?php echo $num_notifi ?></span>
							
						</div>
					</li>

					<!-- MOSTRAR FOTO DE PERFIL -->

					<li class="li_h usuario" tabindex="0"><img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="usuario" alt="Foto de Perfil"></li>
					<li class="li_h nombre" tabindex="0"><div class="userNmae" tabindex="0"><?php echo $_SESSION["nombre"] ?></div>
						<ul>
							<li>
								<div id="perfil" class="cont_perfil">
									<a class="config_options lang" key="mi perfil" href="../perfil/perfil.php" tabindex="0"><span><i class="fas fa-user-edit"></i></span>Mi perfil</a>
									<a class="config_options lang" key="salir" href="../logout.php" tabindex="0"><span><i class="fas fa-sign-out-alt"></i></span>Cerrar sesión</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</nav>


			<!-- SubMenu de Atajos (Menu Horizontal Negro) -->
			<div class="submenu_h">
				
				<a href="../inicio/index.php" key="inicio" class="lang"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php" key="salir" class="lang"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<h1>Guía Web</h1>
			<section id="inicio">
			<h2>Inicio</h2>
			<img src="../../assets/img/inicio.jpg" alt="La página principal">
			<p>En esta sección puede consultar noticias relacionado a finanzas y contabilidad.</p>
			</section>

			<section id="citas">
			<h2>Citas</h2>
			<img src="../../assets/img/inicio.jpg" alt="La página principal">
			<p>En este apartado puede solicitar una cita para capacitaciones, consultoria, etc de los servicios que se ofrece en la empresa Contabilidad Global Gapa.</p>
			<p>Para solicitar debe llenar los siguientes campos:</p>
			<p><b>Área de Servicio</b>: Aquí se encuentra departamentos que brinda la empresa. Seleccionar el servicio que desee recibir.</p>
			<p><b>Asunto</b>: Aquí debe explicar en pocas palabras el objetivo de la cita. Este campo es obligatorio de completar.</p>
			<p><b>Fecha</b>: Debe seleccionar el día que desee recibir la cita. Este campo es obligatorio de completar.</p>
			<p><b>Hora</b>: Debe seleccionar la hora que desee recibir la cita. Este campo es obligatorio de completar.</p>
			<p><b>Medio de Reunión</b>: Debe seleccionar la modalidad en que desee recibir la cita. Este campo es obligatorio de completar.</p>
			<p><b>Mensaje</b>: Aquí puede dar más información de lo que desea recibir de la cita. Este campo es opcional.</p>
			</section>
			
			<section id="calendario">
			<h2>Calendario</h2>
			<img src="../../assets/img/calendario.jpg" alt="Página del calendario">
			<p>En este apartado puede consultar los días que tiene citas. Si le dar click en un día que tiene cita se desplegara una alerta con información más detallada de la misma. </p>
			</section>

			<section id="idioma">
			<h2>Cambio de Idioma</h2>
			<img src="../../assets/img/idiomas.png" alt="Submenú de idiomas">
			<p>En este apartado puede cambiar el idioma de la página de español a inglés y viceversa.</p>
			</section>

			<section id="notificaciones">
			<h2>Notificaciones</h2>
			<img src="../../assets/img/idiomas.png" alt="Submenú de idiomas">
			<p>En este apartado puede ver las notificaciones del seguimiento de las citas.</p>
			</section>		

			<section id="perfil">
			<h2>Perfil</h2>
			<img src="../../assets/img/perfil.png" alt="Submenú del perfil">
			<p>Para ir al perfil debe posicionarse sobre el nombre de usuario y en el submenú hacer click en "Mi perfil".</p>
			<img src="../../assets/img/perfil.jpg" alt="Perfil del usuario">
			<p>En este apartado puede consultar la información de su usuario, cambiar la foto de perfil a dar click en "Actualizar foto de perfil y cambiar la contraseña.</p>
			</section>								
		</main>

	</div>

	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
	<script type="text/javascript" src="../../assets/js/accesibilidad.js"></script>
</body>
</html>
