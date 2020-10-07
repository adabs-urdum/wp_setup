<?php

// Register Custom Post Types
//----------------------------------------------------------
function register_custom_post_type_key_visuals() {

    $labels = array(
        'name'                => __( 'Dienstleistung', 'wp-setup' ),
        'singular_name'       => __( 'Dienstleistung', 'wp-setup' ),
        'menu_name'           => __( 'Dienstleistungen', 'wp-setup' ),
        'parent_item_colon'   => __( 'Dienstleistung', 'wp-setup' ),
        'all_items'           => __( 'Alle Dienstleistungen', 'wp-setup' ),
        'view_item'           => __( 'Dienstleistung ansehen', 'wp-setup' ),
        'add_new_item'        => __( 'Dienstleistung hinzufügen', 'wp-setup' ),
        'add_new'             => __( 'Neue hinzufügen', 'wp-setup' ),
        'edit_item'           => __( 'Dienstleistung bearbeiten', 'wp-setup' ),
        'update_item'         => __( 'Dienstleistung aktualisieren', 'wp-setup' ),
        'search_items'        => __( 'Dienstleistung suchen', 'wp-setup' ),
        'not_found'           => __( 'Nicht gefunden', 'wp-setup' ),
        'not_found_in_trash'  => __( 'Nicht im Papierkorb gefunden', 'wp-setup' ),
    );
    $args = array(
        'label'               => __( 'service', 'wp-setup' ),
        'description'         => __( 'Mitarbeiter Detail Info', 'wp-setup' ),
        'labels'              => $labels,
        // 'supports'            => array('editor'),
        'supports'            => array('title'),
        // 'supports'            => false,
        'taxonomies'          => [],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        // 'show_in_rest'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-universal-access',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'service', $args );

    flush_rewrite_rules();

}

add_action( 'init', 'register_custom_post_type_key_visuals', 0 );
//----------------------------------------------------------


// Register custom taxonomy
//----------------------------------------------------------
// function crunchify_create_deals_custom_taxonomy() {

//   $labels = array(
//     'name' => _x( 'Genres', 'taxonomy general name' ),
//     'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
//     'search_items' =>  __( 'Genres durchsuchen' ),
//     'all_items' => __( 'Alle Genres' ),
//     'parent_item' => __( 'Übergeordnetes Genre' ),
//     'parent_item_colon' => __( 'Parent Genre:' ),
//     'edit_item' => __( 'Genre bearbeiten' ),
//     'update_item' => __( 'Genre aktualisieren' ),
//     'add_new_item' => __( 'Genre hinzufügen' ),
//     'new_item_name' => __( 'Neuer Genrename' ),
//     'menu_name' => __( 'Genres' ),
//   );

//   register_taxonomy('Genre',array('tipp'), array(
//     'hierarchical' => true,
//     'labels' => $labels,
//     'show_ui' => true,
//     'show_admin_column' => true,
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'genre' ),
//   ));

// }
//----------------------------------------------------------

// Adding ACF Field Event Date to WP admin column
//----------------------------------------------------------
// function add_acf_columns ( $columns ) {
//   return array_merge ( $columns, array (
//     'datetime' => __('Datum und Uhrzeit')
//   ) );
// }
// add_filter ( 'manage_event_posts_columns', 'add_acf_columns' );
//----------------------------------------------------------


// Save Name + Lastname as Post Title of PostType Employee
//----------------------------------------------------------
// function save_post_handler( $post_id ) {

//     if ( get_post_type( $post_id ) == 'employee' ) {
//         $title = get_field( 'name', $post_id ) . ' ' . get_field( 'lastname', $post_id );
//         $data['ID'] = $post_id;
//         $data['post_title'] = $title;
//         $data['post_name']  = sanitize_title( $title );
//         wp_update_post( $data );
//     }

// }
// add_action( 'acf/save_post', 'save_post_handler' , 20 );

?>
