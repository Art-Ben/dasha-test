<?php
/**
 * TestTheme with ajax functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TestTheme_with_ajax
 */
require_once('inc/default-code.php');

require_once('inc/init_style_scripts.php');
add_action( 'wp_enqueue_scripts', 'init_style_scripts', 140 );

/**
 * Including a custom ajax loading file
 */

require_once('inc/ajax-post-loading.php');





