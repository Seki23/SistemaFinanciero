<?php

require '../core/conexion.php';


class tasaModelo {

    protected function agregar_tasaModelo($datos){
        $sql=conectar()->prepare("INSERT INTO tasadeinteres(nombretasa, tasa,cuotas,idcartera) VALUES (:Nombre, :Tasa,:Cuotas,:Cartera)");
         $sql->bindParam(":Nombre",$datos['Nombre']);
 $sql->bindParam(":Tasa",$datos['Tasa']);
        $sql->bindParam(":Cuotas",$datos['Cuotas']);
         $sql->bindParam(":Cartera",$datos['Cartera']);
        
        $sql->execute();
        return $sql;
     }

    protected function mostrar_TasaModelo(){
         $query=conectar()->prepare("SELECT ti.idtasainteres,ti.nombretasa,ti.tasa,ti.cuotas,ca.carteracliente FROM tasadeinteres ti INNER JOIN carteraclientes ca ON ti.idcartera = ca.idcarteracliente");
         $query->execute();
         return $query;
    }

 
  protected function modificar_TasaModelo($datos){
   $sql=conectar()->prepare("UPDATE tasadeinteres SET nombretasa=:nombre,tasa=:tasa, cuotas=:cuotas,idcartera=:cartera WHERE idtasainteres =:Id");
         $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":tasa",$datos['tasa']);
        $sql->bindParam(":cuotas",$datos['cuotas']);
        $sql->bindParam(":cartera",$datos['cartera']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

 }

