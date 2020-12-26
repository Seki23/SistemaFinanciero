
<?php  

require_once "../modelo/fiadorModelo.php";

class fiadorControlador extends fiadorModelo{


public function agregar_fiador(){
      $nombre=$_POST['nombre'];
      $direccion=$_POST['direccion'];
	    $dui=$_POST['dui'];
	    $nit=$_POST['nit'];
	    $profesion=$_POST['profesion'];
	    $telefono=$_POST['telefono'];
	    $sueldo=$_POST['sueldo'];
	    $correo=$_POST['correo'];
	        
  $datosFiador=[
        "nombre"=>$nombre,
        "direccion"=>$direccion,
        "dui"=>$dui,
        "nit"=>$nit,
        "correo"=>$correo,
        "profesion"=>$profesion,
        "sueldo"=>$sueldo,
        "telefono"=>$telefono,
   ];
   $guardarFiador=fiadorModelo::agregar_fiadorModelo($datosFiador);
   if($guardarFiador->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Registrado",
            "Texto"=>"Fiador registrado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El Fiador no pudo registrarse",
            "Tipo"=>"error"
        ];
        
      }
   
  
  $jsonstring=json_encode($alerta);
  echo $jsonstring;
}


public function mostrar_fiador(){
 $datos=fiadorModelo::mostrar_FiadorModelo();
         $datos=$datos->fetchAll(PDO::FETCH_ASSOC);
    $data=json_encode($datos, JSON_UNESCAPED_UNICODE);
    print  $data;
}

public function modificar_fiador(){
  

      $nombre=$_POST['nombre'];
      $direccion=$_POST['direccion'];
      $dui=$_POST['dui'];
      $nit=$_POST['nit'];
      $profesion=$_POST['profesion'];
      $telefono=$_POST['telefono'];
      $sueldo=$_POST['sueldo'];
      $correo=$_POST['correo'];
       $Id=$_POST['idMo'];
          
  $datosFiador=[
        "nombre"=>$nombre,
        "direccion"=>$direccion,
        "dui"=>$dui,
        "nit"=>$nit,
        "correo"=>$correo,
        "profesion"=>$profesion,
        "sueldo"=>$sueldo,
        "telefono"=>$telefono,
        "Id"=>$Id
   ];

  
 $modificarFiador=fiadorModelo::modificar_FiadorModelo($datosFiador);
 
   if($modificarFiador->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Modificado",
            "Texto"=>"Fiador modificado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El Fiador no pudo modifarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

} 
   public function eliminar_fiador(){
    $id=$_POST['id'];
    $datos=fiadorModelo::eliminar_fiadorModelo($id);
      if($datos->rowCount()>=1){
    $alerta=[
            "Titulo"=>"Eliminado",
            "Texto"=>"Fiador eliminado con exito",
            "Tipo"=>"success"
        ];
    
      }else{
       $alerta=[
            "Titulo"=>"Error",
            "Texto"=>"El Fiador no pudo eliminarse",
            "Tipo"=>"error"
        ];
        
      }
    $jsonstring=json_encode($alerta);
    echo $jsonstring;

   }

   public function UnicoFiador($id){
     
      $consulta = "SELECT idfiador, nombre, direccion, dui, nit, correo, profesion, salario, telefono_fiador FROM fiador WHERE idfiador='$id'";
      $conexion=conectar();
         $datos=$conexion->query($consulta);
         $datos=$datos->fetchAll();
         if($datos>=1){
      foreach($datos as $row){
        $json[]=array(
        "nombre"=>$row['nombre'],
        "direccion"=>$row['direccion'],
        "dui"=>$row['dui'],
        "nit"=>$row['nit'],
        "correo"=>$row['correo'],
        "profesion"=>$row['profesion'],
        "sueldo"=>$row['salario'],
        "telefono"=>$row['telefono_fiador'],
        "id"=>$row['idfiador']
        );
      }
      $jsonstring=json_encode($json[0]);
      echo $jsonstring;
     }
  }


}

$fiador=new fiadorControlador();
if(isset($_POST['idMo'])){
  $fiador->modificar_fiador();
}elseif(isset($_POST['nombre']) ){
  $fiador->agregar_fiador();
}elseif(isset($_POST['idFiador'])){
   $id=$_POST['idFiador']; 
   $fiador->UnicoFiador($id);
}elseif(isset($_POST['id'] )){
  $fiador->eliminar_fiador();
}else{
  $fiador->mostrar_fiador();
}


