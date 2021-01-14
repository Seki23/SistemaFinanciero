
<?php  

require_once "../modelo/departamentoModelo.php";

class departamentoControlador extends departamentoModelo{


public function agregar_departamento(){
     
      $Correlativo=$_POST['Correlativo'];
       $Nombre=$_POST['Nombre'];
      
          
  $datosDep=[
     
        "Correlativo"=>$Correlativo,
           "Nombre"=>$Nombre,
        
   ];

   $consulta=ejecutar_consulta_simple("SELECT * FROM Departamento WHERE nombredepartamento like  '%$Nombre%' ");
   if($consulta->rowCount()>=1){
     $alerta=[
       "Titulo"=>"Error",
       "Texto"=>"No se puede guardar porque ya existe un departamento registrado con este nombre",
       "Tipo"=>"error"
   ];
   }else{
   $guardarDepartamento=departamentoModelo::agregar_departamentoModelo($datosDep);
   if($guardarDepartamento->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Departamento registrado con exito",
            "Tipo"=>"success"
        ];
    
      }else{

       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El departamento no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }
   
  }
  $jsonstring=json_encode($alerta);
  echo $jsonstring;
}

public function mostrar_departamento(){
 $datos=departamentoModelo::mostrar_DepartamentoModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}

public function modificar_departamento(){
  

      $Correlativo=$_POST['Correlativo'];
      $Nombre=$_POST['Nombre'];
      $Id=$_POST['idMo'];
          
  $datosDep=[
        "Correlativo"=>$Correlativo,
        "Nombre"=>$Nombre,
        "Id"=>$Id
   ];

  
 $modificarDepartamento=departamentoModelo::modificar_DepartamentoModelo($datosDep);
 
   if($modificarDepartamento->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Modificado",
            "Texto"=>"Departamento modificado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El departamento no pudo modificarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 
   public function eliminar_departamento(){
    $id=$_POST['id'];
    $datos=departamentoModelo::eliminar_departamentoModelo($id);
      if($datos->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Eliminado",
            "Texto"=>"Departamento eliminado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El departamento no pudo eliminarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }

   public function UnicoDepartamento($id){
     
      $consulta = "SELECT * FROM departamento WHERE iddepartamento='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
          "Correlativo"=>$row['correlativo'],
        "Nombre"=>$row['nombredepartamento'],
        "id"=>$row['iddepartamento']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


}



$inst=new departamentoControlador();
if(isset($_POST['idMo'])){
  $inst->modificar_departamento();
}elseif(isset($_POST['Correlativo']) ){
  $inst->agregar_departamento();
}elseif(isset($_POST['idDepartamento'])){
   $id=$_POST['idDepartamento']; 
   $inst->UnicoDepartamento($id);
}elseif(isset($_POST['id'] )){
  $inst->eliminar_departamento();
}else{
  $inst->mostrar_departamento();
}
