//MOSTRAR DATOS EN TABLA
 tablaEmpleado = $('#tabla-empleado').DataTable({  
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
        "url": "../controlador/empleadoControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idempleado"},
        {"data": "nombre"},
        {"data": "zona"},
        {"data": "dui"},
        {"data": "telefonoempleado"},
         {"data": "nit"},
        {"data": "estado"},
         {"data": "cargo"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='editE btn btn-warning ' ><span class='fa fa-pencil'></span></button> <button class='darBajaa btn btn-primary ' ><span class='fa fa-sort-desc'></span></button>  </div></div>"}
    ]
}); 



 //guardar
$('#registrar-Empleado').submit(function(e){
    
   Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este empleado!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
  const postData = {
                  nombre:$('#nombreE').val(),
                  zona:$('#zonaE').val(),
                  dui:$('#duiE').val(),
                   telefono:$('#telefonoE').val(),
                  nit:$('#nitE').val(),
                  cargo:$('#idcargo').val()
                };

                console.log(postData);
        let url='../controlador/empleadoControlador.php';
        $.post(url,postData,function(response){
         console.log(response);
        let alerta =JSON.parse(response);
        
      Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

        if(alerta.Tipo=="success"){
    
         $('#registrar-Empleado').trigger('reset');   
      }         
 
        });
       
       }
    })
   e.preventDefault();
}); 

     //dar de baja
   $(document).on('click','.darBajaa',function(){
    
    //var inactivo="Inactivo";
    let fila = $(this).closest("tr");  
    let es= parseInt(fila.find('td:eq(0)').text()); // obteniendo el id de la tabla en la fila
            
      Swal.fire ({
     title: '¿Estás seguro?',
     text: "¡Deseas dar de baja a este empleado !",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '# 3085d6',
     cancelButtonColor: '# d33',
     confirmButtonText: '¡Sí modificalo!'
  }).then((result) => {
    if (result.isConfirmed) { 
   
 $.post('../controlador/empleadoControlador.php',{es},function(response){
           console.log(response);
          
          let alerta=JSON.parse(response);
              Swal.fire(
                alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
             )
              tablaEmpleado.ajax.reload(null, false);
           });
               
   
         
            
        }    
      });
        });
    

function listarCargos(){
      $.ajax({
          url:'../controles/cargoControl.php',
          type:'GET',
          success:function(response){
          console.log(response);
           let tasks =JSON.parse(response);
             let template='';
             tasks.forEach(task=>{
              template+=
              `  <option value="${task.idcargo}">${task.cargo}</option>  `
 
             });
             $('#cargosCombo').html(template);
          }
      });
     }
             //boton editar de tabla
 $(document).on('click','.editE',function(){

        $("#ModalEmpleado").modal("show");
        let fila = $(this).closest("tr"); 
          let idEmpleado= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/empleadoControlador.php',{idEmpleado},function(response){
          console.log(response);
            const empleado=JSON.parse(response);
            $('#idM').val(empleado.id);
            $('#nombreM').val(empleado.nombre),
            $('#zonaM').val(empleado.zona),
             $('#duiM').val(empleado.dui),
             $('#telefonoM').val(empleado.telefono),
             $('#nitM').val(empleado.nit),
            $('#idcargoE').val(empleado.cargo)
              let template='';
             template=
         `  <option value="${empleado.idcargo}">${empleado.cargo}</option>  `; 
        $('#cargosCombo').html(template);

       });
        $("#CambiarCargo").click(function(){

                 listarCargos();
     
         });
      });

   //Boton modificar 
 $("#modificarEmpleado").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este empleado!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
       const postData={
              idMo:$('#idM').val(),
              nombree:$('#nombreM').val(),
              zonae:$('#zonaM').val(),
              duie:$('#duiM').val(),
              telefonoe:$('#telefonoM').val(),
              nite:$('#nitM').val(),
              cargoe:$('#cargosCombo').val()
         
     };
      
           let url='../controlador/empleadoControlador.php';
         $.post(url,postData,function(response){
            console.log(response);
          
          let alerta =JSON.parse(response);
        
       Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

          if(alerta.Tipo=="success"){
         $('#form-empleadoM').trigger('reset');
          tablaEmpleado.ajax.reload(null, false); 
         $("#ModalEmpleado").modal("hide");
      }         
 
        });
       
       }
    })
    e.preventDefault();
   
       });
     


