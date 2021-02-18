<!DOCTYPE html>
<html lang="es">
<head>
	<title>Crear Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
					<div id="usuario" class="prueba">
						<h2>Contraseña actual: </h2>
						<input id="contra_actual" type="password" name="user-name">
						<div id="error_contra_actual"></div>
					</div>

					<div id="contraseña" class="prueba">
						<h2>Contraseña nueva: </h2>
						<input id="contra_nueva" type="password" name="contraseña">
						<div id="error_contra_nueva"></div>
					</div>

					<div id="contraseña" class="prueba">
						<h2>Confirme nueva contraseña: </h2>
						<input id="confirm_contra" type="password" name="contraseña">
						<div id="error_confirm_contra"></div>
					</div>
					<input id="boton" type="submit" value="Confirmar nueva contraseña">			
				</form>
			</figure>
	
	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/crear_contra_valid.js"></script>
</body>
</html>