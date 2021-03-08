// alert("pspspsps");
// var archivo = document.getElementById("file");
// var nombre = document.getElementById("file_name");
// console.log("hola");

// archivo.addEventListener('change', function(event){​​​​
//     console.log(event);
//     nombre.innerHTML = event.target.files[0].name;
// }​​​​)

document.getElementById('file').onchange = function () {
  console.log(this.value);
  document.getElementById('file_name').innerHTML = document.getElementById('file').value;
}