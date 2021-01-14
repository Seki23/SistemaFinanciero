//MOSTRAR DATOS EN TABLA
 tablaDepartamento = $('#tabla-departamento').DataTable({  
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
        "url": "../controlador/departamentoControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "iddepartamento"},
        {"data": "correlativo"},
           {"data": "nombredepartamento"},
      
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' deleteI btn btn-danger'><span class='fa fa-trash'></span></button><button class='editI btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 



 //guardard
$('#registrar-Departamento').submit(function(e){
    
   Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este departamento!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
  const postData = {
                 Correlativo:$('#correlativoDep').val(),
                  Nombre:$('#nombreD').val()
                };

                console.log(postData);
        let url='../controlador/departamentoControlador.php';
        $.post(url,postData,function(response){
         console.log(response);
        let alerta =JSON.parse(response);
        
      Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

        if(alerta.Tipo=="success"){
    
         $('#registrar-Departamento').trigger('reset');   
      }         
 
        });
       
       }
    })
   e.preventDefault();
});        


  //eliminar
$(document).on('click','.deleteI',function(){

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
          
           $.post('../controlador/departamentoControlador.php',{id},function(response){
           console.log(response);
          tablaDepartamento.ajax.reload(null, false);
          
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
 $(document).on('click','.editI',function(){

        $("#ModalDepartamento").modal("show");
        let fila = $(this).closest("tr"); 
          let idDepartamento= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/departamentoControlador.php',{idDepartamento},function(response){
          console.log(response);
            const departamento=JSON.parse(response);
            $('#idD').val(departamento.id);
            $('#correlativoE').val(departamento.Correlativo),
            $('#nombreE').val(departamento.Nombre)
         });
      });


   //Boton modificar 
 $("#modificarDepartamento").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este departamento!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
       const postData={
              idMo:$('#idD').val(),
              Correlativo:$('#correlativoE').val(),
              Nombre:$('#nombreE').val()
         
     };
      
           let url='../controlador/departamentoControlador.php';
         $.post(url,postData,function(response){
            console.log(response);
          
          let alerta =JSON.parse(response);
        
       Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

          if(alerta.Tipo=="success"){
         $('#form-departamentoM').trigger('reset');
          tablaDepartamento.ajax.reload(null, false); 
         $("#ModalDepartamento").modal("hide");
      }         
 
        });
       
       }
    })
    e.preventDefault();
   
       });
     


