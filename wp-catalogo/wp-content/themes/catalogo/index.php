<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
	<section class="banner">
		<div id="banner-carousel" class="carousel slide" data-ride="carousel">
			<?php
				$args = array('post_type' => 'cat_banner', 'category_name' => 'inicio', 'nopaging' => true, 'orderby' => 'menu_order date', 'order' => 'ASC');
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
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-banner.png" class="section-arrow-upper"/>
    <section class="beneficios diagonal-pos">
    	<div class="diagonal-neg">
	        <h2 class="text-center">BENEFICIOS</h2>
	        <div class="row ">
	            <?php
					$args = array('post_type' => 'cat_beneficios', 'nopaging' => true, 'orderby' => 'menu_order date', 'order' => 'ASC');
					$beneficios = new WP_Query($args); 
					while ($beneficios->have_posts()): $beneficios->the_post(); 
	        		$i = $beneficios->current_post + 1; 
	        		if (($i + 3) % 4 === 0) : ?>
	        			<div class="row">
	        		<?php endif; ?>
	                <div class="col-md-3 col-xs-6">
	                    <div class="text-center contenido-beneficio">
	                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
	                        <div class="triang-arriba"></div>
	                        <p><?php echo get_the_content(); ?></p>
	                    </div>
	                </div>
	                <?php if ($i % 4 === 0) : ?>
	                	</div>
	                	<hr style="box-shadow: none; margin: 20px 0; background-color: #dedede;">
	                <?php endif ?>
				<?php endwhile; ?>
	        </div>
	        <h2 class="text-center">NOVEDADES</h2>
	        <div class="row">
	        	<div id="carousel-novedades" class="carousel slide">
	            	<div class="carousel-inner">
		        	<?php
						$args = array('post_type' => 'cat_novedades', 'nopaging' => true, 'orderby' => 'menu_order date', 'order' => 'ASC');
						$novedades = new WP_Query($args); 
						while ($novedades->have_posts()): $novedades->the_post(); 
		            		$i = $novedades->current_post + 1; 
		            		if (($i + 3) % 2 === 0) : ?>
				                <div class="item <?php if ($i === 1) echo "active"; ?> text-center">
				                    <div class="row">
				            <?php endif; ?>
				            <?php 
				            	$image_url = 'http://geniussys.com/img/placeholder/blogpost-placeholder-100x100.png';
								if (has_post_thumbnail()):
									$image_url = get_the_post_thumbnail_url();
								endif;
								$image_alt = get_the_title(); ?>
		                        <div class="col-md-6 col-xs-12" style="padding:0;">
		                        	<img class="img-responsive" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" style="padding:0;" />
		                        </div>
		                    <?php if ($i % 2 === 0 || $i === $novedades->found_posts) : ?>
				                    </div>
				                </div>
					
				            <?php endif; ?>
					<?php endwhile; ?>
		            </div>
		            <div class="carousel-arrow">
	                    <a data-slide="prev" href="#carousel-novedades" class="left carousel-control">
	                    	<span class="glyphicon glyphicon-chevron-left"></span>
	                    </a>
	                    <a data-slide="next" href="#carousel-novedades" class="right carousel-control">
	                    	<span class="glyphicon glyphicon-chevron-right"></span>
	                    </a>
	                </div>
		        </div>
	        </div>
	        <hr style="box-shadow: none; margin: 30px 0; background-color: #dedede;">
	        <h2 class="text-center">NOSOTROS</h2>
	    </div>    
    </section>
    <section class="acerca-de diagonal-pos">
    	<div class="row margin-0">
    		<div class="col-md-6 col-md-offset-6 col-xs-12 transparencia">
    			<ul class="diagonal-neg">
    				<li>
    					<h4 class="list-flecha" style="position: relative"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_flecha.png" style="position: absolute; left: -35px; bottom: -2px; height: 30px;"/>¿QUIÉNES SOMOS?</h4>
    					<p>Somos una empresa peruana con más de 15 años de experiencia en la comercialización de productos deportivos como ropa, zapatillas y accesorios, que propone en su portafolio productos con nuevos estilos, con tecnología de vanguardia para las diferentes categorías deportivas.</p>
    					<p>Pionera y líder en el mercado de la Venta por Catálogo de productos deportivos, en Lima y Provincias. Orientada en apoyar el desarrollo personal de nuestras asesoras para cubrir las necesidades básicas y más importantes de sus clientes. Somos una propuesta que brinda oportunidades y la posibilidad de desarrollar empresarias independientes en todo el país capaces de lograr sus proyectos y objetivos; así también generando bienestar económico en sus hogares y para sus familias.</p>
    				</li>
    				<li>
    					<h4 class="list-flecha" style="position: relative"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_flecha.png" style="position: absolute; left: -35px; bottom: -2px; height: 30px;"/>MISIÓN</h4>
    					<p>Brindar una oportunidad de trabajo a través de la venta por catálogo, desarrollando estrategias y herramientas de negocio para que nuestras asesoras alcancen sus metas.</p>
    				</li>
    				<li>
    					<h4 class="list-flecha" style="position: relative"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_flecha.png" style="position: absolute; left: -35px; bottom: -2px; height: 30px;"/>VISIÓN</h4>
    					<p>Consolidarse como la empresa número 1 a nivel nacional en el rubro de la venta por catálogo de artículos deportivos en todas las categorías.</p>
    				</li>
    			</ul>
    		</div>
    	</div>
    </section>
   	<section class="marcas marcas-index diagonal-pos">
   		<div class="diagonal-neg">
	   		<h2 class="text-center mt-10">NUESTRAS MARCAS</h2>
	        <div id="carousel-marcas" class="carousel slide">
	            <div class="carousel-inner">
	        	<?php
					$args = array('post_type' => 'cat_marcas', 'nopaging' => true, 'orderby' => 'menu_order date', 'order' => 'ASC');
					$marcas = new WP_Query($args); 
					while ($marcas->have_posts()): $marcas->the_post(); 
	            		$i = $marcas->current_post + 1; 
	            		if (($i + 3) % 4 === 0) : ?>
			                <div class="item <?php if ($i === 1) echo "active"; ?> text-center">
			                    <div class="row">
			            <?php endif; ?>
			            <?php 
			            	$image_url = 'http://geniussys.com/img/placeholder/blogpost-placeholder-100x100.png';
							if (has_post_thumbnail()):
								$image_url = get_the_post_thumbnail_url();
							endif;
							$image_alt = get_the_title(); ?>
	                        <div class="col-sm-3 col-xs-3 marca-logo" style="border-right: 1px solid #b8babc;">
	                        	<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"/>
	                        </div>
	                    <?php if ($i % 4 === 0 || $i === $marcas->found_posts) : ?>
			                    </div>
			                </div>
			            <?php endif; ?>
				<?php endwhile; ?>
	            </div>
	            <a class="left carousel-control" href="#carousel-marcas" data-slide="prev" style="background: transparent; padding-top: 40px; width: 6%; background-color: transparent !important;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_flecha_izq.png"/></a>
	            <a class="right carousel-control" href="#carousel-marcas" data-slide="next" style="background: transparent; padding-top: 40px; width: 6%; background-color: transparent !important;"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_flecha.png"/></a>
	        </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/borde-final.png" style="position: absolute; bottom: 0; left: 0;">
    </section>

<?php get_footer(); ?>
