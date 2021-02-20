<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio de Sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/sesion.css">
	
</head>
<body>
	<div class="contenedor">
		<header class="parte1">
			<figure class="logo">
				<img src="../../assets/img/logo.png">
			</figure>
			
			<button onclick="abrir()" class="botonarriba">Regresar página de inicio</button>
			
		</header>

		<figure class="fondo">
			<!-- <img src="img/prueba2.jpg"> -->
			<div class="ventana" id="vent">
				
				<form method="POST" action="../../negocios/n_usuarios/consultar_usuario.php" onsubmit="return validacion()">
					
					<h1>Iniciar Sesión</h1>

					<div class="campos campo-usuario">

						<input id="correo" class="prueba" type="text" name="correo" placeholder="Correo:" >

						<span class="info_icon iconos"><img src="../../assets/iconos/correo-usuario.svg"></span>
						<span id="alert_correo" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>

					</div>
					<div id="error_correo" class="div_error">*Correo no válido</div>

					<div class="campos campo-contra">

						<input id="contra" class="prueba" type="password" name="pass" placeholder="Contraseña:">

						<span class="info_icon iconos"><img src="../../assets/iconos/contra.svg"></span>
						<span id="alert_contra" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						
					</div>

					<div id="error_contra" class="div_error">*Contraseña no válida</div>
					
					<div class="div-texto">
						
						<a href="recuperar_contra.html" id="texto">¿Olvidó su contraseña?</a>

					</div>
					
					<input id="boton" type="submit" name="" value="Iniciar">			
				</form>
			</div>
		</figure>

	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/sesion_valid.js"></script>
</body>
</html>