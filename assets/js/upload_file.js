alert("pspspsps");
var archivo = document.getElementById("file");
var nombre = document.getElementById("file_name");
console.log("hola");

archivo.addEventListener('change', (event) => {​​​​
    console.log(event);
    nombre.innerHTML = event.target.files[0].name;
}​​​​)
