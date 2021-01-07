//MOSTRAR DATOS EN TABLA
 tablaFiador = $('#tabla-fiador').DataTable({  
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
        "url": "../controlador/fiadorControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idfiador"},
        {"data": "nombre"},
        {"data": "direccion"},
        {"data": "dui"},
        {"data": "nit"},
        {"data": "correo"},
        {"data": "profesion"},
        {"data": "salario"},
        {"data": "telefono_fiador"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' infoF btn btn-primary'><span class='fa fa-info'></span></button><button class='editF btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 



 //guardar
$('#registrar-Fiador').submit(function(e){
    
   Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este Fiador!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
  const postData = {
                  nombre:$('#nombreF').val(),
                  direccion:$('#direccionF').val(),
                  dui:$('#duiF').val(),
                  nit:$('#nitF').val(),
                  profesion:$('#profesionF').val(),
                  telefono:$('#telefonoF').val(),
                  sueldo:$('#sueldoF').val(),
                  correo:$('#correoF').val()
                };

                console.log(postData);
        let url='../controlador/fiadorControlador.php';
        $.post(url,postData,function(response){
         console.log(response);
        let alerta =JSON.parse(response);
        
      Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

        if(alerta.Tipo=="success"){
    
         $('#registrar-Fiador').trigger('reset');   
      }         
 
        });
       
       }
    })
   e.preventDefault();
}); 


  //eliminar
$(document).on('click','.deleteF',function(){

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
          
           $.post('../controlador/fiadorControlador.php',{id},function(response){
           console.log(response);
          tablaFiador.ajax.reload(null, false);
          
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
 $(document).on('click','.editF',function(){

        $("#ModalFiador").modal("show");
        let fila = $(this).closest("tr"); 
          let idFiador= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/fiadorControlador.php',{idFiador},function(response){
          console.log(response);
            const fiador=JSON.parse(response);
            $('#idF').val(fiador.id);
            $('#nombreF').val(fiador.nombre);
                  $('#direccionF').val(fiador.direccion);
             $('#duiF').val(fiador.dui);
             $('#nitF').val(fiador.nit);
                  $('#profesionF').val(fiador.profesion);
                  $('#telefonoF').val(fiador.telefono);
                $('#sueldoF').val(fiador.sueldo);
                $('#correoF').val(fiador.correo);
         });
      });


   //Boton modificar 
 $("#modificarFiador").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este Fiador!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
       const postData={
              idMo:$('#idF').val(),
              nombre:$('#nombreF').val(),
              direccion:$('#direccionF').val(),
              dui:$('#duiF').val(),
              nit:$('#nitF').val(),
              profesion:$('#profesionF').val(),
              telefono:$('#telefonoF').val(),
              sueldo:$('#sueldoF').val(),
              correo:$('#correoF').val()
         
     };
      
           let url='../controlador/fiadorControlador.php';
         $.post(url,postData,function(response){
            console.log(response);
          
          let alerta =JSON.parse(response);
        
       Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

          if(alerta.Tipo=="success"){
         $('#form-fiadorM').trigger('reset');
          tablaFiador.ajax.reload(null, false); 
         $("#ModalFiador").modal("hide");
      }         
 
        });
       
       }
    })
    e.preventDefault();
   
  });
     


