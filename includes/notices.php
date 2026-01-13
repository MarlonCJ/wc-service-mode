<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'woocommerce_after_add_to_cart_button', function () {
    global $product;

    if ( ! get_option( 'wcsm_enable_notice', 1 ) ) return;

    $cat = get_option( 'wcsm_service_category', '' );

    if ( $product && $cat && has_term( $cat, 'product_cat', $product->get_id() ) ) {
        echo '<p class="wcsm-notice">'
             . wp_kses_post( get_option( 'wcsm_notice_text', '' ) )
             . '</p>';
    }
} );
