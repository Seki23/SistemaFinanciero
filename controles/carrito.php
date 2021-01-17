<?php
require_once  "../core/conexion.php";


     if(isset($_POST['buscar'])){

$carrito='';
$pieCarrito='';
   $consulta="SELECT p.nombreproducto,p.imagen,c.cantidad FROM carrito AS c INNER JOIN producto AS p ON c.idproducto = p.idproducto";
            $conexion=conectar();
               $datos=$conexion->query($consulta);
               $datos=$datos->fetchAll();
             
            foreach($datos as $row){
        
             

                 $carrito=$carrito.'<li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image" ><img src="http://localhost/SistemaFinanciero/vistas/imagenesprod/'.$row['imagen'].'" alt="Profile Image"  width="40" height="40" /></span>
                      <span>
                      <h6 class="font-weight-bold ">
                        '.$row['nombreproducto'].'</h6></span>
                      
                      </span>
                      <p  >
                        Cantidad: '. $row['cantidad'].' unidades  
                      </p>
                    </a>
                  </li>
                ';
            
            }
                $pieCarrito=$carrito.'<li class="nav-item">
                    <div class="text-center">
                      <a class="dropdown-item" href="http://localhost/SistemaFinanciero/carrito/" >
                        <strong>Ir al carrito</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>';
           
      
             echo $pieCarrito;
   

     }else{
            $consulta2="SELECT COUNT(idcarrito) AS num FROM carrito";
            $conexion2=conectar();
               $datos2=$conexion2->query($consulta2);
              $datos2=$datos2->fetch(PDO::FETCH_ASSOC);
             $Num=$datos2['num'];
            

            echo $Num;
    }

   



      