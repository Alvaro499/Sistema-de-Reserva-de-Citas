<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Guía Web</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
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
				<button class="btn_cerrar" title="Cerrar Menú" tabindex="0">X</button>
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
			<div class="guia_cont">
				<h1 class="lang" key="intro" tabindex="0">Introducción al Sistema</h1>
				<p key="intro descrip" class="lang p_intro">Antes de empezar a usar tu cuenta te recomendamos que leas este pequeño manual de usuario en el que se explican de forma rápida y entendible las diferentes funcionalidades del Sistema de Reservas de Citas de Gapa</p>

				<div class="acordeon">
					<div class="acordeon__item">
						<h2 id="citas" class="lang" key="citas" tabindex="0">Citas</h2>
						<p class="lang" key="citas menu" tabindex="0">En el Sistema de Reservas Citas Gapa los clientes tienen la oportunidad de solicitar citas personalizadas, esto con el fin de brindar una mayor libertad en los servicios que ofrecemos.</p>

						<div class="details">
							<!-- <i class="fas fa-arrow-down"></i> -->
							<input type="checkbox" name="acordeon" id="item1" role="button" hidden>
							<label for="item1" id="label1" class="acordeon__titulo lang" key="citas donde solicitar" role="title" tabindex="0">¿Dónde solicitar una cita?</label>
							<div class="acordeon__contenido" tabindex="0">
								<p class="lang" key="citas solicitar" tabindex="0">Para solicitar una cita personalizada solo debemos ir al menú vertical de la izquierda y presionar el enlace "Citas".</p>
								<img src="../../assets/guia_web/menu_citas.png">
							</div>	
						</div>
					</div>

					<div class="acordeon__item">
						<h2 id="creacion_citas" class="lang" key="crear citas">Creación de Citas</h2>
						<p class="lang" key="personalizacion citas">La personalización de citas es un procesos rápido y simple, es un formulario que incluye opciones desde escoger la hora, fecha y hasta el medio de la reunión.</p>
						
						<div class="details">
							<input type="checkbox" name="acordeon" id="item2">	
							<!-- <i class="fas fa-arrow-down"></i> -->
							<label for="item2" id="label2" class="acordeon__titulo lang" role="title" key="como crear citas" tabindex="0">¿Cómo crear una cita?</label>
							<div class="acordeon__contenido" tabindex="0">
								<p class="lang" key="como solicitar citas">Para solicitar una cita solo debemos completar cada uno de los espacios con la información más acorde a nuestro gusto. Debemos tener en cuenta que ningún campo puede crear vacío.</p>
								<img src="../../assets/guia_web/crear_citas.png" alt="Formulario para la creacion de citas">
							</div>
						</div>
					</div>

					<div class="acordeon__item">
						<h2 id="calendario" class="lang" key="calendario" tabindex="0">Calendario</h2>
						<p class="lang" key="ver calendario" tabindex="0">Para visualizar el calendario solo debemos ir al menú vertical de la izquierda y presionar el enlace "Calendario". En él, podrás ver cada una de las citas que tengas agendadas</p>
						
						<div class="details">
							<input type="checkbox" name="acordeon" id="item3">	
							<!-- <i class="fas fa-arrow-down"></i> -->
							<label for="item3" id="label3" class="acordeon__titulo lang" role="title" key="ver citas" tabindex="0">¿Cómo visualizar mis citas?</label>
							<div class="acordeon__contenido" tabindex="0">
								<p class="lang" key="cuadros azules" tabindex="0">Si se desea ver más información detallada de cada cita simplemente presionamos los cuadros celestes que se ubican en la fecha especificada. En el ejemplo de abajo podemos ver que hay una cita agendada para el domingo 6 de junio</p>
								<img src="../../assets/guia_web/menu_calendario.png" alt="Cuadros de itas en el calendario">
								<p class="lang" key="modal calendario" tabindex="0">Después de presionar el cuadro en el calendario se despleguará una ventana flotante en la cual habrá información más detallada, como el nombre del asesor, la hora y el área de servicio relacionada.</p>
								<img src="../../assets/guia_web/modal_calendario.png" alt="Ventana modal de la cita">
							</div>
						</div>
					</div>

					<div class="acordeon__item">
						<h2 id="notificaciones" class="lang" key="notificaciones" tabindex="0">Notificaciones</h2>
						<p class="lang" key="sistema noitifi" tabindex="0">El sistema también cuenta con una sección de notificaciones en la cual le llegarán diferentes mensajes relacionados al estado de las solicitudes que hayan enviado.</p>
						
						<div class="details">
							<input type="checkbox" name="acordeon" id="item4">
							<!-- <i class="fas fa-arrow-down"></i> -->
							<label for="item4" id="label4" class="acordeon__titulo lang" role="title" key="tipo notifi" tabindex="0">Tipos de Notificación</label>
							<div class="acordeon__contenido" tabindex="0">
								<p class="lang" key="tres notifi" tabindex="0">Hay tres tipos de notificación en el sistema, cada uno se mostrará dependiendo el estado actual de su última solicitud en la sección de "Citas", estas son:</p>
								
								<h3 class="lang" key="notifi enviada">Notificación de envío confirmado</h3>
								<p class="lang" key="soli enviada" tabindex="0">Justo después de haber enviado una solicitud para una cita, podrá ver en la sección de notificaciones un mensaje que dirá "Su solcitud ha sido enviada". Esto signfica que está en pendiente de ser revisada por un administrador de la empresa que dice si la acepta o rechaza</p>
								<img src="../../assets/guia_web/notifi_enviada.png" alt="Solicitud enviada">
								
								<h3 class="lang" key="notifi aceptada">Notificación de aceptación</h3>
								<p class="lang" key="soli aceptada" tabindex="0">Este mensaje se mostrará cuando un administrador de la empresa haya aceptado su solicitud, además la cita será agendada al calendario y también recibirá un correo electrónico con más detalles</p>
								<img src="../../assets/guia_web/notifi_aceptada.png" alt="Solicitud aceptada">
								
								<h3 class="lang" key="notifi rechazada">Notificación de rechazo</h3>
								<p class="lang" key="soli rechazada" tabindex="0">Por último está la notififación de rechazo, la cual se mostrará en su cuenta únicamente cuando algún administrador indique que es imposible atenderlo.</p>
								<img src="../../assets/guia_web/notifi_rechazada.png" alt="Solicitud rechazada">
							</div>
						</div>
					</div>


					<div class="acordeon__item">
						<h2 id="idioma" class="lang" key="idiomas" tabindex="0">Cambio de Idioma</h2>
						<p class="lang" key="sistema noitifi" tabindex="0">El sistema está adaptado para dos idiomas, por lo que puede cambiar de una traducción a otra rápidamente.</p>
						
						<div class="details">
							<input type="checkbox" name="acordeon" id="item5">
							<!-- <i class="fas fa-arrow-down"></i> -->
							<label for="item5" id="label5" class="acordeon__titulo lang" role="title" key="ver idiomas" tabindex="0">¿Cómo cambio el idioma de mi cuenta?</label>
							<div class="acordeon__contenido" tabindex="0">
								<p class="lang" key="idioma descrip" tabindex="0">Si desea cambiar el idioma de la página de español a inglés y viceversa, solamente seleccione el icono de referencia al país.</p>
							
								<img src="../../assets/guia_web/idioma.png" alt="Cambio de idioma">
							</div>
						</div>
					</div>


					<div class="acordeon__item">
						<h2 id="perfil" class="lang" key="perfil" tabindex="0">Perfil</h2>
						<p class="lang" key="perfil descrip" tabindex="0">Cada cuenta tiene la posibilidad de verificar la información de su usuario, para acceder a esto solo se debe entrar a la sección de "Mi Perfil".</p>
						
						<div class="details">
							<input type="checkbox" name="acordeon" id="item6">
							<!-- <i class="fas fa-arrow-down"></i> -->
							<label for="item6" id="label6" class="acordeon__titulo lang" role="title" key="ver perfil" tabindex="0">¿Cómo acceder al pefil de mi cuenta?</label>
							<div class="acordeon__contenido" tabindex="0">
								
								<p class="lang" key="perfil descrip1" tabindex="0">Para ir a tu perfil solamente debes posicionar el ratón sobre tu nombre, el cual está en la esquina superior derecha de la interfaz, esto desplegará un submenú donde estará la opcion para visitar perfil.</p>
								<img src="../../assets/guia_web/perfil_menu.png" alt="Botón de perfil">

								<p class="lang" key="perfil descrip2" tabindex="0">Una vez dentro de tu perfil podrás revisar tu información personal, la cual compone tu cuenta en el sistema. Además en esta sección puedes cambiar tu foto perfil y tu contraseña.</p>
								<img src="../../assets/guia_web/perfil_info.png" alt="Información de perfil">
							</div>
						</div>
					</div>


					<div class="acordeon__item">
						<h2 id="foto" class="lang" key="foto perfil" tabindex="0">Foto de Perfil</h2>
						<p class="lang" key="foto descrip" tabindex="0">Toda cuenta tiene una foto de perfil para identificar a cada usuario, igualmente esta puede ser cambiada a gusto por todos los usuarios.</p>
						
						<div class="details">
							<input type="checkbox" name="acordeon" id="item7">
							<!-- <i class="fas fa-arrow-down"></i> -->
							<label for="item7" id="label7" class="acordeon__titulo lang" role="title" key="ver foto" tabindex="0">¿Cómo cambiar la foto de mi perfil?</label>
							<div class="acordeon__contenido" tabindex="0">
								
								<p class="lang" key="foto descrip1" tabindex="0">Primero, se debe acceder a la opción de "Mi Perfil", después de esto, al inicio de esta sección solo debemos presionar en el botón "Actualizar Foto de Perfil".</p>
								<img src="../../assets/guia_web/cambiar_foto.png" alt="Botón de perfil">

								<p class="lang" key="foto descrip2" tabindex="0">Justo después de haber presionado el botón para cambiar la foto, aparecerá una nueva ventana en la cual tendremos 2 opciones, una para escoger una nueva foto de perfil y la otra para eliminar la foto actual. Cabe mencionar que solo pueden ser archivos png, jpg y svg.</p>
								<img src="../../assets/guia_web/escoger_foto.png" alt="Información de perfil">
							</div>
						</div>
					</div>

				</div>
			</div>
		</main>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/notificaciones/notifi.js"></script>
	<script type="text/javascript" src="../../assets/js/notificaciones/notificaciones.js"></script>
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
	<script type="text/javascript" src="../../assets/js/accesibilidad.js"></script>
	<script type="text/javascript" src="../../assets/js/guia_web.js"></script>
</body>
</html>
