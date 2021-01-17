<?php

require '../core/conexion.php';


class comprasModelo{


	 protected function agregar_comprasModelo($datos){
        $sql=conectar()->prepare("INSERT INTO compra(fecha) VALUES(:fecha)");

        $sql->bindParam(":fecha",$datos['fecha']);
        $sql->execute();
        return $sql;
     }


     protected function agregar_detallecomprasModelo($datos){
        $sql=conectar()->prepare("INSERT INTO detallecompra(idcompra, idproducto, cantidad, preciocompra) VALUES(:idcompra,:idproducto,:cantidad,:preciocomp)");

        $sql->bindParam(":idcompra",$datos['idcompra']);
        $sql->bindParam(":idproducto",$datos['idproducto']);
        $sql->bindParam(":cantidad",$datos['cantidad']);
        $sql->bindParam(":preciocomp",$datos['preciocomp']);
        $sql->execute();
        return $sql;
     }

     protected function mostrar_comprasModelo(){
        $query=conectar()->prepare("SELECT c.idcompra,c.fecha,pr.nombreproducto,pr.codigo,pr.descripcion,pr.imagen,dt.cantidad,dt.preciocompra
			FROM compra c
			INNER JOIN detallecompra dt ON dt.idcompra = c.idcompra
			INNER JOIN producto pr ON dt.idproducto = pr.idproducto");
        $query->execute();
         return $query;
     }

}