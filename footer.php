<div class="container">
	<div class="row">
		<div class="col-lg-5 col-xs-12">
			<h4 class="mt-lg-0 mt-sm-3 display-8 ">
				Accesorios RECLIN
			</h4>
			<div class="csssmenu">
				<?php
					require('countbdd.php');
				?>
				<ul id="lista">
					<li><div class="fb-like" data-href="http://www.reclin.org" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div></li>
					<li><div class="fb-share-button" data-href="http://www.reclin.org" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.reclin.org%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div></li><br>
					<li><p style="color: #fff;">Eres la visita Nº: <?=$op->ceros($visitas, 5);?></p></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-xs-12 links">
			<h4 class="mt-lg-0 mt-sm-3 display-8 ">
				Nuestros enlaces
			</h4>
			<ul class="m-0 p-0">
				<li>
					<i class="far fa-home mr-3"></i>
					<a href="index.php">Inicio</a>
				</li>
				<li>
					<i class="far fa-user mr-3"></i>
					<a href="quienes_somos.php">Quienes somos</a>
				</li>
				<li>
					<i class="far fa-cogs mr-3"></i>
					<a href="#">Nuestros productos</a>
				</li>
				<li>
					<i class="far fa-envelope mr-3"></i>
					<a href="contactanos.php">Contactanos</a>
				</li>
			</ul>
		</div>
		<div class="col-lg-4 col-xs-12 location">
			<h4 class="mt-lg-0 mt-sm-4 display-8 ">
				Nuestra ubicacion
			</h4>
			<p>
				<i class="far fa-street-view mr-3"></i>
				El Alto / Av. Arica zona Faro Murillo Edif. El Faro
			</p>
			<p>
				<i class="far fa-street-view mr-3"></i>
				San Pedro / Calle Arturo costa de la torre (ex yacuma) N° 1347
			</p>
			<div class="links">
			<ul class="m-0 p-0">
				<li>
					<i class="fas fa-mobile-alt mr-3"></i>
					795-25696
				</li>
				<li>
					<i class="fas fa-mobile-alt mr-3"></i>
					772-88087
				</li>
				<li>
					<i class="far fa-phone mr-3"></i>
					2-2495299
				</li>
				<li>
					<i class="far fa-phone mr-3"></i>
					2-2281767
				</li>
			</ul>
			</div>
			<p>
				<i class="far fa-envelope mr-3"></i>
				ventas@reclin.org
			</p>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col copyright">
			<p class="text-center">
				<small class="text-white-50">
					© 2020. <a href="http://www.technosoft-bolivia.com" target="_blank">TechnoSoft</a> Todos los Derechos Reservados.
				</small>
			</p>
		</div>
	</div>
</div>