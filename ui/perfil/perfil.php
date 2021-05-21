<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Mi Perfil</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_perfil/bridge.css">
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
		
		<!-- Modal -->
		
		<div class="modal_container">
		
			<div class="modal">
				
				<form id="form_foto">
					<div class="div_form">
						<h2 class="lang" key="actualizar foto" tabindex="0">Actualizar foto de perfil</h2>
						<div class="foto_modal">
							<img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="foto_actual" alt="Foto de perfil actual, por defecto" tabindex="0" title="Foto actual">
							
						</div>

						<p class="lang" key="caract foto" tabindex="0">Antes de actualizar su foto de perfil en la plataforma asegúrese que dicha foto cumpla las siguientes características:</p>
						<br>
						<ul clasi="foto_lista" tabindex="0">
							<li class="lang" key="tamano foto">Debe de tener un tamaño menor a 25MB.</li>
							<br>
							<li class="lang" key="formato foto">Debe de estar únicamente en formato jpg, png o svg.</li>
							<br>
							<li class="lang" key="resolucion foto">Asegúrese que posea una buena resolución y esté centrada.</li>
							<br>

						</ul>
						
						<div class="opciones_modal">
							<label for="agregar_foto" class="agregar_foto lang" key="actualizar foto"><span><i class="fas fa-paperclip"></i></span>Actualizar foto de perfil</label>
							<input type="file" id="agregar_foto" name="agregar_foto">

							<a href="#" class="elim_foto lang" key="elim foto" onclick='eliminarFoto(<?php echo $_SESSION["cedula"];?>)'><span><i class="fas fa-trash-alt"></i></span>Eliminar foto actual</a>
						</div>

						<div class="btn_modal">
							<input type="submit" id="input_submit" class="lang_input" name="input_submit" key="" value="Actualizar">
							<input type="reset" id="input_reset" class="cerrar_modal lang_input" name="input_reset" key="" value="Cerrar">
						</div>

						<span class="icon_x cerrar_modal" title="Cerrar ventana" tabindex="0"><i class="fas fa-times"></i></span>
					</div>
				</form>
			</div>
		</div>
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa" tabindex="0">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v li_inicio"><a href="../inicio/index.php" key="inicio" class="lang"><span class="icono"><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span class="icono">Inicio</a></li>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_correos"><a href="../correos/correos.php" key="correo" class="lang"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<?php } ?>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_registro"><a href="../registro/registro.php" key="registro" class="lang"><span class="icono"><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<?php } ?>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_citas"><a href="../rce/administracion_citas.php" key="citas" class="lang"><span class="icono"><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<?php }else if($_SESSION["idrol"] == 3){ ?>
						<li class="li_v li_citas"><a href="../rcc/reserva_cc.php" key="citas" class="lang"><span class="icono"><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<?php } ?>

					<?php if($_SESSION["idrol"] == 2){ ?>
					<li class="li_v li_analitica"><a href="../analitica_web/analitica.php" key="analitica web" class="lang"><span class="icono"><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<?php } ?>

					<li class="li_v li_calendario"><a href="../calendario/calendario.php" key="calendario" class="lang"><span class="icono"><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v li_guia"><a href="../guia_web/guia_web.php" key="guia web" class="lang"><span class="icono"><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
				</ul>	
			</nav>

		</header>


		<header id="menu_h" tabindex="0">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Esconder menu vertical"></button>
				</div>

				<ul>
					<li class="li_h idioma" tabindex="0">
						<div class="menu_idiomas">
							<a href="#" class="translate" id="es" title="Español" tabindex="0" class="idiomas"><img src="../../assets/iconos/idioma.svg" alt="Cambiar idioma a español"></a>
						</div>
						<div class="menu_idiomas">
							<a href="#" class="translate" id="en" title="English USA" tabindex="0"><img src="../../assets/iconos/usa.svg" alt="Change language to english"></a>
						</div>

					</li>
					<li class="li_h notifi menu__item container-submenu" id="notifica" tabindex="0"><a href="#"><img src="../../assets/iconos/bell.svg" alt="Notificaciones"></a>
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
								<li class="menu_item" tabindex="0">
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

					<li class="li_h usuario" tabindex="0"><img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="usuario" alt="Foto de Perfil"></li>
					<li class="li_h nombre" tabindex="0"><div class="userNmae" tabindex="0"><?php echo $_SESSION["nombre"] ?></div>
						<ul>
							<li>
								<div id="perfil" class="cont_perfil">
									<a class="config_options lang" key="mi perfil" href="../perfil/perfil.php" tabindex="0"><span><i class="fas fa-user-edit"></i></span>Mi perfil</a>
									<a class="config_options lang" key="salir" href="../logout.php" tabindex="0"><span><i class="fas fa-sign-out-alt"></i></span>Cerrar sesión</a>
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
			
			<div id="perfil_cont">
				<h1 class="lang" key="mi perfil" tabindex="0">Mi perfil</h1>

				<section id="foto_cont">

					<div id="foto_opciones">
						<div class="foto">
							<img src="../../assets/fotos_perfil/<?php echo $_SESSION["img_perfil"] ?>" id="foto_actual" alt="Foto de perfil actual, por defecto" tabindex="0">
						</div>

						<a href="#" for="input_foto" class="label_foto lang" key="actualizar foto" tabindex="0"><span><i class="fas fa-paperclip"></i></span>Actualizar foto de perfil</a>
						<!-- <input type="file" id="input_foto" name="input_foto"> -->
					</div>

				</section>

				<section id="info_cont">
					<div class="card_cont">

						<h2 class="lang" key="info perfil" tabindex="0">Información de perfil</h2>

						<?php
							require("../../data/data_perfil.php");
							$datos = new D_Perfil;
							$info_perfil = $datos->infoPerfil($_SESSION["cedula"]);

							foreach($info_perfil as $value){
						
						?>
						<div class="card_info" tabindex="0">
							<p class="lang" key="nombre perfil">Nombre:</p>
							<p><?php echo $value["nombre"] ?></p>

						</div >

						<div class="card_info" tabindex="0">
							<p class="lang" key="apellido1">Primer Apellido:</p>
							<p><?php echo $value["apellido1"] ?></p>
						</div>

						<div class="card_info" tabindex="0">
							<p class="lang" key="apellido2">Segundo Apellido:</p>
							<p><?php echo $value["apellido2"]?></p>
						</div class="card_info">

						<div class="card_info" tabindex="0">
							<p class="lang" key="cedula">Cédula:</p>
							<p><?php echo $value["cedula"] ?></p>
						</div>

						<div class="card_info" tabindex="0">
							<p class="lang" key="correo perfil">Correo Electrónico:</p>
							<p><?php echo $value["correo"] ?></p>
						</div>

						<div class="card_info" tabindex="0">
							<p class="lang" key="telefono">Número de Teléfono:</p>
							<p><?php echo $value["celular"] ?></p>
						</div>

						<div class="card_info" tabindex="0">
							<p class="lang" key="telefono opcional">Número de Teléfono Opcional:</p>
							<p><?php echo $value["celular_opcional"] ?></p>
						</div>
						<?php } ?>
					</div>
				</section>

				<section id="ayuda_cont">
					<div class="ayuda_opciones">

						<h2 class="lang" key="ayuda" tabindex="0">Ayuda</h2>

						<div class="card_ayuda">
							<p><a href="../login/recuperar_contra.php" class="lang" key="cambiar contra">Cambiar contraseña</a></p>
						</div>
						
					</div>
				</section>
			</div>
			
		</main>

	</div>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript" src="../../assets/js/foto_perfil.js"></script>
	<script type="text/javascript">
	
		$("form#form_foto").submit(function(event){
				event.preventDefault();
				
				$.ajax({
					
					type: "POST",
					url:"../../negocios/n_perfil/foto_perfil.php",
					data: new FormData(this),
					contentType: false,
					cache:false,
					processData: false,
					//Métodos
					success: function(data){
						
						if(data==1){
							toastr.success("Foto de perfil actualizada","Éxito",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==2){
							toastr.error("No se ha podido actualizar la foto de perfil","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==3){
							toastr.error("La foto de perfil no puede ser actualizada, escoja un archivo que cumpla con las especificaciones indicadas", "Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
					}
				})
		});

		function eliminarFoto(cedula){

			 let datos = 
				"cedula=" + cedula;

			$.ajax({
					
					type: "POST",
					url:"../../negocios/n_perfil/eliminar_foto.php",
					data: datos,
					//Métodos
					success: function(data){
						
						if(data==4){
							toastr.info("Actualmente no tienes una foto de perfil", "Alerta",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==5){
							toastr.success("Foto de perfil eliminada con éxito", "Éxito",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==6){
							toastr.success("La foto de perfil no ha podido ser eliminada", "Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
						else{
							toastr.error("Error desconocido"+ data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
					}
				})
		}
	</script>
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
	<script type="text/javascript" src="../../assets/js/accesibilidad.js"></script>
</body>
</html>
