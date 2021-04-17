<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Mi perfil</title>
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
						<h2 tabindex="0">Actualizar foto de perfil</h2>
						<div class="foto_modal">
							<img src="../../assets/iconos/usuario.svg" id="foto_actual" alt="Foto de perfil actual, por defecto" tabindex="0">
							
						</div>

						<p tabindex="0">Antes de actualizar su foto de perfil en la plataforma asegúrese que dicha foto cumpla las siguientes características</p>
						<br>
						<ul clasi="foto_lista" tabindex="0">
							<li>Debe de tener un tamano menor a 25MB.</li>
							<br>
							<li>Debe de estar únicamente en formato jpg, png o svg.</li>
							<br>
							<li>Asegúrese que posea una buena resolución y esté centrada.</li>
							<br>

						</ul>
						
						<div class="opciones_modal">
							<label for="agregar_foto" class="agregar_foto"><span><i class="fas fa-paperclip"></i></span>Actualizar foto de perfil</label>
							<input type="file" id="agregar_foto" name="agregar_foto">

							<a href="#" class="elim_foto"><span><i class="fas fa-trash-alt"></i></span>Eliminar foto actual</a>
						</div>

						<div class="btn_modal">
							<input type="submit" id="input_submit" name="input_submit" value="Aceptar">
							<input type="reset" id="input_reset" class="cerrar_modal" name="input_reset" value="Cancelar">
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
					<li class="li_v inicio"><a href="../inicio/index.php" tabindex="0"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v correos"><a href="../correos/correos.php" tabindex="0"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v registro"><a href="../registro/registro.php" v><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v citas"><a href="#" tabindex="0"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v analitica"><a href="../analitica_web/analitica.php" tabindex="0"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v calendario"><a href="../calendario/calendario.php" tabindex="0"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v guia_web"><a href="../guia_web/guia_web.php" tabindex="0"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
				
				</ul>	
			</nav>

		</header>


		<header id="menu_h">
			<nav id="nav_h">

				<!-- Cree esete div para separar el iconos de la flecha de los de idioma, usuarios, etc -->
				<div class="regre">
					<button><img src="../../assets/iconos/flecha-izq.svg" alt="Esconder menú / Mostrar menú" tabindex="0"></button>
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
				
				<a href="../inicio/index.php" aria-hidden><span><img src="../../assets/iconos/inicio-blanco.svg" ></span tabindex="0">Inicio</a>
				<a href="../logout.php" aria-hidden><span><img src="../../assets/iconos/log-out.svg" ></span tabindex="0">Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<div id="perfil_cont">
				<h1>Mi perfil</h1>

				<section id="foto_cont">

					<div id="foto_opciones">
						<div class="foto">
							<img src="../../assets/iconos/usuario.svg" id="foto_actual" alt="Foto de perfil actual, por defecto" tabindex="0">
						</div>

						<a for="input_foto" class="label_foto"><span><i class="fas fa-paperclip"></i></span>Actualizar foto de perfil</a>
						<!-- <input type="file" id="input_foto" name="input_foto"> -->
					</div>

				</section>

				<section id="info_cont">
					<div class="card_cont">

						<h2>Información de perfil</h2>

						<?php
							require("../../data/data_perfil.php");
							$datos = new D_Perfil;
							$info_perfil = $datos->infoPerfil($_SESSION["cedula"]);

							foreach($info_perfil as $value){
						
						?>
						<div class="card_info">
							<p>Nombre:</p>
							<p><?php echo $value["nombre"] ?></p>

						</div >

						<div class="card_info">
							<p>Primer Apellido:</p>
							<p><?php echo $value["apellido1"] ?></p>
						</div>

						<div class="card_info">
							<p>Segundo Apellido:</p>
							<p><?php echo $value["apellido2"]?></p>
						</div class="card_info">

						<div class="card_info">
							<p>Cédula:</p>
							<p><?php echo $value["cedula"] ?></p>
						</div>

						<div class="card_info">
							<p>Correo Electrónico:</p>
							<p><?php echo $value["correo"] ?></p>
						</div>

						<div class="card_info">
							<p>Número de Teléfono:</p>
							<p><?php echo $value["celular"] ?></p>
						</div>

						<div class="card_info">
							<p>Número de Teléfono (opcional):</p>
							<p><?php echo $value["celular_opcional"] ?></p>
						</div>
						<?php } ?>
					</div>
				</section>

				<section id="ayuda_cont">
					<div class="ayuda_opciones">

						<h2>Ayuda</h2>

						<div class="card_ayuda">
							<p><a href="../login/recuperar_contra.php">Cambiar contraseña</a></p>
						</div>
						
					</div>
				</section>
			</div>
			
		</main>

	</div>
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script type="text/javascript" src="../../assets/js/foto_perfil.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
	
</body>
</html>
