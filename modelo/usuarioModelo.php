<?php

require '../core/conexion.php';


class usuarioModelo {

   protected function agregar_usuarioModelo($datos){
    $sql=conectar()->prepare("INSERT INTO usuarios(idempleado, usuario, password) VALUES (:idempleado,:usuario,:password)");

    $sql->bindParam(":idempleado",$datos['idempleado']);
    $sql->bindParam(":usuario",$datos['usuario']);
    $sql->bindParam(":password",$datos['password']);
    $sql->execute();
    return $sql;
 


   }
} 