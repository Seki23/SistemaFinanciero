    <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">

                  <?php 
                $nombre = $_SESSION["usuario"];
            //   $nombreU=explode(" ",$nombre);
              ?>

                  <img src="<?php echo SERVERURL; ?>/vistas/production/images/img.jpg" alt=""><?php echo $nombre ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a  class="dropdown-item" href="../controles/logaut.php"><i class="fa fa-sign-out pull-right"></i> Cerrar session</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown"
                  aria-expanded="false" onclick="cargarCarrito()">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="badge bg-green" id="numero" ></span>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu"  id="Productoscarrito" aria-labelledby="navbarDropdown1">

                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

