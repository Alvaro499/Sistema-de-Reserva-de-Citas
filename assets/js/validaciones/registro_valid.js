"use strict";

// var form = document.querySelector(".registro");



function validacion() {
    var ced = document.getElementById("cedula").value;
    var nomb = document.getElementById("nombre").value;
    var ape_1 = document.getElementById("p_apellido").value;
    var ape_2 = document.getElementById("s_apellido").value;
    var correo = document.getElementById("correo").value;
    var cel_1 = document.getElementById("n_celular").value;
    var cel_2 = document.getElementById("s_celular").value;
    var cant_error = 0;

    var regex_texto = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');
    var regex_tel = new RegExp('^[0-9]+$');

    const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    //var regex_correo = new RegExp(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/);

    if (ced == null || ced == "" || !regex_tel.test(ced)) {
        document.getElementById("error_ced").innerHTML = "Cédula no válida. Verificar que no incluya letras o guiones.";
        document.getElementById("error_ced").style.color = "#E40017";
        document.getElementById("cedula").style.border = "3px solid #E40017";
        console.log(ced);
        cant_error++;
    } else {

        document.getElementById("error_ced").innerHTML = "";
        document.getElementById("cedula").style.border = "3px solid #54E346";
    }

    if (nomb == null || nomb == "" || !regex_texto.test(nomb)) {


        document.getElementById("error_nomb").innerHTML = "El formato de nombre de usuario es inválido, revise que no digito numeros.";
        document.getElementById("error_nomb").style.color = "#E40017";
        document.getElementById("nombre").style.border = "3px solid #E40017";
        console.log(nomb);
        cant_error++;

    } else {
        document.getElementById("error_nomb").innerHTML = "";
        document.getElementById("nombre").style.border = "3px solid #54E346";
    }

    if (ape_1 == null || ape_1 == "" || !regex_texto.test(ape_1)) {
        document.getElementById("error_ap1").innerHTML = "El formato de primer apellido es inválido, revise que no digito numeros.";
        document.getElementById("error_ap1").style.color = "#E40017";
        document.getElementById("p_apellido").style.border = "3px solid #E40017";
        console.log(ape_1);
        cant_error++;

    } else {

        document.getElementById("error_ap1").innerHTML = "";
        document.getElementById("p_apellido").style.border = "3px solid #54E346";
    }

    if (ape_2 == null || ape_2 == "" || !regex_texto.test(ape_2)) {

        document.getElementById("error_ap2").innerHTML = "*El formato de segundo apellido es inválido, revise que no digito numeros.";
        document.getElementById("error_ap2").style.color = "#E40017";
        document.getElementById("s_apellido").style.border = "3px solid #E40017";
        console.log(ape_2);
        cant_error++;

    } else {
        document.getElementById("error_ap2").innerHTML = "";
        document.getElementById("s_apellido").style.border = "3px solid #54E346";
    }

    if (correo == null || correo == "" || !regex_correo.test(correo)) {
        document.getElementById("error_correo").innerHTML = "*El formato de correo es inválido.";
        document.getElementById("error_correo").style.color = "#E40017";
        document.getElementById("correo").style.border = "3px solid #E40017";
        console.log(correo);
        cant_error++;

    } else {

        document.getElementById("error_correo").innerHTML = "";
        document.getElementById("correo").style.border = "3px solid #54E346";
    }

    if (cel_1 == null || cel_1 == "" || !regex_tel.test(cel_1)) {
        document.getElementById("error_num1").innerHTML = "*El formato de celular es inválido, revise que no lleve letras.";
        document.getElementById("error_num1").style.color = "#E40017";
        document.getElementById("n_celular").style.border = "3px solid #E40017";
        console.log(cel_1);
        cant_error++;

    } else {
        document.getElementById("error_num1").innerHTML = "";
        document.getElementById("n_celular").style.border = "3px solid #54E346";
    }

    if (regex_tel.test(cel_2)) {

        //document.getElementById("error_num2").style.color = "#FFF";
        document.getElementById("error_num2").innerHTML = "";
        document.getElementById("s_celular").style.border = "3px solid #54E346";

    } else if (cel_2 == "") {

        document.getElementById("error_num2").innerHTML = "";
        document.getElementById("s_celular").style.border = "1px solid #80BDFF"; //estilo original del diseno

    } else {

        document.getElementById("error_num2").innerHTML = "*El formato del celular opcional es inválido, revise que no lleve letras.";
        document.getElementById("error_num2").style.color = "#E40017";
        document.getElementById("s_celular").style.border = "3px solid #E40017";
        cant_error++;
    }

    if (cant_error > 0) {
        return false;
    } else {
        return true;
    }


}