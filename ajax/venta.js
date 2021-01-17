
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

     if(tipoVenta==="Contado"){
        window.location.replace("http://localhost/SistemaFinanciero/ventaContado/");
     }else{
         window.location.replace("http://localhost/SistemaFinanciero/ventaCredito/");
     }
 

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