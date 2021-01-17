let opcionespp=1;  

  tablaProds = $('#tabla-producs').DataTable({ 
    language: {
      processing: "Tratamiento en curso...",
      search: "Buscar:",
      lengthMenu: "Agrupar Datos _MENU_ Registro",
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
        "url": "../controles/producControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{opcion:opcionespp}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
    "columns":[
        {"data": "idproducto"},
        {"data": "codigo"},
        {"data": "nombreproducto"},
        {"data": "descripcion"},
       // {"data": "preciocompra"},
       {"data": null, render: function ( data, type, row ) {
          // Combine the first and last names into a single table field
          return '$'+data.preciocompra;

      } },
        {"data": "nombre"},
        {
        data: null,
        render: function (data, type, row) {
          return (
            '<center><img src="../vistas/imagenesprod/' +
            data.imagen +
            '" width="80" height="80" /></center>'
          );
        },
      },
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button class='data-selectProd btn btn-info'data-dismiss='modal'>Seleccionar</button></div></div>"}
    ]
}); 


  $(document).on('click','.data-selectProd',function(){
 // let element= $(this)[0].parentElement.parentElement;
  //$("#paHorarioss").hide();//ocultando el msj de vacio
let fila = $(this).closest("tr");  
  let id= parseInt(fila.find('td:eq(0)').text()); 
  
  console.log(id);
 $.post('../controles/datoProdu.php',{id},function(response){
     //console.log(response);
     const c=JSON.parse(response);
     $('#nom').val(c.nom);
     $('#precioUni').val(c.precicmp);
      $('#Produc').val(c.codiproductos);
      $('#idProduc').val(c.id);

      
  });
  });