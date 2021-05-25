<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Calendario</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style_calendario/bridge.css">

	<!-- Full Calendar -->
	<link href="../../assets/fullcalendar/main.css" rel="stylesheet"/>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/fullcalendar.min.css"> -->
	
	<script src="../../assets/fullcalendar/main.js"></script>
	<script src="../../assets/fullcalendar/locales-all.min.js"></script>
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

		<div id="cont_modal" class="modal_cont_js">
			<div id="modal" class="modal_js">
				<div class="head_modal">
					<h2 class="lang" key="info cita" tabindex="0">Información Cita</h2>
					<button class="btn_modal translate" title="Cerrar ventana información de citas" tabindex="0"><i class="fas fa-times"></i></button>
					<hr>
				</div>

				<div class="body_modal">
					<div class="info_modal">
						<p class="info lang" key="nombre cliente" tabindex="0">Nombre del Cliente:</p>
						<strong class="info_calendar cliente" tabindex="0"></strong>
					</div>

					<div class="info_modal">
						<p class="info lang" key="area servicio" tabindex="0">Área de Servicio:</p>
						<strong class="info_calendar cita lang_php" key="" tabindex="0"></strong>
					</div>
					
					<div class="info_modal">
						<p class="info lang" key="nombre asesor" tabindex="0">Nombre del Asesor:</p>
						<strong class="info_calendar asesor" tabindex="0"></strong>
					</div>

					<div class="info_modal">
						<p class="info lang" key="hora" tabindex="0">Hora:</p>
						<strong class="info_calendar hora" tabindex="0"></strong>
					</div>

					<div class="info_modal">
						<p class="info lang" key="fecha" tabindex="0">Fecha:</p>
						<strong class="info_calendar fecha" tabindex="0"></strong>
					</div>
					
				</div>
			</div>
		</div>
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa" tabindex="0">
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

		<!-- MAIN CALENDARIO -->

		<main id="principal">
			
				<!-- Consultas -->
			<?php
				require_once("../../data/data_citas.php");
				
				function citas_calendario(){
					if ($_SESSION["idrol"] == 2) {
						$consulta_citas = new D_Citas();
						$datos_cita_empleado = $consulta_citas->get_cliente_calendary_employer();
						return $datos_cita_empleado;

					}else if ($_SESSION["idrol"] == 3) {

						$consulta_citas = new D_Citas();
						$datos_cita_cliente = $consulta_citas->get_cliente_calendary($_SESSION["cedula"]);
						return $datos_cita_cliente;
					};	
				};
				$datos = citas_calendario();
			?>
			<div id='calendar'></div>

			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var calendar_div = document.getElementById('calendar');
					var calendar = new FullCalendar.Calendar(calendar_div, {
						initialView: 'dayGridMonth',
						eventClick: function(info) {

							if (padre_modal.classList.contains('modal_cont_js')) {
							
								padre_modal.classList.replace('modal_cont_js', 'modal_cont')
								modal.classList.replace('modal_js', 'modal')
							}
							cerrar.addEventListener("click", function(){
								if (padre_modal.classList.contains("modal_cont")) {
									padre_modal.classList.replace('modal_cont', 'modal_cont_js')
									modal.classList.replace('modal', 'modal_js')
								}
							})

							//INFORMACION DE LAS CITAS
							cliente.innerHTML = info.event.extendedProps.cliente + " " + info.event.extendedProps.apellido1 + " " + info.event.extendedProps.apellido2;
							area.innerHTML = info.event.extendedProps.area;
							asesor.innerHTML = info.event.extendedProps.asesor;
							hora.innerHTML = info.event.extendedProps.hora;
							fecha.innerHTML = info.event.extendedProps.fecha;
						},
						
  						locale: 'es',
						events:[
						<?php
							foreach ($datos as $valor) { ?>
						{
							title: 'Cita: <?php echo $valor['area_servicio'] ?>',
							start: '<?php echo $valor['fecha'] ?>',
							extendedProps:{
								cliente: "<?php echo $valor['nombre']; ?>",
								apellido1: "<?php echo $valor['apellido1']; ?>",
								apellido2: "<?php echo $valor['apellido2']; ?>",
								area: "<?php echo $valor['area_servicio']; ?>",
                				asesor: "<?php echo $valor['nombre_empleado']; ?>",
								hora :"<?php echo $valor['hora']; ?>",
								fecha: "<?php echo $valor['fecha']; ?>"
             				}
						},
						<?php }; ?>
						]
					});
					let idiomas = document.querySelectorAll(".translate");
					let id = "";
					console.log(idiomas);
					function cambiarIdioma(){
						for (let i = 0; i < idiomas.length; i++) {
							idiomas[i].addEventListener("click", function(e){
								let id = e.target.parentNode.getAttribute("id");
								calendar.setOption('locale', id);
							});
						}
					}cambiarIdioma();

					//CODIGO PARA EL MODAL DE CITAS
					let cliente = document.querySelector(".cliente");
					let area = document.querySelector(".cita");
					let asesor = document.querySelector(".asesor");
					let hora = document.querySelector(".hora");
					let fecha = document.querySelector(".fecha");
					let padre_modal = document.querySelector("#cont_modal");
					let modal = document.querySelector("#modal");
					let cerrar = document.querySelector(".btn_modal");

					//LA FUNCIÓN INTERNA QUE POSEE FULLCALENDAR PARA DESPLEGAR EL CALENDARIO
					calendar.render();
				});
    		</script>
			<div class="datos_calendar">

			</div>
		</main>
	</div>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
	<script type="text/javascript" src="../../assets/js/accesibilidad.js"></script>
	
</body>
</html>
