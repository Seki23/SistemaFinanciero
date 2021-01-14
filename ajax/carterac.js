  let Opcionn=1;  

  tablaCartera = $('#tableCarteraa').DataTable({ 
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
        "url": "../controles/carteraControlc.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{opcion:Opcionn}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
    "columns":[
        {"data": "idcarteracliente"},
        {"data": "carteracliente"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='dataa-select btn btn-info'data-dismiss='modal'>Seleccionar</button></div></div>"}
    ]
}); 


 $(document).on('click','.dataa-select',function(){
 // let element= $(this)[0].parentElement.parentElement;
let fila = $(this).closest("tr"); 
  let id= parseInt(fila.find('td:eq(0)').text()); 
  
 // console.log(id);
 $.post('../controles/datoCartera.php',{id},function(response){
 //    console.log(response);
     const m=JSON.parse(response);
      $('#cartera').val(m.cartera);
      $('#idcartera').val(m.id);
  
  });
  });
  
  //  clientes();
    
    
     function carteras(){
        // console.log('Entro a metodo');
        $.ajax({
            url:'../controles/carteraControlc.php',
            type:'GET',
            success:function(response){
               // console.log(response);
             let tasks =JSON.parse(response);
               let template='';
               tasks.forEach(task=>{
                template+=
                `<tr Cid="${task.id}" >
                <td>${task.cartera}</td>
                <td>
                <button class="data-select btn btn-info " data-dismiss="modal">
                Seleccionar
                </button>
                </td>
                </tr>`
               });
               $('#carteras').html(template);
            }
        });
     }
  //  clientes();
    

