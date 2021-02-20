<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="user-scalable=no, width=device-width">
	<title>Registro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_registro/bridge.css">
</head>

<body>

	<div class="container">
		
		<header id="menu_v">
			
			<div class="logo">
				<img src="../../assets/img/logo.png" alt="Logo de la empresa">
			</div>

			<nav id="nav_v">
				<ul>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/inicio.svg" aria-hidden="true" class="icono_v"></span>Inicio</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/email.svg" aria-hidden="true" class="icono_v"></span>Correos</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/registro.svg" aria-hidden="true" class="icono_v"></span>Registro</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/citas.svg" aria-hidden="true" class="icono_v"></span>Citas</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/analitica-web.svg" aria-hidden="true" class="icono_v"></span>Analítica Web</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/calendario.svg" aria-hidden="true" class="icono_v"></span>Calendario</a></li>
					<li class="li_v"><a href="#"><span><img src="../../assets/iconos/guia-web.svg" aria-hidden="true" class="icono_v"></span>Guía Web</a></li>
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
					<li class="li_h nombre"><div class="userNmae">Nombre Usuario</div></li>
				</ul>
			</nav>


			<!-- SubMenu de Atajos (Menu Horizontal Negro) -->
			<div class="submenu_h">
				
				<a href="#"><span><img src="../../assets/iconos/inicio-blanco.svg"></span>Inicio</a>
				<a href="#"><span><img src="../../assets/iconos/log-out.svg"></span>Salir</a>

			</div>
		</header>

		<main id="principal">
			
			<form class="registro" method="post" action="../../negocios/n_usuarios/insertar_usuario.php" onsubmit="return validacion();">
				
                <h1>Registro de Usuario</h1>
                
				<label for="cedula">Cédula:</label>
                <input type="text" id="cedula" class="input" name="cedula">
				<div id="error_ced" class="errores"></div>
                
				<label for="nombre_usuario">Nombre del Usuario:</label>
                <input type="text" id="nombre" class="input" name="nombre_usuario">
				<div id="error_nomb" class="errores"></div>
                
				<label for="apell1">Primer Apellido:</label>
                <input type="text" id="p_apellido" class="input" name="apell1">
				<div id="error_ap1" class="errores"></div>
                
				<label for="apell2">Segundo Apellido:</label>
                <input type="text" id="s_apellido" class="input" name="apell2">
				<div id="error_ap2" class="errores"></div>
                
				<label for="email">Correo Electrónico:</label>
                <input type="text" id="correo" class="input" name="email" >
				<div id="error_correo" class="errores"></div>
                
				<label for="cel_1">Número de Celular:</label>
                <input type="text" id="n_celular" class="input" name="cel_1">
				<div id="error_num1" class="errores"></div>

                <label for="cel_2">Número de Celular Opcional:</label>
                <input type="text" id="s_celular" class="input" name="cel_2">
				<div id="error_num2" class="errores"></div>
				
                
                <label for="rol_usua">Rol del Usuario:</label>
                <select id="rol" class="select" name="rol">
                    
					<option value="2" name="rol">Empleado</option>
                    <option value="3" name="rol">Cliente</option>
                </select>

				<div class="cont_btn">
					<button type="submit" class="btn_registro">Aceptar</button>
				</div>

			</form>
			
		</main>

	</div>


	
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script type="text/javascript" src="../../assets/js/validaciones/registro_valid.js"></script>
</body>
</html>
