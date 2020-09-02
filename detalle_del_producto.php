<?PHP
	include 'admin/adodb5/adodb.inc.php';
	include 'admin/inc/function.php';
	
	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();
	
	$op = new cnFunction();
?>

<!doctype html>
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
<nav class="navbar navbar-expand-lg gris navbar-dark scrolling-navbar">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="images/logo_technosoft.png" alt="logo-technosoft" class="img-fuid" width="250" height="auto"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quienes_somos">Quienes somos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="nuestros-servicios" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nuestros productos</a>
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
    <?php
	    $id = $_GET['idPro'];
        
        $sql1 = 'SELECT r.name, r.detail, f.name, r.id_categoria FROM categoria AS c, repuesto AS r, foto AS f WHERE c.id_categoria = r.id_categoria AND r.id_repuesto = '.$id.' AND r.id_repuesto = f.id_repuesto';
        
        $query = $db->Execute($sql1);
        $row = $query->FetchRow();
	    
    ?>
<section class="gradiente">
    <div class="text-center pt-4 mb-4">
        <h2 class="titulo">Detalle de <?=$row[0]?></h2>
    </div>
    <div class="container mt-4 pb-5">
        <div class="row">
            <div class="col-md-6">
                  <img src="admin/modulo/repuesto/uploads/files/<?=$row[2]?>" class="card-img-top img-fluid" alt="...">
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <h2 class="subtitulo">Detalle</h2>
                </div>
	            
                <p><?=$row[1]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" align="right">
                <p><a class="btn btn-warning" href="javascript: history.go(-1)">Volver atrás</a></p>
            </div>
        </div>
    </div>
</section>
<div class="brands-area">
    <div class="text-center">
        <h2 class="subtitulo">Productos Relacionados</h2>
    </div>
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--Carousel Wrapper-->
                    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                        <!--Controls-->
                        <div class="controls-top">
                            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                                        class="fas fa-chevron-right"></i></a>
                        </div>
                        <!--/.Controls-->

                        <!--Indicators-->
                        <ol class="carousel-indicators">
                            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                            <li data-target="#multi-item-example" data-slide-to="1"></li>
                            <li data-target="#multi-item-example" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->

                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <?php
	                                $sql = 'SELECT r.id_repuesto, f.name, r.name, r.detail FROM repuesto AS r, foto AS f WHERE r.id_repuesto = f.id_repuesto AND r.id_categoria = '.$row[3].' ORDER BY (r.id_repuesto) ASC';
	                                $query1 = $db->Execute($sql);
	                                $num = $query1->RecordCount();
	                                
	                                if ($num < 3) $num = 1;
	                                else $x = ($num % 3);
	                                $y = intdiv($num,3);
	                                $filas = $x+$y;
	                                $c = 1;
	                                while ($reg = $query1->FetchRow()){
		                               
                                ?>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top"
                                             src="admin/modulo/repuesto/uploads/files/<?=$reg[1]?>"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?=$reg[2]?></h4>
                                            <p class="card-text"><?=$reg[3]?></p>
                                            <a class="btn btn-primary" href="detalle_del_producto?idPro=<?=$reg[0];?>">Detalle</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
		                                if($c == 3) break;
                                        $c++;
	                                }
	                                $num = $num - 3;
	                                $filas--;
                                ?>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <?php
                                while ( $filas > 0 ){
                            ?>
                            <div class="carousel-item">
	
	                            <?php
                                    $c=1;
		                            while ( $reg = $query1->FetchRow() ){
	                            ?>

                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top"
                                             src="admin/modulo/repuesto/uploads/files/<?=$reg[1]?>"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?=$reg[2]?></h4>
                                            <p class="card-text"><?=$reg[3]?></p>
                                            <a class="btn btn-primary" href="detalle_del_producto?idPro=<?=$reg[0];?>">Detalle</a>
                                        </div>
                                    </div>
                                </div>

                                
                                <?php
                                        if($c == 3) break;
                                        
                                        $c++;
			                            $num--;
		                            }
	                            ?>
                            </div>
                            <?php
                                    $filas--;
                                }
                            ?>
                            <!--/.Second slide-->

                        </div>
                        <!--/.Slides-->

                    </div>
                    <!--/.Carousel Wrapper-->
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
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
    <script>
        $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<3;i++) {
                next=next.next();
                if (!next.length) {
                    next=$(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
    <style>
        // Carousels
        .carousel {
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: $carousel-control-icon-width;
            height: $carousel-control-icon-height;
        }
        .carousel-control-prev-icon {
            background-image: $carousel-control-prev-icon;
        }
        .carousel-control-next-icon {
            background-image: $carousel-control-next-icon;
        }
        .carousel-indicators {
        li {
            width: $carousel-indicators-width;
            height: $carousel-indicators-height;
            cursor: pointer;
            border-radius: $carousel-indicators-border-radius;
        }
        }
        }
        .carousel-fade {
        .carousel-item {
            opacity: 0;
            transition-duration: $carousel-transition-duration;
            transition-property: opacity;
        }
        .carousel-item.active,
        .carousel-item-next.carousel-item-left,
        .carousel-item-prev.carousel-item-right {
            opacity: 1;
        }
        .carousel-item-left,
        .carousel-item-right {
        &.active {
             opacity: 0;
         }
        }
        .carousel-item-next,
        .carousel-item-prev,
        .carousel-item.active,
        .carousel-item-left.active,
        .carousel-item-prev.active {
            transform: $carousel-item-transform;
        @supports (transform-style: preserve-3d) {
            transform: $carousel-item-transform-2;
        }
        }
        }
        .col-md-4 {
            
            float: left;
        }
    </style>
  </body>
</html>