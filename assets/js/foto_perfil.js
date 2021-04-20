console.log("HOLA MUNDO 1.0");
// CODIGO DEL MODAL
let modal = document.querySelector(".modal_container"); //contenedor
let modal_form = document.querySelector(".modal"); //formulario

    // Abrir modal
let abrir_modal = document.querySelector(".label_foto");

console.log(abrir_modal);
abrir_modal.addEventListener("click", function () {

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
for (let i = 0; i < cerrar_modal.length; i++) {
    
    cerrar_modal[i].addEventListener("click", function (e) {
        // modal.style.display = "none";
        modal.style.visibility = "hidden";
        modal.style.transform = "scale(0.1,0.1)";
        modal.style.background = "rgba(0,0,0,0)";    
    });
    
}
// for(let opciones in cerrar_modal){
//     cerrar_modal[opciones].addEventListener("click", function (e) {
//         // modal.style.display = "none";
//         modal.style.visibility = "hidden";
//         modal.style.transform = "scale(0.1,0.1)";
//         modal.style.background = "rgba(0,0,0,0)";    
//     });
// }

console.log("HOLA MUNDO 2.0");
// Caracteristicas de la foto
let formulario = document.querySelector("#form_foto");
console.log(formulario);
let input = document.querySelector("#agregar_foto");
console.log(input);
//let nombre_archivo = document.querySelector("#nombre_archivo");

input.onchage = function(){
    var archivo = this.files[0];
    var archivo_tipo = archivo.type;
    console.log(archivo);

    if (archivo_tipo == "image/png" || archivo_tipo == "image/svg" || archivo_tipo == "image/jpg" || archivo_tipo == "image/jpeg") {

        if (archivo.size >= 250000000) {
            
            toastr.error("El tamaño del archivo excede los 25MB", "Error");
            $("#agregar_foto").val('');
        
        }else{
            // toastr.success("El tamaño del archivo excede los 25MB", "Error";
        }
    }else{
        toastr.error("Formato de imagen no permitido", "Error");
        // $("#agregar_foto").val('');
        $("#agregar_foto").val('');
    }
    
};

  
