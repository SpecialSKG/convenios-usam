/*
var id;
var link;

$('#DeleteFacultad').on('show.bs.modal', function(event) {
    link = $(event.relatedTarget) // Button that triggered the modal
    id = link.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text()
})

/* Eliminar */
/*
$("#b-borrar-facultad").click(function() {
    $.ajax({
        url: baseurl + 'facultades/borrar/' + id,
        context: document.body
    }).done(function() {
        $("#DeleteFacultad").modal('hide');
        $(link).parent().parent().remove();
    });
});
*/
$('tr td #eliminar_facultad').click(
    function borrar_facultad() {
        var codigo = $(this).attr('data-id');

        Swal.fire({
            title: 'ELIMINAR',
            text: "No hay manera de deshacer esta accion, ¿Esta seguro que desea eliminar?",
            showDenyButton: true,
            showCancelButton: true,
            showCancelButton: false,
            confirmButtonText: `Eliminar`,
            icon: 'warning',
            denyButtonText: `Cancelar`,
            customClass: {
                confirmButton: 'btn btn-success',
                denyButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    dataType: 'json',
                    url: baseurl + "facultades/borrar",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        codigo
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success === 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Eliminado',
                                text: 'Eliminado con exito',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            document.location.href = baseurl + 'facultades/';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'No se pudo Eliminar',
                                type: 'error',
                                showConfirmButton: false,
                                timer: 1500,
                                animation: false,
                                customClass: {
                                    popup: 'animated flipInY'
                                }
                            })
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            } else if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    title: 'Registro no Eliminado',
                    text: ':)',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }
);