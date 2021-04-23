<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Analítica Web</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style_calendario/bridge.css">

	<!-- TOAST UI Calendar -->
	<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css"/>
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
			
			<!-- Archivos JS TOAST UI Calendar -->

			<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script>

			<script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>

			<script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>

			<script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>

			<!-- ... -->

			<!-- Creacion del calendario -->

				<!-- Consultas -->
			<?php
				require("../../data/data_citas.php");
				$consulta_citas = new D_Citas();

				// $estado = $estado_cita->estado_cita();
				$datos_cita = $consulta_citas->get_cliente_calendary($_SESSION["cedula"]);
				
			?>
				<!-- Diseno e informacion del calendarios -->
				<div id="father_calendar">
					<div id="calendar" style="height: 800px;"></div>
					<button id="btn_left" class="btn_cal" onclick="prevMonth();"><i class="fas fa-arrow-left"></i></button>
					<button id="btn_right" class="btn_cal" onclick="nextMonth();"><i class="fas fa-arrow-right"></i></button>
					<button id="btn_today" onclick="todayDay();">Día de hoy</button>
					<span id="today"></span>
					
				</div>
				
			
			<script>
				var Calendar = tui.Calendar;
				

				var calendar = new Calendar('#calendar',{
					defaultView: 'month',
					taskView: true,
					//useCreationPopup: true, //crear popups
					//useDetailPopup: true, //detalles del popup

					template: {
						monthDayName: function(dayname){
							return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>'
						},
						alldayTitle: function() {
            				return 'All Day';
    				    }
					}
				});
				
				calendar.createSchedules([
					<?php foreach ($datos_cita as $valor) { ?>
    			{
        			id: '1',
        			calendarId: '1',
        			title: 'Capacitacion con el/la Lic <?php echo $valor['nombre_empleado'] ?> ',
        			category: '<?php echo $valor['area_servicio'] ?>',
        			dueDateClass: '<?php echo $valor['hora'] ?>',
        			start: '2021-03-29T02:30:00+9:00'
        			// end: '2021-03-25T02:30:00+09:00'
    			},
					<?php } ?>
				]);

				function nextMonth(){
					calendar.next();
				}
				function prevMonth(){
					calendar.prev();
				}
				function todayDay(){
					calendar.today();
				}
// calendar.deleteSchedule(schedule.id, schedule.calendarId);
			</script>
		</main>
	</div>

	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	
</body>
</html>
