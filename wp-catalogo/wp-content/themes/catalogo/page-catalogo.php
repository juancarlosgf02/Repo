<?php

get_header(); ?>
    <section class="banner">
		<img class="img-responsive" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>"/>
	</section>
	<section id="fs-container" class="fs-container"></section>
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-banner.png" class="section-arrow-upper"/>
	<section class="marcas diagonal-pos" style="position: relative;">		
		<h2 class="text-center diagonal-neg">CATÁLOGO VIRTUAL</h2>
		<div class="triang-abajo diagonal-neg"></div>
		<div class="catalog active diagonal-neg text-center">
			<div class="row">
				<div id="carousel-catalogos" class="carousel slide">
	            	<div class="carousel-inner">
		        	<?php
						$args = array('post_type' => 'cat_catalogos', 'nopaging' => true, 'orderby' => 'menu_order date', 'order' => 'ASC');
						$catalogos = new WP_Query($args); 
						while ($catalogos->have_posts()): $catalogos->the_post(); 
		            		$i = $novedades->current_post + 1; 
		            		if ($i > 1 && $i % 2 === 0) : ?>
				                <div class="item <?php if ($i === 1) echo "active"; ?> text-center">
				                    <div class="row">
				            <?php endif; ?>
				            <?php 
				            	$image_url = 'http://geniussys.com/img/placeholder/blogpost-placeholder-100x100.png';
								if (has_post_thumbnail()):
									$image_url = get_the_post_thumbnail_url();
								endif;
								$image_alt = get_the_title();
								$catalog_url = get_the_content(); ?>
		                        <div class="col-md-6 col-xs-12 catalogo" style="padding-top: 2em !important;">
		                        	<a href="<?php echo $catalog_url; ?>" target="_blank">
		                        		<img class="img-responsive" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"/>
		                        	</a>
		                        </div>
		                    <?php if ($i > 1 && ($i % 2 === 0 || $i === $catalogos->found_posts)) : ?>
				                    </div>
				                </div>
				            <?php endif; ?>
					<?php endwhile; ?>
		            </div>
	        	</div>
	        </div>
		</div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-final.png" style="position: absolute; bottom: 0; left: 0;">
	</section>

<?php

get_footer('catalogo'); ?>