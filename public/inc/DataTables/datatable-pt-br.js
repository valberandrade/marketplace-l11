$(document).ready( function () {
    $('.datatable').DataTable({
        language: {
            "decimal":        ",",
            "emptyTable":     "Nenhum dado disponível na tabela",
            "info":           "Mostrando _START_ até _END_ de _TOTAL_ entradas",
            "infoEmpty":      "Mostrando 0 até 0 de 0 entradas",
            "infoFiltered":   "(Filtrado por _MAX_ de total de entradas)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_entradas",
            "loadingRecords": "Carregando...",
            "processing":     "",
            "search":         "Buscar:",
            "zeroRecords":    "Nenhum dado encontrado",
            "paginate": {
                "first":      "Primeiro",
                "last":       "Último",
                "next":       "Próximo",
                "previous":   "Anterior"
            },
            "aria": {
                "orderable":  "Ordenar por esta coluna",
                "orderableReverse": "Reverter a ordem desta coluna"
            }
        }
    } );
} );
