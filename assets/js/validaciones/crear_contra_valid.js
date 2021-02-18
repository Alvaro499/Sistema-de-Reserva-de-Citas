"use strict"
alert("probando");
function validacion(){
	var contra_actual = document.getElementById("contra_actual").value;
	var contra_nueva = document.getElementById("contra_nueva").value;
	var confirm_contra = document.getElementById("confirm_contra").value;
	var cant_error = 0;
	console.log(cant_error);

	//var regex_texto = new RegExp('^[a-zA-ZÀ-ÿ]+$', 'i', 'g');

	if (contra_actual == null || contra_actual == "") {

		document.getElementById("error_contra_actual").innerHTML = "La contraseña debe ser la última que se ha enviado a su correo registrado.";
		document.getElementById("error_contra_actual").style.color = "#E40017";
		 document.getElementById("contra_actual").style.border = "3px solid #E40017";
		 cant_error++;
		 console.log(cant_error);
	
	}else{

		document.getElementById("error_contra_actual").innerHTML = "";
        document.getElementById("contra_actual").style.border = "3px solid #54E346";
	}

	if (contra_nueva == null || contra_nueva == ""  || contra_nueva.length > 12 || contra_nueva.length < 5) {

		document.getElementById("error_contra_nueva").innerHTML = "Su nueva contraseña debe incluir carácteres alfanuméricos; y ser de 6 a 12 caráctres";
		document.getElementById("error_contra_nueva").style.color = "#E40017";
		document.getElementById("contra_nueva").style.border = "3px solid #E40017";
		cant_error++;
		
	}else{

		document.getElementById("error_contra_nueva").innerHTML = "";
		document.getElementById("contra_nueva").style.border = "3px solid #54E346";
	}

	if (confirm_contra == "" || !confirm_contra == contra_nueva) {

		document.getElementById("error_confirm_contra").innerHTML = "La contraseña no coincide, verificar nuevamente";
		document.getElementById("error_confirm_contra").style.color = "#E40017";
		document.getElementById("confirm_contra").style.border = "3px solid #E40017";
		cant_error++;

	}else{

		document.getElementById("error_confirm_contra").innerHTML = "";
		document.getElementById("confirm_contra").style.border = "3px solid #54E346";
	}

	if(cant_error>0){
        return false;
    }else{
        return true; 
    }
}