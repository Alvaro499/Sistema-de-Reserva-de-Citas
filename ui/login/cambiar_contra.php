<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cambiar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	
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

					
					<div id="contraseña" class="prueba">
						<h2>Contraseña nueva: </h2>
						<input id="contra_nueva" type="password" name="contraseña">
						<div id="error_contra_nueva"></div>
					</div>

					<div id="contraseña" class="prueba">
						<h2>Confirme contraseña: </h2>
						<input id="confirm_contra" type="password" name="contraseña">
						<div id="error_confirm_contra"></div>
					</div>

					<input type="submit" id="boton" value="Confirmar Contraseña">			

				</form>
			</div>
		</figure>
		
	</div>

	<script type="text/javascript" src="../../assets/js/validaciones/cambiar_contra_valid.js"></script>
</body>
</html>
