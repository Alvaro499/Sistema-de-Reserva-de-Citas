<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Sile, Sebastián Montero, Kevin Navarro">
	<meta name="viewport" content="width=device-width">
	<title>Reservación de Cita</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_rce/bridge.css">
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
		<?php $modo = $_GET["medio"];?>
			<form id="form_aceptar" class="reserva_acept">
				
                <h1 class="lang" key="reserva aceptada" tabindex="0">Reserva Aceptada</h1>
                
				<label for="nombre" class="lang" key="nombre" tabindex="0">Nombre:</label>
                <input type="text" id="nombre" class="input" tabindex="0">
				<div id="error_nomb" class="errores lang_error" key="formato nombre colaborador" tabindex="0">El formato del usuario colaborador es inválido, revisar que no haya digitado datos numéricos o el campo esté vacío</div>
                
				<?php if($modo=="Presencial"){?>
				<label for="medio_presencial" class="lang" key="oficina" tabindex="0">Oficina:</label>
                <input type="text" id="medio_presencial" class="input" tabindex="0">
				<div id="error_ofi" class="errores lang_error" key="formato lugar presencial" tabindex="0">Lugar de la cita presencial es requerido</div>
                <?php }?>

				<?php if($modo=="Virtual"){?>
				<label for="medio_virtual" class="lang" key="plataforma" tabindex="0">Plataforma:</label>
                <select id="medio_virtual" class="select">
                    <option value="Teams">Teams</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Skype">Skype</option>
                </select>
                
                <label for="link" tabindex="0">Link:</label>
                <input type="text" id="link" class="input" tabindex="0">
				<div id="error_link" class="errores lang_error" key="formato digitar enlace" tabindex="0">Digite un código o un enlace</div>
				<?php }?>

				<label for="c_personas" class="lang" key="cantidad personas" tabindex="0">Cantidad de Personas:</label>
                <input type="number" id="c_personas" class="input" tabindex="0">
				<div id="error_cp" class="errores lang_error" key="solo numeros" tabindex="0">Digite solo datos numéricos</div>

				<div class="cont_btn">
					<button type="submit" class="btn_reserva lang" key="confirmar" tabindex="0">Confirmar</button>
				</div>

			</form>
	
		</main>

	</div>

	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script type="text/javascript" src="../../assets/js/validaciones/reserva_aceptada.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	<script type="text/javascript">
	
		$("form#form_aceptar").submit(function(event){
			event.preventDefault();
			if(validacion("<?php echo $modo;?>")){
				var nombre = $("#nombre").val();
				var personas = $("#c_personas").val();
				var presencial="";
				var virtual="";
				var link="";

				if("<?php echo $modo;?>"=="Presencial"){
					presencial = $("#medio_presencial").val();
				}
				if("<?php echo $modo;?>"=="Virtual"){
					virtual = $("#medio_virtual").val();
					link = $("#link").val();
				}

				let datos = 
				"id="+ "<?php echo $_GET["id"];?>"+
				"&nombre=" + nombre +
				"&presencial=" + presencial + 
				"&personas=" + personas +
				"&virtual=" + virtual +
				"&link=" + link +
				"&cedula="+"<?php echo $_GET["cedula"];?>";

				$.ajax({
					type: "POST",
					url:"../../negocios/n_citas/aceptar_cita.php",
					data: datos,
					//Métodos
					success: function(data){
						
						if(data==1){
							toastr.success("La cita fue creada con exito","Éxitos",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if(data==2){
							toastr.error("La cita no fue aceptada","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else if (data==3){
							toastr.error("La cita no fue aceptada","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
						}else{
							toastr.error("Error desconocido"+ data,"Error",{positionClass: "toast-bottom-right", showDuration: "400"});
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
