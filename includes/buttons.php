<?php
/**
 * --------------------------------------------------
 * Botones personalizados para servicios
 * Archivo: includes/buttons.php
 * --------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Botón en página individual del producto
 * --------------------------------------------------
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', function ( $text ) {
    global $product;
    /** @var WC_Product $product */

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_button_text', 'Solicitar servicio' );
    }

    return $text;
} );

/**
 * --------------------------------------------------
 * Botón en listados (tienda, categorías, relacionados)
 * --------------------------------------------------
 */
add_filter( 'woocommerce_product_add_to_cart_text', function ( $text, $product ) {

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_button_text', 'Solicitar servicio' );
    }

    return $text;
}, 10, 2 );
