<?php

require '../core/conexion.php';


class activoModelo {


    protected function agregar_activoModelo($datos){
        $sql=conectar()->prepare("INSERT INTO activos(correlativo, fecha_adquisicion, descripcion,estado,precio, marca,tipoadquisicion,idtipo,iddepartamento,idencargado, idproveedor,vida) VALUES (:correlativo,:fecha,:descripcion,:estado,:precio,:marca,:tipoadquisicion,:idtipo,:iddepartamento,:idencargado,:idproveedor,:vida)");

        $sql->bindParam(":correlativo",$datos['correlativo']);
        $sql->bindParam(":fecha",$datos['fecha']);
        $sql->bindParam(":descripcion",$datos['descripcion']);
        $sql->bindParam(":precio",$datos['precio']);
        $sql->bindParam(":marca",$datos['marca']);
        $sql->bindParam(":tipoadquisicion",$datos['tipoadquisicion']);
        $sql->bindParam(":idtipo",$datos['idtipo']);
        $sql->bindParam(":iddepartamento",$datos['iddepartamento']);
        $sql->bindParam(":idencargado",$datos['idencargado']);
        $sql->bindParam(":idproveedor",$datos['idproveedor']);
        $sql->bindParam(":estado",$datos['estado']);
        $sql->bindParam(":vida",$datos['vida']);
        $sql->execute();
        return $sql;
     }


     protected function mostrar_ActivoModelo(){
        $query=conectar()->prepare("SELECT ac.idactivos,ac.correlativo,ac.fecha_adquisicion,ac.descripcion,ac.estado,ac.precio,ac.depresiacion_acumulada,ac.tipoadquisicion,ca.nombrecatalogo FROM activos as ac INNER JOIN tipoactivo as ta ON ac.idtipo = ta.idtipoactivo INNER JOIN catalogoactivos as ca ON ta.idcatalogo = ca.idcatalogoactivos");
        $query->execute();
        return $query;
   }


   protected function modificar_ActivoModelo($datos){
      $sql=conectar()->prepare("UPDATE activos SET fecha_adquisicion=:fecha,descripcion=:descripcion,estado=:estado,precio=:precio,marca=:marca,tipoadquisicion=:tipo,vida=:vida WHERE idactivos=:Id");
           $sql->bindParam(":fecha",$datos['fecha']);
           $sql->bindParam(":descripcion",$datos['descripcion']);
           $sql->bindParam(":estado",$datos['estado']); 
           $sql->bindParam(":precio",$datos['precio']);
           $sql->bindParam(":marca",$datos['marca']);
           $sql->bindParam(":tipo",$datos['tipo']);
           $sql->bindParam(":vida",$datos['vida']);
           $sql->bindParam(":Id",$datos['Id']);
           $sql->execute();
           return $sql;
      }

}

