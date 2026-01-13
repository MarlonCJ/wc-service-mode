<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'woocommerce_after_add_to_cart_button', function () {
    global $product;

    if ( ! get_option( 'wcsm_enable_whatsapp', 1 ) ) return;

    $cat = get_option( 'wcsm_service_category', '' );
    $number = get_option( 'wcsm_whatsapp_number', '' );

    if ( ! $number || ! $product || ! $cat || ! has_term( $cat, 'product_cat', $product->get_id() ) ) return;

    $msg = str_replace(
        '{service}',
        $product->get_name(),
        get_option( 'wcsm_whatsapp_message', '' )
    );

    $url = 'https://wa.me/' . esc_attr( $number ) . '?text=' . rawurlencode( $msg );

    echo '<p><a href="' . esc_url( $url ) . '" class="button" target="_blank" style="background:#25D366;color:#fff;">Contactar por WhatsApp</a></p>';
} );
