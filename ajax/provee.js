let opcione=1;  

  tablaPVE = $('#tabla-PVE').DataTable({ 
    language: {
      processing: "Tratamiento en curso...",
      search: "Buscar:",
      lengthMenu: "Agrupar Datos _MENU_ Registro",
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
        "url": "../controles/proveeControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{opcion:opcione}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
    "columns":[
        {"data": "idproveedor"},
        {"data": "nombre"},
        {"data": "telefono"},
        {"data": "representante"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='data-selectP btn btn-info'data-dismiss='modal'>Seleccionar</button></div></div>"}
    ]
}); 


  $(document).on('click','.data-selectP',function(){
 // let element= $(this)[0].parentElement.parentElement;
  //$("#paHorarioss").hide();//ocultando el msj de vacio
let fila = $(this).closest("tr");  
  let id= parseInt(fila.find('td:eq(0)').text()); 
  
  console.log(id);
 $.post('../controles/daoProvedor.php',{id},function(response){
     //console.log(response);
     const c=JSON.parse(response);
      $('#nomprovePro').val(c.nomprovedor);
      $('#idprove').val(c.id);
  
  });
  });