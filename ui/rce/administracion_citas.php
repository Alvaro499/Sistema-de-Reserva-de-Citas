<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<title>Administración y Rervación de Citas</title>
	<link rel="stylesheet" type="text/css" href="fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_rce/bridge.css">
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
				<a href="#"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<section class="admin_citas">
                <h1>Reservas pendientes</h1>
                <div id="reservas">
                    <div class="card-reserva">
                        <h3>Contabilidad</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Contabilidad</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn file">Descargar</button>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn file">Descargar</button>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    

                    <div class="card-reserva">
                        <h3>Administración</h3>
                        <p><strong>Usuario:</strong> ...</p>
                        <p><strong>Asunto:</strong> Capacitación del servicio de Administración</p>
                        <p><strong>Fecha:</strong> 28/01/2021</p>
                        <p><strong>Hora:</strong> 11:00a.m</p>
                        <p><strong>Medio de reunión: </strong>Virtual</p>
                        <p><strong>Mensaje:</strong> qwertyuiopasdfghjkldtyvuejcgebusjgwevr</p>
                        <button class="btn file">Descargar</button>
                        <button class="btn danger">Rechazar</button>
                        <button class="btn success" onclick="location.href='reserva_aceptada.html'">Aceptar</button>
                    </div>
                    
                    
                </div>
            </section>
			
		</main>

	</div>


	
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
</body>
</html>
