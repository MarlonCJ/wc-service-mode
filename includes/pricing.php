<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'woocommerce_get_price_html', function ( $price, $product ) {

    $service_category = get_option( 'wcsm_service_category', '' );

    if ( $product && $service_category && has_term( $service_category, 'product_cat', $product->get_id() ) ) {
        return get_option(
            'wcsm_price_text',
            'Desde $90 – valor sujeto a alcance del proyecto'
        );
    }

    return $price;
}, 10, 2 );
