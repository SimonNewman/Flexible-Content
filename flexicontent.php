<?php

/*
	Plugin Name: Flexi Content
	Author: Formation Media
  Description: Add ACF Flexible content elements
*/

defined( 'ABSPATH' ) OR exit;

include 'acf.php';

class Flexi_Content {

  private $options;

  function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'register_css'));
	  add_filter('the_content', array($this, 'add_flexi_content_template'));
    $this->add_image_sizes();
  }

	function add_flexi_content_template( $content ) {
    ob_start();
    include 'template-part.php';
    return $content . ob_get_clean();
	}

  function add_image_sizes() {
    $section_width = 1200;
    $column_margin = 75;
    $image_height = 350;

    add_image_size('flex_large_no_crop', $section_width, '');
    add_image_size('flex_large', $section_width, $image_height * 1.5, true);
    add_image_size('flex_half', $section_width / 2, $image_height, true);
    add_image_size('flex_small', $section_width / 3, ($section_width / 3) * .75, true);

    // Allows user to select image size when adding media to a post
    add_filter( 'image_size_names_choose', 'my_custom_sizes' );
    function my_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'flex_half' => __( 'Half Width' ),
        ) );
    }
  }

  function register_css(){
		wp_register_style('flexi-content', plugin_dir_url( __FILE__ ) . 'flexi-content.css');
		wp_enqueue_style('flexi-content');
	}
}

$flexi_content = new Flexi_Content;
