<?php

// Admin link to adabs
//----------------------------------------------------------
function adabs_link( $wp_admin_bar ) {
  $args = array(
    'id'    => '',
    'title' => '',
    'href'  => 'https://adabs.ch',
    'meta'  => array( 'target' => '_blank', 'rel' => 'noopener' ),
    'parent' => 'top-secondary'
  );
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'adabs_link', 999 );
//----------------------------------------------------------

// Register title tag
//----------------------------------------------------------
add_theme_support('title-tag');
//----------------------------------------------------------

//Download Plugins without providing FTP Info
// ----------------------------------------------------------
define('FS_METHOD', 'direct');
//----------------------------------------------------------

include_once( get_stylesheet_directory() . '/functions/scripts_styles.php' );
include_once( get_stylesheet_directory() . '/functions/menu.php' );
include_once( get_stylesheet_directory() . '/functions/disable.php' );
include_once( get_stylesheet_directory() . '/functions/image_sizes.php' );
include_once( get_stylesheet_directory() . '/functions/custom_posttypes.php' );
include_once( get_stylesheet_directory() . '/functions/options.php' );
// include_once( get_stylesheet_directory() . '/functions/blocks.php' );

?>
