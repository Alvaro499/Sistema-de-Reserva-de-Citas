<!DOCTYPE html>
<html lang="es">
<head>
	<title>Crear Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/crear_contra.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/toastr/toastr.min.css">
</head>
<body>
	<div class="contenedor">
		<header class="parte1">
			<figure class="logo">
				<img src="../../assets/img/logo.png" tabindex="0" alt="Logo de la empresa Gapa">
			</figure>

			<button onclick="abrir()" class="botonarriba" tabindex="0">Regresar página de inicio</button>

		</header>

		<figure class="fondo">
			<!-- <img src="img/prueba2.jpg"> -->
			<div class="ventana" id="vent">
				
				<form id="frmrcrear">
					<h1 tabindex="0">Crear contraseña</h1>

					<!-- Contrasena actual -->
					<label for="contra_actual" tabindex="0">Contraseña actual:</label>
					<div id="usuario" class="prueba campos campo-usuario">
						<input id="contra_actual" class="contras" type="password" name="contra_actual" tabindex="0">
						<span id="alert_contra_actual" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						<span id="alert_visibility" class="alert_visibility iconos ocultar1" title="Presione para mostrar/ocultar la contraseña"><i class="far fa-eye"></i></span>
						
					</div>
					<div id="error_contra_actual" class="div_error" tabindex="0">Su contraseña actual no es válida.</div>

					<!-- Crear contrasena nueva -->
					<label for="contra_nueva" tabindex="0">Contraseña nueva:</label>
					<div id="contra" class="prueba campos campo-usuario">
						<input id="contra_nueva" class="contras" type="password" name="contra_nueva" tabindex="0">
						<span id="alert_contra_nueva" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						<span id="alert_visibility" class="alert_visibility iconos ocultar2" title="Presione para mostrar/ocultar la contraseña"><i class="far fa-eye"></i></span>
					</div>
					<div id="error_contra_nueva" class="div_error" tabindex="0">La contraseña debe incluir carácteres alfanuméricos.
						</br></br>La contraseña debe ser de al menos 6 a 12 carácteres.
					</div>

					<!-- Confirmar contrasena -->
					<label for="confirm_contra" tabindex="0">Confirme nueva contraseña:</label>
					<div id="contraseña" class="prueba campos campo-usuario">
						<input id="confirm_contra" class="contras" type="password" name="confirm_contra" tabindex="0">
						<span id="alert_confirm_contra" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						<span id="alert_visibility" class="alert_visibility iconos ocultar3" title="Presione para mostrar/ocultar la contraseña"><i class="far fa-eye"></i></span>
					</div>
					<div id="error_confirm_contra" class="div_error" tabindex="0">La contraseña no coincide con la anteriormente creada.</div>

					<input id="boton" type="submit" value="Confirmar nueva contraseña" tabindex="0">			
				</form>
			</figure>
	
	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/crear_contra_valid.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
		$("form#frmrcrear").submit(function(event){
			event.preventDefault();
			if(validacion()){
				var con_actual = $("#contra_actual").val();
				var con_nueva = $("#contra_nueva").val();

				let datos = 
				"actual=" + con_actual +
				"&nueva=" + con_nueva;

				$.ajax({
					type: "POST",
					url:"../../negocios/crear_contra.php",
					data: datos,
					//Métodos
					success: function(data){
						
						if(data==0){
							location.href="../inicio/index.php";
						}else if(data==1){
							toastr.error("Error de actualización de contraseña","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
						else if(data==3){
							toastr.error("Error de actualización de contraseña","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==5){
							toastr.error("Error de actualización de contraseña","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else{
							toastr.error("Error desconocido" + data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
					}
				})
			}
		});
		
	</script>
</body>
</html>