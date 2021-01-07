<?php  

require_once "../modelo/loginModelo.php";

class loginControlador extends loginModelo{


  public function login(){
   
    $usuario=$_POST['usuario'];
    $pass=$_POST['password'];

    $datosUser=[
        "usuario"=>$usuario,
        ];

        //se envia la solictud para ver si el usuario es correctp
    $ilogin=loginModelo::iniciar_sesion($datosUser);
    if($ilogin->rowCount()>=1){

      
        $datos=$ilogin->fetch(PDO::FETCH_ASSOC);
        $nombre= $datos['nombre'];
        $cargo=$datos['cargo'];
        $id=$datos['idempleado'];
        $usuario=$datos['usuario'];
        $hash=$datos['password'];

        if(password_verify ($pass,$hash ) ){
            session_start(['name'=>'SC']);
            $_SESSION["logueado"] = TRUE;
            $_SESSION["nombre"] = $nombre;
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id"] = $id;

            $_SESSION["cargo"] = $cargo;

            
            if($_SESSION["logueado"] == TRUE){
                if($cargo=="Administrador"){

                    $alerta=[
                        "Titulo"=>"Correcto",
                        "Texto"=>"http://localhost/SistemaFinanciero/inicio/",
                        "Tipo"=>"success"
                    ];

               
                 }elseif($cargo=="Vendedor"){
                    $alerta=[
                        "Titulo"=>"Correcto",
                        "Texto"=>"http://localhost/SistemaFinanciero/inicio/",
                        "Tipo"=>"success"
                    ];
                }
                       
            }else{
                $alerta=[
                    "Titulo"=>"Error",
                    "Texto"=>"La session no ha sido creada ",
                    "Tipo"=>"error"
                ];
            }
          
         } else{
            $alerta=[
                "Titulo"=>"Error",
                "Texto"=>"Contraseña incorrecta",
                "Tipo"=>"error"
            ];
        }

     
    }else{
        $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El usuario es incorrecto",
            "Tipo"=>"error"
        ];
    }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

  }


  public function cierre_sesion(){
    session_unset();
    session_destroy();
    $redirect='<script> window.location.href="'.SERVERURL.'login/" </script>';
    return $redirect;
  }

}

$insLogin=new loginControlador();

if(isset($_POST['usuario'])){
    $insLogin->login();
}else{
    //llama cerrar session
}