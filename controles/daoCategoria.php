<?php
 require_once  "../core/conexion.php";

    
    $id=$_POST['id'];
    $consulta="SELECT idcategoriaproducto, categoriaproducto FROM categoriaproducto WHERE idcategoriaproducto=$id";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
          'nomcategoria'=>$row['categoriaproducto'],
          'id'=>$row['idcategoriaproducto']
      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}