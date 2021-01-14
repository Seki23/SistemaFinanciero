<?php

require '../core/conexion.php';


class comisionModelo {
  protected function agregar_comisionModelo($datos){
        $sql=conectar()->prepare("INSERT INTO comisiones(minimo, maximo, porcentaje,tiponivel) VALUES (:minimo,:maximo,:porcentaje,:tipo)");

 $sql->bindParam(":minimo",$datos['minimo']);
        $sql->bindParam(":maximo",$datos['maximo']);
       
        $sql->bindParam(":porcentaje",$datos['porcentaje']); 
         $sql->bindParam(":tipo",$datos['tipo']);
       
        $sql->execute();
        return $sql;
     }
    protected function mostrar_ComisionModelo(){
         $query=conectar()->prepare("SELECT * FROM comisiones");
         $query->execute();
         return $query;
    }

    protected function  eliminar_comisionModelo($id){
     $query=conectar()->prepare("DELETE FROM comisiones WHERE id=$id");
     $query->execute();
   return $query;
    }

  protected function modificar_ComisionModelo($datos){
   $sql=conectar()->prepare("UPDATE comisiones SET minimo=:minimoM,maximo=:maximoM,porcentaje=:porcentaje,tiponivel=:tipo WHERE id =:Id");
        $sql->bindParam(":minimoM",$datos['minimoM']);
        $sql->bindParam(":maximoM",$datos['maximoM']);
        $sql->bindParam(":porcentaje",$datos['porcentaje']); 
        $sql->bindParam(":tipo",$datos['tipo']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

 }

