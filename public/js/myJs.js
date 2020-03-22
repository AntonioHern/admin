$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();


//----------Alerta de eliminación de registros-------------//
    $('.delete').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        swal({
            title: '¿Estás seguro?',
            text: 'Este registro será borrado permanentemente!',
            icon: 'warning',
            buttons: ["Cancelar", "Si adelente!"],
        }).then(function (value) {
            if (value) {
                swal("Poof! El registro ha sido elimindado!", {
                    icon: "success",
                }).then(function (borrar) {
                    if (borrar) {
                        window.location.href = url;
                    }
                });
            } else {
                swal("El registro no ha sido eliminado!!");
            }
        });
    });

});





