<!DOCTYPE html>
<html lang="es">
<head>
	<title>Crear Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/crear_contra.css">
	

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
				
				<form method="POST" action="" onsubmit="return validacion()">
					<h1>Crear contraseña</h1>

					<!-- Contrasena actual -->
					<label for="contra_actual">Contraseña actual:</label>
					<div id="usuario" class="prueba campos campo-usuario">
						<input id="contra_actual" type="password" name="contra_actual">
						<span id="alert_contra_actual" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
					</div>
					<div id="error_contra_actual" class="div_error">*Su contraseña actual no es válida.</div>

					<!-- Crear contrasena nueva -->
					<label for="contra_nueva">Contraseña nueva:</label>
					<div id="contraseña" class="prueba campos campo-usuario">
						<input id="contra_nueva" type="password" name="contra_nueva">
						<span id="alert_contra_nueva" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
					</div>
					<div id="error_contra_nueva" class="div_error">*La contraseña debe incluir carácteres alfanuméricos.
						</br></br>*La contraseña debe ser de al menos 6 a 12 carácteres.
					</div>

					<!-- Confirmar contrasena -->
					<label for="confirm_contra">Confirme nueva contraseña:</label>
					<div id="contraseña" class="prueba campos campo-usuario">
						<input id="confirm_contra" type="password" name="confirm_contra">
						<span id="alert_confirm_contra" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
					</div>
					<div id="error_confirm_contra" class="div_error">La contraseña no coincide con la anteriormente creada.</div>

					<input id="boton" type="submit" value="Confirmar nueva contraseña">			
				</form>
			</figure>
	
	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/crear_contra_valid.js"></script>
</body>
</html>