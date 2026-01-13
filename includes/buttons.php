<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'woocommerce_product_single_add_to_cart_text', function ( $text ) {
    global $product;
    /** @var WC_Product $product */

    $service_category = get_option( 'wcsm_service_category', '' );

    if ( $product && $service_category && has_term( $service_category, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_button_text', 'Solicitar servicio' );
    }

    return $text;
} );

add_filter( 'woocommerce_product_add_to_cart_text', function ( $text, $product ) {

    $service_category = get_option( 'wcsm_service_category', '' );

    if ( $product && $service_category && has_term( $service_category, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_button_text', 'Solicitar servicio' );
    }

    return $text;
}, 10, 2 );
