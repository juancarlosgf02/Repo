<?php

/**
* PDF Uploader
*/
class PDFUploader
{
	
	function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_custom_meta_boxes'));
		add_action('save_post', array($this, 'save_custom_meta_data'));
	}

	public function add_custom_meta_boxes() {
	    // Define the custom attachment for posts
	    add_meta_box(
	        'wp_custom_attachment',
	        'Catálogo PDF',
	        array($this, 'wp_custom_attachment'),
	        'cat_catalogos',
	        'normal'
	    );
	}

	public function wp_custom_attachment($post) {
	    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');

	    $existing_pdf = get_post_meta($post->ID, 'wp_custom_attachment', true);

	    $html = '<p class="description">';
	    $html .= 'Adjunta el PDF del catálogo.';
	    $html .= '</p>';
	    if (isset($existing_pdf)) {
	    	$pdf = basename($existing_pdf['file']);
	    	$html .= '<p>Catálogo actual: ' . $pdf . '</p>';
	    }
	    $html .= '<input type="file" id="wp_custom_attachment" name="wp_custom_attachment" size="25"/>';

	    echo $html;
	}

	public function save_custom_meta_data($id) {
	    // security verification
	    if (!wp_verify_nonce($_POST['wp_custom_attachment_nonce'], plugin_basename(__FILE__))) {
	        return $id;
	    }

	    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	        return $id;
	    }

	    if ('page' == $_POST['post_type']) {
	        if (!current_user_can('edit_page', $id)) {
	            return $id;
	        }
	    } else {
	        if (!current_user_can('edit_page', $id)) {
	            return $id;
	        }
	    }
	    // end security verification

	    // Make sure the file array isn't empty
	    if (!empty($_FILES['wp_custom_attachment']['name'])) {
	        // Setup the array of supported file types. In this case, it's just PDF.
	        $supported_types = array('application/pdf');
	        // Get the file type of the upload
	        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
	        $uploaded_type = $arr_file_type['type'];

	        // Check if the type is supported. If not, throw an error.
	        if (in_array($uploaded_type, $supported_types)) {
	            // Use the WordPress API to upload the file
	            $upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));

	            if (isset($upload['error']) && $upload['error'] != 0) {
	                wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
	            } else {
	                add_post_meta($id, 'wp_custom_attachment', $upload);
	                update_post_meta($id, 'wp_custom_attachment', $upload);
	            }
	        } else {
	            wp_die('The file that you have uploaded is not a PDF.');
	        }
	    }
	}

}