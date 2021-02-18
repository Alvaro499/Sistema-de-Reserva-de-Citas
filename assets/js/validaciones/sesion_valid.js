"use strict";

function validacion(){
	var correo = document.getElementById("correo").value;
	var contra = document.getElementById("contra").value;
	var cant_error = 0;
	console.log(cant_error);
	const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

	if (correo == null || correo == "" || !regex_correo.test(correo)) {

        document.getElementById("correo").placeholder = "Correo no válido";
		document.getElementById("correo").style.border = "3px solid #E40017";
		cant_error++;
		console.log(cant_error);
	
	}
	else{

        document.getElementById("correo").style.border = "3px solid #54E346";

	}

	if (contra == null || contra == "") {

		document.getElementById("contra").placeholder = "Contraseña no válida";
		document.getElementById("contra").style.border = "3px solid #E40017";
		cant_error++;
		console.log(cant_error);
		
	}
	else{

        document.getElementById("contra").style.border = "3px solid #54E346";
	}

	if(cant_error <= 0){
        return true;
    }else{
        return false; 
    }
}