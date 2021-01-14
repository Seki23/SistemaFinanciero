
<?php  

require_once "../modelo/comisionModelo.php";

class comisionControlador extends comisionModelo{


public function agregar_comision(){
     
       $minimo=$_POST['minimo'];
        $maximo=$_POST['maximo'];
  $porcentaje=$_POST['porcentaje'];
  $tipo=$_POST['tipo'];

      
      
          
  $datosDep=[
     
          "minimo"=>$minimo,
           "maximo"=>$maximo,
            "porcentaje"=>$porcentaje,
             "tipo"=>$tipo,
        
   ];

 
   $guardarCom=comisionModelo::agregar_comisionModelo($datosDep);
   if($guardarCom->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Comision registrada con exito",
            "Tipo"=>"success"
        ];
    
      }else{

       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La comision no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      

  }
  $jsonstring=json_encode($alerta);
  echo $jsonstring;
}

public function mostrar_comision(){
 $datos=comisionModelo::mostrar_ComisionModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}

public function modificar_comision(){
  

      $minimoM=$_POST['minimoM'];
      $maximoM=$_POST['maximoM'];
      $porcentaje=$_POST['porcentajeM'];
      $tipo=$_POST['tipoM'];
      $Id=$_POST['idMo'];
          
  $datosCo=[
        "minimoM"=>$minimoM,
        "maximoM"=>$maximoM,
        "porcentaje"=>$porcentaje,
        "tipo"=>$tipo,
       
        "Id"=>$Id
   ];

  
 $modificarComision=comisionModelo::modificar_ComisionModelo($datosCo);
 
   if($modificarComision->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Modificado",
            "Texto"=>"Comision modificada con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La comision no pudo modificarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 
   public function eliminar_comision(){
    $id=$_POST['id'];
    $datos=comisionModelo::eliminar_comisionModelo($id);
      if($datos->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Eliminado",
            "Texto"=>"Comision eliminada con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"La comision no pudo eliminarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }

   public function UnicaComision($id){
     
      $consulta = "SELECT id, minimo, maximo, porcentaje, tiponivel FROM comisiones WHERE id='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "minimo"=>$row['minimo'],
        "maximo"=>$row['maximo'],
        "porcentaje"=>$row['porcentaje'],
        "tipo"=>$row['tiponivel'],
        
        "id"=>$row['id']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


}


$inst=new comisionControlador();
if(isset($_POST['idMo'])){
  $inst->modificar_comision();
}elseif(isset($_POST['minimo']) ){
  $inst->agregar_comision();
}elseif(isset($_POST['idComi'])){
   $id=$_POST['idComi']; 
   $inst->UnicaComision($id);
}elseif(isset($_POST['id'] )){
  $inst->eliminar_comision();
}else{
  $inst->mostrar_comision();
}



