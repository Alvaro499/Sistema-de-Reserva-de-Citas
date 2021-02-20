"use strict";

function validacion(){
    var asunto = document.getElementById("asunto").value;
    var fecha = document.getElementById("fecha").value;
    var hora = document.getElementById("hora").value;
    var mensaje = document.getElementById("mensaje_ct").value;
    var cant_error = 0;
    console.log(cant_error);
    var regex_texto = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');
    var regex_tel = new RegExp('^[0-9]+$');

    const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    //var regex_correo = new RegExp(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/);

    if (asunto == null || asunto == "") {
        document.getElementById("error_asunto").innerHTML = "El Asunto es obligatorio.";
        document.getElementById("error_asunto").style.color = "#C70039";
        document.getElementById("asunto").style.border = "3px solid #E40017";
        cant_error++;
        console.log(cant_error);
    }else{
        
        document.getElementById("error_asunto").innerHTML = "";
        document.getElementById("asunto").style.border = "3px solid #54E346";

        console.log(cant_error);
    }
    
    if (mensaje == null || mensaje == "") {
        document.getElementById("error_mensaje").innerHTML = "El Mensaje es obligatorio.";
        document.getElementById("error_mensaje").style.color = "#C70039";
        document.getElementById("mensaje_ct").style.border = "3px solid #E40017";
        cant_error++;
        console.log(cant_error);
    }else{
        
        document.getElementById("error_mensaje").innerHTML = "";
        document.getElementById("mensaje_ct").style.border = "3px solid #54E346";

        console.log(cant_error);
    }
    
    if (fecha == null || fecha == "") {
        document.getElementById("error_fecha").innerHTML = "La fecha es obligatoria";
        document.getElementById("error_fecha").style.color = "#C70039";
        document.getElementById("fecha").style.border = "3px solid #E40017";
        cant_error++;
        console.log(cant_error);
    }else{
        
        document.getElementById("error_fecha").innerHTML = "";
        document.getElementById("fecha").style.border = "3px solid #54E346";

        console.log(cant_error);
    }
    
    if (hora == null || hora == "") {
        document.getElementById("error_hora").innerHTML = "La Hora es obligatoria.";
        document.getElementById("error_hora").style.color = "#C70039";
        document.getElementById("hora").style.border = "3px solid #E40017";
        cant_error++;
        console.log(cant_error);
    }else{
        
        document.getElementById("error_hora").innerHTML = "";
        document.getElementById("hora").style.border = "3px solid #54E346";

        console.log(cant_error);
    }

    
    if(cant_error>0){
        return false;
    }else{
        return true; 
    }
    
    
}
