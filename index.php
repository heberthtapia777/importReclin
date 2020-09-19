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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css?v=<?php echo time(); ?>">
    <link href="css/nivo-slider.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/cargareloj.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.css">
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
                        <li style="padding: 5px;"><i class="far fa-phone mr-2"></i>Contactanos Cel No. (+591) 787-894-70  /  725-589-72</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->
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
                    <h2 class="slider-contenido text-center display-6 font-weight-bold">
                        Welcome our website
                    </h2>
                </div>
            </div>
        </div>
        <div class="slider-content" id="slider-content-2">
            <div class="slider-description">
                <div class="slider-bg animated zoomIn">
                    <h2 class="slider-contenido text-center display-6 font-weight-bold">
                        Business our company
                    </h2>
                </div>
            </div>
        </div>
        <div class="slider-content" id="slider-content-3">
            <div class="slider-description">
                <div class="slider-bg animated zoomIn">
                    <h2 class="slider-contenido text-center display-6 font-weight-bold">
                        Lets start business
                    </h2>
                </div>
            </div>
        </div>
        <div class="slider-content" id="slider-content-4">
            <div class="slider-description">
                <div class="slider-bg animated zoomIn">
                    <h2 class="slider-contenido text-center display-6 font-weight-bold">
                        Lets start business
                    </h2>
                </div>
            </div>
        </div>
        <div class="slider-content" id="slider-content-5">
            <div class="slider-description">
                <div class="slider-bg animated zoomIn">
                    <h2 class="slider-contenido text-center display-6 font-weight-bold">
                        Lets start business
                    </h2>
                </div>
            </div>
        </div>
        <div class="slider-content" id="slider-content-6">
            <div class="slider-description">
                <div class="slider-bg animated zoomIn">
                    <h2 class="slider-contenido text-center display-6 font-weight-bold">
                        Lets start business
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg gris navbar-dark scrolling-navbar">
    <div class="container">
        <a class="navbar-brand mb-4" href="index"><img src="images/logotiporeclin.jpg" alt="logo-reclin" class="img-fuid rounded" width="250" height="40"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item activo ml-4">
                    <a class="nav-link" href="index">Inicio</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="quienes_somos">Quienes somos</a>
                </li>
                <li class="nav-item dropdown ml-4">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nuestros productos</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php
							$q = 'SELECT * FROM categoria';
							$exe = $db->Execute($q);
							while ($reg = $exe->FetchRow()){
								?>
                                <a class="dropdown-item ml-4" href="nuestros_productos?idCat=<?=$reg['id_categoria'];?>&name=<?=$reg['name']?>"><?=$reg['name'];?></a>
								<?PHP
							}
						?>
                    </div>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="contactanos">Contactanos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="gradiente">
    <div class="text-center pt-4">
        <h1 class="titulo text-center display-6 font-weight-bold">Nuestros Productos</h1>
    </div>
	<?php
		$sql = "SELECT r.id_repuesto, f.name, r.name, r.detail FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto ORDER BY (r.id_repuesto) DESC";
		$query = $db->Execute($sql);
	?>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-xs-12">
                <div id="loader" class="text-center"> <img src="loader.gif"></div>
                <div class="outer_div"></div>
            </div>
        </div>
    </div>
</section>
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
    <div class="row">
        <div class="col-md-3 mb-3">
            <img src="marcas/lg-electronics.jpg" alt="lg" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-3 mb-3">
            <img src="marcas/electrolux.png" alt="electrolux" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-3 mb-3">
            <img src="marcas/daewoo.png" alt="daewoo" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-3 mb-3">
            <img src="marcas/samsung.png" alt="samsung" class="img-fluid img-thumbnail">
        </div>
    </div>
</section>
<section id="whatsapp">
    <a href="https://api.whatsapp.com/send?phone=59178789470" title="contactame" target="blank"><img src="images/whatsapp.png" alt="whatsapp"></a>
</section>
<div class="mt-5 pt-5 pb-3 footer">
	<?PHP require('footer.php'); ?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="fontawesome/js/fontawesome.js"></script>
<script src="fontawesome/js/all.js"></script>
<!-- Nivo slider js -->
<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<script src="js/nivo.slider.active.js" type="text/javascript"></script>
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script src="js/jquery.json-2.3.js" type="text/javascript"></script>
<script src="js/jquery.form-validator.js" type="text/javascript"></script>
<?php //if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
<script>
    $(document).ready(function(){
        // id de nuestro modal
        $("#modalInicio").modal("show");
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
            url:'productos.php',
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

    function sendEmail(p){
        var dato = JSON.stringify( $('#Formulario').serializeObject() );
        $.ajax({
            url: p,
            type: 'post',
            dataType: 'json',
            async:true,
            data:{res:dato},
            beforeSend: function(data){
                // $("#"+div).html('<div id="load" align="center" class="alert alert-success" role="alert"><p>Cargando contenido. Por favor, espere ...</p></div>');
            },
            success: function(data){
                $('#datos_ajax').html('<div class="alert alert-success" role="alert"><strong>Su mensaje, fue enviado correctamente.</strong></div><br>').fadeIn(4000,function (){
                    $('#datos_ajax').fadeOut(2000,function () {
                        $('#myModal').modal('hide').delay(7000);
                        $("form#Formulario").trigger("reset");
                    });
                });
            }
        });
    }
</script>
<?php //endif; ?>
</body>
</html>