<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cambiar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/cambiar_contra.css">

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
			
			<!-- Ventana	 -->
			<div class="ventana" id="vent">
				
				<form method="POST" action="" onsubmit="return validacion()">

					<h1>Cambiar Contraseña</h1>

					<!-- Crear contrasena nueva -->
					<label for="contra_nueva">Contraseña nueva: </label>
					<div id="ctn_nueva" class="prueba campos campo-usuario">
						<input id="contra_nueva" type="password" name="coontra_nueva">
						<span id="alert_contra_nueva" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
					</div>
					<div id="error_contra_nueva" class="div_error">*La contraseña debe incluir carácteres alfanuméricos.
						</br></br>*La contraseña debe ser de al menos 6 a 12 carácteres.
					</div>

					<!-- Confirmar contrasena -->
					<label for="confirm_contra">Confirme contraseña: </label>
					<div id="ctn_confirm" class="prueba campos campo-usuario">
						<input id="confirm_contra" type="password" name="confirm_contra">
						<span id="alert_confirm_contra" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
					</div>
					<div id="error_confirm_contra" class="div_error">La contraseña no coincide con la anteriormente creada.</div>

					<input type="submit" id="boton" value="Confirmar Contraseña">			

				</form>
			</div>
		</figure>
		
	</div>

	<script type="text/javascript" src="../../assets/js/validaciones/cambiar_contra_valid.js"></script>
</body>
</html>
