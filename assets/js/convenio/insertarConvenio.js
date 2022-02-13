$(document).ready(function () {
    mostrarEntidades();
    mostrarFacultades();
    mostrarOficina();

    $('#selectentidad').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });

    $('#selectproceso').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });


    $('#selectfacultad').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });

    $('#selectoficina').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });

    $('#selectclasificacion').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });

    $('#selecttematica').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });

    $('#selecttipoconvenio').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });



    $('#selecttipoconvenio').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });

    $('#selectestado').select2({
        tags: "true",
        placeholder: "Vacío",
        allowClear: true
    });
});

/*-------------------------------INSERTAR------------------------------ */

$('#insertarEntidad').click(function (e) {
    e.preventDefault();
    insertarEntidad();
});

$('#eliminarTodaEntidad').click(function (e) {
    Swal.fire({
        title: 'Momento',
        text: "Esta opción es para borrar toda las lista de Entidades que tiene para este convenio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#31417f',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Dejar lista',
        confirmButtonText: 'Borrar lista'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarTodaEntidad();
            Swal.fire({
                title: 'Lista borrada',
                text: 'Todo Limpio',
                icon: 'success',
                confirmButtonColor: '#31417f'
            })
        }
    })

});

$('#insertarFacultad').click(function (e) {
    insertarFacultad();
});

$('#eliminarTodaFacultad').click(function (e) {
    Swal.fire({
        title: 'Momento',
        text: "Esta opción es para borrar toda las lista de Facultades que tiene para este convenio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#31417f',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Dejar lista',
        confirmButtonText: 'Borrar lista'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarTodaFacultad();
            Swal.fire({
                title: 'Lista borrada',
                text: 'Todo Limpio',
                icon: 'success',
                confirmButtonColor: '#31417f'
            })
        }
    })

});

$('#insertarOficina').click(function (e) {
    insertarOficina();
});

$('#eliminarTodaOficina').click(function (e) {
    Swal.fire({
        title: 'Momento',
        text: "Esta opción es para borrar toda las lista de Oficinas que tiene para este convenio",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#31417f',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Dejar lista',
        confirmButtonText: 'Borrar lista'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarTodaOficina();
            Swal.fire({
                title: 'Lista borrada',
                text: 'Todo Limpio',
                icon: 'success',
                confirmButtonColor: '#31417f'
            })
        }
    })

});



/*---------------APARTADO DE ENTIDADES---------------*/
function insertarEntidad() {
    $.ajax({
        type: "post",
        dataType: "json",
        url: baseurl + "convenios/insertarEntidad",
        data: {
            id: $("#selectentidad").val()
        },
        success: function (response) {
            if (response.success === 1) {
                mostrarEntidades();
            } else {
                console.log("no no no");
            }
        }
    });
}

function eliminarTodaEntidad() {
    $.ajax({
        type: "post",
        dataType: "json",
        url: baseurl + "convenios/eliminarTodaEntidad",
        data: {},
        success: function (response) {
            if (response.success === 1) {
                mostrarEntidades();
            } else {
                console.log("no no no");
            }
        }
    });
}

function mostrarEntidades() {
    $("#entidadesLista").empty();
    $.getJSON("mostrarEntidades", function (data) {
        var entidades = [];
        $.each(data, function (llave, valor) {
            if (llave >= 0) {
                var template = '<div class="d-flex pl-5 w-100">';
                template += '<div class="w-75">';
                template += valor.Siglas + ' - ' + valor.nombre;
                template += '</div>';
                template += '<div class="btn btn-danger" id="eliminarentidad" name="eliminarentidad" idaeliminar="' + valor.id + '">';
                template += '<i class="fas fa-folder-minus">';
                template += '</i>';
                template += '</div>';
                template += '</div>';
                entidades.push(template);
            }
        });
        $("#entidadesLista").append(entidades.join(""));
        $('div div #eliminarentidad').click(function (e) {
            $.ajax({
                type: "post",
                url: baseurl + "convenios/eliminarEntidad",
                data: {
                    id: $(this).attr('idaeliminar')
                },
                dataType: "json",
                success: function (response) {
                    if (response.success === 1) {
                        mostrarEntidades();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'No se pudo eliminar este registro',
                            text: 'Error',
                            showConfirmButton: false,
                            customClass: {
                                popup: 'animated flipInY'
                            }
                        });
                    }

                }
            });
        });
    }
    );
}

/*---------------APARTADO DE FACULTADES---------------*/
function insertarFacultad() {
    $.ajax({
        type: "post",
        dataType: "json",
        url: baseurl + "convenios/insertarFacultad",
        data: {
            codigo: $("#selectfacultad").val()
        },
        success: function (response) {
            if (response.success === 1) {
                mostrarFacultades();
            } else {
                console.log("no no no");
            }
        }
    });
}

function eliminarTodaFacultad() {
    $.ajax({
        type: "post",
        dataType: "json",
        url: baseurl + "convenios/eliminarTodaFacultad",
        data: {},
        success: function (response) {
            if (response.success === 1) {
                mostrarFacultades();
            } else {
                console.log("no no no");
            }
        }
    });
}

function mostrarFacultades() {
    $("#FacultadLista").empty();
    $.getJSON("mostrarFacultad", function (data) {
        var entidades = [];
        $.each(data, function (llave, valor) {
            if (llave >= 0) {
                var template = '<div class="d-flex pl-5 w-100">';
                template += '<div class="w-75">';
                template += valor.codigo + ' - ' + valor.nombre;
                template += '</div>';
                template += '<div class="btn btn-danger" id="eliminarfacultad" name="eliminarfacultad" idaeliminar="' + valor.id + '">';
                template += '<i class="fas fa-folder-minus">';
                template += '</i>';
                template += '</div>';
                template += '</div>';
                entidades.push(template);
            }
        });
        $("#FacultadLista").append(entidades.join(""));
        $('div div #eliminarfacultad').click(function (e) {
            console.log();
            $.ajax({
                type: "post",
                url: baseurl + "convenios/eliminarFacultad",
                data: {
                    id: $(this).attr('idaeliminar')
                },
                dataType: "json",
                success: function (response) {
                    if (response.success === 1) {
                        mostrarFacultades();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'No se pudo eliminar este registro',
                            text: 'Error',
                            showConfirmButton: false,
                            customClass: {
                                popup: 'animated flipInY'
                            }
                        });
                    }

                }
            });
        });
    }
    );
}
/*---------------APARTADO DE OFICINAS---------------*/
function insertarOficina() {
    $.ajax({
        type: "post",
        dataType: "json",
        url: baseurl + "convenios/insertarOficina",
        data: {
            codigo: $("#selectoficina").val()
        },
        success: function (response) {
            if (response.success === 1) {
                mostrarOficina();
            } else {
                console.log("no no no");
            }
        }
    });
}

function eliminarTodaOficina() {
    $.ajax({
        type: "post",
        dataType: "json",
        url: baseurl + "convenios/eliminarTodaOficina",
        data: {},
        success: function (response) {
            if (response.success === 1) {
                mostrarOficina();
            } else {
                console.log("no no no");
            }
        }
    });
}

function mostrarOficina() {
    $("#oficinaLista").empty();
    $.getJSON("mostrarOficina", function (data) {
        var entidades = [];
        $.each(data, function (llave, valor) {
            if (llave >= 0) {
                var template = '<div class="d-flex pl-5 w-100">';
                template += '<div class="w-75">';
                template += valor.codigo + ' - ' + valor.nombre;
                template += '</div>';
                template += '<div class="btn btn-danger" id="eliminaroficina" name="eliminarfacultad" idaeliminar="' + valor.id + '">';
                template += '<i class="fas fa-folder-minus">';
                template += '</i>';
                template += '</div>';
                template += '</div>';
                entidades.push(template);
            }
        });
        $("#oficinaLista").append(entidades.join(""));
        $('div div #eliminaroficina').click(function (e) {
            console.log();
            $.ajax({
                type: "post",
                url: baseurl + "convenios/eliminarOficina",
                data: {
                    id: $(this).attr('idaeliminar')
                },
                dataType: "json",
                success: function (response) {
                    if (response.success === 1) {
                        mostrarOficina();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'No se pudo eliminar este registro',
                            text: 'Error',
                            showConfirmButton: false,
                            customClass: {
                                popup: 'animated flipInY'
                            }
                        });
                    }
                }
            });
        });
    }
    );
}


