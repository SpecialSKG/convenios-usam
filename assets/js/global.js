$(document).ready(function () {

    $('.hamburguesa').click(function (e) {
        e.preventDefault();
        $('.menu-superior').toggle('slow');
    })
    
    $('#tabla').DataTable({
        "order" : [[3, 'desc']],
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No hay datos que mostrar",
            "info": "Pagina # _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "loadingRecords": "Cargando...",
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primera",
                "last":       "Ultima",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        }
    });

    $("#tabla_filter label input").addClass("noonsearch rounded-pill bg-light");


})