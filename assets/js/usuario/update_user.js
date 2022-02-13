/* ------------------------------------------------------------------------------------- */

$('#editar_usuario').click(function () {
    var id_user = $('#id_user').val(),
        nombre_user = $('#nombre_user').val(),
        user = $('#user').val(),
        pass = $('#pass').val(),
        rol_ = $('#rol_ ').val();

    if (
        nombre_user.trim() === '' && user.trim() === '' &&
        pass.trim() === '' && rol_.trim() === ''
    ) {
        toastr.error('Por favor Ingrese todos los Campos!.', 'Alerta');
        return false;
    } else if (nombre_user.trim() === '') {
        toastr.warning('Por favor ingrese su nombre', 'Alerta');
        return false;
    } else if (user.trim() === '') {
        toastr.warning('Por favor ingrese su usuario!.', 'Alerta');
        return false;
    } else if (pass.trim() === '') {
        toastr.warning('Por favor ingrese una contraseña!.', 'Alerta');
        return false;
    } else if (rol_.trim() === '') {
        toastr.warning('Por favor seleccione un rol!.', 'Alerta');
        return false;
    } else {
        $.ajax({
            dataType: 'json',
            url: baseurl + 'usuarios/modificar',
            type: 'post',
            dataType: 'json',
            data: {
                nombre_user,
                user,
                pass,
                rol_,
                id_user
            },
            dataType: 'json',
            before: function () { },
            success: function (data) {
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
                            document.location.href = baseurl + 'usuarios/';
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
            error: function (e) {
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
});
