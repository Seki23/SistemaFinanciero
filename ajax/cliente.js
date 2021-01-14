//MOSTRAR DATOS EN TABLA



 //MOSTRAR DATOS EN TABLA
 let mostrar=1;
 tablaCliente = $('#tabla-cliente').DataTable({  
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
        "url": "../controlador/clienteControlador.php", 
        "method": 'POST', //usamos el metodo POST
       "data":{ mostrar: mostrar }, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   "columns":[
       {"data": "idcliente"},
        {"data": "codigo"},
        {"data": "nombrecliente"},
        {"data": "dui"},
        {"data": "direccion"},
        {"data": "telefono"},
        {"data": "carteracliente"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'> <button  class=' infoC btn btn-primary'><span class='fa fa-info'></span></button><button class='editC btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
}); 







//EDITAR PARA SETEAR
$(document).on('click','.editC',function(){
  $("#ModalCliente").modal("show");
  listarCarteras();
  let fila = $(this).closest("tr"); 
    let idCliente= parseInt(fila.find('td:eq(0)').text()); 
  $.post('../controlador/clienteControlador.php',{idCliente},function(response){
   console.log(response);
      const cliente=JSON.parse(response);

      let tipoCliente=cliente.tipocliente;

      if(tipoCliente=="juridica"){
        document.getElementById("duiClieM").disabled = true;
        document.getElementById("profesionClieM").disabled = true;
        document.getElementById("sueldoClieM").disabled = true;
        document.getElementById("gastosClieM").disabled = true;
      }else{
        document.getElementById("duiClieM").disabled = false;
        document.getElementById("profesionClieM").disabled = false;
        document.getElementById("sueldoClieM").disabled = false;
        document.getElementById("gastosClieM").disabled = false;
      }

      $('#nombreCliM').val(cliente.nombrecliente);
            $('#duiClieM').val(cliente.dui);
       $('#direccionClieM').val(cliente.direccion);
       $('#profesionClieM').val(cliente.lugartrabajo);
            $('#telefonoClieM').val(cliente.telefono);
            $('#sueldoClieM').val(cliente.salario);
          $('#gastosClieM').val(cliente.gastos);
          $('#idClienteM').val(cliente.id);
        
          $('#CombocarteraCliente').val(cliente.idcarteraclientes);
   });


   function listarCarteras() {
    $.ajax({
      url: "../controles/carteraControl.php",
      type: "POST",
      success: function (response) {
         console.log(response);
        let tasks = JSON.parse(response);
        let template = '';
        tasks.forEach((task) => {
          template += `  <option value="${task.id}">${task.cartera}</option>  `;
        });
        $("#CombocarteraCliente").html(template);
      },
    });
  }


});
//MODIFICAR

   //Boton modificar 
   $("#modificarCliente").click(function(e){

    Swal.fire ({
     title: '¿Estás seguro?',
     text: "¡Deseas modificar este Fiador!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '# 3085d6',
     cancelButtonColor: '# d33',
     confirmButtonText: '¡Sí modificalo!'
  }).then((result) => {
    if (result.isConfirmed) { 


     
    const postData={
            Id:$('#idClienteM').val(),
            nombre:$('#nombreCliM').val(),
            direccion:$('#direccionClieM').val(),
            dui:$('#duiClieM').val(),
            lugartrabajo:$('#profesionClieM').val(),
            sueldo:$('#sueldoClieM').val(),
            telefono:$('#telefonoClieM').val(),
            gastos:$('#gastosClieM').val(),
            cartera:$('#CombocarteraCliente').val()
       
   };

  console.log(postData);
    
         let url='../controlador/clienteControlador.php';
       $.post(url,postData,function(response){
          console.log(response);
        
        let alerta =JSON.parse(response);
      
     Swal.fire(
         alerta.Titulo,
         alerta.Texto,
         alerta.Tipo
       );

        if(alerta.Tipo=="success"){
       $('#form-fiadorM').trigger('reset');
       tablaCliente.ajax.reload(null, false); 
       $("#ModalCliente").modal("hide");
    }         

      });
     
     }
  })
  e.preventDefault();
 
});




//Agregar
$('#form-cliente').submit(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este Cliente!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
        let tipoPersona=$('#tipoClie').val();
        if(tipoPersona=="natural"){ //IF PARA DETERMINAR SI LA PERSONA ES NATURAL 
          const postData = {
            codigo:$('#codigoClie').val(),
             tipo:$('#tipoClie').val(),
             nombre:$('#nombreCli').val(),
             direccion:$('#direccionClie').val(),
             dui:$('#duiClie').val(),
             estado:$('#estadoCivilCli').val(),
             lugartrabajo:$('#profesionClie').val(),
             sueldo:$('#sueldoClie').val(),
             gastos:$('#gastosClie').val(),
             telefono:$('#telefonoClie').val(),
          };

          console.log(postData);
  let url='../controlador/clienteControlador.php';
  $.post(url,postData,function(response){
         let alerta =JSON.parse(response);
         console.log(response);
        Swal.fire(
             alerta.Titulo,
             alerta.Texto,
             alerta.Tipo
           );

     if(alerta.Tipo=="success"){
           ultimoCodigo();
          $("#form-cliente").trigger("reset");
         }
      });
    }else{ //ELSE QUE SE EJECUTA CUANDO LA PERSONA ES TIPO JURIDICA

      const postData = {
        codigo:$('#codigoClie').val(),
         tipo:$('#tipoClie').val(),
         nombre:$('#nombreCli').val(),
         direccion:$('#direccionClie').val(),
         dui:$('#duiClie').val(),
         estado:$('#estadoCivilCli').val(),
         lugartrabajo:$('#profesionClie').val(),
         sueldo:$('#sueldoClie').val(),
         gastos:$('#gastosClie').val(),
         telefono:$('#telefonoClie').val(),
      };

      console.log(postData);
let url='../controlador/clienteControlador.php';
$.post(url,postData,function(response){
     let alerta =JSON.parse(response);
     console.log(response);
  /*  Swal.fire(
         alerta.Titulo,
         alerta.Texto,
         alerta.Tipo
       );*/

 if(alerta.Tipo=="success"){
       ultimoCodigo();
///////////////////////////AQUI MANDAREMOS  A REALIZAR EL INGRESO DE LA INFORMACION FINANCIERA////////////////////////////////////

  const InfoFinanciera={
    efectivo:$('#efectivo').val(),
    cxc:$('#cxc').val(),
    inventario:$('#inventario').val(),
    proplanyequi:$('#ppye').val(),
    cxp:$('#cxp').val(),
    prestamos:$('#prestamos').val(),
   dlp:$('#dlp').val(),
    capital:$('#capital').val(),
    reserva:$('#rl').val(),
    utilidades:$('#utilidades').val(), 
    venta:$('#ventas').val(),
    gastoV:$('#costoventa').val(),
    otroIngresos:$('#otrosingresos').val(),
    gastosOP:$('#gastodeoperacion').val(),
    otroGastos:$('#otrosgastos').val(),
    reservaLegal:$('#reserva').val(),
    renta:$('#renta').val(),
    utiliNeta:$('#utilidad').val() 
  };

  let url='../controlador/clienteControlador.php';


  $.post(url,InfoFinanciera,function(response){
    let alerta =JSON.parse(response);
    console.log(response);
   Swal.fire(
        alerta.Titulo,
        alerta.Texto,
        alerta.Tipo
      );

if(alerta.Tipo=="success"){
      ultimoCodigo();
     $("#form-cliente").trigger("reset");
    }
 });



      $("#form-cliente").trigger("reset");
     }
  });


    }

         
          }
        });

       e.preventDefault();

 });        



 function ultimoCodigo(){

   let opcion = 1;
   //alert(opcion);
 $.post("../controlador/clienteControlador.php",{ opcion },function(response){
        // console.log(response);
        console.log(response);
                 let respuesta =JSON.parse(response);
           //    alert(response);
              console.log(respuesta);
                if(respuesta.length==0){
                 $("#codigoClie").val("00000000");
                }else{
               
                 let cadena= respuesta[0].codigo; //cadena sera el resultado del codigo extraido de la base de datos
               console.log(cadena);
                let subcadena=""
                for (let i = 2; i <=10 ; i++) {
                   subcadena+=cadena.charAt(i);
                     //console.log(i);
              }
                 $("#codigoClie").val(subcadena.toUpperCase() );
                }
        
           
      } );
 }