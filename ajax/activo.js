//MOSTRAR DATOS EN TABLA
let mostrarActivo = 1;
tablaActivos = $("#tabla-activos").DataTable({
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
    url: "../controlador/activoControlador.php",
    method: "POST", //usamos el metodo POST
    data: { mostrar: mostrarActivo }, //enviamos opcion 4 para que haga un SELECT
    dataSrc: "",
  },

  columns: [
    { data: "idactivos" },
    { data: "correlativo" },
    { data: "fecha_adquisicion" },
    { data: "descripcion" },
    { data: "estado" },
    { data: "precio" },
    { data: "depresiacion_acumulada" },
    { data: "tipoadquisicion" },
    { data: "nombrecatalogo" },
    {
      defaultContent:
        "<div class='text-center'><div class='btn-group'> <button  class=' infoC btn btn-primary'><span class='fa fa-info'></span></button><button class='editActivo btn btn-warning ' ><span class='fa fa-pencil'></span></button>  </div></div>",
    },
  ],
});

//boton editar de tabla
$(document).on("click", ".editActivo", function () {
  $("#ModalActivo").modal("show");
  let fila = $(this).closest("tr");
  let idActivo = parseInt(fila.find("td:eq(0)").text());
  $.post(
    "../controlador/activoControlador.php",
    { idActivo },
    function (response) {
      console.log(response);
      const activo = JSON.parse(response);
      $("#idActivo").val(activo.idactivos);
      $("#correlativo").val(activo.correlativo);
      $("#fecha").val(activo.fechaAdquisicion);
      $("#descripcion").val(activo.descripcion);
      $("#estado").val(activo.estado);
      $("#precio").val(activo.precio);
      $("#marca").val(activo.marca);
      $("#tipoadquisicion").val(activo.tipoadquisicion);
      $("#vida").val(activo.vida);
     
    }
  );
});


 //Boton modificar 
 $("#modificarActivo").click(function(e){

  Swal.fire ({
   title: '¿Estás seguro?',
   text: "¡Deseas modificar este Activo!",
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '# 3085d6',
   cancelButtonColor: '# d33',
   confirmButtonText: '¡Sí modificalo!'
}).then((result) => {
  if (result.isConfirmed) { 
   const postData={
    fecha:$('#fecha').val(),
    descripcion:$('#descripcion').val(),
    estado:$('#estado').val(),
    precio:$('#precio').val(),
    marca:$('#marca').val(),
    tipo:$('#tipoadquisicion').val(),
    vida:$('#vida').val(),
    Id:$('#idActivo').val()
     
 };
  
       let url='../controlador/activoControlador.php';
     $.post(url,postData,function(response){
        console.log(response);
      
      let alerta =JSON.parse(response);
    
   Swal.fire(
       alerta.Titulo,
       alerta.Texto,
       alerta.Tipo
     );

      if(alerta.Tipo=="success"){
     $('#form-activoM').trigger('reset');
     tablaActivos.ajax.reload(null, false); 
     $("#ModalActivo").modal("hide");
  }         

    });
   
   }
})
e.preventDefault();

});
 



//cambiar por listar tipo y departameento
let accion = 1;

listarTipo();
listarDepartamento();

function listarTipo() {
  $.ajax({
    url: "../controles/tipoControl.php",
    type: "POST",
    data: { accion },
    success: function (response) {
      // console.log(response);
      let tasks = JSON.parse(response);
      let template = '<option value="" >-- Seleccione --</option>';
      tasks.forEach((task) => {
        template += `  <option value="${task.id}">${task.tipo}</option>  `;
      });
      $("#idtipo").html(template);
    },
  });
}

function listarDepartamento() {
  $.ajax({
    url: "../controles/tipoControl.php",
    type: "POST",
    success: function (response) {
      // console.log(response);
      let tasks = JSON.parse(response);
      let template = '<option value="" >-- Seleccione --</option>';
      tasks.forEach((task) => {
        template += `  <option value="${task.id}">${task.departamento}</option>  `;
      });
      $("#iddepartamento").html(template);
    },
  });
}

const selectDepartamento = document.querySelector(".dpto");

selectDepartamento.addEventListener("change", (event) => {
  const resultado = event.target.value;

  if (resultado != "") {
    let dpto = $("#iddepartamento").val();
    let tipo = $("#idtipo").val();

    if (dpto != "" && tipo != "") {
      const postData = {
        tipo: tipo,
        departamento: dpto,
      };

      console.log(postData);

      let url = "../controlador/activoControlador.php";
      $.post(url, postData, function (response) {
        //   alert(response);
        $("#correlativo").val(response);
      });
    } else {
      alert("Debe seleccionar un tipo");
    }
  } else {
    alert("ESTA EN EL ELSE");
  }
});

const selectTipo = document.querySelector(".tipoActivo");

selectTipo.addEventListener("change", (event) => {
  const resultado = event.target.value;

  if (resultado != "") {
    let dpto = $("#iddepartamento").val();
    let tipo = $("#idtipo").val();

    if (dpto != "" && tipo != "") {
      const postData = {
        tipo: tipo,
        departamento: dpto,
      };

      console.log(postData);

      let url = "../controlador/activoControlador.php";
      $.post(url, postData, function (response) {
        //  alert(response);
        $("#correlativo").val(response);
      });

      // alert("CODIGO");
    } else {
      alert("Debe seleccionar el departamento al que pertenece el activo");
    }
  } else {
    alert("ESTA EN EL ELSE");
  }
});

//guardar
$("#form-Activo").submit(function (e) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "¡Deseas guardar este Activo!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "# 3085d6",
    cancelButtonColor: "# d33",
    confirmButtonText: "¡Sí guardelo!",
  }).then((result) => {
    if (result.isConfirmed) {
      let formData = new FormData($("#form-Activo")[0]);
      formData.append("correlativo", $("#correlativo").val());
      formData.append("idencargado", $("#idE").val());
      formData.append("idproveedor", $("#idP").val());
      $.ajax({
        url: "../controlador/activoControlador.php",
        type: "POST",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
      }).done(function (resp) {
        //  console.log(resp);
        let alerta = JSON.parse(resp);
        Swal.fire(alerta.Titulo, alerta.Texto, alerta.Tipo);

        if (alerta.Tipo == "success") {
          $("#form-Activo").trigger("reset");
        }
      });
    }
  });
  e.preventDefault();
});
