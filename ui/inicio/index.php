<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Alvaro Siles, Sebastián, Kevin">
	<meta name="viewport" content="width=device-width">
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="../../assets/fonts_awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style_inicio/bridge.css">
</head>

<body>

	<?php 
		require_once("../../sesion/C_Sesion.php");
		

		//Varaibles de sesion
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
							<a href="#en" class="translate" id="en" title="Inglés USA" tabindex="0"><img src="../../assets/iconos/usa.svg" alt="Change to english"></a>
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
			
			<p>Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Mollitia itaque, cumque, laborum a debitis dolorum! Tempora, atque incidunt porro quas obcaecati voluptatum accusamus repellat veritatis non sed fuga soluta similique, asperiores saepe ipsa accusantium at odio in quasi fugiat eaque sint ducimus quo! Incidunt nihil, saepe nulla, quae deleniti cumque adipisci et ex unde sunt! Iste iusto temporibus, vel. Quidem consequatur voluptas, mollitia blanditiis repellat rerum facere error ut voluptatibus consectetur adipisci praesentium vitae debitis asperiores possimus recusandae minima sint nobis aliquam porro exercitationem! Corrupti necessitatibus expedita quia minus vitae sapiente! Possimus iure deleniti assumenda aperiam magni laudantium suscipit explicabo dignissimos tenetur animi eligendi, deserunt beatae quae nobis dolor optio debitis perspiciatis ut hic mollitia, consectetur praesentium incidunt iusto voluptatibus. Ut veniam animi, incidunt, aperiam assumenda maiores repellendus possimus atque qui laboriosam, omnis fugit cum ea, modi tempora laudantium id ratione asperiores ducimus non nam officiis. Inventore neque sit voluptate temporibus aut quibusdam qui nostrum, totam quaerat minima veniam! Cumque fuga aliquam necessitatibus neque corrupti facere numquam delectus praesentium. Corporis quasi accusamus ab repellat perspiciatis aspernatur ipsa a deserunt consectetur rem saepe inventore maiores qui reprehenderit atque autem voluptatum quidem architecto vitae similique eius, minima odio ratione. Corrupti similique ipsum eveniet ipsa blanditiis molestias nobis commodi cumque qui tempore? Quam dolorem commodi molestias, consectetur eius. Ipsa commodi, omnis reprehenderit nesciunt cumque ut. Veritatis atque voluptates quia vel officiis quisquam iusto, aliquam et deleniti tempora perferendis consequatur veniam rem cupiditate soluta explicabo recusandae vitae, earum minima ipsam mollitia. Voluptate, maiores, voluptatum voluptatem blanditiis sequi illum quidem. Ipsum ab, quasi rerum porro. Molestiae exercitationem aliquid, provident necessitatibus debitis ex cupiditate quidem nihil nisi odio quia ratione obcaecati, totam, perferendis, dolorum veniam repudiandae laboriosam. Architecto est accusantium deserunt impedit nam eligendi dolores nihil sunt tenetur amet eius veniam, dolorem doloribus tempore, repellat illo voluptas ea, harum. Et veritatis, soluta aperiam non necessitatibus, excepturi, veniam consequuntur saepe labore porro sint quibusdam obcaecati sequi. Nisi, quo qui fugit. Ea et quod in voluptas nostrum vero explicabo aspernatur dignissimos accusantium, enim laboriosam corporis, corrupti mollitia error eligendi soluta tempora alias iste ut, accusamus, ipsum quos exercitationem. Perferendis impedit, quisquam eveniet repellendus tempore tenetur, rerum dolorum neque quasi asperiores. Deserunt assumenda delectus doloribus deleniti repudiandae molestiae, ducimus, quaerat dolor suscipit repellendus officiis quos amet minus nam sapiente eius cupiditate quia culpa facilis magnam qui odit, provident ab, ad. Architecto modi voluptatem nesciunt maxime fugit cumque, aliquid, aspernatur repudiandae, placeat fuga impedit laborum omnis necessitatibus vitae et natus id suscipit, obcaecati. Porro dignissimos ab pariatur similique est explicabo quaerat, dolorum accusamus voluptatum perferendis, voluptates in cumque provident eligendi nesciunt consequatur delectus beatae quia ex quos tempore animi ipsum. Ipsa laborum alias vel nam itaque iste ullam laudantium perspiciatis quisquam quos! Nesciunt blanditiis ipsum aliquam facere fugiat perspiciatis quos. Error commodi aut quis quisquam quae tenetur, dolor, sequi. Amet, vel nostrum officia alias laboriosam corrupti at laborum, ipsum a inventore velit distinctio soluta voluptatem recusandae optio earum molestiae numquam eos culpa aut sequi exercitationem quae. Neque voluptatum temporibus necessitatibus?</p>
			<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam nam dignissimos iusto. Optio rem in rerum aperiam, fugit debitis illo vitae deleniti inventore atque nam explicabo laborum assumenda autem consequatur quaerat fugiat voluptate, magnam aliquam placeat. Dolores voluptas earum neque consequatur, sed ratione tempore voluptatem excepturi magnam cum fugiat, nam debitis porro animi possimus dicta blanditiis facilis? Rem repellat et quam vero, nisi nostrum amet a dolores ducimus optio. Perferendis tenetur repellat voluptate quisquam corrupti autem nihil. Eos quia odio totam, perferendis iure laboriosam, error. Officia ab soluta consectetur, tenetur magnam officiis, numquam deleniti. Ratione nesciunt enim ipsa possimus nihil adipisci exercitationem, facere vero dolor! Quo, ex nihil delectus aliquam. Eveniet deleniti libero omnis aliquid quibusdam aut aliquam cum esse ad maxime quas id, enim commodi numquam ipsum maiores voluptate eligendi tempora facere distinctio qui mollitia? Quia, quas minima ea ratione repellat deserunt inventore et vitae nulla sint odit quam neque iste sunt temporibus porro at voluptatum debitis ab. Id dolorem molestiae pariatur, earum, perspiciatis quos fugit nostrum cupiditate soluta dolor, delectus nobis quae voluptas fuga esse consequuntur nulla sunt, assumenda qui optio. Explicabo, consequatur. Eveniet deserunt ea eius, quam! Corrupti qui explicabo eum sed nam, earum. Pariatur perferendis ut autem, in, cupiditate doloribus officiis ipsum quaerat vero obcaecati. Eveniet dicta perspiciatis ullam doloremque, numquam labore? Sit, placeat assumenda, quaerat autem repudiandae enim, voluptatum impedit inventore maiores dolorum quasi in quis consectetur aut vero tenetur nam. Illum, culpa, impedit odit veritatis aspernatur quas. Illum assumenda id debitis ad dolorem eaque laudantium nostrum suscipit, odit culpa quae beatae praesentium. Obcaecati, nihil, molestias enim, animi at laboriosam sequi debitis dolore dignissimos magni cum maiores eius similique deleniti illum voluptatem accusantium, fuga quidem labore aperiam! Dolorem cum, tenetur aspernatur dignissimos nemo. Amet deleniti illo iure porro unde rerum ut quas, earum nam atque impedit ex voluptas quae asperiores culpa inventore. Esse labore id, eum aliquam. Inventore atque quibusdam eligendi? Numquam consequatur accusantium earum repudiandae perferendis quia magnam esse nihil voluptates, reprehenderit illum omnis facere, qui tempora saepe nobis, explicabo voluptas quis. Ipsa recusandae mollitia enim! Nihil accusamus dignissimos asperiores, necessitatibus sed odit. Voluptate cum, voluptatibus distinctio est iure mollitia perferendis numquam velit nulla consectetur, unde! Accusamus unde nemo ab doloremque aliquid enim iste nulla totam debitis nesciunt quae esse veritatis officia autem tempore eum itaque, tempora harum minus, quos ex suscipit. Eius consectetur officia architecto vel unde atque enim harum ad dicta iure earum, ipsam voluptatum, reprehenderit ut sed inventore facere, id modi? Eos nisi maxime possimus iure numquam corporis, unde cumque fugiat error aliquam, itaque deserunt modi facilis omnis consequatur quae, nostrum voluptatem molestiae at. Ratione et ipsum iste aperiam, natus dicta, itaque odit quae iure fuga fugiat tempore at ullam saepe voluptate perferendis. Illum numquam est eius facilis blanditiis omnis earum assumenda perferendis officiis eum reiciendis animi ipsam suscipit nisi voluptas aliquam, tenetur debitis quisquam distinctio nobis facere aut alias. Maxime sit, beatae consequuntur nemo commodi consequatur eum odio consectetur impedit quod laborum ullam aliquid velit? Cupiditate necessitatibus excepturi ipsa voluptates fugiat, rem distinctio, labore, laboriosam iure quis voluptas? Perferendis laborum, tenetur vero nisi. Itaque voluptates velit asperiores molestiae expedita, fugiat, possimus architecto reiciendis facere. Vero autem atque quidem nihil, sunt cupiditate maxime corrupti modi officiis saepe, sit. Veritatis sunt alias sed suscipit expedita praesentium repudiandae perspiciatis incidunt enim labore debitis sit deserunt assumenda vel, eum itaque minus perferendis laborum aperiam architecto. Reprehenderit dolore, adipisci inventore iure autem labore quas aperiam possimus officiis non, quasi aliquam, rerum, odit culpa quos quia recusandae accusantium enim cum consectetur ad? Commodi placeat quisquam tempore dignissimos consequuntur exercitationem veritatis cum dolores a nemo corrupti repudiandae, magni ut dolorum veniam eligendi id amet quia quo incidunt possimus quas cumque labore quae! Explicabo, odit vitae rem, necessitatibus aut ea laboriosam, aliquam ut facere nisi minus eaque consequatur praesentium ad sit atque fuga repellendus aperiam dolorum eligendi, animi numquam quia ducimus? Alias repellat itaque aut praesentium suscipit voluptas optio totam vitae, dicta qui obcaecati. Asperiores pariatur maiores illo amet nihil optio omnis quidem nisi facere dolore eligendi inventore distinctio minima deserunt at quasi aut, suscipit recusandae praesentium error sit adipisci modi laboriosam a. Dicta, eligendi in adipisci numquam aliquid doloremque est eum, reprehenderit fugit. Tenetur atque assumenda minus ab sint asperiores! Molestiae, accusamus magnam cupiditate ab iste illo beatae atque quaerat minus reprehenderit assumenda officiis quos possimus ratione at adipisci ea explicabo. Dolor quod natus facere saepe tenetur, labore molestiae, explicabo similique animi inventore, officiis, hic voluptatem aliquid! Consequuntur dolore fuga eius, nobis laborum, aperiam deleniti consequatur dolorum dolores cupiditate iusto ipsam, quam perspiciatis distinctio possimus temporibus? Quidem nam culpa autem praesentium distinctio nisi velit rerum ipsum quas non labore soluta, veritatis aperiam fugit optio a sed consequuntur ab ipsam libero. Voluptatem, labore minima pariatur tempora iste! Doloremque, repudiandae, eligendi. Veritatis cupiditate asperiores ipsa culpa sunt ipsum? Deserunt repudiandae laboriosam, dicta dolorum ea magnam excepturi eveniet adipisci officiis nam modi fuga dignissimos nulla cumque ducimus commodi aut laborum, architecto. Quod officiis fugiat, numquam. Temporibus earum, nesciunt unde voluptas porro reiciendis voluptatibus ipsa maiores quo aspernatur velit dicta omnis, ut veniam natus modi tempora quis aut officiis provident est repellendus. Sequi quo fugiat quidem eos aliquid, aut iusto quibusdam saepe, enim, blanditiis non! Dolorem libero commodi consequuntur dolor eius illo asperiores deserunt porro similique obcaecati distinctio inventore neque consequatur provident cumque reprehenderit pariatur, repellat quod, odit et magnam, repudiandae tempora, consectetur nam. Architecto dolor, commodi obcaecati animi dignissimos harum quia id distinctio delectus sapiente doloremque voluptatem similique odio culpa maiores asperiores in? Labore animi in quia iste odit nihil cupiditate odio officiis ea corrupti iure ut alias culpa fugit, pariatur provident doloremque officia qui, dolorum architecto deserunt, delectus expedita. Consequuntur aspernatur aliquam adipisci doloribus. Maiores libero officiis dolorem magnam optio quis sed assumenda. Molestiae nisi incidunt accusamus ipsum, ipsam obcaecati iusto blanditiis voluptates numquam cumque, sint doloribus qui officia quis, veritatis. Consectetur, quis quia iusto laudantium a perspiciatis quas non repudiandae assumenda quos at suscipit eveniet labore. Consequuntur, dolorem, nesciunt mollitia tempore quia ut! Itaque suscipit praesentium mollitia repellendus.</p>
			
		</main>

	</div>
	
	<script type="text/javascript" src="../../assets/js/hide_menu_v.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="../../assets/js/notificaciones/notifi.js"></script>
	<script type="text/javascript" src="../../assets/js/notificaciones/notificaciones.js"></script> -->
	<script type="text/javascript" src="../../assets/js/lang/multi_lang.js"></script>
</body>
</html>
