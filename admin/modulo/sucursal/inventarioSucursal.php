<?PHP
  include '../../inc/sessionControl.php';

  $cargo = $_SESSION['cargo'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="sistema de punto de venta">
    <meta name="author" content="Technosoft-bolivia.net">
    <meta name="keyword" content="">

    <title>ADMINISTRADOR</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">

    <!-- <link href="../../assets/css/table-responsive.css" rel="stylesheet"> -->

    <link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/square/blue.css" rel="stylesheet">
    <link href="../../uploadify/uploadify.css" rel="stylesheet">
    <link href="../../assets/css/theme-default.css" rel="stylesheet">
    <link type="text/css" href="../../assets/css/myStyle.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="../../assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.nicescroll.js"></script>
    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="../../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.json-2.3.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.form-validator.js"></script>
    <!--DatePicker-->
    <script type="text/javascript" src="../../assets/js/es-ES.js"></script>
    <script type="text/javascript" src="../../assets/js/moment.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../../assets/js/es.js"></script>
    <!--icheck-->
    <script type="text/javascript" src="../../assets/js/icheck.js"></script>
    <!--uploadIfy-->
    <script type="text/javascript" src="../../uploadify/jquery.uploadify-3.1.js"></script>

    <script type="text/javascript" src="../../assets/js/myJavaScript.js"></script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>




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
            <a href="index.html" class="logo"><b>ADMINISTRADOR</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../">Cerrar Session</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?PHP
        include '../../inc/mainMenu.php';
      ?>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h1 class="avisos" align="center"><strong></strong></h1>
          	<h3><i class="fa fa-angle-right"></i> Inventario ->Oficina <?php echo $_GET['of']?></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
              <form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
                <div class="" id="dataStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel"> </h4>
                      </div>
                      <div class="modal-body">
                         <!--inicio de la tabla stock !table table-bordered table-striped table-condensed!   -->
                        <table id="tablaList" class="table">
                                  <thead>
                                  <tr>
										<th>Nº</th>
										<th>Nro. Parte</th>
										<th>Nombre</th>
										<th>Nro Parte</th>
										<th>Para Modelo</th>
										<th>Precio Venta</th>
										<?php
											if ($cargo == 'Administrador') {
										?>
										<th>Precio Compra</th>
										<?php		
											}
										?>
										<th>Cantidad</th>
										<th>Stock Min</th>
                                     
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?PHP
                                  $sql   = "select repuesto.numParte,repuesto.name,repuesto.fromRep,repuesto.priceSale,repuesto.priceBuy, almacensuc.cantidad, repuesto.stockMin from  almacensuc,  sucursal, repuesto where repuesto.id_repuesto=almacensuc.id_repuesto and almacensuc.id_sucursal=sucursal.id_sucursal and sucursal.id_sucursal=".$_GET['id'];

                                  $cont = 1;
                                 // echo $sql; die();
                                  $srtQuery = $db->Execute($sql);
                                  if($srtQuery === false)
                                      die("failed");

                                  while( $row = $srtQuery->FetchRow()){
                                      if(($row['cantidad'])>$row['stockMin']){
                                      ?>
                                        <tr id="tb<?=$row[0]?>" style="">
											<td align="center"><?=$cont++;?></td>
											<td align="center"><?=$row['numParte']?></td>
											<td align="center"><?=$row['name'];?></td>
											<td align="center"><?=$row['numParte']?></td>
											<td align="center"><?=$row['fromRep'];?></td>
											<td align="center"><?=$row['priceSale'];?></td>
										  	<?php
												if ($cargo == 'Administrador') {
											?>
											<td align="center"><?=$row['priceBuy'];?></td>
											<?php		
												}
											?>
											<td align="center"><?=$row['cantidad'];?></td>
											<td align="center"><?=$row['stockMin'];?></td>
                                        </tr>
                                          
                                      <?php
                                      }
                                      else {

                                      ?>
                                       <tr id="tb<?=$row[0]?>" style="background-color: #e22835;color:#f9f2f2 ">
											<td align="center"><?=$cont++;?></td>
											<td align="center"><?=$row['numParte']?></td>
											<td align="center"><?=$row['name'];?></td>
                                           	<td align="center"><?=$row['numParte']?></td>
											<td align="center"><?=$row['fromRep'];?></td>
											<td align="center"><?=$row['priceSale'];?></td>
											<?php
												if ($cargo == 'Administrador') {
											?>
											<td align="center"><?=$row['priceBuy'];?></td>
											<?php		
												}
											?>
											<td align="center"><?=$row['cantidad'];?></td>
											<td align="center"><?=$row['stockMin'];?></td>
                                          
                                      </tr>
                                      <?PHP
                                      }

                                  }
                                  ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nro. Parte</th>
                                        <th>Nombre</th>
                                        <th>Nro Parte</th>
                                        <th>Para Modelo</th>
                                        <th>Precio Venta</th>
										<?php
											if ($cargo == 'Administrador') {
										?>
                                        <th>Precio Compra</th>
										<?php		
											}
										?>
                                        <th>Cantidad</th>
                                        <th>Stock Min</th>
                                    </tr>
                                  </tfoot>
                                </table>
                         <!--fin de la tabla stock-->
                      </div>
                      
                    </div>
                  </div>
                </div>
              </form>


            </div><!-- /content-panel -->
          </div><!-- /col-lg-4 -->
        </div><!-- /row -->

		</section><!--/wrapper -->
   </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 - <a href="http://www.technosoft-bolivia.com" target="_blank">TechnoSoft-Bolivia</a>
              <a href="http://www.technosoft-bolivia.com" class="go-top" target="_blank">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

 

    <script>
      $(document).ready(function() {
        $('#dataStock').on('hidden.bs.modal', function (e) {
          // do something...
          $('#formUpdate').get(0).reset();
        });
        

        $('#tablaList').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ filas por pagina",
                "zeroRecords": "No se encontro nada - Lo siento",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrada de _MAX_ registros en total)",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            },
            "columnDefs": [
                {
                    "targets": [ 1 ],
                    "visible": false,
                    "searchable": true
                }
            ]
        });

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          //increaseArea: '100%' // optional
        });

        $('input:radio').on('ifChecked', function(event){
            $('input:radio').validate();
        });
        $('input:radio').on('ifUnchecked',function(event){
           //
        });

        $('input:checkbox').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusSuc(id, 'Activo');
        });
        $('input:checkbox').on('ifUnchecked',function(event){
            id = $(this).attr('id');
            statusSuc(id, 'Inactivo');
        });

        $.validate({
          lang: 'es',
          modules : 'security'
        });
      });


      $('div#sidebar').find('a#inventario').addClass('active');
      //$('div#sidebar').find('li#listSucursal').addClass('active');
    </script>
<?PHP
    include 'newSucursal.php';
    include 'editSucursal.php';
    include 'delSucursal.php';
    include 'stockSucursal.php';
  ?>
    <!--google maps-->
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
  </body>
</html>