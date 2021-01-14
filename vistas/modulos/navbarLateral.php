   <?php 
                $nombre = $_SESSION["nombre"];
               $nombreU=explode(" ",$nombre);
                $cargo =$_SESSION["cargo"];

              ?>
  <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo SERVERURL; ?>/inicio/" class="site_title"><i class="fa fa-truck"></i> <span>Comercial!</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo SERVERURL; ?>/vistas/production/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
             
              <h2><?php echo $nombreU[0] ." ". $nombreU[2] ;?> </h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
              <?php if($cargo=="Administrador"){

                ?>
                <li><a><i class="fa fa-user"></i>Clientes<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                       <li><a href="<?php echo SERVERURL; ?>tablaFiador/">Fiadores</a></li>
                    <li><a href="<?php echo SERVERURL; ?>tablaCliente/">Clientes</a></li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>Cuentas por cobrar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo SERVERURL; ?>tablaCartera/">Cartera</a></li>
                    <li><a href="form_validation.html">Categoria cliente</a></li>
                    <li><a href="form_validation.html">Registrar pago</a></li>
                    
                  </ul>
                </li>
                <li><a><i class="fa fa-cubes"></i>Inventario <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="general_elements.html">Categoria producto</a></li>
                    <li><a href="typography.html">Productos</a></li>
                    <li><a href="media_gallery.html">Proveedor</a></li>
                    <li><a href="media_gallery.html">Compras</a></li>
                    <li><a href="typography.html">Venta</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-building"></i>Activo fijo<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo SERVERURL; ?>tablaActivos/">Activos</a></li>
                    <li><a href="<?php echo SERVERURL; ?>tablaTipoactivo/">Tipo activo</a></li>
                    <li><a href="<?php echo SERVERURL; ?>tablaDepartamento/">Departamentos</a></li>
                 
                  </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i>Estadísticas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="chartjs.html">Chart JS</a></li>
                    <li><a href="chartjs2.html">Chart JS2</a></li>
                  </ul>
                </li>
              </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-sitemap"></i>Administración<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a>Empleados<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="<?php echo SERVERURL; ?>tablaEmpleado/">Empleados</a>
                            </li>
                            <li><a href="<?php echo SERVERURL; ?>tablaComision/">Comisiones</a>
                            </li>
                            <li><a href="<?php echo SERVERURL; ?>usuarios/">Usuarios</a>
                            </li>
                          </ul>
                        </li>
                         <li><a>Interes<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="<?php echo SERVERURL; ?>tablaInteres/">Tasa de Interes</a>
                            </li>
                            
                          </ul>
                        </li>
                        <li><a href="#level1_2">Cargos</a>
                        </li>
                      </ul>
                    </li>
                  </ul>

                  <?php }else{ ?>


<li><a><i class="fa fa-user"></i>Clientes<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
               <li><a href="<?php echo SERVERURL; ?>tablaFiador/">Fiadores</a></li>
            <li><a href="<?php echo SERVERURL; ?>tablaCliente/">Clientes</a></li>
            
          </ul>
        </li>
        <li><a><i class="fa fa-edit"></i>Cuentas por cobrar <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="form_advanced.html">Cartera</a></li>
            <li><a href="form_validation.html">Categoria cliente</a></li>
            <li><a href="form_validation.html">Registrar pago</a></li>
            
          </ul>
        </li>
        <li><a><i class="fa fa-cubes"></i>Inventario <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="general_elements.html">Categoria producto</a></li>
            <li><a href="typography.html">Productos</a></li>
            <li><a href="media_gallery.html">Proveedor</a></li>
            <li><a href="media_gallery.html">Compras</a></li>
            <li><a href="typography.html">Venta</a></li>
          </ul>
        </li>


<?php } ?>

            </div>
          
            

          </div>
          <!-- /sidebar menu -->

       
        </div>
      </div>
    