//Cuando el input type file detecte un cambio, nos traemos el nombre del archivo seleccionado, pero la ruta no es la verdadera, ya que incluye "fake/path/"

var ejemplo = ["Pepe", "mARIA"];
for (let ejemplos in ejemplo) {
    //console.log(ejemplos);
    console.log(ejemplo[ejemplos].length);
}
var form =  document.getElementById("formu");
var input_file = document.getElementById('file');
var file_name = document.getElementById('file_name');
var list_names = "";

input_file.onchange = function() {

    var archi = this.files;
    if (archi.length <= 6) {
    
        // console.log(archi[1]);
        // console.log(archi[1].type);
        // var archiv = archi.type;
        // console.log(archiv);
        //console.log(this.value); //regresa "fake"
        for (let index_type = 0; index_type < archi.length; index_type++) {
            
            if (archi[index_type].type == "image/jpg" || archi[index_type].type == "image/jpeg" || archi[index_type].type == "image/png" || archi[index_type].type == "application/pdf" || archi[index_type].type == "application/msword" || archi[index_type].type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || archi[index_type].type == "application/vnd.ms-excel" || archi[index_type].type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                if (archi.size >= 500000000) {
                    toastr.error("Los archivos no pueden superar los 25MB de tamaño", "Error");
                    file_name.innerHTML = "";
                    $("#file").val('');
                } else {
                    // for(let index in archi){
                    //     console.log(index);
                    //     list_names += input_file.files[index].name + "<br>";
                    // }
                    // file_name.innerHTML = list_names;
                    list_names += input_file.files[index_type].name + "<br>";
                    file_name.innerHTML = list_names;
                    // file_name.innerHTML = input_file.files[0].name;
                }
            } else {
                toastr.error("Formato no permitido", "Error");
                file_name.innerHTML = "";
                $("#file").val('');
            }

        }//cierre del for

    }else{
        toastr.error("No se pueden enviar más de 6 archivos", "Error");
        file_name.innerHTML = "";
        $("#file").val('');

    }//cierre del primer if

}