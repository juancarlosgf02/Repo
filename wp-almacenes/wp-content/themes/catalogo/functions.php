<?php

require_once get_template_directory() . '/includes/custom-nav-menu.php';
require_once get_template_directory() . '/includes/pdf-uploader.php';
require_once get_template_directory() . '/includes/multi-image-uploader.php';

add_theme_support( 'post-thumbnails' ); 

function theme_prefix_setup() {
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function prefix_custom_site_icon_size( $sizes ) {
   $sizes[] = 64;
 
   return $sizes;
}
add_filter( 'site_icon_image_sizes', 'prefix_custom_site_icon_size' );
 
function prefix_custom_site_icon_tag( $meta_tags ) {
   $meta_tags[] = sprintf( '<link rel="icon" href="%s" sizes="64x64" />', esc_url( get_site_icon_url( null, 64 ) ) );
 
   return $meta_tags;
}
add_filter( 'site_icon_meta_tags', 'prefix_custom_site_icon_tag' );

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'catalogo' ),
) );

function add_active_class_to_nav_menu($classes) {
    if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
        $classes = array_diff($classes, array('current-menu-item', 'current_page_item', 'active'));
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');

function create_post_type() {
    register_post_type('cat_banner',
        array(
            'labels' => array(
                'name' => __('Banners'),
                'singular_name' => __('Banner')
            ),
            'public' => true,
            'supports' => array ('title', 'page-attributes', 'thumbnail'),
            'taxonomies' => array ('category'),
        )
    );
    
    register_post_type('cat_beneficios',
        array(
            'labels' => array(
                'name' => __('Beneficios'),
                'singular_name' => __('Beneficio')
            ),
            'public' => true,
            'supports' => array ('title', 'editor', 'page-attributes', 'thumbnail'),
        )
    );
    
    register_post_type('cat_marcas',
        array(
            'labels' => array(
                'name' => __('Marcas'),
                'singular_name' => __('Marca')
            ),
            'public' => true,
            'supports' => array ('title', 'page-attributes', 'thumbnail'),
        )
    );
    
    register_post_type('cat_ads',
        array(
            'labels' => array(
                'name' => __('Avisos'),
                'singular_name' => __('Aviso')
            ),
            'public' => true,
            'supports' => array ('title', 'page-attributes', 'thumbnail'),
        )
    );

    register_post_type('cat_catalogos',
        array(
            'labels' => array(
                'name' => __('Catálogos'),
                'singular_name' => __('Catálogo')
            ),
            'public' => true,
            'supports' => array ('title', 'page-attributes', 'thumbnail'),
        )
    );
}
add_action('init', 'create_post_type');

function update_edit_form() {
    echo ' enctype="multipart/form-data"';
} // end update_edit_form
add_action('post_edit_form_tag', 'update_edit_form');

function call_uploaders() {
    new PDFUploader();
    new MultiImageUploader(['cat_catalogos']);
}

if (is_admin()) {
    add_action('load-post.php', 'call_uploaders');
    add_action('load-post-new.php', 'call_uploaders');
}
