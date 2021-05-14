//Accesibilidad para notificaciones
// let padre_idioma = document.querySelector(".idioma");
// let menu_idiomas = document.querySelectorAll(".menu_idiomas");
// let idiomas_div = document.querySelector(".idioma > div:last-child");
// padre_idioma.addEventListener('keydown', function (e) {
//     console.log(e.target);
//     if (e.keyCode == 9) {
//         if (e.target.closest(".idioma")) {
//             idiomas_div.style.marginTop = "100%";
// 	        idiomas_div.style.background = "#FFFFFF";
// 	        idiomas_div.style.zIndex = "1";
//         }else if(e.target.closest(".idioma") == false){
//             alert("No es de idioma");
//             idiomas_div.style.marginTop = "0";
// 	        idiomas_div.style.background = "initial";
// 	        idiomas_div.style.zIndex = "-1";
//         }        
//     }
// });

//Accesibilidad para notificaciones
// let notifi = document.querySelector(".sub-menu-1");
// let padre_notifi = document.querySelector(".notifi");
// padre_notifi.addEventListener('keydown', function (e) {
//     if (e.keyCode == 9) {
//       //estilos para abrir el submenu
//       notifi.style.display = "block";
//     }
// });

//Accesibilidad para el submenu de perfil
// let pos_submenu = document.querySelector(".usuario"); //hermano anterior
// let padre_subperfil = document.querySelector(".nombre");
// let menu_subperfil = document.querySelector(".nombre > ul");
//     //Cuando el hermano anterior al padre_subperfil detecte un "TAB" mostrara el menu de perfil
// pos_submenu.addEventListener('keydown', function (e) {
//     console.log(e);      
//         if (e.keyCode == 9) {
//             //estilos para abrir el submenu
//             padre_subperfil.style.overflow = "initial";
//             menu_subperfil.style.margin = "0 0 0 0";
//             menu_subperfil.style.visibility = "visible";
//             menu_subperfil.style.transition = "all 0.4s";
//         }
// });

let menu_padre = document.querySelector("#menu_h");

//Idiomas
let padre_idioma = document.querySelector(".idioma");
let menu_idiomas = document.querySelectorAll(".menu_idiomas");
let idiomas_div_2 = document.querySelector(".idioma > div:last-child");

//Notifiaciones
let notifi = document.querySelector(".sub-menu-1");
let padre_notifi = document.querySelector(".notifi");

//Submenu perfil
let pos_submenu = document.querySelector(".usuario"); //hermano anterior
let padre_subperfil = document.querySelector(".nombre");
let menu_subperfil = document.querySelector(".nombre > ul");

menu_h.addEventListener("keydown", function(e){
    
        if (e.keyCode == 9) {

          //abrir notificaciones
          if (e.target.closest(".notifi")) {
            notifi.style.display = "block";    
          }else{
            notifi.style.display = "none";
          }

          //submenu perfil
          if (e.target.closest(".nombre")) {
            padre_subperfil.style.overflow = "initial";
            menu_subperfil.style.marginTop = "0";
            menu_subperfil.style.visibility = "visible";
            menu_subperfil.style.transition = "all 0.4s";
          }else{
            padre_subperfil.style.overflow = "hidden";
            menu_subperfil.style.marginTop = "110%";
            menu_subperfil.style.visibility = "hidden";
            menu_subperfil.style.transition = "all 0.4s";
          }

          //submenu idiomas
          if (e.target.closest(".idioma")) {
            idiomas_div_2.style.marginTop = "100%";
	        idiomas_div_2.style.background = "#FFFFFF";
	        idiomas_div_2.style.zIndex = "1";
          }else{
            idiomas_div_2.style.marginTop = "0";
	        idiomas_div_2.style.background = "initial";
	        idiomas_div_2.style.zIndex = "-1";
          }
        }
})