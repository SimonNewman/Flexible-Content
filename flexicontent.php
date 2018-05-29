<?php

/*
	Plugin Name: Flexi Content
	Author: Formation Media
  Description: Add ACF Flexible content elements
  Version: 1.0.9
*/

defined( 'ABSPATH' ) OR exit;

include 'acf.php';

class Flexi_Content {

  private $options;

  function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'register_css'));
	  add_filter('the_content', array($this, 'add_flexi_content_template'));
    $this->add_image_sizes();
    $this->updater();
    $this->add_menu();
  }

	function add_flexi_content_template( $content ) {
    ob_start();
    include 'template-part.php';
    return $content . ob_get_clean();
	}

  function add_image_sizes() {
    if (get_field('page_width', 'option')) {
      $section_width = get_field('page_width', 'option');
    } else {
      $section_width = 1200;
    }

    if (get_field('image_height', 'option')) {
      $image_height = get_field('image_height', 'option');
    } else {
      $image_height = 350;
    }

    $column_margin = 75;

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

  function register_css() {
		wp_register_style('flexi-content', plugin_dir_url( __FILE__ ) . 'flexi-content.css');
		wp_enqueue_style('flexi-content');
	}

  function updater() {
    require 'plugin-update-checker/plugin-update-checker.php';
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    	'https://github.com/SimonNewman/Flexible-Content',
    	__FILE__,
    	'flexicontent'
    );
  }

  function add_menu() {
    if( function_exists('acf_add_options_sub_page') ) {
    	acf_add_options_sub_page(array(
        'page_title' => 'Flexible Content Settings',
        'menu_title' => 'Flexible Content',
        'parent_slug' => 'options-general.php',
        'update_button'		=> __('Save Settings', 'acf'),
        'post-id' => 'flexible-content-settings-page'
      ));
    }
  }
}

$flexi_content = new Flexi_Content;
