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
?>
