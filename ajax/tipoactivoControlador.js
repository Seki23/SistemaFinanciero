//MOSTRAR DATOS EN TABLA
 tablaTipoactivo = $('#tabla-tipoactivo').DataTable({  
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
        "url": "../controlador/tipoactivoControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idtipoactivo"},
        {"data": "correlativo"},
        {"data": "nombre"},
        {"data": "nombrecatalogo"},
        
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='editTA btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 



 //guardar
$('#registrar-Tipoactivo').submit(function(e){
    
   Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este tipo de activo!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
  const postData = {
                  correlativo:$('#correlativoT').val(),
                  nombre:$('#nombreT').val(),
                  catalogo:$('#idcatalogo').val(),
                  
                };

                console.log(postData);
        let url='../controlador/tipoactivoControlador.php';
        $.post(url,postData,function(response){
         console.log(response);
        let alerta =JSON.parse(response);
        
      Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

        if(alerta.Tipo=="success"){
    
         $('#registrar-Tipoactivo').trigger('reset');   
      }         
 
        });
       
       }
    })
   e.preventDefault();
}); 

             //boton editar de tabla
 $(document).on('click','.editTA',function(){

        $("#ModalTipoactivo").modal("show");
        let fila = $(this).closest("tr"); 
          let idTipo= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/tipoactivoControlador.php',{idTipo},function(response){
          console.log(response);
            const tipo=JSON.parse(response);
            $('#idT').val(tipo.id);
            $('#correlativoE').val(tipo.correlativo),
                  $('#nombreE').val(tipo.nombre),
             $('#idcatalogoE').val(tipo.catalogo)
              let template='';
             template=
         `  <option value="${tipo.idcatalogoactivo}">${tipo.catalogo}</option>  `; 
        $('#catalogosCombo').html(template);

       });
        $("#CambiarTipo").click(function(){

                 listarCatalogos();
     
         });
      });

function listarCatalogos(){
      $.ajax({
          url:'../controles/catalogoControl.php',
          type:'GET',
          success:function(response){
          console.log(response);
           let tasks =JSON.parse(response);
             let template='';
             tasks.forEach(task=>{
              template+=
              `  <option value="${task.id}">${task.catalogo}</option>  `
 
             });
             $('#catalogosCombo').html(template);
          }
      });
     }
   //Boton modificar 
 $("#modificarTipoactivo").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este Tipo de activo!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
       const postData={
              idMo:$('#idT').val(),
              correlativo:$('#correlativoE').val(),
              nombre:$('#nombreE').val(),
              catalogo:$('#catalogosCombo').val()
         
     };
      
           let url='../controlador/tipoactivoControlador.php';
         $.post(url,postData,function(response){
            console.log(response);
          
          let alerta =JSON.parse(response);
        
       Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

          if(alerta.Tipo=="success"){
         $('#form-tipoactivoM').trigger('reset');
          tablaTipoactivo.ajax.reload(null, false); 
         $("#ModalTipoactivo").modal("hide");
      }         
 
        });
       
       }
    })
    e.preventDefault();
   
       });
     

