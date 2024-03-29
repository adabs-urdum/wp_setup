<?php

// // Register custom taxonomy
// //----------------------------------------------------------
// function registerCustomTaxonomy() {

//   $labels = [
//     'name' => _x( 'Bereiche', 'taxonomy general name' ),
//     'singular_name' => _x( 'Bereich', 'taxonomy singular name' ),
//     'search_items' =>  __( 'Bereiche durchsuchen' ),
//     'all_items' => __( 'Alle Bereiche' ),
//     'parent_item' => __( 'Übergeordneter Bereich' ),
//     'parent_item_colon' => __( 'Parent Bereich:' ),
//     'edit_item' => __( 'Bereich bearbeiten' ),
//     'update_item' => __( 'Bereich aktualisieren' ),
//     'add_new_item' => __( 'Bereich hinzufügen' ),
//     'new_item_name' => __( 'Neuer Bereich' ),
//     'menu_name' => __( 'Bereiche' ),
//   ];

//   register_taxonomy('Bereiche',['service'], [
//     'hierarchical' => true,
//     'labels' => $labels,
//     'show_ui' => true,
//     'show_admin_column' => true,
//     'query_var' => true,
//     'rewrite' => ['slug' => 'genre'],
// 'show_in_quick_edit' => false,
//     'meta_box_cb' => false,
//   ]);

// }
// add_action( 'init', 'registerCustomTaxonomy', 0 );
// //----------------------------------------------------------

// // Register Custom Post Types
// //----------------------------------------------------------
// function register_custom_post_types()
// {

//   $customPostTypes = [
//     [
//       'name' => 'course',
//       'singular' => 'Kurs',
//       'plural' => 'Kurse',
//       'supports' => ['editor', 'title', 'revisions'],
//       // 'supports' => ['editor'],
//       // 'supports' => false,
//       'rewrite' => ['slug' => 'angebot'],
//       'show_in_rest' => false,
//     ]
//   ];

//   foreach ($customPostTypes as $customPostType) {
//     $labels = array(
//       'name'                => __($customPostType['plural'], 'wp-setup'),
//       'singular_name'       => __("{$customPostType['singular']}", 'wp-setup'),
//       'menu_name'           => __($customPostType['plural'], 'wp-setup'),
//       'parent_item_colon'   => __("{$customPostType['singular']}", 'wp-setup'),
//       'all_items'           => __("Alle {$customPostType['plural']}", 'wp-setup'),
//       'view_item'           => __("{$customPostType['singular']} ansehen", 'wp-setup'),
//       'add_new_item'        => __("{$customPostType['singular']} hinzufügen", 'wp-setup'),
//       'add_new'             => __("{$customPostType['singular']} hinzufügen", 'wp-setup'),
//       'edit_item'           => __("{$customPostType['singular']} bearbeiten", 'wp-setup'),
//       'update_item'         => __("{$customPostType['singular']} aktualisieren", 'wp-setup'),
//       'search_items'        => __("{$customPostType['singular']} suchen", 'wp-setup'),
//       'not_found'           => __('Nicht gefunden', 'wp-setup'),
//       'not_found_in_trash'  => __('Nicht im Papierkorb gefunden', 'wp-setup'),
//     );
//     $args = array(
//       'label'               => __($customPostType['name'], 'wp-setup'),
//       'description'         => __("{$customPostType['singular']} Detail Info", 'wp-setup'),
//       'labels'              => $labels,
//       'supports'            => $customPostType['supports'],
//       'taxonomies'          => [],
//       'hierarchical'        => false,
//       'public'              => true,
//       'show_ui'             => true,
//       'show_in_menu'        => true,
//       'show_in_nav_menus'   => true,
//       'show_in_admin_bar'   => true,
//       'show_in_rest'        => $customPostType['show_in_rest'],
//       'menu_position'       => 21,
//       'menu_icon'           => 'dashicons-universal-access',
//       'can_export'          => true,
//       'has_archive'         => false,
//       'exclude_from_search' => false,
//       'publicly_queryable'  => true,
//       'capability_type'     => 'page',
//       'rewrite' => $customPostType['rewrite'],
//     );
//     register_post_type($customPostType['name'], $args);
//   }

//   flush_rewrite_rules();
// }
// add_action('init', 'register_custom_post_types', 0);
// //----------------------------------------------------------


// /**
//  *	Save Name + Lastname as Post Title of PostType Employee
//  *
//  */
// function save_post_handler( $post_id ) {

//     if ( get_post_type( $post_id ) == 'team' ) {
//         $title = get_field( 'name', $post_id ) . ' ' . get_field( 'lastname', $post_id );
//         $data['ID'] = $post_id;
//         $data['post_title'] = $title;
//         $data['post_name']  = sanitize_title( $title );
//         wp_update_post( $data );
//     }
//     else if ( get_post_type( $post_id ) == 'tour' ) {
//         $title = get_field( 'name', $post_id );
//         $data['ID'] = $post_id;
//         $data['post_title'] = $title;
//         $data['post_name']  = sanitize_title( $title );
//         wp_update_post( $data );
//     }
//     else if ( get_post_type( $post_id ) == 'conduct' ) {
//         $tour = get_the_title(get_field('tour', $post_id));
//         $date = get_field('conductDate', $post_id);
//         $data['ID'] = $post_id;
//         $data['post_title'] = $tour . ' - ' . $date;
//         $data['post_name']  = sanitize_title( $tour . ' - ' . $date );
//         wp_update_post( $data );
//     }

// }
// add_action( 'acf/save_post', 'save_post_handler' , 20 );

// /**
//  *	ACF Admin Columns
//  *
//  */
// function add_acf_columns ( $columns ) {
//    return array_merge( $columns, array (
//      'conductDate' => __ ( 'Durchführung' ),
//      'guide' => __ ( 'Bergführer' ),
//      'tour' => __ ( 'Tour' ),
//      'registrations' => __ ( 'Anmeldungen' ),
//    ) );
//  }
//  add_filter ( 'manage_conduct_posts_columns', 'add_acf_columns' );

//  /*
//  * Add columns to Conduct CPT
//  */
//  function conduct_custom_column ( $column, $post_id ) {
//    switch ( $column ) {
//      case 'conductDate':
//         echo get_field('conductDate', $post_id);
//         break;
//      case 'guide':
//         echo get_the_title(get_field('guide', $post_id));
//         break;
//      case 'tour':
//         echo get_the_title(get_field('tour', $post_id));
//         break;
//      case 'registrations':
//         $registrations = get_field('registrations', $post_id);
//         if(is_array($registrations)){
//           $registrations = is_array($registrations) ? array_sum(array_map(function($registration){
//             return $registration['people'];
//           }, $registrations)) : 0;
//         }
//         else{
//           $registrations = 0;
//         }
//         $maxRegistrations = get_field('maxRegistrations', $post_id);
//         echo $registrations . '/' . $maxRegistrations;
//         break;
//    }
// }
// add_action ( 'manage_conduct_posts_custom_column', 'conduct_custom_column', 10, 2 );

//  /*
//  * Add Sortable columns
//  */
// function my_column_register_sortable( $columns ) {
// 	$columns['conductDate'] = 'conductDate';
// 	$columns['guide'] = 'guide';
// 	$columns['tour'] = 'tour';
//   $columns['registrations'] = 'registrations';
// 	return $columns;
// }
// add_filter('manage_edit-conduct_sortable_columns', 'my_column_register_sortable' );

// /*
//  * Orderby acf date field
//  */
// function my_column_orderby( $query ) {
// 	if( ! is_admin() )
// 		return;

// 	$orderby = $query->get( 'orderby');

// 	if( $orderby == 'conductDate' ) {
// 		$query->set('meta_key','conductDate');
// 		$query->set('orderby','meta_value_num');
// 	}
// }
// add_action( 'pre_get_posts', 'my_column_orderby' );
