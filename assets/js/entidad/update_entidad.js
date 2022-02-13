$("#para-activo").click(function() {
    if ($('#activo')[0].checked = true) {
        $('#activo')[0].checked = false;
    } else {
        $('#activo')[0].checked = true;
    }
})

$('#actualizar_entidades').click(function() {
    var
        activo = ($('#activo').is(":checked")) ? 1 : 0,
        nombre = $('#nombre').val(),
        pais = $('#sel_pais').val(),
        cont = $('#sel_cont').val(),
        direccion = $('#direccion').val(),
        siglas = $('#siglas').val(),
        tentidad = $('#tentidad').val(),
        telefono = $('#telefono').val(),
        email = $('#email').val(),
        web = $('#web').val(),
        personacontacto = $('#personacontacto').val(),
        personacargo = $('#personacargo').val(),
        personatelefono = $('#personatelefono').val(),
        personaemail = $('#personaemail').val(),
        id = $('#id').val();

    if (
        nombre === '' && pais === '' && direccion === '' &&
        siglas.trim() === '' && tentidad === '' &&
        telefono.trim() === '' && email.trim() === '' && web === '' &&
        personacontacto.trim() === '' && personacargo.trim() === '' &&
        personatelefono.trim() === '' && personaemail.trim() === ''
    ) {
        toastr.error('Por favor Ingrese todos los Campos!.', 'Alerta');
        return false;
    } else if (nombre.trim() === '') {
        toastr.warning('Por favor ingrese un Nombre Completo', 'Alerta');
        return false;
    } else if (pais === '') {
        toastr.warning('Por favor seleccione una pais!.', 'Alerta');
        return false;
    } else if (cont === '') {
        toastr.warning('Por favor seleccione una continente!.', 'Alerta');
        return false;
    } else if (direccion === '') {
        toastr.warning('Por favor ingrese una direccion!.', 'Alerta');
        return false;
    } else if (siglas === '') {
        toastr.warning('Por favor ingrese las siglas correspondientes!.', 'Alerta');
        return false;
    } else if (tentidad === '') {
        toastr.warning('Por favor seleccione el tipo de entidad!.', 'Alerta');
        return false;
    } else if (telefono.trim() === '') {
        toastr.warning('Por favor ingrese un numero telefonico!.', 'Alerta');
        return false;
    } else if (email === '') {
        toastr.warning('Por favor ingrese un correo.', 'Alerta');
        return false;
    } else if ($('#email').val().indexOf('@', 0) == -1 || $('#email').val().indexOf('.', 0) == -1) {
        toastr.warning('Por favor ingrese un correo valido.', 'Alerta!');
        return false;
    } else if (web === '') {
        toastr.warning('Por favor ingrese un sitio web de la entidad', 'Alerta');
        return false;
    } else if (personacontacto.trim() === '') {
        toastr.warning('Por favor ingrese un Nombre de Contacto.', 'Alerta');
        return false;
    } else if (personacargo.trim() === '') {
        toastr.warning('Por favor ingrese un cargo de Contacto.', 'Alerta');
        return false;
    } else if (personatelefono.trim() === '') {
        toastr.warning('Por favor ingrese un telefono de Contacto.', 'Alerta');
        return false;
    } else if (personaemail.trim() === '') {
        toastr.warning('Por favor ingrese un correo de Contacto.', 'Alerta');
        return false;
    } else if ($('#personaemail').val().indexOf('@', 0) == -1 || $('#personaemail').val().indexOf('.', 0) == -1) {
        toastr.warning('Por favor ingrese un correo  de Contacto valido.', 'Alerta!');
        return false;
    } else {
        modificar_entidades(activo, nombre, pais, cont, direccion, siglas, tentidad, telefono, web, email, personacontacto, personacargo, personatelefono, personaemail, id)
    }
});

function modificar_entidades(activo, nombre, pais, cont, direccion, siglas, tentidad, telefono, web, email, personacontacto, personacargo, personatelefono, personaemail, id) {
    $.ajax({
        dataType: 'json',
        url: baseurl + 'entidades/modificar',
        type: 'post',
        dataType: 'json',
        data: {
            activo,
            nombre,
            pais,
            cont,
            direccion,
            siglas,
            tentidad,
            telefono,
            web,
            email,
            personacontacto,
            personacargo,
            personatelefono,
            personaemail,
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
                        document.location.href = baseurl + 'entidades/';
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