<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'text',
            'title'             => __('Text'),
            'description'       => __('Simple Text'),
            // 'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
            'render_template'   => get_template_directory_uri().'/blocks/testimonial/testimonial.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial'),
        ));
    }
}
