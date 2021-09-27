<?php

// Register menu
//----------------------------------------------------------
function register_menu() {
  register_nav_menu( 'menu_main', 'Hauptmenü' );
}
add_action( 'after_setup_theme', 'register_menu' );
//----------------------------------------------------------

// Breadcrumbs
//----------------------------------------------------------
function get_breadcrumb() {
    $levels = [get_the_title(url_to_postid(get_option('home')))];

    if (!is_front_page()) {

        // if (is_category() || is_single() ){
        //     the_category('title_li=');
        // } elseif (is_archive() || is_single()){
        //     if ( is_day() ) {
        //         printf( __( '%s', 'text_domain' ), get_the_date() );
        //     } elseif ( is_month() ) {
        //         printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
        //     } elseif ( is_year() ) {
        //         printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
        //     } else {
        //         _e( 'Blog Archives', 'text_domain' );
        //     }
        // }

        if (is_single()) {
            the_title();
            $levels[] = get_the_title();
        }

        if (is_page()) {
            if(wp_get_post_parent_id(get_the_id())){
              $levels[] = get_the_title(wp_get_post_parent_id(get_the_id()));
            }
            $levels[] = get_the_title();
        }

        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                $levels[] = get_the_title();
                rewind_posts();
            }
        }

      return $levels;
    }
}
