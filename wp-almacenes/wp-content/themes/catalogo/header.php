<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<?php wp_enqueue_style( 'style', get_stylesheet_uri() ); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav class="nav-custom">
		<div class="container">
			<ul class="navbar-nav navbar-right nav-upper">
				<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-telefono2.png" height="12"><strong> CENTRAL: </strong>418-3838</li>
				<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-telefono2.png" height="12"><strong> ANEXOS:</strong> Provincias(12-13-15); Lima: (18 y 16-21)</li>
			</ul>
		</div>
	</nav>
	<nav class="navbar navbar-thn">
		<div class="container">
	    	<div class="container-fluid">
	      		<div class="navbar-header">
	        		<button type="button" class="navbar-toggle collapsed btn-responsive" data-toggle="collapse" data-target="#menu-navigation" aria-expanded="false">
	          			<span class="sr-only">Toggle navigation</span>
	          			<span class="icon-bar"></span>
		          		<span class="icon-bar"></span>
		          		<span class="icon-bar"></span>
	        		</button>
	        		<?php 
	        			$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
		        		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
		        			<img src="<?php echo $image[0]; ?>" alt="Logo - <?php bloginfo('name'); ?>" />
		        		</a>
		      		</div>
		      		<?php
					wp_nav_menu( 
						array( 
							'container_id' => 'menu-navigation',
							'container_class' => 'collapse navbar-collapse',
							'menu_class' => 'nav navbar-nav navbar-right',
						) 
					);
				?>
	    	</div><!-- /.container-fluid -->
	    </div>	
  	</nav>
	<div class="container">
		
		