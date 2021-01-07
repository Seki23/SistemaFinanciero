<?php

 require './core/conexion.php';


class loginModelo2 {


    protected function iniciar_sesion($datos){
     $sql=conectar()->prepare("SELECT e.idempleado,u.usuario,u.password,e.nombre,c.cargo FROM usuarios AS u INNER JOIN empleado AS e ON e.idempleado = u.idempleado INNER JOIN cargo AS c ON e.idcargos=c.idcargo WHERE u.usuario=:usuario AND e.estado='1'");
        $sql->bindParam(':usuario',$datos['usuario']);
   
        $sql->execute();
        return $sql;     
    }


}