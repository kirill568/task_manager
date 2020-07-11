$(document).ready(function() {
  $('').DataTable();
});

$(document).ready(function() {
    $('#tableTasks').DataTable( {
        "lengthMenu": [[3, 25, 50, -1], [10, 25, 50, "All"]],
        "info": false,
        "searching": false,
   		"lengthChange": false,
   		"aoColumnDefs": [
           {
               "bSortable": false,
               "aTargets": ["sorting_disabled"]
           }
        ]
    } );
} );