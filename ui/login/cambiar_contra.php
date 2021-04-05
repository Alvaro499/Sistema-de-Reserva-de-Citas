<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cambiar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/cambiar_contra.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/toastr/toastr.min.css">

</head>
<body>

	<?php

		// $parametro_ced = isset($_GET["cedula"]) ? $_GET["cedula"] : null;
		// //se trae el parametro con el valor de la cedula enviado por el correo ejecutado por recuperar_contra/php
		
		// if($parametro_ced == null){
		// 	header("location: ../login/sesion.php");
		// }
		session_start();
		//$_SESSION["ced"] = $parametro_ced;
		$parametro_ced = $_SESSION["param_cedula"];
		//se guarda el valor del parametro en una variable global para usarla en la funcion de recuperar contrasena
	?>
	<div class="contenedor">
		<header class="parte1">
			<figure class="logo">
				<img src="../../assets/img/logo.png" tabindex="0" alt="Logo de la empresa Gapa">
			</figure>

			<button onclick="abrir()" class="botonarriba" tabindex="0">Regresar página de inicio</button>
			
		</header>

		<figure class="fondo">
			
			<!-- Ventana	 -->
			<div class="ventana" id="vent">
				
				<form id="formcambiar">

					<h1 tabindex="0">Cambiar Contraseña</h1>

					<!-- Crear contrasena nueva -->
					<label for="contra_nueva" tabindex="0">Contraseña nueva: </label>
					<div id="ctn_nueva" class="prueba campos campo-usuario">
						<input id="contra_nueva" type="password" name="coontra_nueva" tabindex="0">
						<span id="alert_contra_nueva" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						<span id="alert_visibility" class="alert_visibility iconos ocultar1" title="Presione para mostrar/ocultar la contraseña"><i class="far fa-eye"></i></span>
					</div>
					<div id="error_contra_nueva" class="div_error" tabindex="0">La contraseña debe incluir carácteres alfanuméricos.
						</br></br>La contraseña debe ser de al menos 6 a 12 carácteres.
					</div>

					<!-- Confirmar contrasena -->
					<label for="confirm_contra" tabindex="0">Confirme contraseña: </label>
					<div id="ctn_confirm" class="prueba campos campo-usuario">
						<input id="confirm_contra" type="password" name="confirm_contra" tabindex="0">
						<span id="alert_confirm_contra" class="alert_icon iconos"><i class="fas fa-exclamation-circle"></i></span>
						<span id="alert_visibility" class="alert_visibility iconos ocultar2" title="Presione para mostrar/ocultar la contraseña"><i class="far fa-eye"></i></span>
					</div>
					<div id="error_confirm_contra" class="div_error" tabindex="0">La contraseña no coincide con la anteriormente creada.</div>

					<input type="submit" id="boton" value="Confirmar Contraseña" tabindex="0">			

				</form>
			</div>
		</figure>
		
	</div>

	<script type="text/javascript" src="../../assets/js/validaciones/cambiar_contra_valid.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
	$("form#formcambiar").submit(function(event){
		event.preventDefault();
		if(validacion()){
			var contra_actual = $("#confirm_contra").val();

			let datos = 
				"confirm=" + contra_actual;

			$.ajax({
					type: "POST",
					url:"../../negocios/cambiar_contra.php",
					data: datos,
					//Métodos
					success: function(data){
						if(data==0){//Usuario no existe
							toastr.success("Cambio de contraseña exitosa","Exito",{positionClass: "toast-bottom-right"});
							setTimeout(function(){ location.href="sesion.php"; }, 3000);		
						}
						else if(data==1){
							toastr.error("Fallo al cambiar contraseña","Error",{positionClass: "toast-bottom-right"});
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
