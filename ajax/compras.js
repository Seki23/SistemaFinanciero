  //mostrar datos en la tabla 
  tablaCompras = $("#tabla-compras").DataTable({
    language: {
      processing: "Tratamiento en curso...",
      search: "Buscar:",
      lengthMenu: " Datos a mostrar _MENU_ Registros",
      info:
        "Mostrando los registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
        last: "Ultimo",
      },
      aria: {
        sortAscending: ": active para ordenar la columna en orden ascendente",
        sortDescending: ": active para ordenar la columna en orden descendente",
      },
    },
    aoColumnDefs: [{ sClass: "hide_me", aTargets: [0] }],
    lengthMenu: [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"],
    ],
    ajax: {
      url: "../controlador/comprasControlador.php",
      method: "POST", //usamos el metodo POST
      data: "", //enviamos opcion 4 para que haga un SELECT
      dataSrc: "",
    },
    columns: [
      { data: "idcompra"},
      { data: "fecha"},
      { data: "codigo"},
      { data: "nombreproducto"},
      { data: "descripcion"},
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
      { data: "cantidad"},
     {data: null, render: function ( data, type, row ) {
       
          return '$'+data.preciocompra;

      } },
      {
        defaultContent:
          '<div class="text-center"><div class="btn-group"><td><button type="button" class="btn btn-info boton btnCar" data-toggle="modal" data-target="#Modaldetalle"><i class="fas fa-eye"></i></button></td></div></div>',
      },
      /*{
        defaultContent:
          '<div class="text-center"><div class="btn-group"><td align="center"><button type="button" class="btn btn-danger boton btnRemoveDe"><i class="fas fa-trash-alt Danger"></i></button> <button type="submit" class="btn btn-warning boton btnEditDe"><i class="far fa-edit"></i></button> </td> </div></div>',
      },*/
    ],
  });


  $(document).on("click", "#btnGuardar", function (e) {
  e.preventDefault();

 if(productossRel.length===0){
  /* Swal.fire({
          title: "Error",
          text: "Debe agregar a la tabla detalle compra",
          icon: "error",
        });*/
   console.log("tabla detalle vacia");
 }else{

      let fecha=$('#fechaComp').val();
        //let idproveedor = $("#idProve").val();
      let prod = $("#idProduc").val();
      let cant = $("#cantidad").val();
        /* const postData={
         Fecha:fecha,
         Cantid:cant
         //IdProveedor:idproveedor
       };*/

       if(fecha=="" ||  prod=="" || cant==""){
         //campos vacios
     /* if(fecha ==""){
      $('#paFechaP').css("color","#F90C0C");
      $('#paFechaP').show();
        }else{$('#paFechaP').hide();}
        if(idproveedor ==""){
        $('#paProvedorP').show();
        $('#paProvedorP').css("color","#F90C0C");
        }else{$('#paProvedorP').hide();}
        if(prod ==""){
        $('#paProdP').show();
        $('#paProdP').css("color","#F90C0C");
        }else{$('#paProdP').hide();}
        if(cant =="0" || cant ==""){
        $('#paCantidad').show();
        $('#paCantidad').css("color","#F90C0C");
        }else{$('#paCantidad').hide();}*/

       }else{
              //$('#paFechaP').hide();
              //$('#paProvedorP').hide();
              //$('#paProdP').hide();
              //$('#paCantidad').hide();

      // let url='../Controladores/compraControlador.php';
        Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Desea registrar esta compra con sus detalles!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
        if (result.isConfirmed) {
          let formData = new FormData($("#form-compras")[0]);
           formData.append("precioUni", $("#precioUni").val());//permite guardar campos disable
            formData.append("precioCp", $("#precioCp").val());//permite guardar campos disable
              formData.append("subtotalDet", $("#subtotalDet").val());//permite guardar campos disable
             console.log(formData);
             console.log("entraaaa ");

             $.ajax({
              url: "../controlador/comprasControlador.php",
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
    
                $("#form-compras").trigger("reset");

                console.log("Agregando detalles compras");
               let array = JSON.stringify(productossRel);
               console.log(array);


               $.ajax({
                        type: "POST",
                        url: "../controlador/comprasControlador.php",
                        data: { data: array}, //capturo array
                        success: function (data) {
                          //AGREGANDO 
                          console.log(data);

                         $('#idCompU').val(data);   
                         //$('#VentaPS').val("Venta Seleccionada");
                          //$("#exampleModal").modal("hide");   
                        },
                      });

                $('#formulario-compra').trigger('reset');
                eliminarTablaDetalleComp();
                $("#idProduc").val("");
                $("#cantidad").val("");

               }
            });
         
        }
      });
    } 

 }
    

    
      e.preventDefault();
   });



  let productossRel = [];
  let i = 1; //contador para asignar id al boton que borrara la fila
  //$("#obExamen").hide();
  $(document).on("click", "#addProdDet", function () {

    let idproducto = $("#idProduc").val();
    let idprovedor= $("#idProve").val();
    let nomprodu = $("#Produc").val();
    let nomp=$("#nom").val();
    let cantidad = $("#cantidad").val();
    let preciocosto = $("#precioUni").val();
    let total=(cantidad*preciocosto);
    let subtotal=0;

if (idproducto > 0) {
 if (cantidad != 0) {

  let fila =  '<tr id="row' +i +'"></td><td>' +nomprodu+'-'+nomp +"</td><td>" + cantidad +'</td><td>' +preciocosto+'</td><td>' +total +'</td><td style="text-align: center;"><button id="'
        + i +'" class="btn btn removeDC" type="button" ><span  class="fa fa-times "></span></button></td></tr>';
        let buscar = productossRel.find((existe) => existe.nomprodu === nomprodu);


  if (buscar != undefined) {
    swal({
      title: "Error",
      text: "Este producto ya fue registrado en esta compra",
      icon: "error",
    });
  } else {//esto se manda al controlador de la tabla 
    productossRel.push({
      id: i,
      nomprodu: idproducto,
      cantidad: cantidad,
      precio: preciocosto,
      total: total,
    });
    $("#tablaCompraDet tr:first").after(fila);

   let sumaTotal=0;
   console.log(productossRel);
   for (var j = 0; j < productossRel.length; j++) {
    sumaTotal=(sumaTotal+ productossRel[j].total);

   console.log(productossRel[j].total);
    $("#subtotalDet").val(sumaTotal);
    }
       //$("#cantidad").val(""); 
       //$("#precioCp").val("");
        i++;
       }  
        
      
      } else {
      Swal.fire({
        title: "Error",
        text: "Debe ingresar una cantidad",
        icon: "error",
      });

      }
    } else {
      Swal.fire({
        title: "Error",
        text: "Debe elegir un producto",
        icon: "error",
      });
    }

   
    

  });


   $(document).on("click", ".removeDC", function () {
    let button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    productossRel.forEach(function (ex, index, object) {
      if (ex.id == button_id) {
        //console.log("entro al if");
        object.splice(index, 1);
        $("#row" + button_id + "").remove(); //borra la fila

      } else {
        console.log(ex.id);
       // console.log("no entro al if");
      }

    });
    sumacompra();
  });


function sumacompra(){
     let sumaTotal=0;
    for (let j = 0; j < productossRel.length; j++) {
          sumaTotal=(sumaTotal+ productossRel[j].total);

          console.log(productossRel[j].total);
          //console.log("subtotal",sumaTotal);
          $("#subtotalDet").val(sumaTotal);
          }
      if(productossRel.length ===0){
          $("#subtotalDet").val(0);
      }

}

function eliminarTablaDetalleComp() {
    // console.log(examenesRel);
    let myTable = document.getElementById("tablaCompraDet");
    let rowCount = myTable.rows.length;
    for (let x = rowCount - 1; x > 0; x--) {
      myTable.deleteRow(x);
    }
    let elementosRemovidos = productossRel.splice(0, productossRel.length);
    console.log(elementosRemovidos);

  }