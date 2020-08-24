<!doctype html>
<?php
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href="css/nivo-slider.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/cargareloj.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.css">
    <title>Importadora RECLIN</title>
  </head>
<body onload="actualizaReloj()">
    <!-- Modal -->
    <div class="modal fade" id="modalInicio" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-body">
                <div>
                    <button type="button" class="close mb-4" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in </p>
                <div>
                   <button type="button" class="btn btn-primary text-center" data-dismiss="modal">Cerrar</button>
                </div>
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
                <div class="col-md-6" style="text-align: right;">
                    <div class="user-menu">
                        <ul>
                            <li style="padding: 10px;"><i class="fas fa-phone mr-2"></i>Tel No. (+591) 787-894-70 / 725-589-72</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class="fondo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo mt-2">
                        <h1><a href="index.php"><img src="images/logofin.jpg" width="auto" height="53"class="img-fluid"></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>  <!--End fondo logotipo -->
    <!-- Main area start -->
    <section class="slider-area">
            <div class="slider-wrapper">
                <div class="slider-active">
                    <img alt="" src="images/h4-slide01.jpg" title="#slider-content-1">
                        <img alt="" src="images/h4-slide02.jpg" title="#slider-content-2">
                            <img alt="" src="images/h4-slide03.jpg" title="#slider-content-3">
                                <img src="images/h4-slide04.jpg" title="#slider-content-4">
                                    <img src="images/h4-slide05.jpg" title="#slider-content-5">
                                        <img src="images/h4-slide06.jpg" title="#slider-content-6">
                                        </img>
                                    </img>
                                </img>
                            </img>
                        </img>
                    </img>
                </div>
                <div class="slider-content" id="slider-content-1">
                    <div class="slider-description">
                        <div class="slider-bg animated zoomIn">
                            <h2>
                                Welcome our website
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slider-content" id="slider-content-2">
                    <div class="slider-description">
                        <div class="slider-bg animated zoomIn">
                            <h2>
                                Business our company
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slider-content" id="slider-content-3">
                    <div class="slider-description">
                        <div class="slider-bg animated zoomIn">
                            <h2>
                                Lets start business
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slider-content" id="slider-content-4">
                    <div class="slider-description">
                        <div class="slider-bg animated zoomIn">
                            <h2>
                                Lets start business
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slider-content" id="slider-content-5">
                    <div class="slider-description">
                        <div class="slider-bg animated zoomIn">
                            <h2>
                                Lets start business
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slider-content" id="slider-content-6">
                    <div class="slider-description">
                        <div class="slider-bg animated zoomIn">
                            <h2>
                                Lets start business
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<nav class="navbar navbar-expand-lg gris navbar-dark scrolling-navbar">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="images/logo_technosoft.png" alt="logo-technosoft" class="img-fuid" width="250" height="auto"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quienes_somos">Quienes somos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="nuestros-servicios" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nuestros productos</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="nuestros_productos">categoria 1</a>
            <a class="dropdown-item" href="nuestros_productos">categoria 2</a>
            <a class="dropdown-item" href="nuestros_productos">categoria 3</a>
            <a href="nuestros_productos" class="dropdown-item">categoria 4</a>
            <a href="nuestros_productos" class="dropdown-item">categoria 5</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactanos">Contactanos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<section>
    <div class="text-center mt-4 mb-4">
        <h1 class="titulo text-center display-6 font-weight-bold">Nuestros Productos</h1>
    </div>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4 mb-4 border-dark">
                  <img src="images/electrodomesticos.jpg" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title subtitulo text-center">nombre del repuesto</h5>
                    <p class="card-text">detalles del repuesto</p>
                    <div class="text-center">
                        <a href="detalle_del_producto" class="btn btn-primary">Mas detalles...</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4 mb-4 border-dark">
                  <img src="images/electrodomesticos.jpg" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title subtitulo text-center">nombre del repuesto</h5>
                    <p class="card-text">detalles del repuesto</p>
                    <div class="text-center">
                        <a href="detalle_del_producto" class="btn btn-primary">Mas detalles...</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4 mb-4 border-dark">
                  <img src="images/electrodomesticos.jpg" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title subtitulo text-center">nombre del repuesto</h5>
                    <p class="card-text">detalles del repuesto</p>
                    <div class="text-center">
                        <a href="detalle_del_producto" class="btn btn-primary">Mas detalles...</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4 mb-4 border-dark">
                  <img src="images/electrodomesticos.jpg" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title subtitulo text-center">nombre del repuesto</h5>
                    <p class="card-text">detalles del repuesto</p>
                    <div class="text-center">
                        <a href="detalle_del_producto" class="btn btn-primary">Mas detalles...</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4 mb-4 border-dark">
                  <img src="images/electrodomesticos.jpg" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title subtitulo text-center">nombre del repuesto</h5>
                    <p class="card-text">detalles del repuesto</p>
                    <div class="text-center">
                        <a href="detalle_del_producto" class="btn btn-primary">Mas detalles...</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4 mb-4 border-dark">
                  <img src="images/electrodomesticos.jpg" class="card-img-top img-fluid" alt="...">
                  <div class="card-body">
                    <h5 class="card-title subtitulo text-center">nombre del repuesto</h5>
                    <p class="card-text">detalles del repuesto</p>
                    <div class="text-center">
                        <a href="detalle_del_producto" class="btn btn-primary">Mas detalles...</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="text-right">aqui va un paginador de los productos</div>
<section class="jumbotron">
    <div class="text-center">
        <h1 class="text-center display-6 font-weight-bold text-light">¿No encuentra los repuestos que está buscando?</h1>
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
        <h5 class="modal-title text-center">Formulario de Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div >
            <form role="form" id="Formulario" action="#" method="POST">
                <div class="form-group">
                    <label class="control-label" for="Nombre">Nombres</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduzca su nombre" required autofocus />
                </div>
                <div class="form-group">
                    <label class="control-label" for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono celular" required autofocus />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Motivo">Motivo de Contacto</label>
                    <select name="Motivo" class="form-control">
                        <option value="Consulta General">Consulta General</option>
                        <option value="Realizar Pedido">Realizar Pedido</option>
                        <option value="Informe un problema">Informe de un problema</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Correo">Dirección de Correo Electrónico</label>
                    <input type="email" class="form-control" id="Correo" name="Correo" placeholder="Introduzca su correo electrónico" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Mensaje">Mensaje</label>
                    <textarea rows="5" cols="30" class="form-control" id="Mensaje" name="Mensaje" placeholder="Introduzca su mensaje" required ></textarea>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="marcas">
                        <div class="brand-list">
                            <img src="marcas/brand01.png" alt="" class="img-thumbnail" height="60" width="auto">
                            <img src="marcas/brand02.png" alt="" class="img-thumbnail">
                            <img src="marcas/brand03.png" alt="" class="img-thumbnail">
                            <img src="marcas/brand01.png" alt="" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </section>    
    <div class="mt-5 pt-5 pb-3 footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-xs-12">
                        <h4 class="mt-lg-0 mt-sm-3 display-8 font-weight-bold">
                            Accesorios RECLIN
                        </h4>
                        <div class="csssmenu">
                             <ul id="lista">
                                  <li><div class="fb-share-button" data-href="http://www.hilubas.com" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.hilubas.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></li>
                                  <li><div class="fb-like" data-href="http://www.hilubas.com" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div></li>
                                  <li><a href="https://www.facebook.com/hilubasbol.rojem" target="blank"><img src="images/face3.jpg" class="img-rounded"></a></li>
                             </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-12 links">
                        <h4 class="mt-lg-0 mt-sm-3 display-8 font-weight-bold">
                            Nuestros enlaces
                        </h4>
                        <ul class="m-0 p-0">
                            <li>
                                <i class="far fa-home mr-3"></i>
                                <a href="index">Inicio</a>
                            </li>
                            <li>
                                <i class="far fa-user mr-3"></i>
                                <a href="quienes_somos">Quienes somos</a>
                            </li>
                            <li>
                                <i class="far fa-cogs mr-3"></i>
                                <a href="#">Nuestros productos</a>
                            </li>
                            <li>
                                <i class="far fa-envelope mr-3"></i>
                                <a href="contactanos">Contactanos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-xs-12 location">
                        <h4 class="mt-lg-0 mt-sm-4 display-8 font-weight-bold">
                            Nuestra ubicacion
                        </h4>
                        <p>
                            <i class="far fa-street-view mr-3"></i>
                            22, Lorem ipsum dolor, consectetur adipiscing
                        </p>
                        <p class="mb-0">
                            <i class="far fa-phone mr-3">
                            </i>
                            (541) 754-3010
                        </p>
                        <p>
                            <i class="far fa-envelope mr-3"></i>
                            info@technosoft-bolivia.com
                        </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col copyright">
                        <p class="text-center">
                            <small class="text-white-50">
                                © 2020. Todos los Derechos Reservados.
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="fontawesome/js/fontawesome.js"></script>
    <script src="fontawesome/js/all.js"></script>
    <!-- Nivo slider js -->
    <script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
    <script src="js/nivo.slider.active.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
        <script>
        $(document).ready(function()
        {
          // id de nuestro modal
          $("#modalInicio").modal("show");
        });
        </script>
    <?php endif; ?>                     
  </body>
</html>