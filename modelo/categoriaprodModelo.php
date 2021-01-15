<?php

require '../core/conexion.php';


class categoriaProductModelo {

   protected function agregar_cartegeoriaProductModelo($datos){
        $sql=conectar()->prepare("INSERT INTO categoriaproducto(categoriaproducto) VALUES(:categoriaprod)");

        $sql->bindParam(":categoriaprod",$datos['categoriaprod']);
        $sql->execute();
        return $sql;
     }

    protected function mostrar_cartegeoriaProductModelo(){
         $query=conectar()->prepare("SELECT * FROM categoriaproducto");
         $query->execute();
         return $query;
    }


    protected function  eliminar_cartegeoriaProductModelo($id){
     $query=conectar()->prepare("DELETE FROM categoriaproducto WHERE idcategoriaproducto=$id");
     $query->execute();
   return $query;
    }


    protected function modificar_cartegeoriaProductModelo($datos){
   $sql=conectar()->prepare("UPDATE categoriaproducto SET categoriaproducto=:Cateprod WHERE idcategoriaproducto =:Id");
        $sql->bindParam(":Cateprod",$datos['Cateprod']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }



}