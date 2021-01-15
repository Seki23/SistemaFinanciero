  let OOpcion=1;  
  tablaCargos = $('#tableCargoss').DataTable({ 
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
        "url": "../controles/cargoControl.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{opcion:OOpcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
    "columns":[
        {"data": "idcargo"},
        {"data": "cargo"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='data-selectins btn btn-info'data-dismiss='modal'>Seleccionar</button></div></div>"}
    ]
}); 


 $(document).on('click','.data-selectins',function(){
 // let element= $(this)[0].parentElement.parentElement;
let fila = $(this).closest("tr"); 
  let id= parseInt(fila.find('td:eq(0)').text()); 
  
 // console.log(id);
 $.post('../controles/datoCargo.php',{id},function(response){
 //    console.log(response);
     const m=JSON.parse(response);
      $('#cargo').val(m.cargo);
      $('#idcargo').val(m.id);
  
  });
  });
  
  //  clientes();
    
    
     function cargos(){
        // console.log('Entro a metodo');
        $.ajax({
            url:'../controles/cargoControlc.php',
            type:'GET',
            success:function(response){
               // console.log(response);
             let tasks =JSON.parse(response);
               let template='';
               tasks.forEach(task=>{
                template+=
                `<tr Cid="${task.id}" >
                <td>${task.cargo}</td>
                <td>
                <button class="data-select btn btn-info " data-dismiss="modal">
                Seleccionar
                </button>
                </td>
                </tr>`
               });
               $('#cargos').html(template);
            }
        });
     }
  //  clientes();
    

