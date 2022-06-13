<?php

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page([
          'page_title' => __('Footer'),
          'menu_title' => __('Footer'),
          'menu_slug' => 'footer',
          'capability' => 'edit_posts',
          'position' => '',
          'icon_url' => '',
          'redirect' => false,
      'post_id' => 'footer'
        ]);

        // Add sub page.
        // $child = acf_add_options_sub_page([
        //   'page_title'  => __('Social Settings'),
        //   'menu_title'  => __('Social'),
        //   'parent_slug' => $parent['menu_slug'],
        // ]);
    }
}
