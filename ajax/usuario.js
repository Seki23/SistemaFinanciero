
 //guardar
 $('#registrar-Usuario').submit(function(e){
    
    Swal.fire ({
        title: '¿Estás seguro?',
        text: "¡Deseas guardar este Usuario!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '# 3085d6',
        cancelButtonColor: '# d33',
        confirmButtonText: '¡Sí guardelo!'
     }).then((result) => {
       if (result.isConfirmed) { 
   const postData = {
                   usuario:$('#usuarioE').val(),
                   password:$('#password').val(),
                   idempleado:$('#idE').val(),
                 };
 
                console.log(postData);
         let url='../controlador/usuarioControlador.php';
         $.post(url,postData,function(response){
          console.log(response);
         let alerta =JSON.parse(response);
         
       Swal.fire(
            alerta.Titulo,
            alerta.Texto,
            alerta.Tipo
          );
 
         if(alerta.Tipo=="success"){
     
          $('#registrar-Usuario').trigger('reset');   
       }         

         });
        
        }
     })
    e.preventDefault();
 }); 
 