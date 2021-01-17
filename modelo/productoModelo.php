<?php

require '../core/conexion.php';


class productoModelo{

   protected function agregar_productoModelo($datos){
        $sql=conectar()->prepare("INSERT INTO producto(nombreproducto, descripcion, preciocompra, precioventa, margen, stockminimo, stock, codigo, estado, imagen, idproveedor, idcategoria) VALUES(:nombreprod,:descripprod,:preciocom,:preciovent,:margen,:stockmini,:stockprod,:coigoprod,:estadoprod,:imagenprod,:idprovedor,:idcategoria)");

        $sql->bindParam(":nombreprod",$datos['nombreprod']);
        $sql->bindParam(":descripprod",$datos['descripprod']);
        $sql->bindParam(":preciocom",$datos['preciocom']);
        $sql->bindParam(":preciovent",$datos['preciovent']);
        $sql->bindParam(":margen",$datos['margen']);
        $sql->bindParam(":stockmini",$datos['stockmini']);
        $sql->bindParam(":stockprod",$datos['stockprod']);
        $sql->bindParam(":coigoprod",$datos['coigoprod']);
        $sql->bindParam(":estadoprod",$datos['estadoprod']);
        $sql->bindParam(":imagenprod",$datos['imagenprod']);
        $sql->bindParam(":idprovedor",$datos['idprovedor']);
        $sql->bindParam(":idcategoria",$datos['idcategoria']);
        $sql->execute();
        return $sql;
     }

    protected function mostrar_productoModelo(){
         $query=conectar()->prepare("SELECT p.idproducto,p.nombreproducto,p.descripcion,p.preciocompra,p.precioventa,p.margen,p.stockminimo,p.stock,p.codigo,
              p.estado,p.imagen,prov.nombre,cat.categoriaproducto
            FROM producto p
            INNER JOIN proveedor prov ON p.idproveedor = prov.idproveedor
            INNER JOIN categoriaproducto cat ON p.idcategoria = cat.idcategoriaproducto");
         $query->execute();
         return $query;
    }

    protected function  eliminar_productoModelo($id){
     $query=conectar()->prepare("DELETE FROM producto WHERE idproducto=$id");
     $query->execute();
     return $query;
    }

    protected function modificar_productoModelo($datos){
   $sql=conectar()->prepare("UPDATE producto SET nombreproducto=:NomProd,descripcion=:DescripProd,preciocompra=:PrecioComp, precioventa=:PrecioVent,margen=:MargenGana, stockminimo=:StockMin,stock=:StockProd,idproveedor=:Idprove, idcategoria=:Idcatego WHERE idproducto =:Id");
        $sql->bindParam(":NomProd",$datos['NomProd']);
        $sql->bindParam(":DescripProd",$datos['DescripProd']);
        $sql->bindParam(":PrecioComp",$datos['PrecioComp']);
        $sql->bindParam(":PrecioVent",$datos['PrecioVent']);
        $sql->bindParam(":MargenGana",$datos['MargenGana']);
        $sql->bindParam(":StockMin",$datos['StockMin']);
        $sql->bindParam(":StockProd",$datos['StockProd']);
        $sql->bindParam(":Idprove",$datos['Idprove']);
        $sql->bindParam(":Idcatego",$datos['Idcatego']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

    protected function agregar_KardexModelo($datos){
        $sql=conectar()->prepare("INSERT INTO kardex( idproductos, fecha, descripcion, movimiento, cantidad,vunitario,cantidades, vtotales) VALUES ( :producto, :fecha, :descripcion, :movimiento, :cantidad,:precio,:cantidades, :total)");

        $sql->bindParam(":fecha",$datos['fecha']);
        $sql->bindParam(":producto",$datos['producto']);
        $sql->bindParam(":descripcion",$datos['descripcion']);
        $sql->bindParam(":movimiento",$datos['movimiento']);
        $sql->bindParam(":cantidad",$datos['cantidad']);
        $sql->bindParam(":precio",$datos['precio']);
        $sql->bindParam(":cantidades",$datos['cantidades']);
        $sql->bindParam(":total",$datos['total']);
        $sql->execute();
        return $sql;
     }


   protected function estado_productoModelo($datos){
   $sql=conectar()->prepare("UPDATE producto SET estado=:EstadoProdMo WHERE idproducto =:Id");
        $sql->bindParam(":EstadoProdMo",$datos['EstadoProdMo']);
        $sql->bindParam(":Id",$datos['Id']);
        $sql->execute();
        return $sql;
   }

}