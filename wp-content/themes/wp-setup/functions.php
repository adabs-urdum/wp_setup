<?php

// Remove admin bar
//----------------------------------------------------------
add_filter('show_admin_bar', '__return_false');

// Remove useless meta tags from wp head
//----------------------------------------------------------
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

// Admin color
//----------------------------------------------------------
function custom_admin_color_scheme() {
  remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
  wp_admin_css_color( 'cluscolor', 'CLUS Color', get_template_directory_uri() . '/admin-color.css');
  add_filter( 'get_user_option_admin_color', function() {
		return 'cluscolor';
	});
}
add_action( 'admin_init', 'custom_admin_color_scheme' );

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

// Remove dashboard widgets
//----------------------------------------------------------
remove_action('welcome_panel', 'wp_welcome_panel');
function remove_dashboard_meta() {
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('admin_init', 'remove_dashboard_meta');

// Register scripts & styles
//----------------------------------------------------------
function my_theme_styles() {
  wp_enqueue_style('styles', get_template_directory_uri() . '/dist/css/styles.min.css', false, '0.01');
}
add_action( 'wp_enqueue_scripts', 'my_theme_styles' );

function my_theme_scripts() {
  wp_dequeue_script('jquery');
  wp_dequeue_script('jquery-core');
  wp_dequeue_script('jquery-migrate');
  wp_enqueue_script('jquery', false, array(), null, true);
  wp_enqueue_script('jquery-core', false, array(), null, true);
  wp_enqueue_script('jquery-migrate', false, array(), null, true);
  wp_enqueue_script('functions', get_template_directory_uri() . '/dist/js/functions.min.js', array( 'jquery' ), '0.01', true);
  wp_localize_script('functions', 'ajaxObject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),));
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

function override_acf_styles() {
  wp_enqueue_style('styles', get_template_directory_uri() . '/acf-admin-styles.css', false, '1');
}

add_action( 'admin_enqueue_scripts', 'override_acf_styles', 100 );

// Styles-dropdown for TinyMCE-editor
//----------------------------------------------------------
function my_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}

add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {
  $style_formats = array(
    array(
      'title' => 'Button',
      'selector' => 'a',
      'classes' => 'button'
    )
  );

  $init_array['style_formats'] = json_encode( $style_formats );
  return $init_array;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// Register title tag
//----------------------------------------------------------
add_theme_support('title-tag');

// Allow SVG Files
//----------------------------------------------------------
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Register menu
//----------------------------------------------------------
function register_menu() {
  register_nav_menu( 'menu_main', 'Hauptmenü' );
}
add_action( 'after_setup_theme', 'register_menu' );

//Remove the content editor from ALL pages
//----------------------------------------------------------
function remove_content_editor(){
  remove_post_type_support('page', 'editor');
}
add_action('admin_head', 'remove_content_editor');


// Disable support for comments and trackbacks in post types
//----------------------------------------------------------
function clus_disable_comments_post_types_support() {
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if(post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}
add_action('admin_init', 'clus_disable_comments_post_types_support');

// Close comments on the front-end
//----------------------------------------------------------
function clus_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'clus_disable_comments_status', 20, 2);
add_filter('pings_open', 'clus_disable_comments_status', 20, 2);

// Hide existing comments
//----------------------------------------------------------
function clus_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'clus_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
//----------------------------------------------------------
function clus_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'clus_disable_comments_admin_menu');

// Redirect any user trying to access comments page
//----------------------------------------------------------
function clus_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'clus_disable_comments_admin_menu_redirect');

// Remove comments links from admin bar
//----------------------------------------------------------
function clus_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'clus_admin_bar_render');

//Disable the emoji's
//----------------------------------------------------------
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

// Filter function used to remove the tinymce emoji plugin.
//----------------------------------------------------------
function disable_emojis_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

// Remove emoji CDN hostname from DNS prefetching hints.
//----------------------------------------------------------
function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
  if ('dns-prefetch' == $relation_type) {
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
    $urls = array_diff($urls, array($emoji_svg_url));
  }
  return $urls;
}

?>
