<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Analítica Web</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style_calendario/bridge.css">

	<!-- Full Calendar -->
	<link href="../../assets/fullcalendar/main.css" rel="stylesheet"/>
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.1/fullcalendar.min.css"> -->
	<script src="../../assets/fullcalendar/main.js"></script>
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
					<li class="li_v"><a href="../registro/registro.php" tabindex="0"><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v"><a href="#" tabindex="0"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v"><a href="../analitica_web/analitica.php" tabindex="0"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v"><a href="../calendario/calendario.php" tabindex="0"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v"><a href="../guia_web/guia_web.php" tabindex="0"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Esconder menú / Mostrar menú"></button>
				</div>

				<ul>
					<li class="li_h idioma"><a href="#"><img src="../../assets/iconos/idioma.svg" alt="Cambiar Idioma"></a></li>
					<li class="li_h notifi"><a href="#"><img src="../../assets/iconos/bell.svg" alt="Notificaciones"></a></li>
					<li class="li_h usuario"><img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="usuario" alt="Foto de Perfil"></li>
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
				
				<a href="../inicio/index.php"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
				<!-- Consultas -->
			<?php
				require("../../data/data_citas.php");
				// $consulta_citas = new D_Citas();
				// $datos_cita_empleado = $consulta_citas->get_cliente_calendary_employer();	
				// $datos_cita_cliente = $consulta_citas->get_cliente_calendary($_SESSION["cedula"]);
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
				// $consulta_citas = new D_Citas();
				// $datos_cita_empleado = $consulta_citas->get_cliente_calendary_employer();	
				// $datos_cita_cliente = $consulta_citas->get_cliente_calendary($_SESSION["cedula"]);
				// $datos;

				// var_dump($datos_cita_cliente);	
				// echo "<br><br>";
				// var_dump($datos_cita_empleado);	
			?>
			<div id='calendar'></div>

			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var calendar_div = document.getElementById('calendar');
					var calendar = new FullCalendar.Calendar(calendar_div, {
						initialView: 'dayGridMonth',
						eventClick: function(info) {
							alert('Asesor: ' + info.event.extendedProps.asesor);
							alert('Hora:' + info.event.extendeProps.hora);
						},
						events:[
						<?php
							// function citas_calendario(){
							// 	if ($_SESSION["idrol"] == 2) {

							// 		return $datos_cita_empleado;

							// 	}else if ($_SESSION["idrol"] == 3) {

							// 		return $datos_cita_cliente;
							// 	};	
							// }

							// $citas_calendario = function(){
							// 		if ($_SESSION["idrol"] == 2) {

							// 		return $datos_cita_empleado;

							// 	}else if ($_SESSION["idrol"] == 3) {

							// 		return $datos_cita_cliente;
							// 	};	
							// };
							
							foreach ($datos as $valor) { ?>
						{
							title: 'Cita: <?php echo $valor['area_servicio'] ?>',
							start: '<?php echo $valor['fecha'] ?>',
							extendedProps:{
                				asesor: "<?php echo $valor['nombre_empleado']; ?>",
								hora: "Hora: <?php echo $valor['hora']; ?>"
             				}
						},
						<?php }; ?>
						]
					});
					//LA FUNCIÓN INTERNA QUE POSEE FULLCALENDAR PARA DESPLEGAR EL CALENDARIO
					calendar.render();
				});

    		</script>
		</main>
	</div>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	
</body>
</html>
