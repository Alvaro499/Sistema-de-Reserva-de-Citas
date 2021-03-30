"use strict";

function validacion(modo) {
    var nomb = document.getElementById("nombre").value;
    var cant_person = document.getElementById("c_personas").value;
    // var ofi = document.getElementById("medio_presencial").value;
    // var link = document.getElementById("link").value;
    var medio;
    if (modo == "Virtual") {
        medio = document.getElementById("link").value;
    } else {
        medio = document.getElementById("medio_presencial").value;
    }


    var cant_error = 0;

    var regex_texto = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');
    var regex_tel = new RegExp('^[0-9]+$');
    const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if (cant_person == null || cant_person == "" || !regex_tel.test(cant_person)) {
        document.getElementById("error_cp").innerHTML = "*Digite solo datos numericos";
        document.getElementById("error_cp").style.color = "#E40017";
        document.getElementById("c_personas").style.border = "3px solid #E40017";
        cant_error++;
    } else {
        document.getElementById("error_cp").style.color = "#FFF";
        document.getElementById("c_personas").style.border = "3px solid #54E346";
    }

    if (nomb == null || nomb == "" || !regex_texto.test(nomb)) {
        document.getElementById("error_nomb").innerHTML = "*El formato de usuario es inválido, revise que no digito numeros.";
        document.getElementById("error_nomb").style.color = "#E40017";
        document.getElementById("nombre").style.border = "3px solid #E40017";
        cant_error++;
    } else {
        document.getElementById("error_nomb").style.color = "#FFF";
        document.getElementById("nombre").style.border = "3px solid #54E346";
    } //||
    //!regex_texto.test(ofi)
    if (modo == "Presencial") {
        if (medio == null || medio == "") {
            document.getElementById("error_ofi").innerHTML = "*El formato de usuario es inválido, revise que no digito numeros.";
            document.getElementById("error_ofi").style.color = "#E40017";
            document.getElementById("medio_presencial").style.border = "3px solid #E40017";
            document.getElementById("error_ofi").style.display = "block";
            cant_error++;

        } else {
            document.getElementById("error_ofi").style.color = "#FFF";
            document.getElementById("medio_presencial").style.border = "3px solid #54E346";
            document.getElementById("error_ofi").style.display = "none";
        }
    }

    if (modo == "Virtual") {
        if (medio == null || medio == "") {
            document.getElementById("error_link").innerHTML = "*Digite un link";
            document.getElementById("error_link").style.color = "#E40017";
            document.getElementById("link").style.border = "3px solid #E40017";
            cant_error++;

        } else {
            document.getElementById("error_link").style.color = "#FFF";
            document.getElementById("link").style.border = "3px solid #54E346";
        }
    }

    if (cant_error > 0) {
        return false;
    } else {
        return true;
    }
}