<?php

/**
* Multi image uploader
*/
class MultiImageUploader
{
	var $post_types = array();

	function __construct($post_types)
	{
		$this->post_types = $post_types;
		add_action('add_meta_boxes', array($this, 'add_meta_box'));
		add_action('save_post', array($this, 'save'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
	}

	public function add_meta_box($post_type)
	{
		if (in_array($post_type, $this->post_types)) {
			add_meta_box(
				'cat_multi_image_upload',
				'Adjuntar Imágenes',
				array($this, 'render_meta_box_content'),
				$post_type,
				'normal',
				'high'
			);
		}
	}

	public function render_meta_box_content($post) 
	{
		wp_nonce_field('multi_image_uploader', 'multi_image_uploader_nonce_field');

		$existing_images = get_post_meta($post->ID, 'cat_images', true);

		$existing_images = unserialize($existing_images);
		// var_dump($existing_images);exit;
		$meta_box_html = '<p class="description">';
		$meta_box_html .= 'Seleccione las imágenes del catálogo.';
		$meta_box_html .= '</p>';
		$meta_box_html .= '<input type="file" id="cat_images" name="cat_images[]" multiple accept="image/*"/>';
		$meta_box_html .= '<div class="gallery-preview"></div>';
		if (count($existing_images)) {
			$meta_box_html .= '<script type="text/javascript">';
			foreach ($existing_images as $image) {
				$meta_box_html .= 'jQuery(jQuery.parseHTML("<img>")).attr("src", "'. $image . '").appendTo(".gallery-preview");';
			}
			$meta_box_html .= 'jQuery(".gallery-preview").addClass("active");';
			$meta_box_html .= '</script>';
		}

		echo $meta_box_html;
	}

	public function save($post_id)
	{
		if (!isset($_POST['multi_image_uploader_nonce_field'])) return $post_id;

		$nonce_field = $_POST['multi_image_uploader_nonce_field'];

		if (!wp_verify_nonce($nonce_field, 'multi_image_uploader')) return $post_id;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

		if ('page' === $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id)) return $post_id;
		}

		$posted_images = $_FILES['cat_images']['name'];
		$images = array();

		if (!empty($posted_images)) {
			foreach ($posted_images as $key=>$value) {
				$upload = wp_upload_bits($_FILES['cat_images']['name'][$key], null, file_get_contents($_FILES['cat_images']['tmp_name'][$key]));
				$images[] = esc_url_raw($upload['url']);
			}
		}

		add_post_meta($post_id, 'cat_images', serialize($images));
        update_post_meta($post_id, 'cat_images', serialize($images));
	}

	public function enqueue_scripts($hook)
	{
		if (!in_array($hook, ['post.php', 'post-edit.php', 'post-new.php'])) return;
		wp_enqueue_style('admin_image_preview', get_template_directory_uri() . '/assets/css/admin-image-preview.css');
		wp_enqueue_script('multi_image_previewer', get_template_directory_uri() . '/assets/js/multi-image-previewer.js', array('jquery'));
	}
}