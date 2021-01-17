<?php

require '../core/conexion.php';


class carritoModelo {

     protected function agregar_carritoModelo($datos){
            $sql=conectar()->prepare("INSERT INTO carrito(idproducto, cantidad) VALUES (:producto,:cantidad)");

            $sql->bindParam(":producto",$datos['producto']);
            $sql->bindParam(":cantidad",$datos['cantidad']);
           
            $sql->execute();
            return $sql;
    }

    protected function mostrar_carritoModelo(){
        $query=conectar()->prepare("SELECT c.idcarrito,p.imagen,p.codigo,p.nombreproducto,p.precioventa,c.cantidad,( p.precioventa * c.cantidad ) AS total 
            FROM carrito AS c INNER JOIN producto AS p ON c.idproducto = p.idproducto");
        $query->execute();
        return $query;
   }

  protected function mostrar_productoM(){
    $query=conectar()->prepare("SELECT p.idproducto,p.codigo,p.imagen,p.nombreproducto,p.stock,p.precioventa FROM producto AS p");
        $query->execute();
        return $query;
   }


    protected function eliminar_carritoModelo($id){
        $query=conectar()->prepare("DELETE FROM carrito WHERE idcarrito =$id");
        $query->execute();
        return $query;
   }


  
}