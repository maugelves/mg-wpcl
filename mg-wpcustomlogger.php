<?php
/*
Plugin Name: MG WordPress Custom Logger
Description: Plugin with public PHP functions to log custom activities in your developments.
Version:     1.0
Author:      Mauricio Gelves <mg@maugelves.com>
Author URI:  https://maugelves.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mgwpcl
Domain Path: /languages
*/


/**
 * The code that runs during plugin activation.
 */
function activate_mgwpcl() {

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'mgwpcl';

    $sql = "CREATE TABLE $table_name (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `description` LONGTEXT NOT NULL DEFAULT '',
              `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `user_id` int(11) NOT NULL DEFAULT '0',
              `IP` varchar(45) NOT NULL DEFAULT '0',
              PRIMARY KEY (`id`)
            ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );


    // Set default options
    /*update_option( 'options_mgdbq2json_nro_intentos', 3 );*/

}
register_activation_hook( __FILE__, 'activate_mgwpcl' );


if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

// Register the plugin Entities
foreach (glob(__DIR__ . "/entities/*.php") as $filename)
    include $filename;


// Register the plugin Classes
foreach (glob(__DIR__ . "/classes/*.php") as $filename)
    include $filename;