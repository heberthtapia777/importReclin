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
            <div class="row mt">
            <!-- SERVER STATUS PANELS -->
            <div class="col-md-4 col-sm-4 mb">
              <div class="white-panel pn donut-chart">
                <div class="white-header">
                  <h5>Ventas realizadas</h5>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-xs-6 goleft" >
                    <p><i class="fa fa-database"></i> 70%</p>
                    <a >
                      <img src="../../assets/img/ventasRealizadas.png" width="120"  id="IMG-VENTAS">  
                    </a>              
                  </div>
                </div>
                <canvas id="serverstatus01" height="120" width="120"></canvas>
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
                  <h5>Asignacion de Repuestos</h5>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-xs-6 goleft">
                    <p><i class="fa fa-heart"></i> 122</p>
                  </div>
                  <div class="col-sm-6 col-xs-6"></div>
                </div>
                <div class="centered">
                    <img src="../../assets/img/product.png" width="120" id="IMG-ASIGNACION">
                </div>
              </div>
            </div><!-- /col-md-4 -->



          </div><!-- /row -->

          <!--Lista de las Sucursales Dinamica-->
          <div id="DIV-SUCURSALES" class="collapse">
            <h3 class="avisos" align=""><strong>SUCURSALES DISPONIBLES-VENTAS</strong></h3>
            <div class="notify-row">
              <?php  
                $sql   = "SELECT id_sucursal,nameSuc FROM sucursal";
                $srtQuery = $db->Execute($sql);
                while( $row = $srtQuery->FetchRow()){
              ?>
                  <div class="col-md-4" align="center">

                    <img onclick="abrirDivEmpleado('<?=$row['id_sucursal']?>')" src="../../assets/img/sucursal1.png" width="120" id="IMG-SUCURSAL-<?=$row['id_sucursal']?>" >
                    
                    <p>
                       <?=$row['nameSuc']?>
                    </p> 
                   <!--se lista a los empleados dinamicamente-->
                    <div id="DIV-EMPLEADO-<?=$row['id_sucursal']?>" class="collapse">

                      <div class="row" >
                      <?php  
                        $sqlEmpleado   = "SELECT * FROM empleado where id_sucursal=".$row['id_sucursal'];
                        $srtQueryEmpleado = $db->Execute($sqlEmpleado);
                        while( $rowEmpleado = $srtQueryEmpleado->FetchRow()){
                        ?>
                          <div class="col-md-12" align="center">
                            <a href="ventas.php?&id=<?=$rowEmpleado['id_empleado']?>&cg=<?=$rowEmpleado['cargo']?>&nombre=<?=$rowEmpleado['nombre'].' '.$rowEmpleado['apP']?>">
                              <img src="../empleado/uploads/files/<?=$rowEmpleado['foto']?>" class="img-circle" width="60" id="">
                              <p>
                                 <?=$rowEmpleado['nombre']?>
                              </p>
                            </a>
                          </div>
                      
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  <!--fin  lista a los empleados dinamicamente-->
                  </div>

              <?php
                }
              ?>
            </div>
          </div>

          <!--Fin Lista de las Sucursales Dinamica-->

          <!--Lista de las Sucursales Dinamica para asignaciones-->
          <div id="DIV-SUCURSALES-ASIGNACIONES" class="collapse">
            <h3 class="avisos" align=""><strong>SUCURSALES DISPONIBLES-ASIGNACIONES</strong></h3>
            <div class="notify-row">
              <?php  
                $sql   = "SELECT id_sucursal,nameSuc FROM sucursal";
                $srtQuery = $db->Execute($sql);
                while( $row = $srtQuery->FetchRow()){
              ?>
                  <div class="col-md-4" align="center">
                    <a href="asignaciones.php?&id=<?=$row['id_sucursal']?>&name=<?=$row['nameSuc']?>">
                      <img  src="../../assets/img/sucursal1.png" width="120" id="" >
                      <p>
                         <?=$row['nameSuc']?>
                      </p> 
                    </a>
                  </div>

              <?php
                }
              ?>
            </div>
          </div>

          <!--Fin Lista de las Sucursales Dinamica para asignaciones-->

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
    
    <script type="text/javascript" src="../../assets/js/VentanaCentrada.js"></script>
    <script type="text/javascript" src="../../assets/js/myJavaScript.js"></script>

    <script>
      $(document).ready(function() {
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
                    //"targets": [ 1 ],
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

      $('div#sidebar').find('a#reporte').addClass('active');
      $('div#sidebar').find('li#listReporte').addClass('active');
    </script>
<?PHP
    /*include 'delProducto.php';
    include 'newProducto.php';
    include 'editProducto.php';*/

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
<script type="text/javascript">
  
    $('#IMG-VENTAS').click(function() { 
        $('#DIV-SUCURSALES-ASIGNACIONES').hide(1000);  
        $('#DIV-SUCURSALES').toggle(1000, function() {
                
        });
    });
    $('#IMG-ASIGNACION').click(function() {
        $('#DIV-SUCURSALES').hide(1000);    
        $('#DIV-SUCURSALES-ASIGNACIONES').toggle(1000, function() {
                
        });
    });

    function abrirDivEmpleado(idSucursal){ 
        $('#DIV-EMPLEADO-'+idSucursal).toggle(1000, function() {
                
        });
    }

</script>>