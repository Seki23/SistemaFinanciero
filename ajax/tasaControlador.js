//MOSTRAR DATOS EN TABLA
 tablaInteres = $('#tabla-interes').DataTable({  
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
        "url": "../controlador/tasaControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idtasainteres"},
        {"data": "nombretasa"},
           {"data": "tasa"},
       {"data": "cuotas"},
        {"data": "carteracliente"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='editTI btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 



 //guardard
$('#registrar-Interes').submit(function(e){
    
   Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar esta tasa de interes!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
  const postData = {
                 Nombre:$('#nombreTasa').val(),
                  Tasa:$('#tasa').val(),
                  Cuotas:$('#cuotas').val(),
                  Cartera:$('#idcartera').val()
                };

                console.log(postData);
        let url='../controlador/tasaControlador.php';
        $.post(url,postData,function(response){
         console.log(response);
        let alerta =JSON.parse(response);
        
      Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

        if(alerta.Tipo=="success"){
    
         $('#registrar-Interes').trigger('reset');   
      }         
 
        });
       
       }
    })
   e.preventDefault();
});        


 $(document).on('click','.editTI',function(){

        $("#ModalTasa").modal("show");
        let fila = $(this).closest("tr"); 
          let idT= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/tasaControlador.php',{idT},function(response){
          console.log(response);
            const t=JSON.parse(response);
            $('#idTa').val(t.id);
            $('#nombreTa').val(t.nombre),
                  $('#tasaTa').val(t.tasa),
                  $('#cuotasTa').val(t.cuotas)
              let template='';
             template=
         `  <option value="${t.idcartera}">${t.cartera}</option>  `; 
        $('#carterasCombo').html(template);

       });
        $("#CambiarCartera").click(function(){

                 listarCarteras();
     
         });
      });


function listarCarteras(){
      $.ajax({
          url:'../controles/carteraControlc.php',
          type:'GET',
          success:function(response){
          console.log(response);
           let tasks =JSON.parse(response);
             let template='';
             tasks.forEach(task=>{
              template+=
              `  <option value="${task.id}">${task.cartera}</option>  `
 
             });
             $('#carterasCombo').html(template);
          }
      });
     }
   //Boton modificar 
 $("#modificarTasa").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar esta tasa de interes!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
       const postData={
              idMod:$('#idTa').val(),
                  nombre:$('#nombreTa').val(),
              tasa:$('#tasaTa').val(),
           cuotas:$('#cuotasTa').val(),
              cartera:$('#carterasCombo').val()
         
     };
      console.log(postData);
           let url='../controlador/tasaControlador.php';
         $.post(url,postData,function(response){
            console.log(response);
          
          let alerta =JSON.parse(response);
        
       Swal.fire(
           alerta.Titulo,
           alerta.Texto,
           alerta.Tipo
         );

          if(alerta.Tipo=="success"){
         $('#form-tasaM').trigger('reset');
          tablaInteres.ajax.reload(null, false); 
         $("#ModalTasa").modal("hide");
      }         
 
        });
       
       }
    })
    e.preventDefault();
   
       });
     