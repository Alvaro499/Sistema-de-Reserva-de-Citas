//Cuando el input type file detecte un cambio, nos traemos el nombre del archivo seleccionado, pero la ruta no es la verdadera, ya que incluye "fake/path/"

var input_file = document.getElementById('file');
var file_name = document.getElementById('file_name');

input_file.onchange = function () {
  console.log(this.value);
  file_name.innerHTML = input_file.files[0].name;
}
