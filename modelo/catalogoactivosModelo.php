<?php

require '../core/conexion.php';


class catalogoactivoModelo {

   protected function agregar_catalogoactModelo($datos){
        $sql=conectar()->prepare("INSERT INTO catalogoactivos(correlativo,nombrecatalogo,tiempodespreciacion) VALUES(:correla,:nomcata,:tiempodepre)");

        $sql->bindParam(":correla",$datos['correla']);
        $sql->bindParam(":nomcata",$datos['nomcata']);
        $sql->bindParam(":tiempodepre",$datos['tiempodepre']);
        $sql->execute();
        return $sql;
     }

    protected function mostrar_catalogoactModelo(){
         $query=conectar()->prepare("SELECT * FROM catalogoactivos ORDER BY correlativo ASC");
         $query->execute();
         return $query;
    }

    protected function  eliminar_catalogoactModelo($id){
     $query=conectar()->prepare("DELETE FROM catalogoactivos WHERE idcatalogoactivos=$id");
     $query->execute();
   return $query;
    }


    protected function modificar_catalogoactModel($datos){
   $sql=conectar()->prepare("UPDATE catalogoactivos SET correlativo=:Numcorrelativo, nombrecatalogo=:Nomcatalgo, tiempodespreciacion=:Tiempodepre WHERE idcatalogoactivos =:Id");
        $sql->bindParam(":Numcorrelativo",$datos['Numcorrelativo']);
        $sql->bindParam(":Nomcatalgo",$datos['Nomcatalgo']);
        $sql->bindParam(":Tiempodepre",$datos['Tiempodepre']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }
}