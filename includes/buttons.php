<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'woocommerce_product_single_add_to_cart_text', function ( $text ) {
    global $product;
    $cat = get_option( 'wcsm_service_category', '' );

    if ( ! get_option( 'wcsm_enable_button', 1 ) ) return $text;

    if ( $product && $cat && has_term( $cat, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_button_text', 'Solicitar servicio' );
    }

    return $text;
} );

add_filter( 'woocommerce_product_add_to_cart_text', function ( $text, $product ) {
    $cat = get_option( 'wcsm_service_category', '' );

    if ( ! get_option( 'wcsm_enable_button', 1 ) ) return $text;

    if ( $product && $cat && has_term( $cat, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_button_text', 'Solicitar servicio' );
    }

    return $text;
}, 10, 2 );
