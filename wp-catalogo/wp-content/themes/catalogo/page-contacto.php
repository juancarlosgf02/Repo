<?php

get_header(); ?>
    <section class="banner">
		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>"/>
	</section>
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-banner.png" class="section-arrow-upper"/>
	<section class="contacto diagonal-pos">
    	<div class="diagonal-neg">
	        <h2 class="text-center" style="font-size: 40px;">CONTÁCTANOS</h2>
	        <div class="triang-abajo"></div>
	        <div class="row center detalle-contacto">
                <div class="col-md-5 col-xs-12">
                	<p class="txt-blue" style="font-size: 15pt;"><strong>Horario de atención</strong></p>
					<p style="margin-bottom: 7px; font-size: 14pt;">- Lunes a Viernes de <strong>8:00 AM a 6:00 PM</strong></p>
					<p style="margin-bottom: 7px; font-size: 14pt;">- Sábados de <strong>8:00 AM a 4:00 PM</strong></p>
					<p class="txt-blue" style="font-size: 15pt;"><strong>Correo electrónico</strong></p>
					<p style="margin-bottom: 7px; font-size: 14pt;">Lima: catalogo@triathlon-sport.com</p>
					<p style="margin-bottom: 7px; font-size: 14pt;">Provincias: vprovinvias@triathlon-sport.com</p>
					<p class="txt-blue" style="font-size: 15pt;"><strong>Teléfono CENTRAL</strong></p>
					<p class="txt-blue" style="font-size: 20pt;"><strong>418 - 3838</strong></p>
                </div>
	        </div>
	        <h2 class="text-center" style="font-size: 40px;">VISÍTANOS EN</h2>
	        <div class="row">
	        	<div class="col-md-6 col-xs-12">
	        		<div class="map">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.758582775982!2d-76.99891837569047!3d-12.12866367458845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7f7ff85ce6f%3A0x14c650b3327522a5!2sAv.+Alfredo+Benavides+3537%2C+Santiago+de+Surco+15038%2C+Per%C3%BA!5e0!3m2!1ses!2ses!4v1482084564979" width="100%" height="300" frameborder="0" allowfullscreen></iframe>
		        		<p>SEDE HIGUERETA</p>
	        		</div>
	        	</div>
	        	<div class="col-md-6 col-xs-12">
	        		<div class="map">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.2571051914415!2d-77.0036999501423!3d-12.025812644742285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c5f05693142f%3A0x5ee1980f8cce23c2!2sTRIATHLON+SPORT!5e0!3m2!1ses!2ses!4v1482083908184" width="100%" height="300" frameborder="0" allowfullscreen></iframe>
		        		<p>SEDE SAN JUAN DE LURIGANCHO</p>
	        		</div>
	        	</div>
	        	<div class="col-md-6 col-xs-12">
	        		<div class="map">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.737622086409!2d-77.03466968534829!3d-12.06156519145749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8bfecc45f3d%3A0x4375129ca326f2f9!2sAv.+Jos%C3%A9+G%C3%A1lvez+255%2C+La+Victoria+15033!5e0!3m2!1ses-419!2spe!4v1505475937141" width="100%" height="300" frameborder="0" allowfullscreen></iframe>
		        		<p>SEDE GÁLVEZ</p>
	        		</div>
	        	</div>
		        <div class="col-md-6 col-xs-12">
		        	<div class="map">
			        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.510106296909!2d-77.06725905014156!3d-12.07719074571226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c904dfb406cf%3A0x857104356bfd4398!2sTriathlon+Sport!5e0!3m2!1ses!2ses!4v1482083552528" width="100%" height="300" frameborder="0" allowfullscreen></iframe>
			        	<p>SEDE PUEBLO LIBRE</p>
		        	</div>
		        </div>
	        </div>
	    </div>    
	    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-final.png" style="position: absolute; bottom: 0; left: 0;">
    </section>
<?php

get_footer(); ?>