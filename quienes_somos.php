<!doctype html>
<?php
	include 'admin/adodb5/adodb.inc.php';
	include 'admin/inc/function.php';
	
	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();
	
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
    <title>ACCESORIOS RECLIN</title>
</head>
<body onload="actualizaReloj()">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0" nonce="13RkfF92"></script>
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
                <h4 class="subtitulo">Horario de atencion Tienda Faro murillo</h4>
                <p>De lunes a viernes de 09:00 am a 18:00 pm</p>
                <p>Sábado de 09:00 a 13:00</p>
                <hr>
                <h4 class="subtitulo">Horario de atencion Tienda San pedro</h4>
                <p>De lunes a viernes de 09:00 am a 18:00 pm</p>
                <p>Sábado de 09:00 a 13:00</p>
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
            <div class="col-md-6 col-xs-12">
                <div class="user-menu">
                    <ul>
                        <li style="padding: 5px;"><i class="far fa-clock mr-2"></i> <span id="Fecha_Reloj"></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
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
				<div class="logo pt-1 pb-1">
					<a href="index"><img src="images/banner.jpg"class="img-fluid rounded"></a>
				</div>
			</div>
		</div>
	</div>
</div>  End fondo logotipo -->
<!-- Main area start -->

<nav class="navbar navbar-expand-lg gris navbar-dark scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="index"><img src="images/logotiporeclin.jpg" alt="logo-reclin" class="img-fuid rounded" width="250" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index">Inicio</a>
                </li>
                <li class="nav-item activo">
                    <a class="nav-link active" href="quienes_somos">Quienes somos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="nuestros-servicios" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nuestros productos</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php
							$q = 'SELECT * FROM categoria';
							$exe = $db->Execute($q);
							while ($reg = $exe->FetchRow()){
								?>
                                <a class="dropdown-item" href="nuestros_productos?idCat=<?=$reg['id_categoria'];?>&name=<?=$reg['name']?>"><?=$reg['name'];?></a>
								<?PHP
							}
						?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactanos">Contactanos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="gradiente">
    <div class="text-center pt-4 pb-4">
        <h2 class="titulo">Quienes Somos</h2>
    </div>
    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-md-7">
                <img src="images/electrodomesticos.jpg" class="img-fluid rounded" alt="tienda reclin"  height="400" width="auto">
            </div>
            <div class="col-md-5 mt-5">
                <div class="text-center">
                    <h2 class="subtitulo mt-3">Quienes somos</h2>
                </div>
                <p style="text-align: justify;">Somos una empresa importadora y distribuidora con una amplia experiencia y  conocimiento en el rubro, de respuestos/accesorios de electrodomesticos.</p>
                <div class="text-center">
                    <h2 class="subtitulo mt-5">Nuestra experiencia</h2>
                </div>
                <p style="text-align: justify;">Contamos con una experiencia de mas de 10 años en el rubro de la distribución de repuestos/accesorios  de electrodomesticos ,brindadole una atención buena e eficaz.</p>
                <div class="text-center">
                    <h2 class="subtitulo mt-5">Valores</h2>
                    <ul style="text-align: left; padding-left: 30px">
                            <li>Honestidad</li>
                            <li>Responsabilidad </li>
                            <li>Puntualidad en las entregas </li>
                            <li>Respeto </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 pb-4">
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card border-primary">
                    <div class="card-header">
                        <h4 class="text-center display-6 font-weight-bold text-light">OBJETIVOS</h4>
                    </div>
                    <div class="card-body">
                        <ul style="text-align: left; padding-left: 10px">
                            <li>Proveer a la poblacion en general accesorios para electrodomesticos que sean  confiables,garantizados y duraderos .</li>
                            <li>Brindar una atencion y orientacion  acorde a la solicitud  de nuestra clientela.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card border-primary">
                    <div class="card-header">
                        <h4 class="text-center display-6 font-weight-bold text-light">MISION</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="text-align: justify;">Brindar una variedad de accesorios para electrodomesticos  de la mejor calidad,pensando en la economia del hogar Boliviano.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card border-primary">
                    <div class="card-header">
                        <h4 class="text-center display-6 font-weight-bold text-light">VISION</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="text-align: justify;">Ser lider en la industria de repuestos con la mayor gama de productos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="jumbotron">
    <div class="text-center">
        <h1 class="text-center display-6 font-weight-bold text-light">¿No encuentra los accesorios que está buscando?</h1>
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
        $("#modalInicio").modal("show");

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
</script>

</body>
</html>