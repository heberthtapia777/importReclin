<?php
session_start();

  include 'adodb5/adodb.inc.php';
  include 'inc/function.php';

  $db = NewADOConnection('mysqli');
  //$db->debug = true;
  $db->Connect();

  $op = new cnFunction();

  $inactivo = 900;

  if( isset($_SESSION['tiempo']) && isset($_SESSION['idEmp']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo){
            $strQuery = 'UPDATE usuario SET status = "Inactivo" WHERE id_empleado = "'.$_SESSION['idEmp'].'"';
            $str = $db->Execute($strQuery);
            session_destroy();
            header("Location: index.php");
        }else{
          //echo "time_elapsed_B: ".$op->time_elapsed_B(time()-$_SESSION['tiempo'])."\n";
          $nowTime = $_SESSION['tiempo'] = time();
          $strQuery = 'UPDATE usuario SET status = "Activo", timeReg = "'.$nowTime.'" WHERE id_empleado = "'.$_SESSION['idEmp'].'"';
          $str = $db->Execute($strQuery);
        }
  }else{
    session_destroy();
    header("Location: index.php");
  }
  $sql = 'SELECT * ';
  $sql.= 'FROM empleado ';
  $sql.= 'WHERE id_empleado = '.$_SESSION['idEmp'].'';
  $reg = $db->Execute($sql);
  $row = $reg->FetchRow();


  $nombre = ltrim($row['nombre']);
  $nombre = rtrim($nombre);

  $nom = explode(' ',$nombre);

  $nombre1 = strtoupper($nom[0]);
  //$nombre2 = strtoupper($nom[1]);


  $apP = strtoupper($row['apP']);

 // $_SESSION['inc'] = $nombre1[0].''.$apP[0].'-';
  $_SESSION['NOMBREUSUARIO']=($row['nombre'].' '.$row['apP']);
  $_SESSION['IDSUCURSAL']=($row['id_sucursal']);
  $_SESSION['IMAGENUSUARIO']=($row['foto']);
  //se verifica que rol cumple
  if($row['cargo']=='adm'){
    $_SESSION['ROL']='ADMINISTRADOR';
  }
  else if($row['cargo']=='ope'){
    $_SESSION['ROL']='OPERADOR';
  }

  //consulta para saber el nombre de la sucursal
  $sqlNombreSuc = 'SELECT * ';
  $sqlNombreSuc.= 'FROM sucursal ';
  $sqlNombreSuc.= 'WHERE id_sucursal = '.$_SESSION['IDSUCURSAL'].'';
  $regNombreSuc = $db->Execute($sqlNombreSuc);
  $rowNombreSuc = $regNombreSuc->FetchRow();


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="TechnoSoft-Bolivia">
    <meta name="keyword" content="">

    <title>ADMINISTRADOR</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!-- Styles del CHAT -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/myStyleChat.min.css">

    <script src="assets/js/chart-master/Chart.js"></script>

  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>ADMINISTRADOR<?php if(isset($rowNombreSuc['nameSuc'])){echo " - SUCURSAL ".$rowNombreSuc['nameSuc'];}?></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="#" onclick="outSession('<?=$_SESSION['idUser'];?>');">Cerrar Sessión</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profile.html"><img src="modulo/empleado/uploads/files/<?php echo $_SESSION['IMAGENUSUARIO']?>" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php  echo $_SESSION ['NOMBREUSUARIO']?><br> <?php  echo $_SESSION ['ROL']?></h5>

                  <li class="mt">
                      <a class="active" href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Tablero</span>
                      </a>
                  </li>
                  <?php
                  if($_SESSION['ROL']!="ADMINISTRADOR"){
                  ?>
                  <li class="sub-menu">
                      <a id="venta" href="javascript:;" >
                          <i class="fa fa-handshake-o"></i>
                          <span>Ventas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="modulo/venta/venta.php">Punto de Venta</a></li>
                          <li><a  href="modulo/venta/">Lista de Ventas</a></li>
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
                    $sql   = "SELECT id_sucursal, nameSuc FROM sucursal";

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
                        <li id="listCentral"><a  href="modulo/sucursal/inventarioSucursal.php?id=<?=$row['id_sucursal']?>&of=<?=$row['nameSuc']?>"><?=$row['nameSuc']?></a></li>
                        <?php
                        }
                        else if($_SESSION['IDSUCURSAL']=='0'){
                        
                        ?>
                        <li id="listCentral"><a  href="modulo/sucursal/inventarioSucursal.php?id=<?=$row['id_sucursal']?>&of=<?=$row['nameSuc']?>"><?=$row['nameSuc']?></a></li>
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
                      <a href="javascript:;" >
                          <i class="fa fa-wrench"></i>
                          <span>Repuestos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="modulo/repuesto/">Lista Repuestos</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a id="categoria" href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Categorias</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="modulo/categoria/">Lista Categorias</a></li>
                      </ul>
                  </li>



                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Empleados</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="modulo/empleado/">Lista Empleados</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-home"></i>
                          <span>Sucursales</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="modulo/sucursal/">Lista Sucursales</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-file-text"></i>
                          <span>Reportes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="modulo/reportes/">Generar Reporte</a></li>
                          <!--<li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>-->
                      </ul>
                  </li>

                  <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-male"></i>
                            <span>Clientes</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="modulo/cliente/">Lista Clientes</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a id="proveedor" href="javascript:;" >
                            <i class="fa fa-truck"></i>
                            <span>Proveedores</span>
                        </a>
                        <ul class="sub">
                            <li id="listProveedor"><a  href="modulo/proveedor/">Lista Proveedores</a></li>
                        </ul>
                    </li>
                  <!-- <li class="sub-menu">
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
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
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
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">

                  	<!-- <div class="row mtbox">
                  		
                  	</div><!- /row mt - -->


          <div class="row mt">
            <!-- SERVER STATUS PANELS -->
            <div class="col-md-4 col-sm-4 mb">
              <div class="white-panel pn donut-chart">
                <div class="white-header">
			  			    <h5>Repuestos Sin Stock</h5>
                </div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> 70%</p>
									</div>
	              </div>
								<canvas id="serverstatus01" onclick="RepuestoSinStock();" height="120" width="120"></canvas>
								
                <script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : 30,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	            </div><! --/grey-panel -->

             
            </div><!-- /col-md-4-->


            <div class="col-md-4 col-sm-4 mb">
              <div class="white-panel pn">
                <div class="white-header">
						  		<h5>Ultimos Repuestos Agregados al Inventario</h5>
                </div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-heart"></i> 122</p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	              </div>
	              <div class="centered">
										<img src="assets/img/product.png" onclick="UltimosRepuestos();" width="120">
	              </div>
              </div>
            </div><!-- /col-md-4 -->

            <?PHP
               date_default_timezone_set('America/Asuncion');
                $sql = "select SUM(c.total) As totalVenta, e.nombre,e.apP, s.nameSuc from compra As c, empleado As e , sucursal As s where c.id_empleado=e.id_empleado And s.id_sucursal=e.id_sucursal AND c.dateReg between '".date("Y-m-d")." 00:00:00' And '".date("Y-m-d")." 23:59:59'";
                //echo("ddddddddd ".$fecha);
                if($_SESSION['ROL']=='OPERADOR'){
                  $condicion="And e.id_empleado='".$_SESSION['idEmp']."' group by c.id_empleado";
                }
                else{
                   $condicion=" group by c.id_empleado";
                }

                $cont = 1;

                $srtQuery = $db->Execute($sql.$condicion);
                if($srtQuery === false)
                    die("failed");
            ?>

						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>Ventas Realizadas el dia de Hoy</h5>
								</div>
								<p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
								<p><b><!--nombre empleado--></b></p>
								<div class="row">
                  <div class="col-md-4">
                    <p class="small mt">SUCURSAL</p>
                  </div>
                  <div class="col-md-4">
                    <p class="small mt">EMPLEADO</p>
                  </div>
                  <div class="col-md-4">
                    <p class="small mt">TOTAL VENTAS</p>
                  </div>
                <?php
                 while( $row = $srtQuery->FetchRow()){
                ?>
                  <div class="col-md-4">
                    <p><?=$row['nameSuc']?></p>
                  </div>
									<div class="col-md-4">
										<p> <?=$row['nombre']?></p>
									</div>
									<div class="col-md-4">
										<p><?=$row['totalVenta']?></p>
									</div>
                <?php
                }
                ?>
								</div>
							</div>
						</div><!-- /col-md-4 -->
           


          </div><!-- /row -->

          <!-- desde aca se crea div dinamicos para el tablero de inico -->
            <div id="DIV-SIN-STOCK" class="collapse">
            <hr style="background-color: red;">
              <h4>Repuestos con cantidad baja de Stock</h4>
              <table id="tablaList" class="table table-bordered table-striped table-condensed">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>Sucursal</th>
                    <th>Repuesto</th>
                    <th>Cantidad</th>
                  
                </tr>
                </thead>
                <tbody>
                <?PHP
                $sql = "select s.nameSuc,r.name,a.cantidad from sucursal As s, repuesto As r, almacenSuc As a where s.id_sucursal=a.id_sucursal And r.id_repuesto=a.id_repuesto And a.cantidad<=5 ";

                if($_SESSION['IDSUCURSAL']!=0){
                  $cadena=" And s.id_sucursal='".$_SESSION['IDSUCURSAL']."'";
                }
                else{
                  $cadena="";
                }

                $cont = 1;

                $srtQuery = $db->Execute($sql.$cadena);
                if($srtQuery === false)
                    die("failed");

                while( $row = $srtQuery->FetchRow()){
              
                ?>
                    <tr id="tb<?=$row[0]?>">
                        <td align="center"><?=$cont++;?></td>
                        <td align="center"><?=$row['nameSuc']?></td>
                        <td align="center"><?=$row['name']?></td>
                        <td align="center"><?=$row['cantidad']?></td>

                        
                    </tr>
                <?PHP
                 }
                ?>

                </tbody>
                 
              </table>
              
            </div>  
          <!--fin de div dinamico -->

          <!-- desde aca se crea div dinamicos para el tablero de inico -->
            <div id="DIV-ULTIMOS-REPUESTOS" class="collapse">
            <hr>
              <h4>Últimos repuestos agregados</h4>
              <table id="tablaList" class="table table-bordered table-striped table-condensed">
                <thead>
                <tr>
                    <th>Nº</th>
                    <th>Sucursal</th>
                    <th>Repuesto</th>
                    <th>Cantidad</th>
                  
                </tr>
                </thead>
                <tbody>
                <?PHP
                $sql = "select s.nameSuc,r.name,a.cantidad from sucursal As s, repuesto As r, almacen As a where s.id_sucursal=a.id_sucursal And r.id_repuesto=a.id_repuesto ";

                $cont = 1;

                $srtQuery = $db->Execute($sql.$cadena." order by a.id_almacen desc limit 0,2");
                if($srtQuery === false)
                    die("failed");

                while( $row = $srtQuery->FetchRow()){
              
                ?>
                    <tr id="tb<?=$row[0]?>">
                        <td align="center"><?=$cont++;?></td>
                        <td align="center"><?=$row['nameSuc']?></td>
                        <td align="center"><?=$row['name']?></td>
                        <td align="center"><?=$row['cantidad']?></td>

                        
                    </tr>
                <?PHP
                 }
                ?>

                </tbody>
                 
              </table>
              
            </div>  
          <!--fin de div dinamico -->



					<!-- <div class="row">
						<!- TWITTER PANEL -
						<div class="col-md-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>ESTÁTICAS DROPBOX</h5>
                      			</div>
								<canvas id="serverstatus02" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 60,
												color:"#68dff0"
											},
											{
												value : 40,
												color : "#444c57"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
								</script>
								<p>Abril 17, 2014</p>
								<footer>
									<div class="pull-left">
										<h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
									</div>
									<div class="pull-right">
										<h5>60% Usado</h5>
									</div>
								</footer>
                      		</div><! - /darkblue panel -
						</div><!- /col-md-4 -


						<div class="col-md-4 mb">
							<!- INSTAGRAM PANEL -
							<div class="instagram-panel pn">
								<i class="fa fa-instagram fa-4x"></i>
								<p>@ESTE ERES TU<br/>
									hace, 5 minutos
								</p>
								<p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
							</div>
						</div><!- /col-md-4 -

						<div class="col-md-4 col-sm-4 mb">
							<!- REVENUE PANEL -
							<div class="darkblue-panel pn">
								<div class="darkblue-header">
									<h5>INGRESOS</h5>
								</div>
								<div class="chart mt">
									<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
								</div>
								<p class="mt"><b>$ 17,980</b><br/>Ingreso mensual</p>
							</div>
						</div><!-/col-md-4 -

					</div><!- /row - -->

					<!-- <div class="row mt">
                      <!-CUSTOM CHART START -
                      <div class="border-head">
                          <h3>VISITAS</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!-custom chart end-
					</div><!- /row - -->

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->

                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>NOTIFICACIONES</h3>
                <!-- <div id="notification">
                      <!- First Action -
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>Hace 2 minutos</muted><br/>
                             <a href="#">James Brown</a> se ha suscrito a su boletín de noticias.<br/>
                          </p>
                        </div>
                      </div>
                      <!- Second Action -
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>Hace 3 horas</muted><br/>
                             <a href="#">Diana Kennedy</a> compró un año de suscripción.<br/>
                          </p>
                        </div>
                      </div>
                      <!- Third Action -
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>Hace 7 horas</muted><br/>
                             <a href="#">Brandon Page</a> compró un año de suscripción.<br/>
                          </p>
                        </div>
                      </div>
                      <!- Fourth Action -
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>Hace 11 horas</muted><br/>
                             <a href="#">Mark Twain</a> Comentó tu publicación.<br/>
                          </p>
                        </div>
                      </div>
                      <!- Fifth Action -
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>Hace 18 horas</muted><br/>
                             <a href="#">Daniel Pratt</a> compró una cartera en su tienda.<br/>
                          </p>
                        </div>
                      </div>
                </div> -->
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 22%; margin-top: -100px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->

                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2018 - <a href="http://technosoft-bolivia.net" target="_blank">TechnoSoft-Bolivia</a>
              <a href="http://technosoft-bolivia.net" class="go-top" target="_blank">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
  	<script src="assets/js/zabuto_calendar.js"></script>

    <!-- JS para CHAT -->
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/push.min.js"></script>
    <script type="text/javascript" src="assets/js/miChat.min.js"></script>

    <script type="text/javascript" src="assets/js/myJavaScript.js"></script>
        <!--script for this page-->
   <!-- <script type="text/javascript" src="../../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.json-2.3.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.form-validator.js"></script>
-->


   <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'BIENVENIDO AL <?php echo $_SESSION['ROL']?>!',
            // (string | mandatory) the text inside the notification
            text: 'Coloquese en el botón para Cerrar. Puede ocultar la barra lateral izquierda haciendo clic en el botón junto al logotipo.',
            // (string | optional) the image to display on the left
            image: 'modulo/empleado/uploads/files/<?php echo $_SESSION['IMAGENUSUARIO']?>',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
   </script>

  <script type="application/javascript">

        var eventData = [
            {
              "date":"2017-08-14",
              "badge":true,
              "title":"Tonight",
              "body":"<p class=\"lead\">Party<\/p><p>Like it's 1999.<\/p>",
              "footer":"At Paisley Park",
              "classname":"purple-event"
            },
            {"date":"2017-11-07","badge":true,"title":"Example 1"},
            {"date":"2017-11-25","badge":true,"title":"Example 2"}
        ];

        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                cell_border: false,
                today: true,
                show_days: true,
                weekstartson: 0,
                data: eventData,
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });

        });

        function myDateFunction(id, fromModal) {
          $("#date-popover").hide();
          if (fromModal) {
              $("#" + id + "_modal").modal("hide");
          }
          var date = $("#" + id).data("date");
          var hasEvent = $("#" + id).data("hasEvent");
          if (hasEvent && !fromModal) {
              return false;
          }
          $("#date-popover-content").html('You clicked on date ' + date);
          $("#date-popover").show();
          return true;
        }

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

<!-- AQUI ESTA EL CODIGO DEL CHAT 
<?PHP
  /*$sql = 'SELECT * FROM usuario AS u, empleado AS e ';
  $sql.= 'WHERE u.id_empleado = e.id_empleado ';
  $sql.= 'AND u.status = "Activo"' ;
  $sql.= 'AND u.id_empleado != '.$_SESSION['idEmp'].'';
  $srtQuery = $db->Execute($sql);*/
?>
<audio id="audio4"><source src="modulo/chat/tono/Peanut.ogg" type="audio/ogg"></audio>

<aside id="sidebar_primary" class="tabbed_sidebar ng-scope chat_sidebar">
  <div class="popup-head">
    <div class="popup-head-left pull-left">
      <h1>Conectados</h1>
    </div>
    <div class="popup-head-right-online pull-right">
      <button class="chat-header-button" type="button" onclick="minimizar('connect')"><i class="fa fa-minus" aria-hidden="true"></i></button>
    </div>
  </div>
<div id="connect" class="chat_box_wrapper chat_box_small chat_box_active connect mCustomScrollbar">
  <div class="chat_box touchscroll chat_box_colors_a">
    <div class="chat_message_wrapper">
      <div class="chat_user_avatar">
        <ul>
        <?php
          //while( $row = $srtQuery->FetchRow() ){
        ?>
          <li>
            <a onclick="chatClick(<?//=$row['id_empleado']?>, <?//=$_SESSION['idEmp']?>);" >
              <?PHP
                  //if( $row['foto'] != '' ){
              ?>
                <img class="thumb md-user-image" src="thumb/phpThumb.php?src=../modulo/empleado/uploads/<?=($row['foto']);?>&amp;w=32&amp;h=32&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
              <?PHP
                //}else{
              ?>
                <img class="thumb md-user-image" src="thumb/phpThumb.php?src=../images/sin_imagen.jpg&amp;w=32&amp;h=32&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
              <?PHP
                //}
              ?>
              <p><?//=$row['nombre'].' '.$row['apP'].' '.$row['apM']?></p>
            </a>
          </li>
        <?php
          //}
        ?>
        </ul>
      </div>
    </div>
  </div>
</aside>
<div id="sidebarMenu"></div>
<!-- AQUI TERMINA -->

  </body>
</html>
