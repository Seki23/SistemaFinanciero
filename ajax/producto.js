//MOSTRAR DATOS EN TABLA
 tablaProductos = $('#tabla-productos').DataTable({  
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
        "url": "../controlador/productoControlado.php", 
        "method": 'POST', //usamos el metodo POST
       "data":"", //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    
   columns:[
        {data: "idproducto"},
        {data: "nombreproducto"},
        {data: "categoriaproducto"},
        {data: "nombre"},
        {data: "descripcion"},
        {data: "preciocompra"},
        {data: "precioventa"},
        //{data: "margen"},
        //{data: "stockminimo"},
        {data: "stock"},
        {data: "codigo"},
        //{data: "imagen"},
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
        {data: "estado"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button  class='verKardex btn btn-success'><span class='fa fa-eye'></span></button> <button  class=' debajaProd btn btn-primary'><span class='fa fa-sort-desc'></span></button><button class='editProd btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>"}
    ]
});



$(document).on('click','.verKardex',function(){

 // let element= $(this)[0].parentElement.parentElement;
let fila = $(this).closest("tr"); 
  let id= parseInt(fila.find('td:eq(0)').text()); 


            window.location.replace("http://localhost/SistemaFinanciero/kardex/?"+id+"");
          //  mostrarKardex();
 

});

 mostrarKardex();
function mostrarKardex(){
// alert("hola");
  let id=$('#verKardex').val();
   $.post('../controles/kardex.php',{id},function(response){
      
          console.log(response);
      let productos = JSON.parse(response);



      let template = '  <tr class="active"><td></td><td></td><td class="warning">Unidades</td><td class="danger">V.Unitario</td><td class="info">V.Total</td><td class="warning">Unidades</td><td class="danger">V.Unitario</td><td class="info">V.Total</td><td class="warning">Unidades</td><td class="danger">V.Unitario</td><td class="info">V.Total</td></tr>';
      productos.forEach((producto) => {


           template += ` <tr>
                                      <td>${producto.fecha}</td>
                                      <td>${producto.descripcion}</td>
                                 `;

      if(producto.movimiento==1){
        template += `     
                                      <td>${producto.cantidad}</td>
                                      <td>${producto.vunitario}</td>
                                      <td>${producto.totalt}</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>${producto.cantidades}</td>
                                      <td>${producto.vunitario}</td>
                                      <td>${producto.vtotales}</td>
                                   </tr> ` ;
      }else{
        template +=   `      
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>${producto.cantidad}</td>
                                      <td>${producto.vunitario}</td>
                                      <td>${producto.totalt}</td>
                                      <td>${producto.cantidades}</td>
                                      <td>${producto.vunitario}</td>
                                      <td>${producto.vtotales}</td>
                                   </tr> ` ;
      }

     
      });
      $("#tabla-kardex").html(template);
     
  
  });


}

 //guardar
$('#form-producto').submit(function(e){
      let coddisable=document.getElementById("codigoPro");
      let preciovent=document.getElementById("precioVp");

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este producto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            let formData = new FormData($("#form-producto")[0]);
            formData.append("codigoPro", $("#codigoPro").val());//permite guardar campos disable
            formData.append("precioVp", $("#precioVp").val());
            $.ajax({
              url: "../controlador/productoControlado.php",
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
    
                $("#form-producto").trigger("reset");
                coddisable.disabled=false;//habilitando el campo codigo
                preciovent.disable=false;
               }
            });
          }
        });

       e.preventDefault();

 }); 


    function listarCategoria(){
      $.ajax({
          url:'../controles/categoriaControlador.php',
          type:'GET',
          success:function(response){
             //console.log(response);
           let tasks =JSON.parse(response);
             let template='';
             tasks.forEach(task=>{
              template+=
              `<option value="${task.id}">${task.categoria}</option>  `
 
             });
            // $('#commboSucursal').html(template);
             $('#commboCategoriaPro').html(template);//para el combo de modificar
             console.log("entra aquuiiii");
          }
      });
     }

    function listarProveedor(){
      $.ajax({
          url:'../controles/proveedorControlador.php',
          type:'GET',
          success:function(response){
             //console.log(response);
           let tasks =JSON.parse(response);
             let template='';
             tasks.forEach(task=>{
              template+=
              `<option value="${task.id}">${task.proveedor}</option>  `
 
             });
            // $('#commboSucursal').html(template);
             $('#commboProvee').html(template);//para el combo de modificar
          }
      });
     }

           //boton editar de tabla
$(document).on('click','.editProd',function(){
    
    $("#ModalProducto").modal("show");
        let fila = $(this).closest("tr"); 
          let idPro= parseInt(fila.find('td:eq(0)').text()); 
        $.post('../controlador/productoControlado.php',{idPro},function(response){
          console.log(response);
            const cm=JSON.parse(response);
            let template='';
            let templated='';
             template=
             `  <option value="${cm.idcatego}">${cm.nombrecategoriam}</option>  `; 
            $('#commboCategoriaPro').html(template);
            templated=
             `  <option value="${cm.idprove}">${cm.nombreprovem}</option>  `; 
            $('#commboProvee').html(templated);
            $("#imagenP").attr("src", "../vistas/imagenesprod/" + cm.imagenm);

            $('#idProducM').val(cm.id),
            $('#nombreProdM').val(cm.nomproducm),
            $('#codigoProM').val(cm.codprodm),
            $('#descriProdM').val(cm.descrim),
            $('#precioCpM').val(cm.preciprom),
            $('#margenProdM').val(cm.magenm),
            $('#precioVpM').val(cm.precionprom),
            $('#stokcMipM').val(cm.stockminim),
            $('#stokcProdM').val(cm.stockm)
   });

    $('#cambiarCateg').click(function(){
 
           listarCategoria();
        });
     $('#cambiarProve').click(function(){
 
           listarProveedor();
        });       

  });



          //Boton modificar 
 $("#modificarProductos").click(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas modificar este producto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            
     let formData = new FormData($("#form-productoM")[0]);
     formData.append("commboCategoriaPro", $("#commboCategoriaPro").val());       
            $.ajax({
              url: "../controlador/productoControlado.php",
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
    
                $('#form-productoM').trigger('reset');
                tablaProductos.ajax.reload(null, false); 
               $("#ModalProducto").modal("hide");
               }
            });
          }
        });

    e.preventDefault();
  });  
       



     //dar de baja
   $(document).on('click','.debajaProd',function(){
    
    //var inactivo="Inactivo";
    let fila = $(this).closest("tr");  
    let id= parseInt(fila.find('td:eq(0)').text()); // obteniendo el id de la tabla en la fila
    let estado= fila.find('td:eq(10)').text();// obteniendo el estado de la tabla en la fila
    //console.log("estado et", estado);
 
    if(estado=="Activo"){ //condicion para dar de baja
         var inactivo="Inactivo";
        
        
         const postData={
          estadopro:inactivo,
          idesta:id//id que se selecciono de la tabla
      };
      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Desea dar de baja este producto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => {  
      if (result.isConfirmed) {
  
        //let fila = $(this).closest("tr");  
        //let id= parseInt(fila.find('td:eq(0)').text()); 
       $.post('../controlador/productoControlado.php',postData,function(response){
       // listarCitas();
       let alerta =JSON.parse(response);
       Swal.fire(
                   alerta.Titulo,
                   alerta.Texto,
                   alerta.Tipo
                 );
               
     tablaProductos.ajax.reload(null, false); 
           
         });
         
            
        }    
      });
        
    }else{ // cuando quiera reactivar o cambiar de estado al empleado

         var activo="Activo";
         
         const postData={
          estadopro:activo,
          idesta:id//id que se selecciono de la tabla
        };
 
       Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Desea activar este producto!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí modificalo!'
    }).then((result) => { 
      if (result.isConfirmed) {
  
        //let fila = $(this).closest("tr");  
        //let id= parseInt(fila.find('td:eq(0)').text()); 
       $.post('../controlador/productoControlado.php',postData,function(response){
       // listarCitas();
       let alerta =JSON.parse(response);
       Swal.fire(
                   alerta.Titulo,
                   alerta.Texto,
                   alerta.Tipo
                 );
      tablaProductos.ajax.reload(null, false);
       
      
         });
        }
      });

    }
   


   });
     

