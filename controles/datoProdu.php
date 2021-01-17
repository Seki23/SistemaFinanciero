<?php
 require_once  "../core/conexion.php";

    
    $id=$_POST['id'];
    $consulta="SELECT p.idproducto,p.nombreproducto,p.descripcion,p.preciocompra,p.margen,p.stockminimo,p.codigo,p.estado,p.imagen,prov.nombre,cat.categoriaproducto
            FROM producto p
            INNER JOIN proveedor prov ON p.idproveedor = prov.idproveedor
            INNER JOIN categoriaproducto cat ON p.idcategoria = cat.idcategoriaproducto WHERE p.idproducto=$id";
    $conexion=conectar();
       $datos=$conexion->query($consulta);
       $datos=$datos->fetchAll();
       if($datos>=1){
    foreach($datos as $row){
      $json[]=array(
          'nom'=>$row['nombreproducto'],
          'precicmp'=>$row['preciocompra'],
          'codiproductos'=>$row['codigo'],
          'id'=>$row['idproducto']
      );
    }
    $jsonstring=json_encode($json[0]);
    echo $jsonstring;
}