<div class="main-content">

	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

		<!--left-fixed -navigation-->

		<aside class="sidebar-left">

      <nav class="navbar navbar-inverse">

          <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            </button>

            <h1><a class="navbar-brand" href="<?= base_url()?>dashboard"><img src="<?= base_url()?>assets/home/images/logo.png" width="150" height="40" alt=""></a></h1>
        
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="sidebar-menu">

              <li class="header">MAIN NAVIGATION</li>

              <li class="treeview">

                <a href="<?= base_url()?>dashboard">

                <i class="fa fa-dashboard"></i> <span>Inicio</span>

                </a>

              </li>



              <?php foreach ($opciones as $value): ?>

                <?php if ($value->menu_nombre == "Denuncias" AND $value->read == 1): ?>

                  <li class="treeview">

                    <a href="#">

                    <i class="fa fa-laptop"></i>

                    <span>Denuncias</span>

                    <i class="fa fa-angle-left pull-right"></i>

                    </a>

                    <ul class="treeview-menu">

	                    <li><a href="<?= base_url()?>operaciones/denuncias/factura"><i class="fa fa-angle-right"></i> Por factura</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/cheque"><i class="fa fa-angle-right"></i> Por cheque</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/letra"><i class="fa fa-angle-right"></i> Por letra</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/arriendos_habitacionales"><i class="fa fa-angle-right"></i> Por Arriendos Habitacionales</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/arriendo_comercial"><i class="fa fa-angle-right"></i> Por Arriendo Comercial</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/arriendo_vehiculo"><i class="fa fa-angle-right"></i> Por Arriendo Vehiculo</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/arriendo_equipos"><i class="fa fa-angle-right"></i> Por Arriendo Equipos</a></li>

                     <li><a href="<?= base_url()?>operaciones/denuncias/creditos_automotrices"><i class="fa fa-angle-right"></i> Por Creditos Automotrices</a></li>

                      <li><a href="<?= base_url()?>operaciones/denuncias/creditos_laborales"><i class="fa fa-angle-right"></i> Por incumplimiento Laborales</a></li>

                       <li><a href="<?= base_url()?>operaciones/denuncias/incumplimiento_comerciales"><i class="fa fa-angle-right"></i>Por incumplimiento comerciales</a></li>

                      



                  </ul>

                  </li>

                <?php endif ?>

              <?php endforeach ?>

              



              <?php foreach ($opciones as $value): ?>

                <?php if ($value->menu_nombre == "Solicitudes" AND $value->read == 1): ?>

                 <li class="treeview">

                  <a href="#">

                  <i class="fa fa-clock-o"></i>

                  <span>Solicitudes</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu">

                    <?php foreach ($opciones as $value): ?>

                      <?php if ($value->menu_nombre == "Denunciar" AND $value->read == 1): ?>

                         <li><a href="<?= base_url()?>"><i class="fa fa-angle-right"></i> Denunciar</a></li>

                      <?php endif ?>

                    <?php endforeach ?>

                    <?php foreach ($opciones as $value): ?>

                      <?php if ($value->menu_nombre == "Solicitud de Datos" AND $value->read == 1): ?>

                         <li><a href="<?= base_url()?>solicitudes/solicitar_datos"><i class="fa fa-angle-right"></i> Solicitud de Datos</a></li>

                      <?php endif ?>

                    <?php endforeach ?>

                    

                  </ul>

              </li>

                <?php endif ?>

              <?php endforeach ?>







          <!--     <?php foreach ($opciones as $value): ?>

                <?php if ($value->menu_nombre == "pagos" AND $value->read == 1): ?>

                  <li class="treeview">

                    <a href="<?= base_url()?>operaciones/pagos">

                    <i class="fa fa-credit-card"></i>

                    <span>Pagos</span>

                    </a>

                  </li>

                <?php endif ?>

              <?php endforeach ?>

 -->



  

              <?php foreach ($opciones as $value): ?>

                <?php if ($value->menu_nombre == "Administrar" AND $value->read == 1): ?>

                 <li class="treeview">

                  <a href="#">

                  <i class="fa fa-user"></i>

                  <span>Administrar</span>

                  <i class="fa fa-angle-left pull-right"></i>

                  </a>

                  <ul class="treeview-menu">

                    <?php foreach ($opciones as $value): ?>

                      <?php if ($value->menu_nombre == "Usuarios" AND $value->read == 1): ?>

                         <li><a href="<?= base_url()?>administrar/usuarios"><i class="fa fa-angle-right"></i> Usuarios</a></li>

                      <?php endif ?>

                    <?php endforeach ?>

                    <?php foreach ($opciones as $value): ?>

                      <?php if ($value->menu_nombre == "Permisos" AND $value->read == 1): ?>

                         <li><a href="<?= base_url()?>administrar/permisos"><i class="fa fa-angle-right"></i> Permisos</a></li>

                      <?php endif ?>

                    <?php endforeach ?>

                    

                  </ul>

              </li>

                <?php endif ?>

              <?php endforeach ?>

			        



              

            </ul>

          </div>

          <!-- /.navbar-collapse -->

      </nav>

    </aside>

	</div>

		<!--left-fixed -navigation-->