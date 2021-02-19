"use strict";
function validacion(){
	var correo = document.getElementById("correo").value;
	var contra = document.getElementById("contra").value;
	var cant_error = 0;
	console.log(cant_error);
	const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

	if (correo == null || correo == "" || !regex_correo.test(correo)) {

        // document.getElementById("correo").placeholder = "Correo no válido";
		document.getElementById("error_correo").style.display = "block";
		document.getElementById("correo").style.border = "3px solid #E40017";
		document.getElementById("alert_correo").style.display = "block";
		cant_error++;
		console.log(cant_error + "Un error mas");
	
	}
	else{
		document.getElementById("error_correo").style.display = "none";
        document.getElementById("correo").style.border = "3px solid #54E346";
		document.getElementById("alert_correo").style.display = "none";

	}

	if (contra == null || contra == "") {

		// document.getElementById("contra").placeholder = "Contraseña no válida";
		document.getElementById("error_contra").style.display = "block";
		document.getElementById("contra").style.border = "3px solid #E40017";
		document.getElementById("alert_contra").style.display = "block";
		cant_error++;
		console.log(cant_error);
		
	}
	else{
		document.getElementById("error_contra").style.display = "none";
        document.getElementById("contra").style.border = "3px solid #54E346";
		document.getElementById("alert_contra").style.display = "none";
	}

	if(cant_error <= 0){
        return true;
    }else{
        return false; 
    }
}