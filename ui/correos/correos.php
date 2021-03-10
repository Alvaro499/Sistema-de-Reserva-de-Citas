<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<title>Correos</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_correos/bridge.css">
</head>

<body>

	<?php 
		// require_once("../../sesion/C_Sesion.php");

		// $inicio = new C_Sesion();
		// $inicio->inicializar();
		
		// if(!isset($_SESSION["cedula"])) {
		// 	header("Location: ../login/sesion.php");
		// }else {
		// }     

	?>

	<div class="container">
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v inicio"><a href="../inicio/index.php"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v correos"><a href="../correos/correos.php"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v registro"><a href="../registro/registro.php"><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v citas"><a href="#"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v analitica"><a href="../analitica_web/analitica.php"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v calendario"><a href="#"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v guia_web"><a href="../guia_web/guia.php"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
					<!-- <li class="li_v asistencia"><a href="#"><span><img src="iconos/formulario.svg" aria-hidden="true" class="icono_v"></span>Asistencia Técnica</a></li> -->
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
				
				<a href="#"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<form class="form_correos" method="POST" action="" onsubmit="return validacion()";>
				
				<h1>Correos</h1>
				<h3>Especifique el asunto del correo a enviar</h3>

				<label for="asunto_correos">Asunto:</label>
				<input type="text" name="mensaje_correos" id="asunto_correos" placeholder="Por ejemplo: 'actualización días feriados'">
				<div id="error_asunto"></div>

				<label for="mensaje_correos">*Mensaje:</label>
				<textarea id="mensaje_correos" name="mensaje_correos" resize="none"></textarea>
				<div id="error_correo"></div>

				<div class="cont_btn">

					<label for="file" id="label_file" class="btn_ct btn_correos">Adjuntar Archivo
						<span id="file_name">Ningún archivo seleccionado</span>
					</label>

					<input type="file" id="file" name="file" class="archivo">
					<!-- <button class="btn_correos">Adjuntar Archivo</button> -->
					<button type="submit" class="btn_correos">Enviar</button>
				</div>
			</form>
			
		</main>

	</div>
	<script type="text/javascript" src="../../assets/js/upload_file.js"></script>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script type="text/javascript" src="../../assets/js/validaciones/correos_valid.js"></script>
	
</body>
</html>
