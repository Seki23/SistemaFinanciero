let opciones=1;  
tablaProveedor = $('#TabProveedor').DataTable({  
  language: {
      processing: "Tratamiento en curso...",
      search: "Buscar:",
      lengthMenu: "Datos a mostrar _MENU_ Registros",
      info: "Mostrando los registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "No existen datos.",
      infoFiltered: "(filtrado de _MAX_ elementos en total)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron datos con tu busqueda",
      emptyTable: "No hay datos disponibles en la tabla.",
      paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Ultimo"
      },
      aria: {
          sortAscending: ": active para ordenar la columna en orden ascendente",
          sortDescending: ": active para ordenar la columna en orden descendente"
      }
  },
  "aoColumnDefs": [ { "sClass": "hide_me", "aTargets": [ 0 ] } ],
  "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ],
  "ajax":{            
      "url": "../controles/proveedorControl.php", 
      "method": 'POST', //usamos el metodo POST
     "data":{opcion:opciones}, //enviamos opcion 4 para que haga un SELECT
      "dataSrc":""
  },
  
  "columns":[
      {"data": "idproveedor"},
      {"data": "nombre"},
      {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='data-select4 btn btn-info'data-dismiss='modal'>Seleccionar</button></div></div>"}
  ]
});       

$(document).on('click','.data-select4',function(){
    let fila = $(this).closest("tr");	
    let id= parseInt(fila.find('td:eq(0)').text()); 
   console.log(id);
   $.post('../controles/proveedorControl.php',{id},function(response){
     console.log(response);
     const c=JSON.parse(response);
      $('#nombreP').val(c.proveedor);
      $('#idP').val(c.id);
  
    });
  
  });
