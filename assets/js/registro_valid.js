"use strict";
window.addEventListener("load", function(){
        // var form = document.querySelector(".registro");
        var ced = document.getElementById("cedula").value;
        var nomb = document.getElementById("nombre").value;
        var ape_1 = document.getElementById("p_apellido").value;
        var ape_2 = document.getElementById("s_apellido").value;
        var correo = document.getElementById("correo").value;
        var cel_1 = document.getElementById("n_celular").value;

        var regex_texto = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');
        var regex_tel = new RegExp('^[0-9]+$');
        //var regex_correo = new RegExp(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/);
        function validacion(){

            if (ced == null || ced == "" || !regex_tel.test(ced)) {
                document.getElementById("error_ced").innerHTML = "El formato de cedula es inválido, revise que no lleve guiones o letras.";
                console.log(ced);
                return false;
                
                
            }else if (nomb == null || nomb == "" || !regex_texto.test(nomb)) {
                document.getElementById("error_nomb").innerHTML = "El formato de usuario es inválido, revise que no digito numeros.";
                console.log(nomb);
                return false;

            }else if (ape_1 == null || ape_1 == "" || !regex_texto.test(ape_1)) {
                document.getElementById("error_ap1").innerHTML = "El formato de primer apellido es inválido, revise que no digito numeros.";
                console.log(ape_1);
                return false;

            }else if (ape_2 == null || ape_2 == "" || !regex_texto.test(ape_2)) {
                document.getElementById("error_ap2").innerHTML = "El formato de segundo apellido es inválido, revise que no digito numeros.";
                console.log(ape_2);
                return false;

            }else if (correo == null || correo == "" || !regex_texto.test(correo)) {
                document.getElementById("error_correo").innerHTML = "El formato de correo es inválido.";
                console.log(correo);
                return false;

            }else if (cel_1 == null || cel_1 == "" || !regex_tel.test(cel_1)) {
                document.getElementById("error_num1").innerHTML = "El formato de celular es inválido, revise que no lleve letras.";
                console.log(cel_1);
                return false;

            }
            return true; 
            
        }
})