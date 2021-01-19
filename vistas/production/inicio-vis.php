<?php
//Codigo que muestra solo los errores exceptuando los notice.
//error_reporting(E_ALL & ~E_NOTICE);
//session_start();
if($_SESSION["logueado"] == TRUE) {
$usuario=$_SESSION["usuario"];
$nombre = $_SESSION["nombre"];
$cargo  = $_SESSION["cargo"];
$id  = $_SESSION["id"];
  
if($cargo =="Administrador"){



?>



<!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i>Ventas Totales</span>

              <?php 
                  //  include "./core/conexion.php";
                    $consulta  = ejecutar_consulta_simple("SELECT COUNT(idventa) as numventa FROM venta");
                    if($consulta->rowCount()>=1){
                      $consulta=$consulta->fetch(PDO::FETCH_ASSOC);
                      $num=$consulta['numventa'];
                   }else{
                       $num="error";
                    }
                ?>
            <div class="count"><?php echo $num; ?></div>
              <span class="count_bottom"><i class="green"></i>Ventas</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-cart"></i>Compras Totales</span>

                 <?php 
                  //  include "./core/conexion.php";
                    $consulta  = ejecutar_consulta_simple("SELECT COUNT(idcompra) as numCompra FROM compra");
                    if($consulta->rowCount()>=1){
                      $consulta=$consulta->fetch(PDO::FETCH_ASSOC);
                      $numC=$consulta['numCompra'];
                   }else{
                       $numC="error";
                    }
                ?>

              <div class="count"><?php echo $numC; ?></div>
              <span class="count_bottom"><i class="green"></i>Compras </span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Clientes</span>
               <?php 
                  //  include "./core/conexion.php";
                    $consulta  = ejecutar_consulta_simple("SELECT COUNT(idcliente) as numCliente FROM clientes");
                    if($consulta->rowCount()>=1){
                      $consulta=$consulta->fetch(PDO::FETCH_ASSOC);
                      $numCl=$consulta['numCliente'];
                   }else{
                       $numCl="error";
                    }
                ?>
               
              <div class="count "><?php echo $numCl; ?></div>
              <span class="count_bottom">Clientes registrados</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i>Ingresos</span>
                <?php 
                  //  include "./core/conexion.php";
                    $consulta  = ejecutar_consulta_simple("SELECT sum(detalleventa.precioventa) as total FROM detalleventa");
                    if($consulta->rowCount()>=1){
                      $consulta=$consulta->fetch(PDO::FETCH_ASSOC);
                      $numVenta=$consulta['total'];
                   }else{
                       $numVenta="error";
                    }
                ?>
              <div class="count">$<?php echo $numVenta; ?></div>
              <span class="count_bottom"> Total en Ventas</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i>Egresos</span>
                <?php 
                  //  include "./core/conexion.php";
                    $consulta  = ejecutar_consulta_simple("SELECT sum(detallecompra.preciocompra) as totalC FROM detallecompra");
                    if($consulta->rowCount()>=1){
                      $consulta=$consulta->fetch(PDO::FETCH_ASSOC);
                      $numCompra=$consulta['totalC'];
                   }else{
                       $numCompra="error";
                    }
                ?>
              <div class="count">$<?php echo $numCompra; ?></div>
              <span class="count_bottom">Total en Compras</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
        </div>
        <!-- /top tiles -->
       <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="dashboard_graph x_panel">
                  <div class="x_title">
                    <div class="col-md-6">
                      <h3>Network Activities <small>Graph title sub-title</small></h3>
                    </div>
                    <div class="col-md-6">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                  </div>
                  <div class="x_content">
                    <div class="demo-container" style="height:250px">
                      <div id="chart_plot_03" class="demo-placeholder"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
     <!-- /page content -->
<?php 
}else{?>

<!-- page content -->
<div class="right_col" role="main">
       <div class="row">
       <h1>VENDEDOR</h1>
              <div class="col-md-12 col-sm-12 ">
                <div class="dashboard_graph x_panel">
                  <div class="x_title">
                    <div class="col-md-6">
                      <h3>Network Activities <small>Graph title sub-title</small></h3>
                    </div>
                    <div class="col-md-6">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                  </div>
                  <div class="x_content">
                    <div class="demo-container" style="height:250px">
                      <div id="chart_plot_03" class="demo-placeholder"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
     <!-- /page content -->

<?php }
} else {
  
 
    


    }
?>

  