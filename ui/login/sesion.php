<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio de Sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/sesion.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/toastr/toastr.min.css">
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
				
				<form id="formsesion">
					
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
						<span id="alert_visibility" class="alert_visibility iconos" title="Presione para mostrar/ocultar la contraseña"><i class="far fa-eye"></i></span>
						
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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
	$("form#formsesion").submit(function(event){
		event.preventDefault();
		if(validacion()){
			var correo = $("#correo").val();
			var contra = $("#contra").val();

			let datos = 
				"correo=" + correo +
				"&contra=" + contra;

			$.ajax({
					type: "POST",
					url:"../../negocios/n_usuarios/consultar_usuario.php",
					data: datos,
					//Métodos
					success: function(data){
						if(data==0){//Usuario no existe
							toastr.error("No existe el usuario","Error",{positionClass: "toast-bottom-right"});
						}
						else if(data==1){
							location.href="../inicio/index.php";
						}else if(data==2){
							location.href="crear_contra.php";
						}
						else if(data==3){
							toastr.error("No existe el usuario","Error",{positionClass: "toast-bottom-right"});
						}else{
							toastr.error("Error desconocido" + data,"Error",{positionClass: "toast-bottom-right"});
						}
					}
			})
		}
	});
	</script>
</body>
</html>