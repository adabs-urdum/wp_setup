<?php
// function init_cart()
// {
//   \wc()->frontend_includes();
//   \WC()->session = new \WC_Session_Handler();
//   \WC()->session->init();
//   \WC()->customer = new \WC_Customer(get_current_user_id(), true);

//   if (is_null(\WC()->cart)) {
//     \wc_load_cart();
//   }

//   \WC()->cart->get_cart();

//   if (is_user_logged_in() || is_admin())
//     return;
//   if (isset(WC()->session)) {
//     if (!WC()->session->has_session()) {
//       WC()->session->set_customer_session_cookie(true);
//     }
//   }
// }
