<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="user-scalable=no, width=device-width">
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
				<img src="../../assets/img/logo.png" alt="Logo de la empresa">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v"><a href="../inicio/index.php"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v"><a href="../correos/correos.php"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v"><a href="../registro/registro.php"><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v"><a href="../analitica_web/analitica.php"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v"><a href="../calendario/calendario.php"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v"><a href="../guia_web/guia_web.php"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Regresar"></button>
				</div>

				<ul>
					<li class="li_h idioma"><a href="#"><img src="../../assets/iconos/idioma.svg" alt="Cambiar Idioma"></a></li>
					<li class="li_h notifi"><a href="#"><img src="../../assets/iconos/bell.svg" alt="Notifaciones"></a></li>
					<li class="li_h usuario"><img src="../../assets/iconos/usuario.svg" id="usuario" alt="Foto de Perfil"></li>
					<li class="li_h nombre"><div class="userNmae"><?php echo $_SESSION["nombre"] ?></div></li>
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
				<div>
					<div id="calendar" style="height: 800px;"></div>
					<button>><</button>
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
							return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
						}
					}
				});
				
				calendar.createSchedules([
    {
        id: '1',
        calendarId: '1',
        title: 'my schedule',
        category: 'time',
        dueDateClass: '',
        start: '2021-03-18T22:30:00+09:00',
        end: '2021-03-25T02:30:00+09:00'
    },
    {
        id: '2',
        calendarId: '1',
        title: 'second schedule',
        category: 'time',
        dueDateClass: '',
        start: '2018-01-18T17:30:00+09:00',
        end: '2018-01-19T17:31:00+09:00',
        isReadOnly: true    // schedule is read-only
    }
]);
// calendar.prev();


				
			</script>

		</main>

	</div>

	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	
</body>
</html>
