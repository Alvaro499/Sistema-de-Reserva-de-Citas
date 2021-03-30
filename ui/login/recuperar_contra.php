<!DOCTYPE html>
<html lang="es">
<head>
	<title>Recuperar Contraseña</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_login/recuperar_contra.css">
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
			
			<!-- Ventana	 -->
			<div class="ventana" id="vent">

				<form id="frmrcrear">
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
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
		$("form#frmrcrear").submit(function(event){
			event.preventDefault();
			if(validacion()){
				var correo = $("#correo").val();
				
				let datos = 
				"correo_recuperacion=" + correo;

				$.ajax({
					type: "POST",
					url:"../../negocios/recuperar_contra.php",
					data: datos,
					//Métodos
					success: function(data){
						
						if(data==0){
							toastr.success("El correo de recuperación ha sido enviado. Por favor verifique su bandeja de entrada","Éxito");
						}else{
							toastr.error("Este correo no está registrado en el sistema" + data,"Error");
						}
					}
				})
			}
		});
		
	</script>
</body>
</html>