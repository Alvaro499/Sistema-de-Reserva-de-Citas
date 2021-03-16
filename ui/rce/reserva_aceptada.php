<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Sile, Sebastián Montero, Kevin Navarro">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<title>Reservación de Cita</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_rce/bridge.css">
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
					<li class="li_v"><a href="../calendario/calendario.php"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v"><a href="../guia_web/guia_web.php"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
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
				
				<a href="../inicio/index.php"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="../logout.php"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
		<?php $modo = $_GET["medio"];?>
			<form id="form_aceptar" class="reserva_acept">
				
                <h1>Reserva Aceptada</h1>
                
				<label for="nombre">Nombre:</label>
                <input type="text" id="nombre" class="input">
				<div id="error_nomb" class="errores"></div>
                
				<?php if($modo=="Presencial"){?>
				<label for="medio_presencial">Oficina:</label>
                <input type="text" id="medio_presencial" class="input">
				<div id="error_ofi" class="errores"></div>
                <?php }?>

				<?php if($modo=="Virtual"){?>
				<label for="medio_virtual">Plataforma:</label>
                <select id="medio_virtual" class="select">
                    <option value="Teams">Teams</option>
                    <option value="Zoom">Zoom</option>
                    <option value="Skype">Skype</option>
                </select>
                
                <label for="link">Link:</label>
                <input type="text" id="link" class="input">
				<div id="error_link" class="errores"></div>
				<?php }?>

				<label for="c_personas">Cantidad de Persona:</label>
                <input type="number" id="c_personas" class="input">
				<div id="error_cp" class="errores"></div>

				<div class="cont_btn">
					<button type="submit" class="btn_reserva">Aceptar</button>
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
							toastr.success("La cita fue creada con exito","Éxitos");
						}else if(data==2){
							toastr.error("La cita no fue aceptada","Error");
						}else if (data==3){
							toastr.error("La cita no fue aceptada","Error");
						}else{
							toastr.error("Error desconocido"+ data,"Error");
						}
					}
				})
			}
		});
	</script>
</body>
</html>
