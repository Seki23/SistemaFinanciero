<?php

require '../core/conexion.php';


class clienteModelo {

   protected function agregar_clienteModelo($datos){
        $sql=conectar()->prepare("INSERT INTO clientes( nombrecliente, direccion, dui, nit, profesion, tipoingreso, salario, telefono, celular, correo, observaciones, idcarteraclientes) VALUES(:nombre, :direccion,:dui,:nit,:profesion,:tipoingreso,:sueldo,:telefono,:celular,:correo,:observaciones,:idcartera)");

        $sql->bindParam(":nombre",$datos['nombre']);
        $sql->bindParam(":direccion",$datos['direccion']);
        $sql->bindParam(":dui",$datos['dui']); 
        $sql->bindParam(":nit",$datos['nit']);
        $sql->bindParam(":profesion",$datos['profesion']);
        $sql->bindParam(":tipoingreso",$datos['tipoingreso']);
        $sql->bindParam(":sueldo",$datos['sueldo']);
        $sql->bindParam(":telefono",$datos['telefono']);
        $sql->bindParam(":celular",$datos['celular']);
        $sql->bindParam(":correo",$datos['correo']);
        $sql->bindParam(":observaciones",$datos['observaciones']);
        $sql->bindParam(":idcartera",$datos['idcartera']);
       
        $sql->execute();
        return $sql;
     }

    protected function mostrar_FiadorModelo(){
         $query=conectar()->prepare("SELECT * FROM clientes");
         $query->execute();
         return $query;
    }



}