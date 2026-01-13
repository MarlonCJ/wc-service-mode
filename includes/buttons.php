<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Botón "Solicitar servicio" (página individual)
 * --------------------------------------------------
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', function ( $text ) {
    global $product;
    /** @var WC_Product $product */

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        return 'Solicitar servicio';
    }

    return $text;
} );

/**
 * --------------------------------------------------
 * Botón "Solicitar servicio" (listados)
 * --------------------------------------------------
 */
add_filter( 'woocommerce_product_add_to_cart_text', function ( $text, $product ) {

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        return 'Solicitar servicio';
    }

    return $text;
}, 10, 2 );
