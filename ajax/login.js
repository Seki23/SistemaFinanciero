$('#login').submit(function(e){
    const postData = {
                   usuario:$('#user').val(),
                   password:$('#password').val(),
                 };
 
               // console.log(postData);
         let url='controlador/loginControlador.php';
         $.post(url,postData,function(response){
          console.log(response);
          
          let alerta =JSON.parse(response);
        
            if(alerta.Tipo=="success"){
                let ruta= alerta.Texto;
                window.location.replace(ruta)
            }else{
                Swal.fire(
                    alerta.Titulo,
                    alerta.Texto,
                    alerta.Tipo
                  );
            }    
      });
    
    e.preventDefault();
 }); 


