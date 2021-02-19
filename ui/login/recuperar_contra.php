<!DOCTYPE html>
<html lang="es">
<head>
	<title>Recuperar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/recuperar_contra.css">
    
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
					<h1>Recuperación de Contraseña</h1>

					<label for="correo">Digite el correo con el cual está registrada su cuenta:</label>
					<div class="campos campo_correo">
						<input class="correo" id="correo" type="text" name="correo" placeholder="ejemplo@hotmail.com">
						<span id="alert_correo" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						<div id="error_correo" class="div_error">*Correo no válido</div>
					</div>
				
					<input type="submit" id="boton" value="Enviar">			
				</form>
			</div>

		</figure>
	
	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/recuperar_contra_valid.js"></script>
</body>
</html>