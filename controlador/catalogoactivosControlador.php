<?php  

require_once "../modelo/catalogoactivosModelo.php";

class catalogoactivoControlador extends catalogoactivoModelo{

	public function agregar_catalogoactControlador(){

	    $correlativo=$_POST['correlativoCuent'];
	    $nombrec=$_POST['nombreCuent'];
        $tiempo=$_POST['tiempoCuent'];

	        
  $datosCatalgoAct=[
        "correla"=>$correlativo,
        "nomcata"=>$nombrec,
        "tiempodepre"=>$tiempo,
   ];
    
    if($correlativo!=""){

       $correlativounico=ejecutar_consulta_simple("SELECT correlativo FROM catalogoactivos WHERE correlativo='$correlativo'");
      $re=$correlativounico->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El numero correlativo ingresado ya existe",
            "Tipo"=>"error"
        ];
      }else{

        if($nombrec!=""){
          $cuentaunico=ejecutar_consulta_simple("SELECT nombrecatalogo FROM catalogoactivos WHERE nombrecatalogo='$nombrec'");
          $re=$cuentaunico->rowCount();
              if($re>=1){
              $alerta=[
                "Titulo"=>"Error",
                "Texto"=>"El nombre del catalogo ingresado ya existe",
                "Tipo"=>"error"
            ];
          }else{
            $guardarCataloA=catalogoactivoModelo::agregar_catalogoactModelo($datosCatalgoAct);
           if($guardarCataloA->rowCount()>=1){

            $alerta=[
                    "Titulo"=>"Registrado",
                    "Texto"=>"Catalogo activo registrado con exito",
                    "Tipo"=>"success"
                ];
            
              }else{
               $alerta=[
                    "Titulo"=>"Error",
                    "Texto"=>"El catalogo activo no pudo registrarse",
                    "Tipo"=>"error"
                ];
                
              }
               
        }
      }

    }
      $jsonstring=json_encode($alerta);
       echo $jsonstring;
	 }    
  }

  public function mostrar_catalogoactControlador(){
 $datos=catalogoactivoModelo::mostrar_catalogoactModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}


public function eliminar_catalogoactControlador(){
    $id=$_POST['id'];

       $idselect=ejecutar_consulta_simple("SELECT tp.idcatalogo FROM tipoactivo tp WHERE tp.idcatalogo='$id'");
      $respuesta=$idselect->rowCount();

       if($respuesta>=1){

      $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El catalogo activo no se puede eliminarse esta siendo ocupado en otro registro",
            "Tipo"=>"error"
        ];
      
    }else{
        $datos=catalogoactivoModelo::eliminar_catalogoactModelo($id);
          if($datos->rowCount()>=1){
          $alerta=[
                  "Titulo"=>"Eliminado",
                  "Texto"=>"Catalogo activo eliminado con exito",
                  "Tipo"=>"success"
              ];
          
            }else{
             $alerta=[
                  "Titulo"=>"Error",
                  "Texto"=>"El catalogo activo proveedor no pudo eliminarse",
                  "Tipo"=>"error"
              ];
              
            }
    }

    
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }


    public function setcatalogoactControlador($id){
     
      $consulta = "SELECT idcatalogoactivos, correlativo, nombrecatalogo, tiempodespreciacion  FROM catalogoactivos WHERE idcatalogoactivos='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "correlativom"=>$row['correlativo'],
        "cuentam"=>$row['nombrecatalogo'],
        "tiempom"=>$row['tiempodespreciacion'],
        "id"=>$row['idcatalogoactivos']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


      public function modificar_catalogoactControlador(){
  

      $correlativom=$_POST['correlativoM'];
      $cuentam=$_POST['cuentaM'];
      $tiempom=$_POST['tiempoM'];
      $Id=$_POST['idCatoloActM'];
          
      $datosCatActivo=[
            "Numcorrelativo"=>$correlativom,
            "Nomcatalgo"=>$cuentam,
            "Tiempodepre"=>$tiempom,
            "Id"=>$Id
       ];

 
 if($correlativom!=""){

       $correlativounicom=ejecutar_consulta_simple("SELECT correlativo FROM catalogoactivos WHERE correlativo='$correlativom' AND idcatalogoactivos!='$Id'");
      $re=$correlativounicom->rowCount();
      if($re>=1){
          $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El numero correlativo ingresado ya existe",
            "Tipo"=>"error"
        ];
      }else{

        if($cuentam!=""){
          $cuentaunicom=ejecutar_consulta_simple("SELECT nombrecatalogo FROM catalogoactivos WHERE nombrecatalogo='$cuentam' AND idcatalogoactivos!='$Id'");
          $re=$cuentaunicom->rowCount();
              if($re>=1){
              $alerta=[
                "Titulo"=>"Error",
                "Texto"=>"El nombre del catalogo ingresado ya existe",
                "Tipo"=>"error"
            ];
          }else{

             $modifProveedor=catalogoactivoModelo::modificar_catalogoactModel($datosCatActivo);
 
               if($modifProveedor->rowCount()>=1){
                $alerta=[
                        "Titulo"=>"Modificado",
                        "Texto"=>"Catalogo activo modificado con exito",
                        "Tipo"=>"success"
                    ];
                
                  }else{
                   $alerta=[
                        "Titulo"=>"Error",
                        "Texto"=>"El catalogo activo no pudo modifarse",
                        "Tipo"=>"error"
                    ];
                    
                  }
               
        }
      }

    }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;
   }  

} 

}

$insCatloActi= new catalogoactivoControlador();
if(isset($_POST['correlativoCuent']) && isset($_POST['nombreCuent']) && isset($_POST['tiempoCuent'])){
  $insCatloActi->agregar_catalogoactControlador();
}else if (isset($_POST['id'])){
	$insCatloActi->eliminar_catalogoactControlador();
}else if(isset($_POST['idCa'])){
  $id=$_POST['idCa'];
  $insCatloActi->setcatalogoactControlador($id);
}else if(isset($_POST['idCatoloActM'])){
	$insCatloActi->modificar_catalogoactControlador();
}else{
  $insCatloActi->mostrar_catalogoactControlador();
}