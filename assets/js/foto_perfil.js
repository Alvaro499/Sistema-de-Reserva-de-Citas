
// CODIGO DEL MODAL
let modal = document.querySelector(".modal_container"); //contenedor
let modal_form = document.querySelector(".modal"); //formulario

    // Abrir modal
let abrir_modal = document.querySelector(".label_foto");

console.log(abrir_modal);
abrir_modal.addEventListener("click", function (e) {

    modal.style.visibility = "initial";
    modal.style.transform = "scale(1,1)";
    modal.style.transition = "transform 0.6s ease";
    if (modal.style.transform = "scale(1,1)") {
        setTimeout(() => {
            modal.style.background = "rgba(0,0,0,0.7)";    
            modal.style.transition = "background 0.6s ease";
        }, 400);        
    }
});

    // Cerrar modal
let cerrar_modal = document.querySelectorAll(".cerrar_modal");

for(let opciones in cerrar_modal){
    cerrar_modal[opciones].addEventListener("click", function (e) {
        // modal.style.display = "none";
        modal.style.visibility = "hidden";
        modal.style.transform = "scale(0.1,0.1)";
        modal.style.background = "rgba(0,0,0,0)";    
    });
}


// Caracteristicas de la foto
let
    
