//MOSTRAR DATOS EN TABLA
 tablaProveedores = $('#tabla-provedor').DataTable({  
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
        "url": "../controlador/proveedorControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idproveedor"},
        {"data": "nombre"},
        {"data": "direccion"},
		{"data": "telefono"},
		{"data": "representante"},
		{"data": "dui"},
        {"data": "nit"},
        {"data": "celular"},
        {"data": "correo"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' deletePro btn btn-danger'><span class='fa fa-trash'></span></button><button class='editPro btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 


 //guardar
$('#form-proveedor').submit(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este proverdor!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            let formData = new FormData($("#form-proveedor")[0]);
             console.log(formData);
             console.log("entraaaa ");
            $.ajax({
              url: "../controlador/proveedorControlador.php",
              type: "POST",
              data: formData,
              cache: false,
              processData: false,
              contentType: false,
            }).done(function (resp) {
               let alerta =JSON.parse(resp);
               console.log(resp);
              Swal.fire(
                   alerta.Titulo,
                   alerta.Texto,
                   alerta.Tipo
                 );

           if(alerta.Tipo=="success"){
    
                $("#form-proveedor").trigger("reset");
               }
            });
          }
        });

       e.preventDefault();

 });        


  //eliminar
$(document).on('click','.deletePro',function(){

    Swal.fire ({
       title: '¿Estás seguro de eliminar?',
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
          
           $.post('../controlador/proveedorControlador.php',{id},function(response){
           console.log(response);
           let alerta =JSON.parse(response);
          tablaProveedores.ajax.reload(null, false);
          
             Swal.fire(
                   alerta.Titulo,
                   alerta.Texto,
                   alerta.Tipo
                 ); 

           });
           
   }
   })
});



           //boton editar de tabla
$(document).on('click','.editPro',function(){
    
    $("#ModalProverdor").modal("show");
        let fila = $(this).closest("tr"); 
          let idP= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/proveedorControlador.php',{idP},function(response){
          console.log(response);
            const cm=JSON.parse(response);
             $('#idProveM').val(cm.id),
            $('#nombreProveM').val(cm.nomprove),
            $('#direccionProveM').val(cm.direprove),
            $('#telefonoProveM').val(cm.telprove),
            $('#repreProveM').val(cm.repreprove),
            $('#duiProveM').val(cm.duiprove),
            $('#nitProveM').val(cm.nitprove),
            $('#celuProveM').val(cm.celuprove),
            $('#correoProveM').val(cm.correoprove)
         });
   });


     //Boton modificar 
 $("#modificarProveedor").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este proveedor!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            
     let formData = new FormData($("#form-proveedorM")[0]);
            
            $.ajax({
              url: "../controlador/proveedorControlador.php",
              type: "POST",
              data: formData,
              cache: false,
              processData: false,
              contentType: false,
            }).done(function (resp) {
               let alerta =JSON.parse(resp);
               console.log(resp);
              Swal.fire(
                   alerta.Titulo,
                   alerta.Texto,
                   alerta.Tipo
                 );

           if(alerta.Tipo=="success"){
    
                $('#form-proveedorM').trigger('reset');
                tablaProveedores.ajax.reload(null, false); 
               $("#ModalProverdor").modal("hide");
               }
            });
          }
        });
       
       


    e.preventDefault();
  });