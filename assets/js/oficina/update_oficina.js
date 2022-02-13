$(document).ready(function(){
    console.log("Todo cargado");
    $('#telefono').on('input', function(e){
        $(this).val($(this).val().replace(/[^0-9()+-\s#*]/g, ''));
    })
    $('#personatelefono').on('input', function(e){
        $(this).val($(this).val().replace(/[^0-9()+-\s#*]/g, ''));
    })
});
    

$("#btn-actualizar").click(function () {

    var obj = {
        codigo: $("#codigo").val().replace(/\s+/g, '-'),
        nombre: $("#nombre").val(),
        telefono: $("#telefono").val(),
        email: $("#email").val(),
        personacontacto: $("#personacontacto").val(),
        personatelefono: $("#personatelefono").val(),
        personaemail: $("#personaemail").val(), 
        activo: ($('#activo').is(":checked"))? 1 : 0,
        codigoold: $("#codigoold").val()
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
            modificar_entidad(obj);
        }
    }
});

function modificar_entidad(objeto) {
    console.log(baseurl + 'Oficinas/actualizar');
    $.ajax({
        dataType: 'json',
        url: baseurl + 'Oficinas/actualizar',
        type: 'post',
        dataType: 'json',
        data: {
            codigo: objeto.codigo,
            nombre: objeto.nombre,
            telefono: objeto.telefono,
            email: objeto.email,
            personacontacto: objeto.personacontacto,
            personatelefono: objeto.personatelefono,
            personaemail: objeto.personaemail,
            activo: objeto.activo,
            codigoold: objeto.codigoold
        },
        dataType: 'json',
        before: function () { },
        success: function (data) {
            if (data.success === 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'Actualizado',
                    showConfirmButton: false,
                    timer:1500,
                    willClose:()=>{
                        document.location.href = baseurl + 'Oficinas/';
                    }
                });
            }else {
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
                text: 'No se pudo Actualizar, posiblemente este usando un Codigo que ya posee otra oficina',
                type: 'error',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                timer: 1500,
                animation: false,
                customClass: {
                    popup: 'animated flipInY'
                }
            })
        }
    });
}