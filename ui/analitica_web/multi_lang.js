console.log("Hi");
let palabras = {
	"es":{

		"inicio": "Inicio",
		"correo": "Correos",
		"registro": "Registro",
		"citas": "Citas",
		"analitica web": "Analítica Web",
		"calendario": "Calendario",
		"guia web": "Guía Web",
		"salir": "Salir",
		"solicitud enviada": "Su solicitud fue enviada",
		"solicitud aceptada": "Su solicitud para una capacitación fue aceptada. \n Tema: ",
		"solicitud rechazada": "Su solicitud para una capacitación fue rechazada. \n Tema: ",
		"mi perfil": "Mi Perfil",
		"cerrar sesion": "Cerrar Sesión",
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
		"reservacion de citas": "Appoinment Reservation",
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

	// Notificaciones
		//Obtener la traduccion de texto php desde el ingles, ya que el key no se actualiza al estar en ingles
		"Administration": "Administración",
		"Accounting": "Contabilidad",
		"Internal control": "Control Interno",
		"Electronic billing": "Facturación Electrónica",
		"Finance and Economy": "Finanzas y Economía",
		"Infrastructure and ICT": "Infraestructura y TIC's",
		"Marketing": "Mercadeo",
		"Fiscal and Tax Support": "Soporte Fiscal y Tributario",
		"Legal Support": "Soporte Legal",
		"Human Talent": "Talento Humano"
	},

	"en":{
		"inicio": "Home",
		"correo": "Emails",
		"registro": "Register",
		"citas": "Appointemens",
		"analitica web": "Analytical Web",
		"calendario": "Calendary",
		"guia web": "Guide Web",
		"salir": "Log Out",
		"solicitud enviada": "Your request was sent",
		"solicitud aceptada": "Your request was accepted. \n Service area: ",
		"solicitud rechazada": "Your request was declined. \n Service area: ",
		"mi perfil": "My Profile",
		"administracion": "Administration",
		"contabilidad": "Accounting",
		"control interno": "Internal control",
		"facturacion electronica": "Electronic Billing",
		"finanzas y economia": "Finance and Economy",
		"infraestructura y tic's": "Infrastructure and ICT",
		"mercadeo": "Marketing",
		"soporte fiscal y tributario": "Fiscal and Tax Support",
		"soporte legal": "Legal Support",
		"talento humano": "Human Talent",

	// Notificaciones
		//Obtener la traduccion de texto php desde el ingles, ya que el key no se actualiza al estar en ingles
		"Administración": "Administration",
		"Contabilidad": "Accounting",
		"Control Interno": "Internal control",
		"Facturación Electrónica": "Electronic billing",
		"Finanzas y Economía": "Finance and Economy",
		"Infraestructura y TIC's": "Infrastructure and ICT",
		"Mercadeo": "Marketing",
		"Soporte Fiscal y Tributario": "Fiscal and Tax Support",
		"Soporte Legal": "Legal Support",
		"Talento Humano": "Human Talent"
	}
};

console.log(palabras);

//var clone = $(".icono").clone();
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
				// $(this).children()[0]
				
				// console.log("Soy un strong");
			
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

		//Esto no servira en la pagina de tarjetas ya que no esta encerrados en tag strong como los de las noitificaciones
			//Elementos a traducir con la clase .lang_php, quue contienen php, son los <strong>
			$(".lang_php").each(function(){
				// for (var i = 0; i >= palabras.length; i++) {

				// }
				var texto_php = $(this).text(); //obtener el texto de los elem a traducir
				// var texto_clon = texto_php.clone();
				console.log(texto_php);
				 // console.log(texto_clon);
				$(this).attr("key", texto_php); //pasamos el contenido de la etiqueta como valor del atributo key
				$(this).text(palabras[lang][$(this).attr("key")]);
				//$(this).attr("key", texto_clon);
				// if ($(this).attr("key") == palabras[i]) {

				// 	$(this).text(palabras[lang][$(this).attr("key")]);
				// 	break;
				// 	//detener ciclo, no recuerdo el nombre
				// }//cierre del if		
			});
	});
});


//outerHTML = "<strong>Soporte Fiscal y Tributario </strong
//outerText: "Soporte Fiscal y Tributario "
//nodeName: "STRONG"
//localName: "strong"

//Posicion de los iconos de idiomas

let idiomas = document.querySelector(".idioma");
console.log(idiomas);

idiomas.addEventListener("click", function(e){
	let primero = e.target.parentNode.parentNode;
	console.log(e.target.parentNode.parentNode);
	
	let segundo = idiomas.replaceChild(primero, idiomas.firstChild);
	console.log(segundo);

	if (idiomas.replaceChild(segundo, idiomas.lastChild)) {
		idiomas.replaceChild(segundo, idiomas.lastChild);	
	}
	//idiomas.replaceChild(segundo, idiomas.lastChild);
	//idiomas.insertAdjacentElement("afterbegin",primero);
	//obtener elemento del click, colocarlo como el primer hijo reemplazando al actual, borrar el elemento del click
})