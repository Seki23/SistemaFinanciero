//MOSTRAR DATOS EN TABLA
 $('#tabla-cartera').DataTable({  
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
        "url": "../controlador/carteraControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idcarteracliente"},
        {"data": "carteracliente"},
      
    ]
}); 





//guardar
$("#registrar-Cartera").submit(function (e) {
    e.preventDefault();
    Swal.fire({
      title: "¿Estás seguro?",
      text: "¡Deseas guardar este Cartera!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "# 3085d6",
      cancelButtonColor: "# d33",
      confirmButtonText: "¡Sí guardelo!",
    }).then((result) => {
      if (result.isConfirmed) {
        
        const postData={
            cartera :$("#cartera").val()
        };

        console.log(postData);
        let url='../controlador/carteraControlador.php';
        $.post(url,postData,function(response){
           console.log(response);
         
         let alerta =JSON.parse(response);
       
      Swal.fire(
          alerta.Titulo,
          alerta.Texto,
          alerta.Tipo
        );

         if(alerta.Tipo=="success"){
        $('#registrar-Cartera').trigger('reset');
      
     }         

       });

      }
    });
   
  });