<?php
 require_once  "../core/conexion.php";

    
    $id=$_POST['id'];
    $consulta="SELECT *
FROM
  carteraclientes
    WHERE idcarteracliente=$id";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
          'cartera'=>$row['carteracliente'],
          
          'id'=>$row['idcarteracliente']
      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}