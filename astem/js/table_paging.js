$(document).ready(function () {
    $('#Product_Status').DataTable();

});

$(document).ready(function () {
    $('#Status').DataTable({
        "paging": true,
        pagingType: 'numbers',
        dom: 'Bfrtip',
        lengthMenu: [
            [-1, 10, 25, 50],
            ['Show all', '10 rows', '25 rows', '50 rows']
        ],
        buttons: [
            'pageLength',
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    stripHtml: false,
                    columns: ':visible',
                },
            },

            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                },
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                exportOptions: {
                    columns: ':visible'
                },
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                download: 'open',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: {
                    columns: ':visible'
                },
            },
            {
                extend: 'colvis',
                postfixButtons: ['colvisRestore']
            }
        ],
        //scrollY: 500,
        scrollX: true
    });
});