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
function registerEmployeeCategory() {

  $labels = [
    'name' => _x( 'Bereiche', 'taxonomy general name' ),
    'singular_name' => _x( 'Bereich', 'taxonomy singular name' ),
    'search_items' =>  __( 'Bereiche durchsuchen' ),
    'all_items' => __( 'Alle Bereiche' ),
    'parent_item' => __( 'Übergeordneter Bereich' ),
    'parent_item_colon' => __( 'Parent Bereich:' ),
    'edit_item' => __( 'Bereich bearbeiten' ),
    'update_item' => __( 'Bereich aktualisieren' ),
    'add_new_item' => __( 'Bereich hinzufügen' ),
    'new_item_name' => __( 'Neuer Bereich' ),
    'menu_name' => __( 'Bereiche' ),
  ];

  register_taxonomy('Bereiche',['service'], [
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => ['slug' => 'genre'],
  ]);

}
add_action( 'init', 'registerEmployeeCategory', 0 );
//----------------------------------------------------------

// Adding ACF Field Event Date to WP admin column
//----------------------------------------------------------
// function add_acf_columns ( $columns ) {
//   return array_merge ( $columns, array (
//     'from' => __('Datum von'),
//     'to' => __('bis'),
//   ) );
// }
// add_filter ( 'manage_event_posts_columns', 'add_acf_columns' );
// /*
//  * Add columns to event post list
//  */
//  function event_custom_column ( $column, $post_id ) {
//    switch ( $column ) {
//      case 'from':
//        echo date('d.m.Y H:i', strtotime(get_post_meta( $post_id, 'from', true )));
//        break;
//      case 'to':
//         if(get_post_meta( $post_id, 'to', true )){
//           echo date('d.m.Y H:i', strtotime(get_post_meta( $post_id, 'to', true )));
//         }
//        break;
//    }
//  }
//  add_action ( 'manage_event_posts_custom_column', 'event_custom_column', 10, 2 );
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
