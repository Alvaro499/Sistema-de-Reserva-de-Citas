//Cuando el input type file detecte un cambio, nos traemos el nombre del archivo seleccionado, pero la ruta no es la verdadera, ya que incluye "fake/path/"

var input_file = document.getElementById('file');
var file_name = document.getElementById('file_name');

input_file.onchange = function() {
    var archi = this.files[0];
    var archiv = archi.type;
    console.log(archiv);
    console.log(this.value);
    if (archiv == "image/jpg" || archiv == "image/jpeg" || archiv == "image/png" || archiv == "application/pdf" || archiv == "application/msword" || archiv == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || archiv == "application/vnd.ms-excel" || archiv == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
        if (archi.size >= 500000000) {
            toastr.error("Tamaño máximo de 500Mb", "Error");
            file_name.innerHTML = "";
            $("#file").val('');
        } else {
            file_name.innerHTML = input_file.files[0].name;
        }
    } else {
        toastr.error("Formato no permitido", "Error");
        file_name.innerHTML = "";
        $("#file").val('');
    }

}