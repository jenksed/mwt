<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also defines a function that starts the plugin.
 *

 * @wordpress-plugin
 * Plugin Name:       Managed WordPress Tools
 * Plugin URI:        http://newfang.solutions
 * Description:       Tools for Managed WordPress.
 * Version:           0.0.3
 * Author:            Joshua Jenks
 * Author URI:        https://newfang.solutions
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
     die;
}

foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
	include_once $file;
}


class mwtObject {

	public function __construct(){
		$plugin = new Submenu( new Settings_Page() );
	    $plugin->init();
	}
}

$app = new mwtObject();
