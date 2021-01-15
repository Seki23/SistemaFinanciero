 //MOSTRAR DATOS EN TABLA
 tablaCategoriapro = $('#tabla-catproduc').DataTable({  
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
        "url": "../controlador/categoriaprodControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    }, 
   "columns":[
        {"data": "idcategoriaproducto"},
        {"data": "categoriaproducto"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' deleteCatpro btn btn-danger'><span class='fa fa-trash'></span></button><button class='editCatpro btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]



}); 


 //guardar
$('#form-catproductos').submit(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar esta categoria de producto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            let formData = new FormData($("#form-catproductos")[0]);
            
            $.ajax({
              url: "../controlador/categoriaprodControlador.php",
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
    
                $("#form-catproductos").trigger("reset");
               }
            });
          }
        });

       e.preventDefault();

 });      


  //eliminar
$(document).on('click','.deleteCatpro',function(){

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
          
           $.post('../controlador/categoriaprodControlador.php',{id},function(response){
           console.log(response);
           let alerta =JSON.parse(response);
          tablaCategoriapro.ajax.reload(null, false);
          
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
 $(document).on('click','.editCatpro',function(){

        $("#ModalCateProd").modal("show");
        let fila = $(this).closest("tr"); 
          let idCp= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/categoriaprodControlador.php',{idCp},function(response){
          console.log(response);
            const cm=JSON.parse(response);
            $('#idCateprod').val(cm.id),
            $('#categoriaprom').val(cm.categoriaprom)
         });
      });


    //Boton modificar 
 $("#modificarCateProd").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar esta categoria producto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            
     let formData = new FormData($("#form-categoriaprodM")[0]);
            
            $.ajax({
              url: "../controlador/categoriaprodControlador.php",
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
    
                $('#form-categoriaprodM').trigger('reset');
                tablaCategoriapro.ajax.reload(null, false); 
               $("#ModalCateProd").modal("hide");
               }
            });
          }
        });
       
       


    e.preventDefault();
  });