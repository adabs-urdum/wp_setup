<?php

// Register Custom Post Types
//----------------------------------------------------------
function register_custom_post_type_key_visuals() {

    $labels = array(
        'name'                => __( 'Mitarbeiter', 'wp-setup' ),
        'singular_name'       => __( 'Mitarbeiter', 'wp-setup' ),
        'menu_name'           => __( 'Mitarbeiter', 'wp-setup' ),
        'parent_item_colon'   => __( 'Mitarbeiter', 'wp-setup' ),
        'all_items'           => __( 'Alle Mitarbeiter', 'wp-setup' ),
        'view_item'           => __( 'Mitarbeiter ansehen', 'wp-setup' ),
        'add_new_item'        => __( 'Mitarbeiter hinzufügen', 'wp-setup' ),
        'add_new'             => __( 'Neuen hinzufügen', 'wp-setup' ),
        'edit_item'           => __( 'Mitarbeiter bearbeiten', 'wp-setup' ),
        'update_item'         => __( 'Mitarbeiter aktualisieren', 'wp-setup' ),
        'search_items'        => __( 'Mitarbeiter suchen', 'wp-setup' ),
        'not_found'           => __( 'Nicht gefunden', 'wp-setup' ),
        'not_found_in_trash'  => __( 'Nicht im Papierkorb gefunden', 'wp-setup' ),
    );
    $args = array(
        'label'               => __( 'employee', 'wp-setup' ),
        'description'         => __( 'Mitarbeiter Detail Info', 'wp-setup' ),
        'labels'              => $labels,
        // 'supports'            => array('editor'),
        // 'supports'            => array('title'),
        'supports'            => false,
        'taxonomies'          => array( 'employee' ),
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
    register_post_type( 'employee', $args );

    flush_rewrite_rules();

}

add_action( 'init', 'register_custom_post_type_key_visuals', 0 );
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
