<?PHP
  include '../../inc/sessionControl.php';

  $cargo = $_SESSION['cargo'];

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Technosoft-Bolivia">
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
    <link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/square/blue.css" rel="stylesheet">
    <link href="../../assets/css/theme-default.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="../../assets/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../assets/css/jquery.fileupload-ui.css">
    <!-- lightbox -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/lightbox.css">
    <!-- my style -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/myStyle.css">
  </head>

  <body>

  <!-- The blueimp Gallery widget -->
  <!-- <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even"> -->
  <div id="blueimp-gallery" class="blueimp-gallery" >
      <div class="slides"></div>
      <h3 class="title"></h3>
      <a class="prev">‹</a>
      <a class="next">›</a>
      <a class="close">×</a>
      <a class="play-pause"></a>
      <ol class="indicator"></ol>
  </div>

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
            <a href="#" class="logo"><b>ADMINISTRADOR</b></a>
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
            <h1 class="avisos" align="center"><strong>ASIGNACION DE REPUESTOS</strong></h1>
          	<h3><i class="fa fa-angle-right"></i> Lista Repuestos</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
            <!--
              <div class="pull-right"><br>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dataRegisterStock">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                      <span>Agregar Stock</span>
                  </button>
              </div>
              
              <div class="pull-right"><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
            
            -->

              <div class="pull-right"><br>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dataRegister">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                      <span>Agregar Repuesto</span>
                  </button>
              </div>

              <div class="clearfix"></div>
              <br>
              <section id="unseen">
                <table id="tablaList" class="table table-bordered table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha de Registro</th>
                      <th>Fecha de Registro</th>
                      <th>Categoria y Modelo</th>
                      <th># Parte</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Precio Compra</th>
                      <th>Almacenado</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                  $sql = "SELECT s.id_suministra,r.id_repuesto, c.id_categoria, s.id_proveedor, c.name AS cat, r.numParte, r.stockMin, r.name, r.detail, r.fromRep, ";
                  $sql.= "s.cantidad, r.priceSale, r.priceBuy, r.status, r.statusRep, s.dateReg ";
                  $sql.= " FROM repuesto AS r, categoria AS c, suministra AS s  WHERE r.id_repuesto = s.id_repuesto ";
                  $sql.= "AND r.id_categoria = c.id_categoria  ORDER BY (s.dateReg) DESC ";

                  $cont = 1;

                  $srtQuery = $db->Execute($sql);
                  if($srtQuery === false)
                      die("failed");

                  while( $row = $srtQuery->FetchRow()){

                    /*$sqlProv = "SELECT id_proveedor FROM suministra WHERE id_repuesto = '".$row['id_repuesto']."' ";
                    $srtProv = $db->Execute($sqlProv);
                    $reg = $srtProv->FetchRow();

                    if($row['statusRep'] == 1)
                      $alm = '<span class="label label-success" >Real</span>';
                    else
                      $alm = '<span class="label label-danger">Ficticio</span>';
                    */
                      ?>
                      <tr id="tb<?=$row[0]?>">
                          <td align="center"><?=$cont++;?></td>
                          <td align="center"><?=$row['dateReg']?></td>
                          <td align="center"><?=$row['dateReg']?></td>
                          <td align="center"><?=$row['cat'].' - '.$row['fromRep'];?></td>
                          <td align="center"><?=$row['numParte'];?></td>
                          <td align="center"><?=$row['name'];?></td>
                          <td align="center"><?=$row['cantidad'];?></td>
                          <td align="center"><?=$row['priceSale'];?></td>
                          <td align="center"><?=$row['priceBuy'];?></td>
                          <td align="center">
                            <table class="table">
                                <?php
                                    $sqlAlmacenSucursal="select sucursal.nameSuc, almacen.cantidad from almacen As almacen, sucursal As sucursal where  almacen.id_sucursal=sucursal.id_sucursal AND almacen.id_suministra=".$row['id_suministra'];
                                    $srtQueryAlmacen = $db->Execute($sqlAlmacenSucursal);
                                    while( $rowAlmacenSuc = $srtQueryAlmacen->FetchRow()){
                                ?>
                                    <tr>
                                      <td><?=$rowAlmacenSuc['nameSuc'];?>: </td>
                                      <td><?=$rowAlmacenSuc['cantidad'];?></td>
                                    </tr> 
                                <?php
                                    }
                                ?>
                             </table>

                          </td>
                          <td width="14%">
                              <div class="btn-group" style="width: 171px">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                                      data-idResp     =   "<?=$row['id_repuesto']?>"
                                      data-numParte   =   "<?=$row['numParte']?>"
                                      data-name       =   "<?=$row['name']?>"
                                      data-idCat      =   "<?=$row['id_categoria']?>"
                                      data-idPro      =   "<?=$row['id_proveedor']?>"
                                      data-fromRep    =   "<?=$row['fromRep']?>"
                                      data-cantidad   =   "<?=$row['cantidad']?>"
                                      data-cantidadMin=   "<?=$row['stockMin']?>"
                                      data-priceSale  =   "<?=$row['priceSale']?>"
                                      data-priceBuy   =   "<?=$row['priceBuy']?>"
                                      data-detail     =   "<?=$row['detail']?>"
                                      <?php
                                      $sql = "SELECT a.id_sucursal, a.cantidad  FROM repuesto AS r, almacen AS a   WHERE r.id_repuesto = a.id_repuesto ";
                                      $sql.= " AND r.id_repuesto = '".$row['id_repuesto']."' AND a.id_suministra='".$row['id_suministra']."' GROUP BY (a.id_sucursal)";

                                      $querySql = $db->Execute($sql);
                                      $cantSuc = 0;
                                      while (  $file = $querySql->FetchRow() ) {
                                        $cantSuc++;
                                      ?>
                                      data-asingsuc<?=$cantSuc?>   =   "<?=$file['cantidad']?>"
                                      <?php
                                      }
                                      ?>
                                      data-cantSuc    =   "<?=$cantSuc;?>"
                                      data-idalmacen  =   "<?=$row['id_almacen'];?>"
                                      data-statusRep  =   "<?=$row['statusRep'];?>" >
                                      <i class='glyphicon glyphicon-edit'></i> Modificar
                                  </button>

                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['id_repuesto']?>"  onclick="VerificaVenta('<?=$row['id_repuesto']?>')" >
                                      <i class='glyphicon glyphicon-trash'></i> Eliminar
                                  </button>
                                 
                              </div>
                              <div class="btn-group" style="width: 171px; margin-top: 5px;">
                                   <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataStock"
                                          data-idResp     =   "<?=$row['id_repuesto']?>"
                                          data-numParte   =   "<?=$row['numParte']?>"
                                          data-name       =   "<?=$row['name']?>"
                                          data-cantidad   =   "<?=$row['cantidad']?>"
                                          <?php
                                          $sql = "SELECT a.id_sucursal, a.cantidad FROM repuesto AS r, almacen AS a WHERE r.id_repuesto = a.id_repuesto ";
                                          $sql.= " AND r.id_repuesto = '".$row['id_repuesto']."' ";
                                          $querySql = $db->Execute($sql);
                                          $cantSuc = 0;
                                          while (  $file = $querySql->FetchRow() ) {
                                            $cantSuc++;
                                          ?>
                                          data-asingSuc<?=$file['id_sucursal']?>   =   "<?=$file['cantidad']?>"
                                          <?php
                                          }
                                          ?>
                                          data-cantSuc    =   "<?=$cantidad;?>"
                                          data-idalmacen  =   "<?=$row['id_almacen'];?>" >
                                        <i class='glyphicon glyphicon-trash'></i> Agregar STOCK
                                    </button>-->
                              </div>
                              <div style="margin-top: 5px">
                                  <div class="checkbox" id="status<?=$row['id_repuesto']?>">
                                      <?PHP
                                          if( $row['status'] == 'Activo' ){
                                      ?>
                                          <input type="checkbox" class="repuesto" name="checks" checked id="<?=$row['id_repuesto']?>"/>
                                          <label>Status</label>
                                      <?PHP
                                          }else{
                                      ?>
                                          <input type="checkbox" class="repuesto" name="checks" id="<?=$row['id_repuesto']?>"/>
                                          <label>Status</label>
                                      <?PHP
                                          }
                                      ?>
                                  </div>
                              </div>
                          </td>
                      </tr>
                      <?PHP
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha de Registro</th>
                      <th>Fecha de Registro</th>
                      <th>Categoria y Modelo</th>
                      <th># Parte</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio Venta</th>
                      <th>Precio Compra</th>
                      <th>Almacenado</th>
                      <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </section>
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

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script type="text/javascript" src="../../assets/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The basic File Upload plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload validation plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script type="text/javascript" src="../../assets/js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <!-- <script type="text/javascript" src="../../assets/js/main.js"></script> -->
    <!-- lightbox -->
    <script type="text/javascript" src="../../assets/js/lightbox.js"></script>
    <!-- CKEDITOR -->
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../../ckeditor/config.js"></script>

    <script type="text/javascript" src="../../assets/js/myJavaScript.js"></script>
    <script type="text/javascript" src="js/SelectDinamico.js"></script>


    <script>
      $(document).ready(function() {
        $('#tablaList').on('draw.dt', function(e, settings, json) {
          if (typeof drawDT359 == 'function') { drawDT359(); }
        })
        .DataTable({
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

        function drawDT359() {
          // when the alert pops up, you will still be on the same page
          // new results page isn't shown at this moment, will be shown after
          // so it seems the draw event is being triggered early
          console.log('drawing table ...');
          $('input.repuesto, input:radio').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            //increaseArea: '100%' // optional
          });

          $('input.repuesto:checkbox').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusRep(id, 'Activo');
          });
          $('input.repuesto:checkbox').on('ifUnchecked',function(event){
              id = $(this).attr('id');
              statusRep(id, 'Inactivo');
          });
        }
      });


      $('div#sidebar').find('a#repuesto').addClass('active');
      $('div#sidebar').find('li#listResp').addClass('active');
    </script>
<?PHP
    //include 'agregarStock.php';
    //include 'agregarStockSuc.php';
    include 'delProducto.php';
    include 'newProducto.php';
    include 'editProducto.php';
    include 'listAlmacenSucursales.php';
  ?>
  </body>
</html>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Cargando...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary btn-sm start" disabled>
                    <i class="fa fa-upload"></i>
                    <span>Iniciar</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning btn-sm cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger btn-sm delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-trash-o"></i>
                    <span>Borrar</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning btn-sm cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancelar</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<style type="text/css">
  .input-group-addon {
  color: #333;
}
</style>
