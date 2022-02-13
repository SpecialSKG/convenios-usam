/* ------------------------------------------------------------------------------------- */

$('#agregar_actividad').click(function() {
    var
        actividad = $('#actividad').val(),
        descripcion = $('#descripcion').val(),
        fechaact = $('#fechaact').val(),
        convenio = $('#convenio').val(),
        beneficiarios = $('#beneficiarios').val();

    if (
        actividad.trim() === '' && descripcion.trim() === '' &&
        fechaact.trim() === '' && convenio.trim() === '' &&
        beneficiarios.trim() === ''
    ) {
        toastr.error('Por favor Ingrese todos los Campos!.', 'Alerta');
        return false;
    } else if (actividad.trim() === '') {
        toastr.warning('Por favor ingrese una actividad', 'Alerta');
        return false;
    } else if (descripcion.trim() === '') {
        toastr.warning('Por favor ingrese una descripcion!.', 'Alerta');
        return false;
    } else if (fechaact.trim() === '') {
        toastr.warning('Por favor ingrese una fecha!.', 'Alerta');
        return false;
    } else if (beneficiarios.trim() === '') {
        toastr.warning('Por favor agrega beneficiarios!.', 'Alerta');
        return false;
    } else {
        insertar_actividad(actividad, descripcion, fechaact, beneficiarios, convenio)
    }
});

function insertar_actividad(actividad, descripcion, fechaact, beneficiarios, convenio) {
    $.ajax({
        dataType: 'json',
        url: baseurl + 'actividades/insertar',
        type: 'post',
        dataType: 'json',
        data: {
            actividad,
            descripcion,
            fechaact,
            beneficiarios,
            convenio
        },
        dataType: 'json',
        before: function() {},
        success: function(data) {
            if (data.success === 1) {
                let timerInterval
                Swal.fire({
                    icon: 'success',
                    title: 'Guardando..!',
                    timer: 1500,
                    didOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                            const content = Swal.getHtmlContainer()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                    b.textContent = Swal.getTimerLeft()
                                }
                            }
                        }, 75)
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                        document.location.href = baseurl + 'actividades/';
                    }
                })

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'No se pudo Ingresar',
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
        error: function(e) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'No se pudo Ingresar, Hay un error interno',
                type: 'error',
                showConfirmButton: false,
                timer: 1500,
                animation: false,
                customClass: {
                    popup: 'animated flipInY'
                }
            })
        }
    });
}