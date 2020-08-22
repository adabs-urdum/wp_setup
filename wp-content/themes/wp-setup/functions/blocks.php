<?php

add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'contentelements',
                'title' => 'Inhaltselemente',
            ]
        ]
    );
}, 10, 2 );

function my_acf_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type([
            'name'              => 'text',
            'title'             => __('Text'),
            'description'       => __('Simple Text'),
            'render_template'   => 'blocks/text.php',
            'category'          => 'contentelements',
            'icon'              => 'editor-alignleft',
            'mode'              => 'preview',
            'align'             => 'center',
            'keywords'          => [],
        ]);

        acf_register_block_type([
            'name'              => 'image',
            'title'             => __('Bild'),
            'description'       => __('Einzelbild'),
            'render_template'   => 'blocks/image.php',
            'category'          => 'contentelements',
            'icon'              => 'format-image',
            'mode'              => 'preview',
            'align'             => 'center',
            'keywords'          => [],
        ]);

        acf_register_block_type([
            'name'              => 'imgtxtcombo',
            'title'             => __('Bild Text Kombo'),
            'description'       => __('Bild Text Kombination'),
            'render_template'   => 'blocks/imageTextCombo.php',
            'category'          => 'contentelements',
            'icon'              => 'align-pull-left',
            'mode'              => 'preview',
            'align'             => 'center',
            'keywords'          => [],
        ]);

        acf_register_block_type([
            'name'              => 'gallery',
            'title'             => __('Galerie'),
            'description'       => __('Galerie'),
            'render_template'   => 'blocks/gallery.php',
            'category'          => 'contentelements',
            'icon'              => 'format-gallery',
            'mode'              => 'preview',
            'align'             => 'center',
            'keywords'          => [],
        ]);

        acf_register_block_type([
            'name'              => 'teasers',
            'title'             => __('Teaser'),
            'description'       => __('Teaser'),
            'render_template'   => 'blocks/teasers.php',
            'category'          => 'contentelements',
            'icon'              => 'format-gallery',
            'mode'              => 'preview',
            'align'             => 'center',
            'keywords'          => [],
        ]);
    }
}
add_action('acf/init', 'my_acf_block_types');

function allowed_block_types( $allowed_block_types, $post ) {
    return [
        'acf/text',
        'acf/image',
        'acf/imgtxtcombo',
        'acf/gallery',
        'acf/teasers',
    ];
}
add_filter( 'allowed_block_types', 'allowed_block_types', 10, 2 );
