<?php
 require_once  "../core/conexion.php";

    
    $id=$_POST['id'];
    $consulta="SELECT a.idcatalogoactivos, a.nombrecatalogo FROM catalogoactivos a
    WHERE idcatalogoactivos=$id";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
           'catalogo'=>$row['nombrecatalogo'],
         
          'id'=>$row['idcatalogoactivos']

      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}