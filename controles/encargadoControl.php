<?php

require_once  "../core/conexion.php";

//PARA SELECCIONAR EL ENCARGADOO DEL ACTIVO

$encargo=(isset($_POST['encargo'])) ? $_POST['encargo'] : '';

    if($encargo==1){
 
      $consulta2="SELECT e.idempleado,e.nombre FROM empleado AS e";
     
         $conexion2=conectar();
         $resultado2 = $conexion2->prepare($consulta2); 
         $resultado2->execute();  
           $datos2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
         
         $data2=json_encode($datos2, JSON_UNESCAPED_UNICODE);
         print $data2;
         
        }else{
            $id=$_POST['id'];
            $consulta2="SELECT e.idempleado,e.nombre FROM empleado e  WHERE e.idempleado=$id";
            $conexion2=conectar();
               $datos2=$conexion2->query($consulta2);
               $datos2=$datos2->fetchAll();
               if($datos2>=1){
            foreach($datos2 as $row){
              $json2[]=array(
                'empleado'=>$row['nombre'],
                'id'=>$row['idempleado']
              );
            }
            $jsonstring2=json_encode($json2[0]);
            echo $jsonstring2;
        }
 }