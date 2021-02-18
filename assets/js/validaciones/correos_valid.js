"use strict";

function validacion(){
	var asunto = document.getElementById("asunto_correos").value;
	var correo = document.getElementById("mensaje_correos").value;
	var cant_error = 0;

	var regex_alfanumeric = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');

	if (asunto == null || asunto == "" || asunto.length > 100) {

		document.getElementById("error_asunto").innerHTML = "El asunto es obligatorio";
		document.getElementById("error_asunto").style.color = "#E40017";
		document.getElementById("asunto_correos").style.border = "3px solid #E40017";
		cant_error++;
		console.log(cant_error);
	
	}else{

		document.getElementById("error_asunto").innerHTML = "";
        document.getElementById("asunto_correos").style.border = "3px solid #54E346";
	}

	if (correo == null || correo == "") {

		document.getElementById("error_correo").innerHTML = "El correo es obligatorio";
		document.getElementById("error_correo").style.color = "#E40017";
		document.getElementById("mensaje_correos").style.border = "3px solid #E40017";
		cant_error++;
		console.log(cant_error);
		
	}else{

		document.getElementById("error_correo").innerHTML = "";
		document.getElementById("mensaje_correos").style.border = "3px solid #54E346";
	}

	if(cant_error>0){
        return false;
    }else{
        return true; 
    }
}