<?php
 require_once  "../core/conexion.php";

    
    $id=$_POST['id'];
    $consulta="SELECT idproveedor, nombre, direccion, telefono, representante, dui, nit, celular, correo FROM proveedor WHERE idproveedor=$id";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
          'nomprovedor'=>$row['nombre'],
          'id'=>$row['idproveedor']
      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}