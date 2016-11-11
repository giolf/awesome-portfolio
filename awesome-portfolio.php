<?php

/*
Plugin Name: Awesome Portfolio
Plugin URI: https://github.com/giolf/awesome-portfolio
Description: Awesome Protfolio is the perfect starting point to build your custom portfolio.
Version: 1.0
Author: Giovanni Far
Author URI: http://facebook.com/giovannifar
Plugin Type: Piklist
License: GPL3
*/

/**
 * Check if Piklist plugin is avaiable
 */
include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/checker.php" );

/**
 * Register the custom post type: 'project'
 */
include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/project-post-type.php" );


/**
 * Include the Ajax library on the front end
 */
include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/ajax-library.php" );


/**
 * Display Single Project hook
 */
 include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/display_project.php" );

/**
 * Awesome Portfolio API
 */
include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/api.php");

/**
 * Awesome Portfolio scripts and styles
 */
include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/scripts_styles.php");

/**
 * Add new image size for the gallery and the single project image
 */
include_once( WP_PLUGIN_DIR . "/awesome-portfolio/hooks/thumbs.php");

?>
