<?php

require '../core/conexion.php';


class departamentoModelo {

    protected function agregar_departamentoModelo($datos){
        $sql=conectar()->prepare("INSERT INTO departamento(correlativo, nombredepartamento) VALUES (:Correlativo, :Nombre)");
 $sql->bindParam(":Correlativo",$datos['Correlativo']);
        $sql->bindParam(":Nombre",$datos['Nombre']);
       
        
        $sql->execute();
        return $sql;
     }

    protected function mostrar_DepartamentoModelo(){
         $query=conectar()->prepare("SELECT * FROM departamento");
         $query->execute();
         return $query;
    }

    protected function  eliminar_departamentoModelo($id){
     $query=conectar()->prepare("DELETE FROM departamento WHERE iddepartamento=$id");
     $query->execute();
   return $query;
    }

  protected function modificar_DepartamentoModelo($datos){
   $sql=conectar()->prepare("UPDATE departamento SET nombredepartamento=:Nombre WHERE iddepartamento =:Id");
        
      
        $sql->bindParam(":Nombre",$datos['Nombre']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

 }

