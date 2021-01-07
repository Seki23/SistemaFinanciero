<?php

require_once  "../core/conexion.php";

//PARA SELECCIONAR EL ENCARGADOO DEL ACTIVO

$opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';

    if($opcion==1){
 
      $consulta2="SELECT p.idproveedor,p.nombre FROM proveedor AS p";
     
         $conexion2=conectar();
         $resultado2 = $conexion2->prepare($consulta2); 
         $resultado2->execute();  
           $datos2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
         
         $data2=json_encode($datos2, JSON_UNESCAPED_UNICODE);
         print $data2;
         
        }else{
            $id=$_POST['id'];
            $consulta2="SELECT p.idproveedor,p.nombre FROM proveedor AS p  WHERE  p.idproveedor=$id";
            $conexion2=conectar();
               $datos2=$conexion2->query($consulta2);
               $datos2=$datos2->fetchAll();
               if($datos2>=1){
            foreach($datos2 as $row){
              $json2[]=array(
                'proveedor'=>$row['nombre'],
                'id'=>$row['idproveedor']
              );
            }
            $jsonstring2=json_encode($json2[0]);
            echo $jsonstring2;
        }
 }