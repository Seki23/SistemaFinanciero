//LISTA DE PRODUCTOS PARA AGREGAR A CARRITO


          numCarrito();


let mostrarProducto=1; 
 tablaProductoCarrito = $('#tabla-productosV').DataTable({  
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
        "url": "../controlador/carritoControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{opcion:mostrarProducto}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
     columns:[  
        {data: "idproducto"},
        {data: "codigo"},
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
        {data: "nombreproducto"},
        {data: "stock"},
        {data: "precioventa"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='addCart btn btn-success ' ><span class='fa fa-plus'></span></button></div></div>"}
    ]
}); 




   //ADD CANTIDAD 
$(document).on('click','.addCart',function(){

    $("#ModalCantidad").modal("show");
    let fila = $(this).closest("tr"); 
    let id= parseInt(fila.find('td:eq(0)').text());
    $('#idproducto').val(id);
}); 


//ADD CARRITO
 $("#addCarrito").click(function(e){
      e.preventDefault();


  let formData = new FormData($("#form-ProdcutoCa")[0]);


        $.ajax({
              url: "../controlador/carritoControlador.php",
              type: "POST",
              data: formData,
              cache: false,
              processData: false,
              contentType: false,
            }).done(function (resp) {
              
               console.log(resp);
             
              $('#form-ProdcutoCa').trigger('reset');
               $("#ModalCantidad").modal("hide");

          numCarrito();
               //aumenta el valor del numero segun sea el numero de productos en carrito
             //  document.getElementById("numero").innerHTML = "2";

             
            });


  }); 


function numCarrito(){

      $.ajax({
              url: "../controles/carrito.php",
              type: "POST",
              data: "",
              cache: false,
              processData: false,
              contentType: false,
            }).done(function (resp) {
              
           //   alert(resp);

               //aumenta el valor del numero segun sea el numero de productos en carrito
              document.getElementById("numero").innerHTML = parseInt(resp);

             
            });

}


function cargarCarrito(){

buscar=1;

  $.post("../controles/carrito.php",{ buscar },function (response) {
              
          
          //console.log(response);

                         $("#Productoscarrito").html(response);

          /* document.getElementById("nombreProductoo").innerHTML = 1;
            document.getElementById("cantidadProducto").innerHTML = 1;
          $("#img").attr("src","http://localhost/SistemaFinanciero/vistas/production/images/img.jpg");
           */
            });
  
}

mostrarCarrito();
mostrarCarrito2();

function mostrarCarrito(){
    $.ajax({
        url:'../controlador/carritoControlador.php',
        type:'GET',
        success:function(response){
        //  console.log(response);
         let productos =JSON.parse(response);
           let template='';
           productos.forEach(producto=>{
            template+=
            `<tr Id="${producto.idcarrito}">
            <td><img src="../vistas/imagenesprod/${producto.imagen}" width="100" height="80" /></td>
            <td>${producto.codigo}</td>
            <td>${producto.nombreproducto}</td>
            <td>${producto.precioventa}</td>
            <td>${producto.cantidad}</td>
            <td>${producto.total}</td>
            <td>
            <button class="delete-shopping-cart btn btn-danger" title="Eliminar de carrito">
            X
            </button>
            </td>
            </tr>`
           });
           $('#listaCarrito').html(template);
        }
    });
}


function mostrarCarrito2(){
    $.ajax({
        url:'../controlador/carritoControlador.php',
        type:'GET',
        success:function(response){
        //  console.log(response);
         let productos =JSON.parse(response);
           let template='';
           productos.forEach(producto=>{
            template+=
            `<tr Id="${producto.idcarrito}">
            <td><img src="../vistas/imagenesprod/${producto.imagen}" width="100" height="80" /></td>
            <td>${producto.codigo}</td>
            <td>${producto.nombreproducto}</td>
            <td>${producto.precioventa}</td>
            <td>${producto.cantidad}</td>
            <td>${producto.total}</td>
            </tr>`
           });
           $('#listaCarrito2').html(template);
        }
    });
}


$(document).on('click','.delete-shopping-cart',function(){
    
    
    let element= $(this)[0].parentElement.parentElement;
    let id=$(element).attr('Id');

 Swal.fire({
    title: "¿Estás seguro?",
    text: "¿Quiere elimininar este producto del carrito?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "# 3085d6",
    cancelButtonColor: "# d33",
    confirmButtonText: "¡Sí Eliminelo!",
  }).then((result) => {
    if (result.isConfirmed) {

    $.post('../controlador/carritoControlador.php',{id},function(response){
        //alert(response);
        numCarrito();
        mostrarCarrito();
     });
    }
  });


 });