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
				$args = array('post_type' => 'cat_banner', 'category_name' => 'inicio', 'nopaging' => true, 'orderby' => 'menu_order date');
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
    <section class="beneficios diagonal-pos">
    	<div class="diagonal-neg">
	        <h2 class="text-center">BENEFICIOS</h2>
	        <div class="triang-abajo"></div>
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
	                <?php endif ?>
				<?php endwhile; ?>
	        </div>
	    </div>    
    </section>
    <section class="acerca-de diagonal-pos">
    	<div class="row margin-0">
    		<div class="col-md-9 col-md-offset-3 transparencia">
    			<ul class="diagonal-neg">
    				<li>
    					<h4>¿QUIÉNES SOMOS?</h4>
    					<p>Somos una empresa peruana con más de 15 años de experiencia en la comercialización de productos deportivos como ropa, zapatillas y accesorios, que propone en su portafolio productos con nuevos estilos, con tecnología de vanguardia para las diferentes categorías deportivas.</p>
    					<p>Pionera y líder en el mercado de la Venta por Catálogo de productos deportivos, en Lima y Provincias. Orientada en apoyar el desarrollo personal de nuestras asesoras para cubrir las necesidades básicas y más importantes de sus clientes. Somos una propuesta que brinda oportunidades y la posibilidad de desarrollar empresarias independientes en todo el país capaces de lograr sus proyectos y objetivos; así también generando bienestar económico en sus hogares y para sus familias.</p>
    				</li>
    				<li>
    					<h4>MISIÓN</h4>
    					<p>Brindar una oportunidad de trabajo a través de la venta por catálogo, desarrollando estrategias y herramientas de negocio para que nuestras asesoras alcancen sus metas.</p>
    				</li>
    				<li>
    					<h4>VISIÓN</h4>
    					<p>Consolidarse como la empresa número 1 a nivel nacional en el rubro de la venta por catálogo de artículos deportivos en todas las categorías.</p>
    				</li>
    			</ul>
    		</div>
    	</div>
    </section>
   	<section class="marcas diagonal-pos">
   		<div class="diagonal-neg">
	   		<h2 class="text-center mt-10">NUESTRAS MARCAS</h2>
	   		<div class="triang-abajo"></div>
	        <div id="carousel-marcas" class="carousel slide h-100">
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
	                        <div class="col-sm-3">
	                        	<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"/>
	                        </div>
	                    <?php if ($i % 4 === 0 || $i === $marcas->found_posts) : ?>
			                    </div>
			                </div>
			            <?php endif; ?>
				<?php endwhile; ?>
	            </div>
	            <!--a class="left carousel-control" href="#carousel-marcas" data-slide="prev"></a>
	            <a class="right carousel-control" href="#carousel-marcas" data-slide="next"></a-->
	        </div>
        </div>
    </section>

	<?php
		$args = array('post_type' => 'cat_ads', 'nopaging' => true, 'orderby' => 'menu_order date');
		$ads = new WP_Query($args); 
		if ($ads->have_posts()) :?>
		    <div id="modal-ads" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div id="ads-carousel" class="carousel slide" data-ride="carousel">
							<?php
								$listItems = ''; $slides = '';
								while ($ads->have_posts()): $ads->the_post();
									$i = $ads->current_post;
									$listItems .= '<li ' . ($i == 0 ? 'class="active"' : '') . ' data-target="#ads-carousel" data-slide-to="' . $i . '"></li>'; 
									$image_url = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMmy3LT9kWHqfp9D78xXBzzr-WJL-Kn0aCZtHPMFJDEV0EoVgBPQ';
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
						</div>
					</div>
				</div>
			</div>
	<?php endif; ?>

<?php get_footer(); ?>
