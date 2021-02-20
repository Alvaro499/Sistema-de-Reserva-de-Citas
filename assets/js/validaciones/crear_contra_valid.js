"use strict";
console.log("hola");
function validacion(){
	var contra_actual = document.getElementById("contra_actual").value;
	var contra_nueva = document.getElementById("contra_nueva").value;
	var confirm_contra = document.getElementById("confirm_contra").value;
	var cant_error = 0;
	console.log(cant_error);

	if (contra_actual == null || contra_actual == "") {

		document.getElementById("error_contra_actual").style.display = "block";
		document.getElementById("contra_actual").style.border = "3px solid #E40017";
		document.getElementById("alert_contra_actual").style.display = "block";
		cant_error++;
	
	}else{

		document.getElementById("error_contra_actual").style.display = "none";
        document.getElementById("contra_actual").style.border = "3px solid #54E346";
		document.getElementById("alert_contra_actual").style.display = "none";
	}

	if (contra_nueva == null || contra_nueva == ""  || contra_nueva.length > 12 || contra_nueva.length < 6) {

		document.getElementById("error_contra_nueva").style.display = "block";
		document.getElementById("contra_nueva").style.border = "3px solid #E40017";
		document.getElementById("alert_contra_nueva").style.display = "block";
		cant_error++;
		
	}else{

		document.getElementById("error_contra_nueva").style.display = "none";
		document.getElementById("contra_nueva").style.border = "3px solid #54E346";
		document.getElementById("alert_contra_nueva").style.display = "none";
	}

	if (confirm_contra == "" || confirm_contra != contra_nueva) {

		document.getElementById("error_confirm_contra").style.display = "block";
		document.getElementById("confirm_contra").style.border = "3px solid #E40017";
		document.getElementById("alert_confirm_contra").style.display = "block";
		cant_error++;

	}else{

		document.getElementById("error_confirm_contra").style.display = "none";
		document.getElementById("confirm_contra").style.border = "3px solid #54E346";
		document.getElementById("alert_confirm_contra").style.display = "none";
	}

	if(cant_error>0){
        return false;
    }else{
        return true; 
    }
}