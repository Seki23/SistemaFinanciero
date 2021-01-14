<?php

require '../core/conexion.php';


class tipoactivoModelo {
    protected function agregar_tipoactivoModelo($datos){
        $sql=conectar()->prepare("INSERT INTO tipoactivo(correlativo, nombre, idcatalogo) VALUES (:correlativo, :nombre,:catalogo)");

 $sql->bindParam(":correlativo",$datos['correlativo']);
        $sql->bindParam(":nombre",$datos['nombre']);
       
        $sql->bindParam(":catalogo",$datos['catalogo']); 
       
        $sql->execute();
        return $sql;
     }

    protected function mostrar_TipoactivoModelo(){
         $query=conectar()->prepare("SELECT e.idtipoactivo,e.correlativo,e.nombre, ca.nombrecatalogo FROM tipoactivo e INNER JOIN catalogoactivos ca ON e.idcatalogo = ca.idcatalogoactivos");
         $query->execute();
         return $query;
    }


  protected function modificar_TipoactivoModelo($datos){
   $sql=conectar()->prepare("UPDATE tipoactivo SET correlativo=:correlativo,nombre=:nombre,idcatalogo=:catalogo WHERE idtipoactivo =:Id");
     $sql->bindParam(":correlativo",$datos['correlativo']);
        $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":catalogo",$datos['catalogo']); 
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

 }

