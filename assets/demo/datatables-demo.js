// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    
    "language": {
          //Cambia el texto del elemeto de búsqueda y añade un placeholder al campo de búsqueda.
          "search": "Buscar",
          "searchPlaceholder": "Filtrar por columna...",
          "zeroRecords": "Sin resultados encontrados",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "paginate": {
            
            "next": "Siguiente",
            "previous": "Anterior"
        }
        }
  });
});