<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<title>Reservación de Citas Clientes</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_rcc/bridge.css">
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
				<img src="../../assets/img/logo.png" alt="Logo de la empresa">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v"><a href="../inicio/index.php"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v"><a href="../correos/correos.php"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v"><a href="../registro.registro.php"><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v"><a href="../analitica_web/analitica.php"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v"><a href="../guia_web/guia.php"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
					<!-- <li class="li_v"><a href="#"><span><img src="iconos/formulario.svg" aria-hidden="true" class="icono_v"></span>Asistencia Técnica</a></li> -->
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Regresar"></button>
				</div>

				<ul>
					<li class="li_h idioma"><a href="#"><img src="../../assets/iconos/idioma.svg" alt="Cambiar Idioma"></a></li>
					<li class="li_h notifi"><a href="#"><img src="../../assets/iconos/bell.svg" alt="Notifaciones"></a></li>
					<li class="li_h usuario"><img src="../../assets/iconos/usuario.svg" id="usuario" alt="Foto de Perfil"></li>
					<li class="li_h nombre"><div class="userNmae"><?php echo $_SESSION["nombre"] ?></div></li>
				</ul>
			</nav>


			<!-- SubMenu de Atajos (Menu Horizontal Negro) -->
			<div class="submenu_h">
				
				<a href="#"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<form class="cita_cliente" id="formu">
				
                <h1>Reservación de Citas</h1>
                
				<label for="servicio">Área de Servicio:</label>
                <select id="servicio" class="select" name="servicio">
                    <option value="Administración">Administración</option>
                    <option value="Contabilidad">Contabilidad</option>
                    <option value="Control Interno">Control Interno</option>
                    <option value="Facturación Electrónica">Facturación Electrónica</option>
                    <option value="Finanzas y Economía">Finanzas y Economía</option>
                    <option value="Infraestructura y TIC's">Infraestructura y TIC's</option>
                    <option value="Mercadeo">Mercadeo</option>
                    <option value="Soporte Fiscal y Tributario">Soporte Fiscal y Tributario</option>
                    <option value="Soporte Legal">Soporte Legal</option>
                    <option value="Talento Humano">Talento Humano</option>
                </select>
                
                <!-- ct = Cita Cliente -->
				<label for="asunto_ct">Asunto:</label>
                <input type="text" id="asunto" class="input" name="asunto_ct">
                <div id="error_asunto" class="errores"></div>

				<label for="fecha_ct">Fecha:</label>
                <input type="date" id="fecha" class="input" name="fecha_ct">
                <div id="error_fecha" class="errores"></div>

				<label for="hora_ct">Hora:</label>
                <input type="time" id="hora" class="input" name="hora_ct">
                <div id="error_hora" class="errores"></div>

				<label for="medio_ct">Medio de reunión:</label>
                <select id="medio" class="select" name="medio_ct" title="El colaborador le indicará la plataforma o sitio de la capacitacion, según usted haya escogido">
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                </select>
                
                <label for="mensaje_ct">Mensaje:</label>
				<textarea id="mensaje_ct" resize="none" name="mensaje_ct"></textarea>
				<div id="error_mensaje" class="errores"></div>

				<div class="cont_btn">
                    <!-- <button class="btn_ct">Adjuntar Archivo</button> -->
					<label for="file" id="label_file" class="btn_ct">Adjuntar Archivo
					
						<span id="file_name"></span>
					</label>
					
					<input type="file" id="file" name="file" class="archivo">
					
					<button type="submit" class="btn_ct">Enviar</button>
				</div>

			</form>
			
		</main>

	</div>
	<script type="text/javascript" src="../../assets/js/upload_file.js"></script>
	<script type="text/javascript" src="../../assets/js/validaciones/rcc_valid.js"></script>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
		$("form#formu").submit(function(event){
			event.preventDefault();
			if(validacion()){
				var area = $("#servicio").val();
				var asunto = $("#asunto").val();
				var fecha = $("#fecha").val();
				var hora = $("#hora").val();
				var medio = $("#medio").val();
				var mensaje = $("#mensaje_ct").val();
				var archivo = $("#file");

				console.log(archivo[0]);

				// let datos = 
				// "area=" + area +
				// "&asunto=" + asunto + 
				// "&fecha=" + fecha +
				// "&hora=" + hora +
				// "&medio=" + medio +
				// "&mensaje=" + mensaje;

				$.ajax({
					type: "POST",
					url:"../../negocios/n_citas/citas_clientes.php",
					data: new FormData(this),
					contentType: false,
					cache:false,
					processData: false,
					//Métodos
					success: function(data){
						
						if(data==1){
							toastr.success("Se envió la solicitud exitosamente"+data,"Éxitos");
						}else if(data==0){
							toastr.error("Falló al solicitar la cita"+data,"Error");
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
