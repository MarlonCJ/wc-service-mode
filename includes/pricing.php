<?php
/**
 * --------------------------------------------------
 * Precios personalizados para servicios
 * Archivo: includes/pricing.php
 * --------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Precio orientativo para productos tipo servicio
 * --------------------------------------------------
 */
add_filter( 'woocommerce_get_price_html', function ( $price, $product ) {

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        return get_option(
            'wcsm_price_text',
            'Desde $90 – valor sujeto a alcance del proyecto'
        );
    }

    return $price;
}, 10, 2 );
