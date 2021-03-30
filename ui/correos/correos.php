<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Correos</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_correos/bridge.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/toastr/toastr.min.css">
</head>

<body>

	<?php 
		// require_once("../../sesion/C_Sesion.php");

		// $inicio = new C_Sesion();
		// $inicio->inicializar();
		
		// if(!isset($_SESSION["cedula"])) {
		// 	header("Location: ../login/sesion.php");
		// }else {
		// }     

	?>

	<div class="container">
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa" tabindex="0">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v inicio"><a href="../inicio/index.php" tabindex="0"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v correos"><a href="../correos/correos.php" tabindex="0"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v registro"><a href="../registro/registro.php" v><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v citas"><a href="#" tabindex="0"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v analitica"><a href="../analitica_web/analitica.php" tabindex="0"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v calendario"><a href="../calendario/calendario.php" tabindex="0"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v guia_web"><a href="../guia_web/guia_web.php" tabindex="0"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
					<!-- <li class="li_v asistencia"><a href="#"><span><img src="iconos/formulario.svg" aria-hidden="true" class="icono_v"></span>Asistencia Técnica</a></li> -->
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Regresar" tabindex="0"></button>
				</div>

				<ul>
					<li class="li_h idioma"><a href="#" tabindex="0"><img src="../../assets/iconos/idioma.svg" alt="Cambiar Idioma"></a></li>
					<li class="li_h notifi"><a href="#" tabindex="0"><img src="../../assets/iconos/bell.svg" alt="Notificaciones"></a></li>
					<li class="li_h usuario"><img src="../../assets/iconos/usuario.svg" id="usuario" alt="Foto de Perfil" tabindex="0"></li>
					<li class="li_h nombre"><div class="userNmae" tabindex="0"><?php echo $_SESSION["nombre"] ?></div></li>
				</ul>
			</nav>


			<!-- SubMenu de Atajos (Menu Horizontal Negro) -->
			<div class="submenu_h">
				
				<a href="../inicio/index.php"><span><img src="../../assets/iconos/inicio-blanco.svg" tabindex="0"></span>Inicio</a>
				<a href="../logout.php"><span><img src="../../assets/iconos/log-out.svg" tabindex="0"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<form id="formu" class="form_correos">
				
				<h1 tabindex="0">Correos</h1>
				<h3 tabindex="0">Especifique el asunto del correo a enviar</h3>

				<label for="asunto_correos" tabindex="0">Asunto:</label>
				<input type="text" name="asunto" id="asunto_correos" placeholder="Por ejemplo: 'actualización días feriados'" tabindex="0">
				<div id="error_asunto" tabindex="0"></div>

				<label for="mensaje_correos" tabindex="0">Mensaje:</label>
				<textarea id="mensaje_correos" name="mensaje" resize="none" tabindex="0"></textarea>
				<div id="error_correo" tabindex="0"></div>

				<div class="cont_btn">

					<label for="file" id="label_file" class="btn_ct btn_correos" name="adjuntar" tabindex="0">Adjuntar Archivo
						<span id="file_name" tabindex="0">Ningún archivo seleccionado</span>
					</label>

					<input type="file" id="file" name="file" class="archivo" tabindex="0">
					<!-- <button class="btn_correos">Adjuntar Archivo</button> -->
					<button type="submit" class="btn_correos" tabindex="0">Enviar</button>
				</div>
			</form>
			
		</main>

	</div>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script type="text/javascript" src="../../assets/js/validaciones/correos_valid.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript" src="../../assets/js/upload_file.js"></script>
	<script type="text/javascript">
	
		$("form#formu").submit(function(event){
			event.preventDefault();
			if(validacion()){

				$.ajax({
					type: "POST",
					url:"../../negocios/n_correos/correos.php",
					data: new FormData(this),
					contentType: false,
					cache:false,
					processData: false,
					//Métodos
					success: function(data){
						
						if(data==1){
							toastr.success("Los correos han sido enviado con éxito","Éxitos");
						}else if(data==0){
							toastr.error("Los correos no se enviaron","Error");
						}else{
							toastr.error("Error desconocido"+data,"Error");
						}
					}
				})
			}
		});
	</script>
</body>
</html>
