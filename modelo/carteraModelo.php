<?php

require '../core/conexion.php';


class carteraModelo {


    protected function agregar_carteraModelo($cartera){
        $sql=conectar()->prepare("INSERT INTO carteraclientes(carteracliente) VALUES (:cartera)");
        $sql->bindParam(":cartera",$cartera);
        $sql->execute();
        return $sql;
     }


     protected function mostrar_carteraModelo(){
        $query=conectar()->prepare("SELECT * FROM carteraclientes");
        $query->execute();
        return $query;
   }


  
}
