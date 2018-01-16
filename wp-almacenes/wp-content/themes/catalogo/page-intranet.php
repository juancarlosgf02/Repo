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
	<section class="intranet diagonal-pos">
    	<div class="diagonal-neg">
	        <h2 class="text-center">INTRANET</h2>
	        <div class="triang-abajo"></div>
	        <p class="text-center">Si aún no estás registrado, <a href="" class="txt-blue">haz click aquí</a></p><br>
	        <div class="row center">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                	<form class="w-100 text-center">
						<div class="form-group">
							<input type="text" class="form-control center mb-10" id="usuario" placeholder="Usuario">
							<input type="password" class="form-control center" id="password" placeholder="Email">
						</div>
                		<button type="submit" class="btn btn-naranja w-100">INGRESAR</button>
                		<p class="txt-blue mt-10"><a href="">He olvidado mi contraseña</a></p>
                	</form>
                </div>
	        </div>
	    </div>    
    </section>

<?php

get_footer(); ?>