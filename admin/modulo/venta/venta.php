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
    <meta name="author" content="Tapia">
    <meta name="keyword" content="">

    <title>ADMINISTRADOR - CMS</title>

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
            <a href="index.html" class="logo"><b>ADMINISTRADOR - CMS</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        
                    </li>
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
            <h1 class="avisos" align="center"><strong>PUNTO DE VENTA</strong></h1>
            <h3><i class="fa fa-angle-right"></i> Punto de Venta | Cajero: <?php echo $_SESSION['nombre_de_usuario']; ?> | Caja: <?php echo $_SESSION['numero_de_caja']; ?>
            <small> > <?php echo $fecha; ?></small></h3>
        <div class="row mt">
            <div class="col-lg-12">
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper" style="min-height: 693.15px;">
                    <!-- Main content -->
                    <section class="content">
                        <!-- Your Page Content Here -->
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 col-md-offset-4">
                                <div class='input-group'>
                                    <span class='input-group-addon bg-red'># Cotizacion:</span>
                                    <input type='text' id='cotizacion' class='form-control' placeholder='Buscar Cotizacion' data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="font-size:14px; text-align:center; color:blue; font-weight: bold;">
                                    <div class='input-group-btn'>
                                        <button type='button' class='btn btn-success' onclick='busca_cotizacion();'><i class='fa fa-search'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='box box-primary'>
                                <div class='box-header with-border'>
                                    <h4 class='box-title'>Ingresa el Numero de Parte:</h4>
                                </div>
                                <div class='box-body'>
                                <div class='input-group'>
                                    <div class='input-group-btn'>
                                        <button type='button' class='btn btn-success' onclick='busqueda_art();'><i class='fa fa-search'></i></button>
                                    </div>
                                    <input type='text' id='codigo' class='form-control' placeholder='# de parte...' onchange='busca_articulo();' style="font-size:14px; text-align:center; color:blue; font-weight: bold;">
                                     <input type='hidden' id='idrepuesto' >

                                </div>
                                <br>
                                <div class='input-group'>
                                    <span class='input-group-addon bg-red'>Precio:</span>
                                    <input type='text' id='preciou' class='form-control precio'  style="font-size:14px; text-align:center; color:blue; font-weight: bold;" data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" disabled>
                                </div>
                                <br>
                                <div class='input-group'>
                                    <span class='input-group-addon bg-orange'>Cantidad:</span>
                                    <input type='text' id='cantidad' class='form-control cantidad' style="font-size:14px; text-align:center; color:blue; font-weight: bold;" data-inputmask="'alias': 'integer', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" disabled>
                                </div>
                                <br>
                                <button class='btn btn-success' id='btn-add' onclick='agrega_a_lista();'><i class='fa fa fa-edit'></i> Agregar</button>
                                <button class='btn btn-danger' id='btn-cancel' onclick='cancela_codigo();'><i class='fa fa-times'></i> Cancelar</button>
                                </div>
                                </div>
                            </div>

          <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <!-- <h3 class="widget-user-username"></h3> -->
                  <h5 class="widget-user-desc"></h5>
                </div>
                <div class="widget-user-image">
                  <img id='imagen' class="img-circle" src="../../assets/img/sin_foto.png" alt="Imagen del Articulo">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header preciol">0.00</h5>
                        <span class="description-text">PRECIO U.</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">

                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header exis">0.00</h5>
                        <span class="description-text">STOCK</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->

          <div class="col-md-4">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><div id='totales'>Bs. 0.00</div></h3>
                  <p>Total</p>
                  <h4><div id='des'>0 %</div></h4>
                  <p>Descuento</p>
                  <h4><div id='subTotal'>Bs. 0.00</div></h4>
                  <p>SubTotal</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  <div id='num_ticket'></div>
                </a>
                <a href="#" class="small-box-footer">
                  <div id='total_articulos'></div>
                </a>
                <a href="#" class="small-box-footer">
                  <div id='tipo_de_venta'>Venta al Contado.</div>
                </a>
              </div>
                <br>
                <div class='input-group'>
                    <span class='input-group-addon bg-red'>Descuento:</span>
                    <input type='text' id='descuento' name="descuento" class='form-control' value="0" onchange="resumen()" style="font-size:14px; text-align:center; color:blue; font-weight: bold;" data-inputmask="'alias': 'porcentaje10', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" >
                </div>
                <br>
              <div class='btn-group'>
              <button class='btn  btn-success'id='btn-procesa' onclick='prepara_venta();'><i class='fa fa-money'></i> Pagar</button>
              <button class='btn  btn-warning' id='btn-cancela' onclick="cancela_venta();"><i class='fa fa-times-circle'></i> Cancelar</button>
              <button class='btn  btn-primary' onclick="busca_cliente();" id='btn_cre'><i class='fa fa-user-plus'></i> Buscar Cliente</button>
              </div>
            </div><!-- ./col -->


          </div>
          <!--formulario de registro cliente-->
          <br>
          <br>
          <form class="form-horizontal" role="form" id="datos_cotizacion" action="javascript:openCotizacion()">

            <div class="form-group row">

                <label for="atencion" class="col-md-1 control-label">Nro Doc:</label>

                <div class="col-md-3">

                  <input type="text" class="form-control" id="ci" placeholder="Número de documento de identidad" required>

                </div>

                <label for="atencion" class="col-md-1 control-label">Nombre:</label>

                <div class="col-md-3">

                  <input type="text" class="form-control" id="nombre" placeholder="Nombre completo" required>

                </div>



                <label for="tel1" class="col-md-1 control-label">Teléfono:</label>

                <div class="col-md-2">

                    <input type="text" class="form-control" id="celu" placeholder="Teléfono movil" required>

                </div>

            </div>

            <div class="form-group row">

                <label for="empresa" class="col-md-1 control-label">Empresa:</label>

                <div class="col-md-3">

                    <input type="text" class="form-control" id="empresa" placeholder="Nombre de la empresa">

                </div>

                <label for="tel2" class="col-md-1 control-label">Teléfono:</label>

                <div class="col-md-2">

                    <input type="text" class="form-control" id="fono" placeholder="Teléfono empresa">

                </div>

                <label for="email" class="col-md-1 control-label">Email:</label>

                <div class="col-md-3">

                    <input type="email" class="form-control" id="email" placeholder="Email">

                </div>

            </div>
        </form>
<!--fin de formulario de registro -->

          <div class='row'>
          <div class='col-md-12'>
          <div class='box box-primary'>
          <div class='box-header'>
          <h3 class='box-title'>Lista de Repuestos</h3>
          </div>
          <div class='box-body table-responsive'>
          <table id='tabla_articulos' class='table table-bordered table-striped table-condensed' >
            <thead>
                <tr>
                    <th class='center'># de Parte</th>
                    <th class='center'>Descripcion</th>
                    <th class='center'>Cantidad</th>
                    <th class='center'>Precio U. (Bs.)</th>
                    <th class='center'>Monto Total (Bs.)</th>
                    <th class='center'>Operación</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>
        </section><!-- /.content -->
         </div><!-- /.content-wrapper -->
          </div>
        </div><!-- /row -->

    </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="responsive_table.html#" class="go-top">
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
    <!-- plugin para alertas -->
    <script type="text/javascript" src="../../assets/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <!-- plugin para formatear input -->
    <script type="text/javascript" src="../../assets/js/number/jquery.inputmask.bundle.js"></script>

    <script type="text/javascript" src="../../assets/js/VentanaCentrada.js"></script>
    <script type="text/javascript" src="../../assets/js/myJavaScript.js"></script>

    <script>
      $(document).ready(function() {

        resumen();

        $(".cantidad").inputmask();
        $(".precio").inputmask({
            prefix: 'Bs. '
        });
        $("#descuento, #cotizacion").inputmask();

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

        $('input.repuesto, input:radio').iCheck({
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

        $('input.repuesto:checkbox').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusRep(id, 'Activo');
        });
        $('input.repuesto:checkbox').on('ifUnchecked',function(event){
            id = $(this).attr('id');
            statusRep(id, 'Inactivo');
        });

        $.validate({
          lang: 'es',
          modules : 'security'
        });
      });

      $('#obser').restrictLength( $('#max-length-element') );

      $('div#sidebarChat').find('a#venta').addClass('active');
      $('div#sidebarChat').find('li#puntoVenta').addClass('active');
    </script>

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

<!-- MODAL DE BUSQUEDA -->
<div class="modal fade" id ="modal_busqueda_arts" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Busqueda de Repuesto:</h4>
            </div>
            <div class="modal-body">
            <div class='input-group'>
            <span class='input-group-addon bg-blue'><b>Repuesto:</b></span>
            <input type='text' id='articulo_buscar' class='form-control' onkeyup="busca();" placeholder='Descripcion del repuesto...'>
            </div>
            <br>
                <div id='lista_articulos'></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL CLIENTE -->
<div class="modal fade" id ="modal_tabla_clientes" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Selecciona el Cliente:</h4>
          </div>
          <div class="modal-body">
            <div id='lista_clientes'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL PREPARA VENTA -->
<div class="modal fade" id ="modal_prepara_venta" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">RESUMEN</h4>
      </div>
      <div class="modal-body">

      <div class='input-group input-group-lg'>
      <span class='input-group-addon bg-blue'><b>Total de la Venta:</b></span>
      <input type='text' id='total_de_venta' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;" disabled>
      </div>
      <br>
      <div class='input-group input-group-lg'>
      <span class='input-group-addon bg-blue'><b>Su Pago:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
      <input type='text' id='paga_con' class='form-control cantidades' style="font-size:30px; text-align:center; color:red; font-weight: bold;" onkeyup="calcula_cambio();"
      data-inputmask="'alias': 'numeric', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
      </div>
      <br>
      <div class='input-group input-group-lg'>
      <span class='input-group-addon bg-blue'><b>Cambio:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
      <input type='text' id='el_cambio' class='form-control' style="font-size:30px; text-align:center; color:red; font-weight: bold;" disabled>
      </div>

      </div>
      <div class="modal-footer">
          <button class='btn btn-success print_ticket' id='btn-termina' onclick='' disabled><i class='fa fa-print'></i> Ticket</button>
          <button class='btn btn-success' id='btn-termina' onclick='procesa_venta();'><i class='fa fa-shopping-cart'></i> Procesar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class='fa fa-times'></i> Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<input type='hidden' id='idcliente_credito' value="">
<input type='hidden' id='total_venta' value="">
