<?php 


require_once  "../Core/conexion.php";
$accion=(isset($_POST['accion'])) ? $_POST['accion'] : '';

if($accion==1){

    $consulta="SELECT tp.idtipoactivo, tp.nombre FROM tipoactivo AS tp";

      $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
          'tipo'=>$row['nombre'],
          'id'=>$row['idtipoactivo']
      );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
    
    }else{
        echo "ERROR EN CONTROLADRO";
    }

}else{
   
    $consulta="SELECT dp.iddepartamento, dp.nombredepartamento FROM departamento AS dp";

    $conexion=conectar();
     $datos=$conexion->query($consulta);
     $datos=$datos->fetchAll();
     if($datos>=1){
  foreach($datos as $row){
    $json[]=array(
        'departamento'=>$row['nombredepartamento'],
        'id'=>$row['iddepartamento']
    );
  }
  $jsonstring=json_encode($json);
  echo $jsonstring;
  
  }else{
      echo "ERROR EN CONTROLADRO";
  }


}






?>