
$('#form-cliente').submit(function(e){

      Swal.fire ({
       title: '¿Estás seguro?',
       text: "¡Deseas guardar este Fiador!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '# 3085d6',
       cancelButtonColor: '# d33',
       confirmButtonText: '¡Sí guardelo!'
    }).then((result) => {
      if (result.isConfirmed) { 
            let formData = new FormData($("#form-cliente")[0]);
            $.ajax({
              url: "../controlador/clienteControlador.php",
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
    
                $("#form-cliente").trigger("reset");
               }
            });
          }
        });

       e.preventDefault();

 });        