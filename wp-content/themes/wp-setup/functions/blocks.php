<?php

// Register ACF Gutenberg Fields
//----------------------------------------------------------
function my_acf_init() {

	// check function exists
	if( function_exists('acf_register_block') ) {

    // register images block
		acf_register_block(array(
			'name'				=> 'images',
			'title'				=> __('Bild(er)'),
			'description'		=> __('Bild(er)'),
			'render_callback'	=> 'my_acf_block_render_callback',

      // Possible categories:
      // common
      // formatting
      // layout
      // widgets
      // embed
			'category'			=> 'layout',

      'icon'				=> 'admin-comments',
			'keywords'			=> array( 'Bilder', 'Bild(er)', 'images' ),
		));

		// register text block
		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('Text'),
			'description'		=> __('Text'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
      'icon'				=> 'editor-alignleft',
			'keywords'			=> array( 'Text', 'text' ),
		));

		// register key visuals block
		acf_register_block(array(
			'name'				=> 'keyvisuals',
			'title'				=> __('Key Visual'),
			'description'		=> __('Key Visual'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'welcome-view-site',
			'keywords'			=> array( 'Key Visual', 'home' ),
		));

	}
}
add_action('acf/init', 'my_acf_init');
//----------------------------------------------------------

// Register callback to rendering file
//----------------------------------------------------------
function my_acf_block_render_callback( $block ) {
	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists(STYLESHEETPATH . "/blocks/{$slug}.php") ) {
		include( STYLESHEETPATH . "/blocks/{$slug}.php" );
	}
}
//----------------------------------------------------------

// Only allow custom Block
//----------------------------------------------------------
function allowed_block_types( $allowed_blocks ) {
	return array(
		'acf/images',
		'acf/text',
		'acf/keyvisuals',
	);
  // var_dump(WP_Block_Type_Registry::get_instance()->get_all_registered());
}
add_filter( 'allowed_block_types', 'allowed_block_types' );
//----------------------------------------------------------

?>
