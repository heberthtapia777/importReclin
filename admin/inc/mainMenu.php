<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

        	  <p class="centered"><a href="profile.html"><img src="../../modulo/empleado/uploads/files/<?php echo $_SESSION['IMAGENUSUARIO']?>" class="img-circle" width="60"></a></p>
        	  <h5 class="centered"><?php  echo $_SESSION ['NOMBREUSUARIO']?><br> <?php  echo $_SESSION ['ROL']?></h5>

            <li class="mt">
                <a href="../../admin.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Tablero</span>
                </a>
            </li>
            <?php
                if($_SESSION['ROL']!="ADMINISTRADOR"){
            ?>
            <li class="sub-menu">
                <a id="venta" href="javascript:;" >
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    <span>Ventas</span>
                </a>
                <ul class="sub">
                    <li id="puntoVenta"><a  href="../../modulo/venta/venta.php">Punto de Venta</a></li>
                    <li id="listVenta"><a  href="../../modulo/venta/">Lista de Ventas</a></li>
                </ul>
            </li>
            <?php
               }
            ?>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-archive"></i>
                    <span>INVENTARIO</span>
                </a>
                <?php
                $sql   = "SELECT id_sucursal,nameSuc FROM sucursal";

                $cont = 1;
 
                $srtQuery = $db->Execute($sql);
                if($srtQuery === false)
                   die("failed");

                while( $row = $srtQuery->FetchRow()){
                ?>
                <ul class="sub">
                 <?php
                  if($_SESSION['IDSUCURSAL']==$row['id_sucursal']){
                ?>
                    <li id="listCentral"><a  href="../../modulo/sucursal/inventarioSucursal.php?id=<?=$row['id_sucursal']?>&of=<?=$row['nameSuc']?>"><?=$row['nameSuc']?></a></li>
                    <?php
                    }
                    else if($_SESSION['IDSUCURSAL']=='0'){
                    
                    ?>
                    <li id="listCentral"><a  href="../../modulo/sucursal/inventarioSucursal.php?id=<?=$row['id_sucursal']?>&of=<?=$row['nameSuc']?>"><?=$row['nameSuc']?></a></li>
                <?php
                }
                ?>
                </ul>
               <?php
                }
               ?>
            </li>
            <?php 
                 if($_SESSION['ROL']=='ADMINISTRADOR'){
            ?>
            <li class="sub-menu">
                <a id="categoria" href="javascript:;" >
                    <i class="fa fa-th-list"></i>
                    <span>Categorias</span>
                </a>
                <ul class="sub">
                    <li id="listCat"><a  href="../../modulo/categoria/">Lista Categorias</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a id="repuesto" href="javascript:;" >
                    <i class="fa fa-wrench"></i>
                    <span>Repuestos</span>
                </a>
                <ul class="sub">
                    <li id="listResp"><a  href="../../modulo/repuesto/">Lista Repuestos</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a id="empleado" href="javascript:;" >
                    <i class="fa fa-users"></i>
                    <span>Empleados</span>
                </a>
                <ul class="sub">
                    <li id="listEmp"><a  href="../../modulo/empleado/">Lista Empleados</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a id="sucursal" href="javascript:;" >
                    <i class="fa fa-home"></i>
                    <span>Sucursales</span>
                </a>
                <ul class="sub">
                    <li id="listSucursal"><a  href="../../modulo/sucursal/">Lista Sucursales</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a id="reporte" href="javascript:;" >
                    <i class="fa fa-file-text"></i>
                    <span>Reportes</span>
                </a>
                <ul class="sub">
                    <li id="listReporte"><a  href="../../modulo/reportes/">Generar Reporte</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a id="cliente" href="javascript:;" >
                    <i class="fa fa-male"></i>
                    <span>Clientes</span>
                </a>
                <ul class="sub">
                    <li id="listCliente"><a  href="../../modulo/cliente/">Lista Clientes</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a id="proveedor" href="javascript:;" >
                    <i class="fa fa-truck"></i>
                    <span>Proveedores</span>
                </a>
                <ul class="sub">
                    <li id="listProveedor"><a  href="../../modulo/proveedor/">Lista Proveedores</a></li>
                </ul>
            </li>

            <!-- <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub">
                    <li><a  href="general.html">General</a></li>
                    <li><a  href="buttons.html">Buttons</a></li>
                    <li><a  href="panels.html">Panels</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Components</span>
                </a>
                <ul class="sub">
                    <li><a  href="calendar.html">Calendar</a></li>
                    <li><a  href="gallery.html">Gallery</a></li>
                    <li><a  href="todo_list.html">Todo List</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Extra Pages</span>
                </a>
                <ul class="sub">
                    <li><a  href="blank.html">Blank Page</a></li>
                    <li><a  href="login.html">Login</a></li>
                    <li><a  href="lock_screen.html">Lock Screen</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-tasks"></i>
                    <span>Forms</span>
                </a>
                <ul class="sub">
                    <li><a  href="form_component.html">Form Components</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Data Tables</span>
                </a>
                <ul class="sub">
                    <li><a  href="basic_table.html">Basic Table</a></li>
                    <li class="active"><a  href="responsive_table.html">Responsive Table</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub">
                    <li><a  href="morris.html">Morris</a></li>
                    <li><a  href="chartjs.html">Chartjs</a></li>
                </ul>
            </li> -->
            <?php
            }
            ?>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
