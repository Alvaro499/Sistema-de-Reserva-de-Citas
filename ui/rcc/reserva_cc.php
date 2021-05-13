<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Reservación de Citas Clientes</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_rcc/bridge.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/toastr/toastr.min.css">
</head>

<body>

	<?php 
		require_once("../../sesion/C_Sesion.php");

		$inicio = new C_Sesion();
		$inicio->inicializar();
		
		if(!isset($_SESSION["cedula"])) {
			header("Location: ../login/sesion.php");
		}else {
			
		}     

	?>

	<div class="container">
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa" tabindex="0">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v li_inicio"><a href="../inicio/index.php" key="inicio" class="lang"><span class="icono"><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span class="icono">Inicio</a></li>
					<li class="li_v li_correos"><a href="../correos/correos.php" key="correo" class="lang"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_registro"><a href="../registro/registro.php" key="registro" class="lang"><span class="icono"><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<?php } ?>
					<li class="li_v li_citas"><a href="#" key="citas" class="lang"><span class="icono"><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v li_analitica"><a href="../analitica_web/analitica.php" key="analitica web" class="lang"><span class="icono"><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v li_calendario"><a href="../calendario/calendario.php" key="calendario" class="lang"><span class="icono"><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v li_guia"><a href="../guia_web/guia_web.php" key="guia web" class="lang"><span class="icono"><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button tabindex="0"><img src="../../assets/iconos/flecha-izq.svg" alt="Regresar"></button>
				</div>

				<ul>
					<li class="li_h idioma" tabindex="0">
						<div class="menu_idiomas">
							<a href="#es" class="translate" id="es" title="Español" tabindex="0" class="idiomas"><img src="../../assets/iconos/idioma.svg" alt="Cambiar español"></a>
						</div>
						<div class="menu_idiomas">
							<a href="#en" class="translate" id="en" title="English USA" tabindex="0"><img src="../../assets/iconos/usa.svg" alt="Change to english"></a>
						</div>

					</li>
					<li class="li_h notifi menu__item container-submenu" id="notifica"><a href="#"><img src="../../assets/iconos/bell.svg" alt="Notificaciones"></a>
						<div class="sub-menu-1" id="submenu1">
							<ul class="submenu">
								<?php 
								// require("../../negocios/n_notificacion/notificaciones.php");
								require("../../negocios/n_notificacion/notificaciones.php");
								$notifi = $datos_noti;

								//Numero de notificaciones
								$num_notifi = count($notifi);
							
								foreach($notifi as $values){
								?>
								<li class="menu_item">
									<?php if($values["Estado_Notificacion"]==0){?>
										<a href="" class="menu__link lang" key="solicitud enviada" onclick='actualizar_estado(<?php echo $values["idcitas_cliente"]; ?>);'>Su solicitud fue enviada</a>
									<?php }?>
									<?php if($values["Estado_Notificacion"]==1){?>
										<a href="" class="menu__link lang" key="solicitud aceptada" onclick='actualizar_estado_aceptado(<?php echo $values["idcitas_cliente"]; ?>);'>Su solicitud para una capacitación fue aceptada. Tema: <strong class="lang_php" key=""><?php echo $values["area_servicio"];?></strong></a>
									<?php }?>
									<?php if($values["Estado_Notificacion"]==2){?>
										<a href="" class="menu__link lang" key="solicitud rechazada" onclick='actualizar_estado_rechazado(<?php echo $values["idcitas_cliente"]; ?>);'>Su solicitud para una capacitación fue rechazada. Tema: <strong class="lang_php" key=""><?php echo $values["area_servicio"];?></strong></a>
									<?php }?>
								</li>
								<?php }?>
							</ul>
						</div>
						<div id="container_ctn_notifi">
							
							<span id="cnt_notifi"><?php echo $num_notifi ?></span>
							
						</div>
					</li>

					<!-- MOSTRAR FOTO DE PERFIL -->

					<li class="li_h usuario"><img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="usuario" alt="Foto de Perfil"></li>
					<li class="li_h nombre"><div class="userNmae"><?php echo $_SESSION["nombre"] ?></div>
						<ul>
							<li>
								<div id="perfil" class="cont_perfil">
									<a class="config_options lang" key="mi perfil" href="../perfil/perfil.php"><span><i class="fas fa-user-edit"></i></span>Mi perfil</a>
									<a class="config_options lang" key="salir" href="../logout.php"><span><i class="fas fa-sign-out-alt"></i></span>Cerrar sesión</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</nav>


			<!-- SubMenu de Atajos (Menu Horizontal Negro) -->
			<div class="submenu_h">
				
				<a href="../inicio/index.php" key="inicio" class="lang"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php" key="salir" class="lang"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<form class="cita_cliente" id="formu">
				
                <h1 class="lang" key="reservacion citas" tabindex="0">Reservación de Citas</h1>
                
				<label for="servicio" class="lang" key="area servicio" tabindex="0">Área de Servicio:</label>
                <select id="servicio" class="select" name="servicio" tabindex="0">
                    <option class="lang" key="administracion" value="Administración">Administración</option>
                    <option class="lang" key="contabilidad" value="Contabilidad">Contabilidad</option>
                    <option class="lang" key="control interno" value="Control Interno">Control Interno</option>
                    <option class="lang" key="facturacion electronica" value="Facturación Electrónica">Facturación Electrónica</option>
                    <option class="lang" key="finanzas y economia" value="Finanzas y Economía">Finanzas y Economía</option>
                    <option class="lang" key="infraestructura tic" value="Infraestructura y TIC's">Infraestructura y TIC's</option>
                    <option class="lang" key="mercadeo" value="Mercadeo">Mercadeo</option>
                    <option class="lang" key="soporte fiscal tributario" value="Soporte Fiscal y Tributario">Soporte Fiscal y Tributario</option>
                    <option class="lang" key="soporte legal" value="Soporte Legal">Soporte Legal</option>
                    <option class="lang" key="talento humano" value="Talento Humano">Talento Humano</option>
                </select>
                
                <!-- ct = Cita Cliente -->
				<label for="asunto_ct" class="lang" key="asunto" tabindex="0">Asunto:</label>
                <input type="text" id="asunto" class="input" name="asunto_ct" tabindex="0">
                <div id="error_asunto" class="errores lang_error" key="asunto requerido" tabindex="0">El Asunto es obligatorio</div>

				<label for="fecha_ct" class="lang" key="hora" tabindex="0">Fecha:</label>
                <input type="date" id="fecha" class="input" name="fecha_ct" tabindex="0">
                <div id="error_fecha1" class="errores lang_error" key="formato fecha1" tabindex="0">La fecha es obligatoria</div>
				<div id="error_fecha2" class="errores lang_error" key="formato fecha2" tabindex="0">La fecha debe ser al menos 2 dias posteriores a la fecha actual</div>

				<label for="hora_ct" tabindex="0">Hora:</label>
                <input type="time" id="hora" class="input" name="hora_ct" tabindex="0">
                <div id="error_hora" class="errores lang_error" key="formato hora" tabindex="0">La Hora es obligatoria</div>

				<label for="medio_ct" class="lang" key="medio reunion" tabindex="0">Medio de Reunión:</label>
                <select id="medio" class="select" name="medio_ct" title="El colaborador le indicará la plataforma o sitio de la capacitacion, según usted haya escogido">
                    <option class="lang" key="presencial" value="Presencial">Presencial</option>
                    <option class="lang" key="virtual" value="Virtual">Virtual</option>
                </select>
                
                <label for="mensaje_ct" class="lang_error" key="mensaje" tabindex="0">Mensaje:</label>
				<textarea id="mensaje_ct" resize="none" name="mensaje_ct" tabindex="0"></textarea>
				<div id="error_mensaje" class="errores lang_error" key="formato mensaje cita" tabindex="0">El Mensaje es obligatorio</div>

				<div class="cont_btn">
					<button type="submit" class="btn_ct lang" key="enviar" tabindex="0">Enviar</button>
				</div>

			</form>
			
		</main>

	</div>
	<script type="text/javascript" src="../../assets/js/validaciones/rcc_valid.js"></script>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript" src="../../assets/js/upload_file.js"></script>
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
							toastr.success("Se envió la solicitud exitosamente"+data,"Éxitos",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==0){
							toastr.error("Falló al solicitar la cita"+data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else{
							toastr.error("Error desconocido"+data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
					}
				})
			}
		});
	</script>
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
</body>
</html>
