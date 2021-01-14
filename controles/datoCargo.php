<?php
 require_once  "../core/conexion.php";

    
    $id=$_POST['id'];
    $consulta="SELECT *
FROM
  cargo
    WHERE idcargo=$id";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
          'cargo'=>$row['cargo'],
          
          'id'=>$row['idcargo']
      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}