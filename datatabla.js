$('#tablevh').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "  Siguiente  ",
            "previous": "  Anterior  "
        }
    },
    lengthMenu: [[3,5,10, 15, 20,25,30, -1], [3,5,10, 15, 20,25,30, "Todos"]],
    responsive: true,
    columnDefs: [
        {
            targets: "_all",
            className: "text-center",
        },
    ],
});