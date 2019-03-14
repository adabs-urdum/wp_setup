<?php

// Admin link to CLUS
//----------------------------------------------------------
function made_with_clus_link( $wp_admin_bar ) {
  $args = array(
    'id'    => 'clus',
    'title' => 'Made with CLUS',
    'href'  => 'https://clus.ch',
    'meta'  => array( 'target' => '_blank' ),
    'parent' => 'top-secondary'
  );
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'made_with_clus_link', 999 );
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
// include_once( get_stylesheet_directory() . '/functions/menu.php' );
include_once( get_stylesheet_directory() . '/functions/disable.php' );
// include_once( get_stylesheet_directory() . '/functions/blocks.php' );
include_once( get_stylesheet_directory() . '/functions/image_sizes.php' );
// include_once( get_stylesheet_directory() . '/functions/custom_posttypes.php' );

?>
