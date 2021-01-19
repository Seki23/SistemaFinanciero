
//MOSTRAR DATOS EN TABLA
 tablaCargos = $('#tableVenta').DataTable({  
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
        "url": "../controlador/ventaControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
        {"data": "idventa"},
        {"data": "codigo"},
        {"data": "empleado"},
        {"data": "cliente"},
        {"data": "fecha"},
        {"data": "subtotal"},
        {"data": "iva"},
        {"data": "total"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' verFactura btn btn-primary'><span class='fa fa-eye'></span></button> </div></div>"}
        ]
}); 

 

//boton ver reporte
  $(document).on("click", ".verFactura", function () {
    let fila = $(this).closest("tr");
    let id = parseInt(fila.find("td:eq(0)").text());
    let pagina = "../vistas/production/factura-vis.php";
    pasarVariables(pagina, id);
  });

 function pasarVariables(pagina, id) {
    pagina += "?";
    nomVec = id;
    pagina += nomVec;
    pagina = pagina.substring();
    window.open(pagina, '_blank');
   // location.href = ;
  }



//seleccionar tipo de venta
$("#selecTipoVenta").submit(function (e) {
   e.preventDefault();

 let tipoVenta = $("#tipoVentaSE").val();


   if(tipoVenta===""){
      Swal.fire(
      'Error',
      'Debe seleccionar un tipo de venta',
      'error'
      );
   }else{

    let verificar=2;

let url = "../controles/carrito.php";
      $.post(url,{verificar}, function (response) {
        
         if(response.trim()==="Carrito"){
           if(tipoVenta==="Contado"){
                  window.location.replace("http://localhost/SistemaFinanciero/ventaContado/");
               }else{
                   window.location.replace("http://localhost/SistemaFinanciero/ventaCredito/");
               }
           
         }else{
           Swal.fire("Error","El carrito se encuentra vacio no puede realizar una venta","error");
         }


      });

    

   }

});
 numFactura();

function numFactura(){


      let factura=0;

      let url = "../controlador/ventaControlador.php";
      $.post(url,{factura}, function (response) {
          // alert(response);
       $("#numFactuc").val(response);
      });


}


//guardar
$("#form-ventaContado").submit(function (e) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "¡Deseas registrar esta venta!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "# 3085d6",
    cancelButtonColor: "# d33",
    confirmButtonText: "¡Sí registrela!",
  }).then((result) => {
    if (result.isConfirmed) {
       const postData = {
                  codigo:$('#numFactuc').val(),
                  fecha:$('#fechaVenta').val(),
                  cliente:$('#idCl').val(),
                  empleado:$('#idEmple').val()
                };

                console.log(postData);
        let url='../controlador/ventaControlador.php';
         $.post(url,postData,function(response){
         
           console.log(response);
           if(response.trim()==="exito"){
              //alert("guardando detalle venta");
               let producto=1;
              let url='../controlador/ventaControlador.php';
         $.post(url,{producto},function(respuesta){
              console.log(respuesta);

               $('#idCl').val("");
              $('#nombreCli').val("");
               numCarrito();
               numFactura();
                 Swal.fire("Registrado","La venta ha sido registrada","success");
           
         });   
      }
      
      
        });
    }
  });
  e.preventDefault();
});



function cargarKardex(){

id=2;

  $.post("../controles/kardex.php",{ id },function (response) {
              
          
          //console.log(response);

                         $("#Productoscarrito").html(response);

          /* document.getElementById("nombreProductoo").innerHTML = 1;
            document.getElementById("cantidadProducto").innerHTML = 1;
          $("#img").attr("src","http://localhost/SistemaFinanciero/vistas/production/images/img.jpg");
           */
            });
  
}