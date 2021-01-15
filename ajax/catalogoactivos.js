//MOSTRAR DATOS EN TABLA
 tablaCatalgoAct = $('#tabla-catalogoact').DataTable({  
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
        "url": "../controlador/catalogoactivosControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idcatalogoactivos"},
        {"data": "correlativo"},
        {"data": "nombrecatalogo"},
    		{"data": "tiempodespreciacion"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' deleteCatAct btn btn-danger'><span class='fa fa-trash'></span></button><button class='editCatAct btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
});


 //guardar
$('#form-catalogoactivos').submit(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este catalogo de activos!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            let formData = new FormData($("#form-catalogoactivos")[0]);
             console.log(formData);
             console.log("entraaaa ");
            $.ajax({
              url: "../controlador/catalogoactivosControlador.php",
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
    
                $("#form-catalogoactivos").trigger("reset");
               }
            });
          }
        });

       e.preventDefault();

 });


  //eliminar
$(document).on('click','.deleteCatAct',function(){

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
          
           $.post('../controlador/catalogoactivosControlador.php',{id},function(response){
           console.log(response);
           let alerta =JSON.parse(response);
          tablaCatalgoAct.ajax.reload(null, false);
          
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
$(document).on('click','.editCatAct',function(){
    
    $("#ModalCatalogoAct").modal("show");
        let fila = $(this).closest("tr"); 
          let idCa= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/catalogoactivosControlador.php',{idCa},function(response){
          console.log(response);
            const cm=JSON.parse(response);
             $('#idCatoloActM').val(cm.id),
            $('#correlativoM').val(cm.correlativom),
            $('#cuentaM').val(cm.cuentam),
            $('#tiempoM').val(cm.tiempom)
      
         });
   });



     //Boton modificar 
 $("#modificarCatAct").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este catalogo activo!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            
     let formData = new FormData($("#form-catalogoactiM")[0]);
            
            $.ajax({
              url: "../controlador/catalogoactivosControlador.php",
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
    
                $('#form-catalogoactiM').trigger('reset');
                tablaCatalgoAct.ajax.reload(null, false); 
               $("#ModalCatalogoAct").modal("hide");
               }
            });
          }
        });
       
       


    e.preventDefault();
  });