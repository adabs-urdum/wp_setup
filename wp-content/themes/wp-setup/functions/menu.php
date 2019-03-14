<?php

// Register menu
//----------------------------------------------------------
function register_menu() {
  register_nav_menu( 'menu_main', 'Hauptmenü' );
}
add_action( 'after_setup_theme', 'register_menu' );
//----------------------------------------------------------


function add_last_nav_item($items, $args) {
  if($args->theme_location == 'menu_main'):
    return
    '<li class="menu-item mobile_only">
    <label for="header__show_nav" class="header__show_nav_label header__mobile_close_button mobile_only">
      <span>Schliessen</span>
      <span class="header__burger">
        <span class="header__burger_bun header__burger_bun--top"></span>
        <span class="header__burger_bun header__burger_bun--bottom"></span>
      </span>
    </label>
    </li>'
    . $items;
  endif;

  return $items;
}
add_filter('wp_nav_menu_items','add_last_nav_item', 10, 2);

?>
