<?php

get_header(); ?>

    <section class="banner">
		<div id="banner-carousel" class="carousel slide" data-ride="carousel">
			<?php
				$args = array('post_type' => 'cat_banner', 'nopaging' => true, 'orderby' => 'menu_order date');
				$banners = new WP_Query($args);
				$listItems = ''; $slides = '';
				while ($banners->have_posts()): $banners->the_post();
					$i = $banners->current_post;
					$listItems .= '<li ' . ($i == 0 ? 'class="active"' : '') . ' data-target="#banner-carousel" data-slide-to="' . $i . '"></li>'; 
					$image_url = 'http://radioincorso.it/wp-content/uploads/2016/01/banner-placeholder.jpg';
					if (has_post_thumbnail()):
						$image_url = get_the_post_thumbnail_url();
					endif;
					$image_alt = get_the_title();
					$slides .= '<div class="item' . ($i == 0 ? ' active"' : '"'). '><img src="' . $image_url . '" alt="' . $image_alt . '"/></div>'; ?>
			<?php endwhile; ?>
			<ol class="carousel-indicators">
				<?php echo $listItems; ?>
			</ol>
			<div class="carousel-inner" role="listbox">
				<?php echo $slides; ?>
			</div>
		</div>
	</section>
	<section class="contacto diagonal-pos">
    	<div class="diagonal-neg">
	        <h2 class="text-center">CONTÁCTANOS</h2>
	        <div class="triang-abajo"></div>
	        <div class="row center">
                <div class="col-md-5 col-xs-12">
                	<p class="txt-blue"><strong>Horario de atención</strong></p>
					<p>- Lunes a Viernes de <strong>9:00 AM a 7:00 PM</strong></p>
					<p>- Sábados de <strong>9:00 AM a 5:00 PM</strong></p>
					<p class="txt-blue"><strong>Correo electrónico</strong></p>
					<p>Lima: catalogo@triathlon-sport.com</p>
					<p>Provincias: vprovinvias@triathlon-sport.com</p>
					<p class="txt-blue"><strong>Teléfono CENTRAL</strong></p>
					<p class="txt-blue"><strong>418 - 3838</strong></p>
					<p>ANEXOS: Provincias (12 - 13 -15), Lima (18 - 16 - 21)</p>
                </div>
	        </div>
	        <h3 class="text-center txt-blue">VISÍTANOS EN:</h3>
	        <div class="row">
	        	<div class="col-md-6">
	        		<div class="map">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.758582775982!2d-76.99891837569047!3d-12.12866367458845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7f7ff85ce6f%3A0x14c650b3327522a5!2sAv.+Alfredo+Benavides+3537%2C+Santiago+de+Surco+15038%2C+Per%C3%BA!5e0!3m2!1ses!2ses!4v1482084564979" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		        		<p>SEDE HIGUERETA</p>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="map">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.2571051914415!2d-77.0036999501423!3d-12.025812644742285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c5f05693142f%3A0x5ee1980f8cce23c2!2sTRIATHLON+SPORT!5e0!3m2!1ses!2ses!4v1482083908184" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		        		<p>SEDE SAN JUAN DE LURIGANCHO</p>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="map">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.9488900185047!2d-77.03444395014202!3d-12.047037645142431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8b60deb566d%3A0x86f8f0975cc2e501!2sTriathlon+Sport!5e0!3m2!1ses!2ses!4v1482083780554" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		        		<p>SEDE LIMA</p>
	        		</div>
	        	</div>
		        <div class="col-md-6">
		        	<div class="map">
			        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.510106296909!2d-77.06725905014156!3d-12.07719074571226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c904dfb406cf%3A0x857104356bfd4398!2sTriathlon+Sport!5e0!3m2!1ses!2ses!4v1482083552528" width="100%" height="300" frameborder="0" style="border:2px" allowfullscreen></iframe>
			        	<p>SEDE PUEBLO LIBRE</p>
		        	</div>
		        </div>
	        </div>
	    </div>    
    </section>
    
<?php

get_footer(); ?>