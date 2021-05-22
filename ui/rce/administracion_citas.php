<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Administración y Rervación de Citas</title>
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
			
			<section class="admin_citas">
                <h1 class="lang" key="reservas pendientes" tabindex="0">Reservas pendientes</h1>
                <div id="reservas">
                    <?php 
                    require("../../negocios/n_citas/admin_citas.php");
                    $citas = new N_Admin_Citas();
                    $datos= $citas->get_citas();
                    foreach($datos as $values)
                    {
                    ?>
                        <div class="card-reserva">
                            <h3><strong class="lang_php" key="" tabindex="0"><?php echo $values["area_servicio"]; ?></strong></h3>
                            <p tabindex="0"><strong class="lang" key="usuario">Usuario: </strong> <?php echo $values["nombre"]; ?></p>
                            <p tabindex="0"><strong class="lang" key="asunto">Asunto: </strong> <?php echo $values["asunto"]; ?></p>
                            <p tabindex="0"><strong class="lang" key="fecha">Fecha: </strong> <?php echo $values["fecha"]; ?></p>
                            <p tabindex="0"><strong class="lang" key="hora">Hora: </strong> <?php echo $values["hora"]; ?></p>
                            <p tabindex="0"><strong class="lang" key="medio reunion">Medio de reunión: </strong><?php echo $values["medio"]; ?></p>
                            <p tabindex="0"><strong class="lang" key="mensaje">Mensaje: </strong> <?php echo $values["comentario"]; ?></p>
                            <!-- <button id="descargar" class="btn file">Descargar</button> -->
							<div id="separar-button">
                            	<button id="rechazar" class="btn danger lang" key="rechazar" onclick='rechazar(<?php echo $values["idcitas_cliente"];?>, "<?php echo $values["cedula"];?>");' tabindex="0">Rechazar</button>
                            	<button id="aceptar" class="btn success lang" key="aceptar" onclick='aceptar(<?php echo $values["idcitas_cliente"];?>,"<?php echo $values["medio"];?>","<?php echo $values["cedula"];?>");' tabindex="0">Aceptar</button>
							</div>
                        </div>
                    <?php }?>
                </div>
            </section>
			
		</main>

	</div>


	
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../assets/js/toastr/toastr.min.js"></script>
    <script type="text/javascript">
	function aceptar(id,medio,cedula)
    {
        window.location="reserva_aceptada.php?id="+id+"&medio="+medio+"&cedula="+cedula;
            // $.ajax({
            //     type: "POST",
            //     url:"../../negocios/n_citas/metodos_citas.php",
            //     data: datos,
            //     //Métodos
            //     success: function(data){
            //         if(data==1){
            //             toastr.success("Se guardo exitosamente","Éxitos");
            //         }else if(data==2){
            //             toastr.error("Ese usuario ya hiciste","Error");
            //         }else{
            //             toastr.error("Error desconocido","Error");
            //         }
            //     }
            // })   
    }

    function rechazar(id,cedula){
        let dato_id = "id="+id +
        "&cedula="+cedula;


         $.ajax({
                type: "POST",
                url:"../../negocios/n_citas/eliminar_cita.php",
                data: dato_id,
                //Métodos
                success: function(data){
                    if(data==1){
                        toastr.success("Se rechazó exitosamente","Éxitos",{positionClass: "toast-bottom-right", showDuration: "400"});
                        location.reload();
                    }else if(data==2){
                        toastr.error("Error al rechazar cita","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
                    }else{
                        toastr.error("Error desconocido","Error",{positionClass: "toast-bottom-right", showDuration: "400"});
                    }
                }
            })
    }
    
</script>
    <script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
	<script type="text/javascript" src="../../assets/js/accesibilidad.js"></script>
</body>
</html>
