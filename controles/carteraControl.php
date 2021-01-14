<?php

require_once  "../core/conexion.php";

            $consulta2="SELECT c.idcarteracliente,c.carteracliente FROM carteraclientes AS c";
            $conexion2=conectar();
               $datos2=$conexion2->query($consulta2);
               $datos2=$datos2->fetchAll();
               if($datos2>=1){
            foreach($datos2 as $row){
              $json2[]=array(
                'cartera'=>$row['carteracliente'],
                'id'=>$row['idcarteracliente']
              );
            }
            $jsonstring2=json_encode($json2);
            echo $jsonstring2;
        }