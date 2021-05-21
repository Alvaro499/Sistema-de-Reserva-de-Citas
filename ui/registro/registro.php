<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Registro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_registro/bridge.css">
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
					<?php if($_SESSION["idrol"] == 3){ ?>
					<li class="li_v li_guia"><a href="../guia_web/guia_web.php" key="guia web" class="lang"><span class="icono"><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
					<?php } ?>
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
			
			<form id="frmregistro" class="registro">
				
                <h1 class="lang" key="registro usuario" tabindex="0">Registro de Usuario</h1>
                
				<label for="cedula" class="lang" key="cedula" tabindex="0">Cédula:</label>
                <input type="text" id="cedula" class="input" name="cedula" tabindex="0">
				<div id="error_ced" class="errores lang_error" key="cedula no valida" tabindex="0">Cédula no válida. Verificar que no incluya letras o guiones</div>
                
				<label for="nombre_usuario" class="lang" key="nombre usuario" tabindex="0">Nombre:</label>
                <input type="text" id="nombre" class="input" name="nombre_usuario" tabindex="0">
				<div id="error_nomb" class="errores lang_error" key="nombre invalido" tabindex="0">El formato de nombre de usuario es inválido, revise que no digito numeros</div>
                
				<label for="apell1" class="lang" key="apellido1" tabindex="0">Primer Apellido:</label>
                <input type="text" id="p_apellido" class="input" name="apell1" tabindex="0">
				<div id="error_ap1" class="errores lang_error" key="formato apellido1" tabindex="0">El formato de primer apellido es inválido, revise que no digito numeros</div>
                
				<label for="apell2" class="lang" key="apellido2" tabindex="0">Segundo Apellido:</label>
                <input type="text" id="s_apellido" class="input" name="apell2" tabindex="0">
				<div id="error_ap2" class="errores lang_error" key="formato apellido2" tabindex="0">El formato de segundo apellido es inválido, revise que no digito numeros</div>
                
				<label for="email" class="lang" key="correo" tabindex="0">Correo Electrónico:</label>
                <input type="text" id="correo" class="input" name="email" tabindex="0" >
				<div id="error_correo" class="errores lang_error" key="formato correo" tabindex="0">El formato de correo es inválido</div>
                
				<label for="cel_1" class="lang" key="celular" tabindex="0">Número de Celular:</label>
                <input type="text" id="n_celular" class="input" name="cel_1" tabindex="0">
				<div id="error_num1" class="errores lang_error" key="formato celular" tabindex="0">El formato de celular es inválido, revise que no lleve letras</div>

                <label for="cel_2" class="lang" key="celular opcional" tabindex="0">Número de Celular Opcional:</label>
                <input type="text" id="s_celular" class="input" name="cel_2" tabindex="0">
				<div id="error_num2" class="errores lang_error"  key="formato celular op" tabindex="0">El formato del celular opcional es inválido, revise que no lleve letras</div>
				
                
                <label for="rol_usua" class="lang" key="rol usuario" tabindex="0">Rol del Usuario:</label>
                <select id="rol" class="select" name="rol">
                    
					<option value="2" name="rol" class="lang" key="empleado">Empleado</option>
                    <option value="3" name="rol" class="lang" key="cliente">Cliente</option>
                </select>

				<div class="cont_btn">
					<button type="submit" class="btn_registro" tabindex="0">Aceptar</button>
				</div>

			</form>
			
		</main>

	</div>


	
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script type="text/javascript" src="../../assets/js/validaciones/registro_valid.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
		$("form#frmregistro").submit(function(event){
			event.preventDefault();
			if(validacion()){
				var ced = $("#cedula").val();
				var nombre = $("#nombre").val();
				var apellido1 = $("#p_apellido").val();
				var apellido2 = $("#s_apellido").val();
				var correo = $("#correo").val();
				var celular = $("#n_celular").val();
				var opcional_celular = $("#s_celular").val();
				var rol = $("#rol").val();

				let datos = 
				"cedula=" + ced +
				"&nombre_usuario=" + nombre + 
				"&apell1=" + apellido1 +
				"&apell2=" + apellido2 +
				"&email=" + correo +
				"&cel_1=" + celular +
				"&cel_2=" + opcional_celular +
				"&rol=" + rol;

				$.ajax({
					type: "POST",
					url:"../../negocios/n_usuarios/insertar_usuario.php",
					data: datos,
					//Métodos
					success: function(data){
						
						if(data==1){
							toastr.success("El usuario ha sido creado exitosamente","Éxito",{positionClass: "toast-bottom-right", showDuration: "500"});

						}else if(data==2){
							toastr.error("Error al crear el usuario, verificar que la cédula introducida no esté ya registrada","Error",{positionClass: "toast-bottom-right", showDuration: "500"});

						}
						else if(data==3){
							toastr.error("No se pudo asignar el rol al usuario, verificar que la cédula introducida no esté ya registrada","Error",{positionClass: "toast-bottom-right", showDuration: "500"});

						}
						else if(data==4){
							toastr.error("Error al enviar el correo","Error",{positionClass: "toast-bottom-right", showDuration: "400"});

						}else if(data==6){
							toastr.error("Este correo ya está registrado","Error",{positionClass: "toast-bottom-right", showDuration: "400"});

						}else{
							toastr.error("Error desconocido" + data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}
					}
				})
			}
		});
		
	</script>
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
	<script type="text/javascript" src="../../assets/js/accesibilidad.js"></script>
</body>
</html>
