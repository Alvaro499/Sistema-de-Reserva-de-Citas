<!DOCTYPE html>
<html lang="es">
<head>
	<title>Recuperar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
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

					<h2>Digite el correo con el cual está registrada su cuenta:</h2>
					<input class="correo" id="correo" type="text" name="user-name" placeholder="ejemplo@hotmail.com">
					<div id="error_correo"></div>

					
					<!-- <button>Enviar correo de recuperación</button>

					<h2>Escriba el código enviado al correo electrónico secundario para  de cuenta :</h2>
					<input class="codigo" id="codigo" type="text" name="codigo">
					<div id="error_correo"></div> -->

					<input type="submit" id="boton" value="Enviar">			
				</form>

				<!-- <div id="contra_nueva"></div> -->
			</div>

		</figure>
	
	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/recuperar_contra_valid.js"></script>
</body>
</html>