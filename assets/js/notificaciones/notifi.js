function actualizar_estado(id) {
    let datos = "id=" + id;
    $.ajax({
        type: "POST",
        url: "../../negocios/n_notificacion/actualizar_estado.php",
        data: datos,
        //Métodos
        success: function(data) {
            console.log(data);
        }
    })
}

function actualizar_estado_aceptado(id) {
    let datos = "id=" + id;
    $.ajax({
        type: "POST",
        url: "../../negocios/n_notificacion/actualizar_estado.php",
        data: datos,
        //Métodos
        success: function(data) {
            location.href = "../../ui/calendario/calendario.php";
        }
    })
}

function actualizar_estado_rechazado(id) {
    let datos = "id=" + id;
    $.ajax({
        type: "POST",
        url: "../../negocios/n_notificacion/eliminar_notificacion.php",
        data: datos,
        //Métodos
        success: function(data) {
            console.log(data);
        }
    })
}