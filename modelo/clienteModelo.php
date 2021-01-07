<?php

require '../core/conexion.php';


class clienteModelo {

   protected function agregar_clienteModelo($datos){
        $sql=conectar()->prepare("INSERT INTO clientes(codigo, tipocliente, nombrecliente, direccion, dui, estadocivil, lugartrabajo, salario, gastos, telefono, idcarteraclientes) VALUES (:codigo,:tipo,:nombre,:direccion,:dui,:estado,:lugartrabajo,:sueldo,:gastos,:telefono,:idcartera)");

        $sql->bindParam(":codigo",$datos['codigo']);
        $sql->bindParam(":tipo",$datos['tipo']);
        $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":direccion",$datos['direccion']);
        $sql->bindParam(":dui",$datos['dui']);
        $sql->bindParam(":estado",$datos['estado']);
        $sql->bindParam(":lugartrabajo",$datos['lugartrabajo']);
        $sql->bindParam(":sueldo",$datos['sueldo']);
        $sql->bindParam(":gastos",$datos['gastos']);
        $sql->bindParam(":telefono",$datos['telefono']);
        $sql->bindParam(":idcartera",$datos['idcartera']);
       
        $sql->execute();
        return $sql;
     }

    protected function mostrar_ClienteModelo(){
         $query=conectar()->prepare("SELECT c.idcliente,c.codigo,c.nombrecliente,c.dui,c.direccion
            ,c.telefono,ca.carteracliente FROM clientes AS c INNER JOIN carteraclientes AS ca ON c.idcarteraclientes = ca.idcarteracliente ");
         $query->execute();
         return $query;
    }


    protected function agregar_informacionFinancieraModelo($datos){
       $sql=conectar()->prepare("INSERT INTO informacionfinanciera(idcliente, efectivo, cuentasporcobrar,inventario, proplanyequi, cuentasporpagar, prestamos,deudalargoplazo,capital,utilidadesret,reserva, venta, gastosdeventa, otrosingresos, gastosdeoperacion, otrosgastos, reservalegal, renta, utilidadadneta) VALUES (:cliente,:efectivo,:cxc,:inventario,:proplanyequi,:cxp,:prestamos,:dlp,:capital,:utilidades,:reserva,:venta,:gastoV,:otroIngresos,:gastosOP,:otroGastos,:reservaLegal,:renta,:utiliNeta)");

       $sql->bindParam(":cliente",$datos['cliente']);
       $sql->bindParam(":efectivo",$datos['efectivo']);
       $sql->bindParam(":cxc",$datos['cxc']);
       $sql->bindParam(":inventario",$datos['inventario']);
       $sql->bindParam(":proplanyequi",$datos['proplanyequi']);
       $sql->bindParam(":cxp",$datos['cxp']);
       $sql->bindParam(":prestamos",$datos['prestamos']);
       $sql->bindParam(":dlp",$datos['dlp']);
       $sql->bindParam(":capital",$datos['capital']);
       $sql->bindParam(":utilidades",$datos['utilidades']);
       $sql->bindParam(":reserva",$datos['reserva']);
       $sql->bindParam(":venta",$datos['venta']);
       $sql->bindParam(":gastoV",$datos['gastoV']);
       $sql->bindParam(":otroIngresos",$datos['otroIngresos']);
       $sql->bindParam(":gastosOP",$datos['gastosOP']);
       $sql->bindParam(":otroGastos",$datos['otroGastos']);
       $sql->bindParam(":reservaLegal",$datos['reservaLegal']);
       $sql->bindParam(":renta",$datos['renta']);
       $sql->bindParam(":utiliNeta",$datos['utiliNeta']);
       
       $sql->execute();
       return $sql;
    }

    protected function modificar_ClienteModelo($datos){
      $sql=conectar()->prepare("UPDATE clientes SET nombrecliente=:nombre,direccion=:direccion,dui=:dui,lugartrabajo=:lugartrabajo,salario=:sueldo,gastos=:gastos,telefono=:telefono WHERE idcliente=:Id");
           $sql->bindParam(":nombre",$datos['nombre']);
           $sql->bindParam(":direccion",$datos['direccion']);
           $sql->bindParam(":dui",$datos['dui']); 
           $sql->bindParam(":lugartrabajo",$datos['lugartrabajo']);
           $sql->bindParam(":gastos",$datos['gastos']);
           $sql->bindParam(":sueldo",$datos['sueldo']);
           $sql->bindParam(":telefono",$datos['telefono']);
           $sql->bindParam(":Id",$datos['Id']);
           $sql->execute();
           return $sql;
      }
   



}