
<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>



<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>

<script>

  $(function () {

    $("#tabledata").DataTable({

      "responsive": true, "lengthChange": false, "autoWidth": false,

    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    fixedHeader: {
            header: true,
            footer: true
        },
    
     buttons: [
        {
            extend: 'copy',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'csv',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'colvis',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
            
        }
        
        //'copy', 'excel', 'csv', 'print' // , 'pdf' - Wait for next PDFMake release because of this bug https://github.com/bpampuch/pdfmake/pull/443
    ],
    
    

      'columnDefs': [ {
        'targets': 'no-sort', // column index (start from 0)
        'orderable': false, // set orderable false for selected columns
     }]
     

    }).buttons().container().appendTo('#tabledata_wrapper .col-md-6:eq(0)');

    

    // $('#example2').DataTable({

    //   "paging": true,

    //   "lengthChange": false,

    //   "searching": false,

    //   "ordering": true,

    //   "info": true,

    //   "autoWidth": false,

    //   "responsive": true,

    // });

  });

  

</script>
<script>
  /*
    $(document).ready(function () {
    $('#tabledata').DataTable({
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(4)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(4, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $(api.column(4).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        },
    });
});*/
</script>
