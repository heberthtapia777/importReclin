<!doctype html>
<?php
	include 'admin/inc/conexion.php';
	include 'admin/inc/function.php';
	
	$op = new cnFunction();
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = false;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    # Caso no exista la cookie entra aqui
    # Creamos la cookie con la duración que queramos
    
    $expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    //$expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = true;
  }
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url"           content="http://www.reclin.org" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Accesorios Reclin" />
    <meta property="og:description"   content="Venta de accesorios, para lavadoras, microondas, cocinas" />
    <meta property="og:image"         content="http://www.reclin.org/images/logotiporeclin.jpg" />
    <link rel="shortcut icon" type="image/x-icon" href="images/icono-reclin.ico" />
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
      <link rel="stylesheet" href="fontawesome/css/all.css">
      <link rel="stylesheet" type="text/css" href="css/estilos.css?v=<?php echo time(); ?>">
      <link href="css/nivo-slider.css" rel="stylesheet">
      <link href="css/animate.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet" type="text/css">
      <script src="js/cargareloj.js"></script>
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>Importadora RECLIN</title>
  </head>
  <body onload="actualizaReloj()">
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v8.0" nonce="dj8ose8g"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v8.0" nonce="Wg0D8Cdx"></script>
<!-- Modal -->
    <div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center display-6 font-weight-bold text-light ml-5">ACCESORIOS RECLIN</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="user-menu">
                        <ul>
                            <li style="padding: 10px;"><i class="far fa-clock mr-2"></i> <span id="Fecha_Reloj"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user-menu">
                        <ul>
                            <li style="padding: 5px;"><i class="far fa-phone mr-2"></i>Cel No. (+591) 795-25696  / 772-88087</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
<!--<div class="fondo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo mt-2">
                    <h1><a href="index"><img src="images/logofin.jpg" width="auto" height="53"class="img-fluid"></a></h1>
                </div>
            </div>
        </div>
    </div>
</div>  End fondo logotipo -->
<nav class="navbar navbar-expand-lg gris navbar-dark scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="index"><img src="images/logotiporeclin.jpg" alt="logo-reclin" class="img-fuid rounded" width="250" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quienes_somos.php">Quienes somos</a>
                </li>
                <li class="nav-item dropdown activo">
                    <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">Nuestros productos</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
							$q = 'SELECT * FROM categoria';
							$exe = $db->Execute($q);
							while ($reg = $exe->FetchRow()){
								?>
                                <a class="dropdown-item" href="nuestros_productos.php?idCat=<?=$reg['id_categoria'];?>&name=<?=$reg['name']?>"><?=$reg['name'];?></a>
								<?PHP
							}
						?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactanos.php">Contactanos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="gradiente">
    <div class="text-center pt-4 pb-4">
        <h2 class="titulo"><?=$_GET['name']?></h2>
    </div>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="outer_div"></div>
            </div>
        </div>
    </div>
</section>
<section class="jumbotron">
    <div class="text-center">
        <h1 class="text-center display-6 font-weight-bold text-light">¿No encuentras los repuestos que está buscando?</h1>
        <p>¡Contactate con nosotros y te lo conseguimos!</p>
        <a><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Enviar Solicitud</button></a>
    </div>
</section>
<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog modal-sm">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center display-6 font-weight-bold text-light">Formulario de Solicitud</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div >
                        <div class="row">
                            <div class="col-md-12">
                                <div id="datos_ajax"></div>
                            </div>
                        </div>
                        <form role="form" id="Formulario" name="Formulario"  method="POST">
                            <div class="form-group">
                                <label class="control-label" for="Nombre">Nombres</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca su nombre" data-validation="required" autofocus />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono celular" data-validation="required" autofocus />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="Motivo">Motivo de Contacto</label>
                                <select id="motivo" name="motivo" class="form-control">
                                    <option value="Consulta General">Consulta General</option>
                                    <option value="Realizar Pedido">Realizar Pedido</option>
                                    <option value="Informe un problema">Informe de un problema</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="Correo">Dirección de Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca su correo electrónico" data-validation-optional="true" data-validation="email" />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="Mensaje">Mensaje</label>
                                <textarea rows="5" cols="30" class="form-control" id="mensaje" name="mensaje" placeholder="Introduzca su mensaje" data-validation="required" ></textarea>
                            </div>
                            <div class="form-group text-center ">
                                <input type="submit" class="btn btn-primary" value="Enviar">
                                <input type="reset" class="btn btn-default" value="Limpiar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
    <section id="carrusel my-3">
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="images/accesorios/accesorio01.jpg" alt="accesorios" class="img-fuid"></div>
            <div class="item"><img src="images/accesorios/accesorio02.jpg" alt="accesorios" class="img-fuid"></div>
            <div class="item"><img src="images/accesorios/accesorio03.jpg" alt="accesorios" class="img-fuid"></div>
            <div class="item"><img src="images/accesorios/accesorio04.jpg" alt="accesorios" class="img-fuid"></div>
            <div class="item"><img src="images/accesorios/accesorio05.jpg" alt="accesorios" class="img-fuid"></div>
            <div class="item"><img src="images/accesorios/accesorio06.jpg" alt="accesorios" class="img-fuid"></div>
        </div>
    </section>
</section>
    <section id="whatsapp">
        <a href="https://api.whatsapp.com/send?phone=59177288087" title="contactame" target="blank"><img src="images/whatsapp.png" alt="whatsapp"></a>
    </section>
    <div class="mt-3 pt-3 pb-2 footer">
	    <?PHP require('footer.php'); ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="fontawesome/js/fontawesome.js"></script>
    <script src="fontawesome/js/all.js"></script>
    <!-- Nivo slider js -->
    <script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
    <script src="js/nivo.slider.active.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.json-2.3.js" type="text/javascript"></script>
    <script src="js/jquery.form-validator.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
          var owl = $(".owl-carousel");
          owl.owlCarousel({
            margin: 20,
            loop: true,
            autoplay:true,
            //autoplayTimeout:1000,
            autoplayHoverPause:true,
            // autoWidth:true,
            // center: true,
            responsive: {
              0: {
                items: 2
              },
              480: {
                items: 3
              },
              768: {
                items: 4
              },
              1000: {
                items: 4
              }
            }
          });
        });

    </script>
        <script>
        $(document).ready(function()
        {
          // id de nuestro modal
          //$("#modalInicio").modal("show");
            load(1);

            $.validate({
                form: '#Formulario',
                lang: 'es',
                modules : 'security, modules/logic',
                onSuccess: function(data) {
                    $("form#Formulario").submit(sendEmail('sendEmail.php'));// Evento submit de jquery que llamamos al metodo SaveOrUpdate para poder registrar o modificar datos
                    return false;
                },
                onError : function($form) {
                    //alert('error');
                }
            });
        });
        function load(page){
            var parametros = {"action":"ajax","page":page};
            $("#loader").fadeIn('slow');
            $.ajax({
                url:'nuestrosProductos.php?idCat=<?=$_GET['idCat']?>',
                data: parametros,
                beforeSend: function(objeto){
                    $("#loader").html("<img src='loader.gif'>");
                },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");
                }
            })
        }
        </script>
    
  </body>
</html>