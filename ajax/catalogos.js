  let opcionn=1;  
  tablaCat = $('#tablecatalogo').DataTable({ 
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
        "url": "../controles/catalogoControl.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{opcion:opcionn}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
    "columns":[
        {"data": "idcatalogoactivos"},
        {"data": "nombrecatalogo"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='data-seL btn btn-info'data-dismiss='modal'>Seleccionar</button></div></div>"}
    ]
}); 


 $(document).on('click','.data-seL',function(){
 // let element= $(this)[0].parentElement.parentElement;
let fila = $(this).closest("tr"); 
  let id= parseInt(fila.find('td:eq(0)').text()); 
  
  $.post('../controles/datoCatalogo.php',{id},function(response){
  
     const m=JSON.parse(response);
      $('#catalogoI').val(m.catalogo);
      $('#idcatalogo').val(m.id);
  llamarCorreCat();

  });;
  });
  

 function llamarCorreCat(){


    let cata = $("#idcatalogo").val();
   

    if (cata != "" ) {
      const postData = {
     
        catalogo: cata,
      };

      console.log(postData);

      let url = "../controlador/tipoactivoControlador.php";
      $.post(url, postData, function (response2) {
     console.log(response2);
        $("#correlativoT").val(response2);
      });
    } else {
      alert("Debe seleccionar un tipo");
    }
 



}

    
    
     function catalogos(){
        console.log('Entro a metodo');
        $.ajax({
            url:'../controles/catalogoControl.php',
            type:'GET',
            success:function(response){
               // console.log(response);
             let tasks =JSON.parse(response);
               let template='';
               tasks.forEach(task=>{
                template+=
                `<tr Cid="${task.Id}" >
                <td>${task.Catalogo}</td>
                <td>
                <button class="data-select btn btn-info " data-dismiss="modal">
                Seleccionar
                </button>
                </td>
                </tr>`
               });
               $('#catalogos').html(template);
            }
        });
     }
  //  clientes();
    

