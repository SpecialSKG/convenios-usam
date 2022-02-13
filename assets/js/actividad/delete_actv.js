$('tr td #eliminar_actividad').click(
    function borrar_actividades() {
        var id = $(this).attr('data-id');

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
                    url: baseurl + "actividades/borrar",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id
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
                            document.location.href = baseurl + 'actividades/';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'No se pudo Actualizar',
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