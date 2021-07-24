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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">Nuestros productos</a>
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
                <li class="nav-item  activo">
                    <a class="nav-link active" href="contactanos.php">Contactanos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="gradiente">
    <div class="text-center pt-4 pb-2">
        <h2 class="titulo">Nuestros Contactos</h2>
    </div>
    <div class="container pt-4 pb-4">
    	<div class="row pt-4 pb-4">
    		<div class="col-md-7 pb-3">
    			<img src="images/electrodomesticos.jpg" class="img-fluid rounded" alt="tienda reclin"  height="400" width="auto">
    		</div>
            <div class="col-md-5">                
                <div class="row">
                    <div class="col-md-12">
                        <div id="datos_ajax"></div>
                    </div>
                </div>
                <div class="box">
                        <h2 class="subtitulo">
                            Escribenos
                        </h2>
                    <form id="formCont" name="formCont" method="POST" action="">
                        <div class="mt-3">
                            <div class="input-box mb-2">
                                <input type="text" placeholder="Nombre completo" name="nombre" id="nombre" data-validation="required">
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input-box mb-2">
                                <input type="email" name="email" id="email" value="" placeholder="Email" data-validation="email" data-validation-optional="true">
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input-box mb-2">
                                <input type="text" max="999999999" placeholder="Numero de telefono" name="telefono" id="telefono" data-validation="required">
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="input-box mb-2">
                                <input type="text" placeholder="Asunto" name="asunto" id="asunto" data-validation="required">
                            </div>
                        </div>
                        <div class="mt-3">
                            <textarea placeholder="Mensaje" name="mensaje" id="mensaje" rows="5" data-validation="required"></textarea>
                        </div>
                        <div class="form-group mb-10 text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
                            <button class="btn btn-success" type="reset" name="reset">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3825.2686560786674!2d-68.15622238513565!3d-16.51252918860841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDMwJzQ1LjEiUyA2OMKwMDknMTQuNSJX!5e0!3m2!1ses!2sbo!4v1597898204479!5m2!1ses!2sbo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
<section id="whatsapp">
    <a href="https://api.whatsapp.com/send?phone=59177288087" title="contactame" target="blank"><img src="images/whatsapp.png" alt="whatsapp"></a>
</section>
<div class="pt-3 pb-2 footer">
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
        $(document).ready(function()
        {
          // id de nuestro modal
          $("#modalInicio").modal("show");

            $.validate({
                form: '#formCont',
                lang: 'es',
                modules : 'security, modules/logic',
                onSuccess: function(data) {
                    $("form#formCont").submit(sendEmail('sendCorreo.php'));// Evento submit de jquery que llamamos al metodo SaveOrUpdate para poder registrar o modificar datos
                    return false;
                },
                onError : function($form) {
                    //alert('error');
                }
            });
        });

        function sendEmail(p){
            var dato = JSON.stringify( $('#formCont').serializeObject() );
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
                            $("form#formCont").trigger("reset");
                        });
                    });
                }
            });
        }
        </script>
    
  </body>
</html>
<style>
    .input-box span {
        position: absolute;
        top: 47px;
        color: #2C4B8A;
    }
</style>