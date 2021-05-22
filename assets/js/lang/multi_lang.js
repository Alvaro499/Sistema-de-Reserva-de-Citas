console.log("Hi");
let palabras = {
	"es":{
		//Menu Vertical
		"inicio": "Inicio",
		"correo": "Correos",
		"registro": "Registro",
		"citas": "Citas",
		"analitica web": "Analítica Web",
		"calendario": "Calendario",
		"guia web": "Guía Web",

		//Submenu
		"salir": "Salir",

		//Notificaciones
		"solicitud enviada": "Su solicitud fue enviada",
		"solicitud aceptada": "Su solicitud para una capacitación fue aceptada. \n Tema: ",
		"solicitud rechazada": "Su solicitud para una capacitación fue rechazada. \n Tema: ",

		//Submenu Perfil
		"mi perfil": "Mi Perfil",
		"cerrar sesion": "Cerrar Sesión",

		//Traducciones al espanol, texto php servicios
		"Administración": "Administración",
		"Contabilidad": "Contabilidad",
		"Control Interno": "Control Interno",
		"Facturación Electrónica": "Facturación Electrónica",
		"Finanzas y Economía": "Finanzas y Economía",
		"Infraestructura y TIC's": "Infraestructura y TIC's",
		"Mercadeo": "Mercadeo",
		"Soporte Fiscal y Tributario": "Soporte Fiscal y Tributario",
		"Soporte Legal": "Soporte Legal",
		"Talento Humano": "Talento Humano",
		"reservacion de citas": "Appointment Reservation",
		"area de servicio": "Service Area",
		"administracion": "Administración",
		"contabilidad": "Contabilidad",
		"control interno": "Control Interno",
		"facturacion electronica": "Facturación Electrónica",
		"finanzas y economia": "Finanzas y Economía",
		"infraestructura y tic's": "Infraestructura y TIC's",
		"mercadeo": "Mercadeo",
		"soporte fiscal y tributario": "Soporte Fiscal y Tributario",
		"soporte legal": "Soporte Legal",
		"talento humano": "Talento Humano",
		

	// Notificaciones, datos extra duplicados
		//Obtener la traduccion de texto php desde el ingles, ya que el key no se actualiza al estar en ingles
		"Administration": "Administración",
		"Accounting": "Contabilidad",
		"Internal control": "Control Interno",
		"Electronic Billing": "Facturación Electrónica",
		"Finance and Economy": "Finanzas y Economía",
		"Infrastructure and ICT": "Infraestructura y TIC's",
		"Marketing": "Mercadeo",
		"Fiscal and Tax Support": "Soporte Fiscal y Tributario",
		"Legal Support": "Soporte Legal",
		"Human Talent": "Talento Humano",

	// CORREOS
		"especifique correo": "Especifique el asunto del correo a enviar",
		"asunto": "Asunto:",
		"asunto requerido" : "El asunto es obligatorio",
		"mensaje" : "Mensaje:",
		"cuerpo requerido" : "El cuerpo del correo es obligatorio",
		"adjuntar archivos": "Adjuntar Archivos",
		"ningun archivo": "Ningún archivo seleccionado",
		"enviar": "Enviar",

	// REGISTRO
		"registro usuario" : "Registro de Usuario:",
		"cedula" : "Cédula:",
		"cedula no valida" : "Cédula no válida. Verificar que no incluya letras o guiones",
		"nombre usuario" : "Nombre del Usuario:",
		"nombre invalido" : "El formato de nombre de usuario es inválido, revise que no digito numeros",
		"apellido1" : "Primer Apellido:",
		"formato apellido1" : "El formato de primer apellido es inválido, revise que no digito numeros",
		"apellido2" : "Segundo Apellido:",
		"formato apellido2" : "El formato de segundo apellido es inválido, revise que no digito numeros",
		"formato correo" : "El formato de correo es inválido",
		"celular" : "Número de Celular:",
		"formato celular" : "El formato de celular es inválido, revise que no lleve letras",
		"celular opcional" : "Número de Celular Opcional:",
		"formato celular op" : "El formato del celular opcional es inválido, revise que no lleve letras",
		"rol usuario" : "Rol del Usuario:",
		"empleado" : "Empleado",
		"cliente" : "Cliente",

	//Rerva Citas Cliente RCC
		"reservacion citas" : "Reservación de Citas",
		"area servicio" : "Área de Servicio:",
		"fecha" : "Fecha:",
		"hora" : "Hora:",
		"medio reunion" : "Medio de Reunión:",
		"presencial" : "Presencial",
		"virtual" : "Virtual",
		"administracion": "Administración",
		"contabilidad": "Contabilidad",
		"control interno" : "Control Interno",
		"facturacion electronica" : "Facturación Electrónica",
		"finanzas y economia" : "Finanzas y Economía",
		"infraestructura tic" : "Infraestructura y TIC's",
		"mercadeo" : "Mercadeo",
		"soporte fiscal tributario" : "Soporte Fiscal y Tributario",
		"soporte legal" : "Soporte Legal",
		"talento humano" : "Talento Humano",
		"formato fecha1" : "La fecha es obligatoria",
		"formato fecha1" : "La fecha debe ser al menos 2 dias posteriores a la fecha actual",
		"formato hora" : "La Hora es obligatoria",
		"formato mensaje cita" : "El mensaje es requerido",
	
	//Rerva Citas Empleados RCE - Reservacion Aceptada
		"reserva aceptada" : "Reserva Aceptada",
		"nombre" : "Nombre:",
		"formato nombre colaborador" : "El formato del usuario colaborador es inválido, revisar que no haya digitado datos numéricos",
		"oficina" : "Oficina:",
		"formato lugar presencial" : "Lugar de la cita presencial es requerido",
		"plataforma" : "Plataforma:",
		"formato digitar enlace" : "Digite un código o un enlace",
		"cantidad personas" : "Cantidad de Personas:",
		"solo numeros" : "Digite solo datos numéricos",
		"confirmar" : "Confirmar",
	
	//Rerva Citas Empleados RCE - Administracion Citas (tarjetas)
		"reservas pendientes" : "Reservas Pendientes",
		"usuario" : "Usuario: ",
		"aceptar" : "Aceptar",
		"rechazar" : "Rechazar",

	//PERFIL
		"actualizar foto" : "Actualizar foto de perfil",
		"caract foto" : "Antes de actualizar su foto de perfil en la plataforma asegúrese que dicha foto cumpla las siguientes características:",
		"tamano foto" : "Debe de tener un tamaño menor a 25MB.",
		"formato foto" : "Debe de estar únicamente en formato jpg, png o svg.",
		"resolucion foto" : "Asegúrese que posea una buena resolución y esté centrada.",
		"elim foto" : "Eliminar foto",
		"info perfil" : "Información de perfil",
		"nombre perfil" : "Nombre:",
		"correo perfil" : "Correo Electrónico:",
		"telefono" : "Numero de Teléfono:",
		"telefono opcional" : "Número de Teléfono Opcional",
		"ayuda" : "Ayuda",
		"cambiar contra" : "Cambiar contraseña",
			//Inputs
		"Update" : "Actualizar",
		"Close" : "Cerrar"


	},

	"en":{
		"inicio": "Home",
		"correo": "Emails",
		"registro": "Register",
		"citas": "Appointments",
		"analitica web": "Web Analytics",
		"calendario": "Calendar",
		"guia web": "Web Guide",
		"salir": "Log Out",
		"solicitud enviada": "Your request was sent",
		"solicitud aceptada": "Your request was accepted. \n Service area: ",
		"solicitud rechazada": "Your request was declined. \n Service area: ",
		"mi perfil": "My Profile",
		"administracion": "Administration",
		"contabilidad": "Contability",
		"control interno": "Internal Control",
		"facturacion electronica": "Electronic Billing",
		"finanzas y economia": "Finance and Economy",
		"infraestructura y tic's": "Infrastructure and ICT",
		"mercadeo": "Marketing",
		"soporte fiscal y tributario": "Fiscal and Tax Support",
		"soporte legal": "Legal Support",
		"talento humano": "Human Talent",

	// Notificaciones, datos extra duplicados
		//Obtener la traduccion de texto php desde el ingles, ya que el key no se actualiza al estar en ingles
		"Administración": "Administration",
		"Contabilidad": "Contability",
		"Control Interno": "Internal Control",
		"Facturación Electrónica": "Electronic billing",
		"Finanzas y Economía": "Finance and Economy",
		"Infraestructura y TIC's": "Infrastructure and ICT",
		"Mercadeo": "Marketing",
		"Soporte Fiscal y Tributario": "Fiscal and Tax Support",
		"Soporte Legal": "Legal Support",
		"Talento Humano": "Human Talent",

	//CORREOS
		"especifique correo": "Specify the subject of the email to send",
		"asunto": "Subject:",
		"asunto requerido" : "Subject is required",
		"mensaje" : "Body:",
		"cuerpo requerido" : "Body is required",
		"adjuntar archivos": "Attach a file",
		"ningun archivo": "No selected file",
		"enviar": "Send",

	//REGISTRO
		"registro usuario" : "User Register:",
		"cedula" : "ID:",
		"cedula no valida" : "Invalid ID. Verify that it does not include letters or hyphens",
		"nombre usuario" : "User Name:",
		"nombre invalido" : "Username format is invalid, check that you did not enter numbers",
		"apellido1" : "First Surname:",
		"formato apellido1" : "First surname is invalid, check that you did not enter numbers",
		"apellido2" : "Second Surname:",
		"formato apellido2" : "Second surname is invalid, check that you did not enter numbers",
		"formato correo" : "Email format is invalid",
		"celular" : "Cell phone number:",
		"formato celular" : "Cell phone format is invalid, check that it does not have letters",
		"celular opcional" : "Optional Cell Number:",
		"rol usuario" : "User Rol:",
		"empleado" : "Employer",
		"cliente" : "Customer",
		
	//Rerva Citas Cliente RCC
		"reservacion citas" : "Appointment Reservation",
		"area servicio" : "Service Area:",
		"fecha" : "Date:",
		"hora" : "Hour:",
		"medio reunion" : "Type of Meeting:",
		"presencial" : "Presential ",
		"virtual" : "Virtual",
		"administracion": "Administration",
		"contabilidad": "Contability",
		"control interno" : "Internal Control",
		"facturacion electronica" : "Electronic Billing",
		"finanzas y economia" : "Finance and Economy",
		"infraestructura tic" : "Infrastructure and ICT",
		"mercadeo" : "Marketing",
		"soporte fiscal tributario" : "Fiscal and Tax Support",
		"soporte legal" : "Legal Support",
		"formato fecha1" : "Date is required",
		"formato fecha2" : "Date must be at least 2 days after the current date",
		"formato hora" : "Hour is required",
		"formato mensaje cita" : "Message is required",

	//Rerva Citas Cliente RCC
		"reserva aceptada" : "Reservation Accepted",	
		"nombre" : "Name:",
		"formato nombre colaborador" : "Format of the collaborating user is invalid, check that you have not entered numerical data data or the field is empty",
		"oficina" : "Office Place:",
		"formato lugar presencial" : "Place of the presential appointment is required",
		"plataforma" : "Virtual Platform:",
		"formato digitar enlace" : "Enter a code or a link",
		"cantidad personas" : "Number of people:",
		"solo numeros" : "Only numeric data",
		"confirmar" : "Confirm",

	//Rerva Citas Empleados RCE - Administracion Citas (tarjetas)
		"reservas pendientes" : "Pending Appointments",
		"usuario" : "User :",
		"aceptar" : "Accept",
		"rechazar" : "Decline",

	//PERFIL
		"actualizar foto" : "Update photo",
		"caract foto" : "Before updating your profile photo on the platform, make sure the picture has the following characteristics:",
		"tamano foto" : "Size picture must be less than 25MB.",
		"formato foto" : "Only be in jpg, png or svg format.",
		"resolucion foto" : "Make sure it has a good resolution and is centered.",
		"elim foto" : "Delete photo",
		"info perfil" : "Profile Information",
		"nombre perfil" : "Name:",
		"correo perfil" : "Email:",
		"telefono" : "Phone number:",
		"telefono opcional" : "Optional Phone Number",
		"formato celular op" : "Optional cell phone format is invalid, check that it does not have letters",
		"ayuda" : "Help",
		"cambiar contra" : "Change password",
			//Inputs
		"Actualizar" : "Update",
		"Cerrar" : "Close"
		
	}
};

$(function(){
	$(".translate").click(function(){
		let lang = $(this).attr("id");
		
		$(".lang").each(function(){
			if($(this).children().length == 0) { //elementos a traducir que no tengan hijos

				$(this).text(palabras[lang][$(this).attr("key")]);
				
			}else if($(this).children().get(0).tagName == "STRONG") { //elementos a traducir pero que tienen hijos <strong> con php dentro
				var clone = $(this).children().clone();//toma al primer hijo de cada elemento con class="lang", <a> tiene 2 hijos que son <span> y el contenido de texto, pero children solo toma etiquetas

				$(this).text(palabras[lang][$(this).attr("key")]);
				//clone.before($(this)); //Coloca elementos nuevos antes del elemento especificado o comoo su priemr hijo
				$(this).append(clone); //coloca elementos nuevos como ultimo hijo
			
			}else{ //elementos a traducir pero que tienen otros hijos aparte de su contenido solo texto
				var clone = $(this).children().clone();//toma al primer hijo de cada elemento con class="lang", <a> tiene 2 hijos que son <span> y el contenido de texto, pero children solo toma etiquetas
				// console.log($(this).children());
				// console.log(clone);
				console.log($(this));
				// console.log($(this).children().get(0).tagName);
				$(this).text(palabras[lang][$(this).attr("key")]);
				clone.prependTo($(this)); //Coloca elementos nuevos antes del elemento especificado o comoo su priemr hijo
				//console.log("Soy un span");
			}
		});

		//Elementos a traducir con la clase .lang_php, quue contienen php, son los <strong>
		$(".lang_php").each(function(){
			
			var texto_php = $(this).text(); //obtener el texto de los elem a traducir
			console.log(texto_php);
			$(this).attr("key", texto_php); //pasamos el contenido de la etiqueta como valor del atributo key
			$(this).text(palabras[lang][$(this).attr("key")]);
		});

		//Traducir "values de inputs"
		//Elementos a traducir con la clase .lang_input
		$(".lang_input").each(function(){
			
			var nombre_input = $(this).attr("value"); //nombre del value
			$(this).attr("key", nombre_input); //pasamos el nombre value del input a key
			$(this).attr("value", palabras[lang][$(this).attr("key")]); //al atributo value le asignamos las claves del obj personas
		});

		//Traducir errores
		//Elementos a traducir con la clase .lang_error
		$(".lang_error").each(function(){
			$(this).text(palabras[lang][$(this).attr("key")]);
		});
	});
});

//Posicion de los iconos de cada idioma
let idiomas = document.querySelector(".idioma");
idiomas.addEventListener("click", function(e){
	let bandera = document.querySelectorAll(".menu_idiomas");
	let primero = e.target.parentNode.parentNode;
	idiomas.insertBefore(primero, bandera[0]);
	//Insertamos el nodo clickeado como primero de la lista
})