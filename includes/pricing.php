<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Precio orientativo para servicios
 * --------------------------------------------------
 */
add_filter( 'woocommerce_get_price_html', function ( $price, $product ) {

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        return 'Desde $90 – valor sujeto a alcance del proyecto';
    }

    return $price;
}, 10, 2 );
