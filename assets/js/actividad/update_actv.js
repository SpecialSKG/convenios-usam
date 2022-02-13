$('#actualizar_actividad').click(function() {
    var id = $('#id').val(),
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
        modificar_actividad(id, actividad, descripcion, fechaact, beneficiarios, convenio)
    }
});

function modificar_actividad(id, actividad, descripcion, fechaact, beneficiarios, convenio){
    $.ajax({
        dataType: 'json',
        url: baseurl + 'actividades/modificar',
        type: 'post',
        dataType: 'json',
        data: {
            actividad,
            descripcion,
            fechaact,
            beneficiarios,
            convenio,
            id
        },
        dataType: 'json',
        before: function() {},
        success: function(data) {
            if (data.success === 1) {
                let timerInterval
                Swal.fire({
                    icon: 'info',
                    title: 'Actualizando..!',
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
        error: function(e) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'No se pudo Actualizar, Hay un error interno',
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