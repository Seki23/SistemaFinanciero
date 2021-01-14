//MOSTRAR DATOS EN TABLA
 tablaComision = $('#tabla-comision').DataTable({  
    language: {
      processing: "Tratamiento en curso...",
      search: "Buscar:",
      lengthMenu: " Datos a mostrar _MENU_ Registros",
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
        "url": "../controlador/comisionControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "id"},
        {"data": "minimo"},
        {"data": "maximo"},
        {"data": "porcentaje"},
        {"data": "tiponivel"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' deleteCC btn btn-danger'><span class='fa fa-trash'></span></button><button class='editCC btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 



 //guardar
$('#registrar-Comision').submit(function(e){
    
   Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar esta comision!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
  const postData = {
                 minimo:$('#minimoC').val(),
                  maximo:$('#maximoC').val(),
                    porcentaje:$('#porcentaje').val(),
                      tipo:$('#tiponivel').val()
                };

                console.log(postData);
        let url='../controlador/comisionControlador.php'; $.post(url,postData,function(response){
   
        let alerta =JSON.parse(response);
        
      Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

        if(alerta.Tipo=="success"){
    
         $('#registrar-Comision').trigger('reset');   
      }         
 
        });
       
       }
    })
   e.preventDefault();
});        


  //eliminar
$(document).on('click','.deleteCC',function(){

    Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡No podrás revertir esto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí, elimínelo!'
    }).then((result) => {
      if (result.isConfirmed) {

            let fila = $(this).closest("tr"); 
            let id= parseInt(fila.find('td:eq(0)').text()); 
          
           $.post('../controlador/comisionControlador.php',{id},function(response){
           console.log(response);
          tablaComision.ajax.reload(null, false);
          
              Swal.fire(
               '¡Eliminado!',
               'Su archivo ha sido eliminado.',
               'success'
             )

           });
           
   }
})

          });

             //boton editar de tabla
 $(document).on('click','.editCC',function(){

        $("#ModalComision").modal("show");
        let fila = $(this).closest("tr"); 
          let idComi= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/comisionControlador.php',{idComi},function(response){
          console.log(response);
            const c=JSON.parse(response);
            $('#idM').val(c.id);
            $('#minimoM').val(c.minimo),
                  $('#maximoM').val(c.maximo),
             $('#porcentajeM').val(c.porcentaje),
             $('#tipoM').val(c.tipo)
         });
      });


   //Boton modificar 
 $("#modificarComision").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar esta comision!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
       const postData={
              idMo:$('#idM').val(),
              minimoM:$('#minimoM').val(),
              maximoM:$('#maximoM').val(),
              porcentajeM:$('#porcentajeM').val(),
              tipoM:$('#tipoM').val(),
             
         
     };
      
           let url='../controlador/comisionControlador.php';$.post(url,postData,function(response){
            console.log(response);
          
          let alerta =JSON.parse(response);
        
       Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

          if(alerta.Tipo=="success"){
         $('#form-comisionM').trigger('reset');
          tablaComision.ajax.reload(null, false); 
         $("#ModalComision").modal("hide");
      }         
 
        });
       
       }
    })
    e.preventDefault();
   
       });
     


