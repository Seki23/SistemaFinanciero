<?php

require '../core/conexion.php';


class ventaModelo {


 protected function agregar_ventaContadoModelo($datos){
        $sql=conectar()->prepare("INSERT INTO venta(codigo,fecha,idempleado,idcliente) VALUES (:codigo,:fecha,:empleado,:cliente)");

        $sql->bindParam(":codigo",$datos['codigo']);
        $sql->bindParam(":fecha",$datos['fecha']);
        $sql->bindParam(":empleado",$datos['empleado']);
        $sql->bindParam(":cliente",$datos['cliente']);
        $sql->execute();
        return $sql;
     }


      protected function agregar_DetalleventaModelo($datos){
        $sql=conectar()->prepare("INSERT INTO detalleventa(idventa, idproducto,cantidad, precioventa) VALUES (:venta, :producto,:cantidad, :precio)");

        $sql->bindParam(":venta",$datos['venta']);
        $sql->bindParam(":producto",$datos['producto']);
        $sql->bindParam(":cantidad",$datos['cantidad']);
        $sql->bindParam(":precio",$datos['precio']);
        $sql->execute();
        return $sql;
     }


      protected function agregar_KardexVentaModelo($datos){
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


     protected function mostrar_ventaModelo(){
        $query=conectar()->prepare("SELECT v.idventa,v.codigo,empleado.nombre AS empleado,clientes.nombrecliente AS cliente,v.fecha,( SELECT SUM( dv.cantidad * dv.precioventa ) AS total FROM detalleventa AS dv WHERE dv.idventa = v.idventa ) AS subtotal FROM venta AS v INNER JOIN empleado ON v.idempleado = empleado.idempleado
           INNER JOIN clientes ON v.idcliente = clientes.idcliente");
        $query->execute();
        return $query;
   }




}