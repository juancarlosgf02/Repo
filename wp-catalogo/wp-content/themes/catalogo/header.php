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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet"> 
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109435769-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments)};
      gtag('js', new Date());
    
      gtag('config', 'UA-109435769-1');
    </script>
	<?php wp_enqueue_style( '', get_stylesheet_uri() ); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav class="nav-custom">
		<div class="container">
			<ul class="navbar-nav navbar-right nav-upper" style="margin-right: 0;">
				<li><a href="<?php get_site_url(); ?>/reclamaciones/" style="font-weight: 500; border-right: 1px solid #fff;">LIBRO DE RECLAMACIONES</a></li>
				<li><a href="http://intranet.catalogothn.com.pe" target="_blank">INTRANET</a></li>
				<li><a href="<?php get_site_url(); ?>/afiliate/" class="nav-afiliate">AFÍLIATE</a></li>
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
		
		