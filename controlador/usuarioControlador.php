<?php


require_once "../modelo/usuarioModelo.php";

class usuarioControlador extends usuarioModelo{



 public function agregar_usuario(){

    $contra=$_POST['password'];

   $hash = password_hash($contra, PASSWORD_DEFAULT, [1]);
   $idempleado=$_POST['idempleado'];
   $usuario=$_POST['usuario'];

   //VALIDAR NOMBRE DE USUARIO QUE NOSE REPITA

   $consulta=ejecutar_consulta_simple("SELECT * FROM usuarios WHERE usuario='$usuario'");
   
   if($consulta->rowCount()>=1){
    $alerta=[
        "Titulo"=>"Error",
        "Texto"=>"El Usuario ya existe",
        "Tipo"=>"error"
    ];
   }else{
    $datosUser=[
        "password"=>$hash,
        "usuario"=>$usuario,
        "idempleado"=>$idempleado,
        ];
    $guardarUser=usuarioModelo::agregar_usuarioModelo($datosUser);
    
    
    if($guardarUser->rowCount()>=1){
        $alerta=[
                "Titulo"=>"Registrado",
                "Texto"=>"Usuario registrado con exito",
                "Tipo"=>"success"
            ];
        
          }else{
           $alerta=[
                "Titulo"=>"Error",
                "Texto"=>"El Usuario no pudo registrarse",
                "Tipo"=>"error"
            ];
            
          }
       
   }

  
  
  $jsonstring=json_encode($alerta);
  echo $jsonstring;

 }



}

$insUser =new usuarioControlador();

if(isset($_POST['password'])){
    $insUser->agregar_usuario();
}





