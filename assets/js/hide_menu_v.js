let regre = document.querySelector(".regre"); //llamando al boton para ocultar menu
let menu_v = document.querySelector("#menu_v"); //llamando al menu vertical (morado)
let menu_h = document.querySelector("#menu_h"); //llamando al menu horizontal (rojo)
let principal = document.querySelector("#principal"); //llamando al cuerpo de la interfaz
console.log(regre);
let hide = false; //menu escondido
let out = true; //menu descubierto

/*Esta condicional permitira saber cuando el tamano del navegador sea menor o igual a 569, el cual es el rango del media query que esconde el menu vertical (morado), asi la fleccha "regre" que oculta y esconde dicho menu, sabra que debe estar en posicion de ocultado (-->).
EN RESUMEN: cambia la posicion del boton regre cuando ya el menu este oculto a causa del tamano menor a 570px */
let widthSize = window.outerWidth;
console.log(widthSize);

if (widthSize <= 569) {
	hide = true;
	out = false
	regre.style.transform = "rotate(180deg)"; //cuando la pantalla sea pequena y el menu este  oculto la flecha este en posicion de "mostrar"
}

//OXULTAR EL MENU VERTICAL, EMEPLEANDO MARGIN

regre.onclick = function(){

	if (hide == false) {

		menu_v.style.margin = "100% 100% 0 0"; //el menu vertical se mueve hacia la derecha en un 100%
 		menu_v.style.transition = "margin 0.2s linear";
 		menu_v.style.overflow = "hidden"; //ocultar lo que quede del menu vertical al estar oculto
 		menu_h.style.gridColumnStart = 1; //el menu horizontal inicia desde la columna 1, tomando la posicion del menu vertical
 		principal.style.gridColumnStart = 1; //el cuerpo de la interfaz inicia desde la columna 1, tomando la posicion del menu vertical
 		regre.style.transform = "rotate(180deg)"; //el boton gira hacia la derecha cuando el menu este descubierto
 		regre.style.transition = "transform 0.8s ease-in-out"; //
		hide = true; //cuando el boton se oculta hide sera true, porque esa escondido
		out = false; //si hide es true, entonces out sera false, porque NO esta escondido

	}else if (out == false) {

		menu_v.style.margin = "0 0 0 0"; //el menu vertical regresa a su posicion original
		menu_v.style.overflow = "initial"; //cuando el menu vuelve a aparecer este regresa a su overflow hidden
		menu_h.style.gridColumnStart = 2; //el menu horizontal  toma su posicion original, iniciando desde la columna 2 del grid
		principal.style.gridColumnStart = 2; //el cuerpo toma su posicion original, iniciando desde la columna 2 del grid
		regre.style.transform = "rotate(0deg)"; //el boton gira hacia la izquierda cuando el menu este oculto
		regre.style.transition = "transform 0.8s ease-in-out";
		hide = false;
	}
}