"use strict";

function validacion(){
	var correo = document.getElementById("correo").value;
	var cant_error = 0;
	const regex_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	//var regex_texto = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');

	if (correo == null || correo == "" || !regex_correo.test(correo)) {

		document.getElementById("error_correo").style.display = "block";
		document.getElementById("correo").style.border = "3px solid #E40017";
		document.getElementById("alert_correo").style.display = "block";
		cant_error++;
	
	}else{

		document.getElementById("error_correo").style.display = "none";
        document.getElementById("correo").style.border = "3px solid #54E346";
		document.getElementById("alert_correo").style.display = "none";
	}

	if(cant_error>0){
        return false;
    }else{
        return true; 
    }
}