<?php

get_header(); ?>
    <section class="banner">
		<div id="banner-carousel" class="carousel slide" data-ride="carousel">
			<?php
				$args = array('post_type' => 'cat_banner', 'category_name' => 'catalogo', 'nopaging' => true, 'orderby' => 'menu_order date');
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
	<section id="fs-container" class="fs-container"></section>
	<section class="marcas diagonal-pos">		
		<h2 class="text-center diagonal-neg">CATÁLOGO VIRTUAL</h2>
		<div class="triang-abajo diagonal-neg"></div>
		<div class="catalog active diagonal-neg">
			<?php
				$args = array('post_type' => 'cat_catalogos', 'nopaging' => true, 'orderby' => 'menu_order date', 'limit' => 1);
				$catalogo = new WP_Query($args);
				$slideTo = ''; $listItems = '';
				$pdf = '';
				while ($catalogo->have_posts()): $catalogo->the_post();
					$images = unserialize(get_post_meta(get_the_ID(), 'cat_images', true));
					$pdf = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
					$title = get_the_title();
					for ($i = 0, $l = count($images); $i < $l; $i++) {
						$slideTo .= "<option data-slide-to='$i'>Pag " . ($i+1) . "</option>";
						$listItems .= "<li data-image='$images[$i]' class='" . ($i == 0 ? "current" : "") . "'>";
						$listItems .= "<img class='lazy' data-original='$images[$i]' alt='" . $title . " " . ($i+1) . "'/>";
						$listItems .= "</li>";
					} ?>
			<?php endwhile; ?>
			<div class="buttons">
				<button type="button" class="prev"><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span></button>
				<button type="button" class="next"><span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span></button>
				<select class="slide-to">
					<?php echo $slideTo; ?>
				</select>
				<button type="button" class="fullscreen"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></button>
			</div>
			<ol class="content">
				<?php echo $listItems; ?>
			</ol>
		</div>
		<p class="diagonal-neg mt-10">*Para hacer <strong>zoom</strong>, pasar el puntero del mouse sobre la imagen.</p>
		<a href="<?php echo $pdf['url']; ?>" class="btn btn-primary" download>Descargar catálogo</a>
	</section>		
<?php

get_footer('catalogo'); ?>