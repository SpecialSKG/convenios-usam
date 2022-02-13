$("#para-activo").click(function() {
    if ($('#activo')[0].checked = true) {
        $('#activo')[0].checked = false;
    } else {
        $('#activo')[0].checked = true;
    }
})

$('#actualizar_facultades').click(function() {
    var activo, codigo, nombre, telefono, email, personacontacto, personatelefono, personaemail;
    activo = ($('#activo').is(":checked")) ? 1 : 0;
    codigo = $('#codigo').val();
    nombre = $('#nombre').val();
    telefono = $('#telefono').val();
    email = $('#email').val();
    personacontacto = $('#personacontacto').val();
    personatelefono = $('#personatelefono').val();
    personaemail = $('#personaemail').val();

    if (
        codigo.trim() === '' && nombre.trim() === '' &&
        telefono.trim() === '' && email.trim() === '' &&
        personacontacto.trim() === '' && personatelefono.trim() === '' &&
        personaemail.trim() === ''
    ) {
        toastr.error('Por favor Ingrese todos los Campos!.', 'Alerta');
        return false;
    } else if (nombre.trim() === '') {
        toastr.warning('Por favor ingrese un Nombre Completo', 'Alerta');
        return false;
    } else if (codigo === '') {
        toastr.warning('Por favor ingrese un Codigo!.', 'Alerta');
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
    } else if (personacontacto.trim() === '') {
        toastr.warning('Por favor ingrese un Nombre de Contacto.', 'Alerta');
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
        update_facultades(activo, codigo, nombre, telefono, email, personacontacto, personatelefono, personaemail)
    }

});

function update_facultades(activo, codigo, nombre, telefono, email, personacontacto, personatelefono, personaemail) {
    $.ajax({
        dataType: 'json',
        url: baseurl + 'facultades/editar',
        type: 'post',
        dataType: 'json',
        data: {
            activo,
            codigo,
            nombre,
            telefono,
            email,
            personacontacto,
            personatelefono,
            personaemail
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
                        document.location.href = baseurl + 'facultades/';
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