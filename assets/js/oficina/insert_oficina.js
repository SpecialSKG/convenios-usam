$(document).ready(function(){
    $('#telefono').on('input', function(e){
        $(this).val($(this).val().replace(/[^0-9()+-\s#*]/g, ''));
    })
    $('#personatelefono').on('input', function(e){
        $(this).val($(this).val().replace(/[^0-9()+-\s#*]/g, ''));
    })
});

$("#guardar").click(function () {
    var obj = {
        activo: ($('#activo').is(":checked")) ? 1 : 0,
        codigo: $("#codigo").val().replace(/\s+/g, '-'),
        nombre: $('#nombre').val(),
        telefono: $('#telefono').val(),
        email: $('#email').val(),
        personacontacto: $('#personacontacto').val(),
        personatelefono: $('#personatelefono').val(),
        personaemail: $('#personaemail').val()
    }
    if (obj.codigo.trim() == '' && obj.nombre.trim() == '' &&
        obj.telefono.trim() == '' && obj.email.trim() == '' &&
        obj.personacontacto.trim() == '' && obj.personaemail.trim() == '' && obj.personatelefono == '') {
        toastr.error("Por favor Ingrese todos los Campos!", "Alert");
        return false;
    } else {

        if (obj.codigo.trim() == '') {
            toastr.error("Por favor Ingrese El Codigo", "Alert");
            return false;
        } else if (
            obj.codigo.includes('[|!"#$%&/()=?¿¡\s]') || obj.codigo.includes('&') ||
            obj.codigo.includes('°') || obj.codigo.includes('/') ||
            obj.codigo.includes('!') || obj.codigo.includes('(') ||
            obj.codigo.includes('"') || obj.codigo.includes(')') ||
            obj.codigo.includes('#') || obj.codigo.includes('=') ||
            obj.codigo.includes('$') || obj.codigo.includes('?') ||
            obj.codigo.includes('%') || obj.codigo.includes('¡') ||
            obj.codigo.includes('*') || obj.codigo.includes('*')) {
            toastr.error("El Codigo con puede contener Caracteres especiales como |°!#$%&/()=?¡'¿", "Alert");
            return false;
        } else if (obj.nombre.trim() == '') {
            toastr.error("Por favor Ingrese El Nombre de la Oficina", "Alert");
            return false;
        } else if (obj.telefono.trim() == '') {
            toastr.error("Por favor Ingrese El Telefono", "Alert");
            return false;
        } else if (obj.email.trim() == '') {
            toastr.error("Por favor Ingrese El Email", "Alert");
            return false;
        } else if (obj.personacontacto.trim() == '') {
            toastr.error("Por favor Ingrese Contacto", "Alert");
            return false;
        } else if (obj.personaemail.trim() == '') {
            toastr.error("Por favor Ingrese El Email del Contacto", "Alert");
            return false;
        } else if (obj.personatelefono == '') {
            toastr.error("Por favor Ingrese El Telefono del Contacto", "Alert");
            return false;
        } else if (obj.personaemail.indexOf('@', 0) == -1 || obj.email.indexOf('.', 0) == -1) {
            toastr.error("Por favor Ingrese Un formato de Email valido", "Alert");
            return false;
        } else {
            console.log("se fue");
            insertar_oficina(obj);
        }
    }

    function insertar_oficina(objeto) {
        $.ajax({
            type: 'post',
            datatype: 'json',
            url: baseurl + 'Oficinas/insertar',
            data: {
                codigo: objeto.codigo,
                nombre: objeto.nombre,
                telefono: objeto.telefono,
                email: objeto.email,
                personacontacto: objeto.personacontacto,
                personatelefono: objeto.personatelefono,
                personaemail: objeto.personaemail,
                activo: objeto.activo
            },
            success: function (data) {
                var data1 = $.parseJSON(data);
                if (data1.success === 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Guardado con exito!',
                        showConfirmButton: false,
                        timer: 1500,
                        willClose: () => {
                            document.location.href = baseurl + 'Oficinas/';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'no se pudo insertar',
                        text: 'No se pudo Insertar la oficina' + data1.success,
                        showConfirmButton: false,
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
                    html: '<div class="p-3 mb-2 bg-danger text-white"> No se pudo Insertar la oficina </div>'
                        + '<div> es posible que quiera <b> usar un codigo que ya esta siendo usado </b></div>',
                    showConfirmButton: true,
                    confirmButtonText: 'Ok',
                    animation: false,
                    customClass: {
                        popup: 'animated flipInY'
                    }
                })
            }

        })
    }

    function contains(target, pattern){
        var value = 0;
        pattern.forEach(function(word){
          value = value + target.includes(word);
        });
        return (value === 1)
    }


})
