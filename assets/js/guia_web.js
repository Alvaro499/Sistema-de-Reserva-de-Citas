//Accesibilidad
let label = document.querySelectorAll("label");
for (var i = 0; label.length > i; i++) {
	label[i].addEventListener("keydown", function(e){
		if (e.keyCode == 32 || e.keyCode == 13) {			
			var p = e.target.nextElementSibling ;

			if (p.classList.contains('acordeon__contenido')) {

				p.classList.replace('acordeon__contenido', 'acordeon__contenido_js');

			}else if(p.classList.contains('acordeon__contenido_js')){

				p.classList.replace('acordeon__contenido_js', 'acordeon__contenido');
			}
		}
	})
}