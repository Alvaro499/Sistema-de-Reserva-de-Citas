var noti = document.getElementById("notifica");
var menu = document.getElementById("submenu1");
var vision = false;
var ocultar = true;

noti.onclick = function() {
    if (vision === true) {
        menu.style.display = "block";
        vision = false;
        ocultar = true;
    } else if (ocultar === true) {
        menu.style.display = "none";
        vision = true;
        ocultar = false;
    }
}