$(document).ready(function () {

    $("#mnu_habitacion").click(function () {
        alert('menu habitacion');
    });

    $("#mnu_tipo_habitacion").click(function () {
        $("#contenedor").load("tipo_habitacion.php");
    });

    $("#mnu_cliente").click(function () {
        alert('menu cliente');
    });

    $("#mnu_reservacion").click(function () {
        alert('menu reservacion');
    });
});

function th_editar(record) {
    $("#th_idtipo").val(record["idtipo"]);
    $("#th_txt_tipo_habitacion").val(record["descripcion"]);
    $("#th_txt_precio").val(record["precio"]);
    $("#th_cmb_estado").val(record["estado"]);
}

function th_nuevo() {
    $("#th_idtipo").val(0);
    $("#th_txt_tipo_habitacion").val("");
    $("#th_txt_precio").val("");
    $("#th_cmb_estado").val("A");
    $("#th_txt_tipo_habitacion").focus();
    $("#th_txt_tipo_habitacion").css("background-color", "#ffffff");
    $("#th_txt_precio").css("background-color", "#ffffff");
}

function th_guardar() {
    var error = "";
    if ($("#th_txt_tipo_habitacion").val().trim() == "") {
        error = error + "Tipo de Habitación en Blanco <br>";
        $("#th_txt_tipo_habitacion").css("background-color", "#ffdbd3");
    } else {
        $("#th_txt_tipo_habitacion").css("background-color", "#ffffff");
    }

    if (!$.isNumeric($("#th_txt_precio").val())) {
        $("#th_txt_precio").css("background-color", "#ffdbd3");
        error = error + "Precio debe ser númerico <br>";
    } else {
        $("#th_txt_precio").css("background-color", "#ffffff");
    }

    if (error == "") {

        $.ajax({
            type: "POST",
            url: "procesos/tipo_habitacion/guardar.php",
            data: $("#th_form").serialize(),
            success: function (data) {
                var result = JSON.parse(data);

                if (result.status) {
                    Swal.fire(
                        'Proyecto Hotel',
                        result.mensaje,
                        'info'
                    );

                    $("#contenedor").load("tipo_habitacion.php");
                } else {
                    Swal.fire(
                        'Proyecto Hotel - Se ha encontrado los siguientes errores:',
                        result.mensaje,
                        'error'
                    );
                }
            },
            error: function () {                
                alert("error");
            }
        });


    } else {
        Swal.fire(
            'Proyecto Hotel - Se ha encontrado los siguientes errores:',
            error,
            'error'
        )
    }
}

function th_desactivar(record) {
    
    Swal.fire({
        title: 'Proyecto Hotel',
        text: "¿Está seguro que desea desactivar el tipo de habitación " + record["descripcion"] +" ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Desactivar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "procesos/tipo_habitacion/desactivar.php",
                data: {idtipo: record["idtipo"]},
                success: function (data) {
                    var result = JSON.parse(data);

                    if (result.status) {
                        Swal.fire(
                            'Proyecto Hotel',
                            result.mensaje,
                            'info'
                        );

                        $("#contenedor").load("tipo_habitacion.php");
                    } else {
                        Swal.fire(
                            'Proyecto Hotel - Se ha encontrado los siguientes errores:',
                            result.mensaje,
                            'error'
                        );
                    }
                },
                error: function () {                  
                    alert("error");
                }
            });
        }
    })
}