<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'woocommerce_get_price_html', function ( $price, $product ) {

    if ( ! get_option( 'wcsm_enable_price', 1 ) ) return $price;

    $cat = get_option( 'wcsm_service_category', '' );

    if ( $product && $cat && has_term( $cat, 'product_cat', $product->get_id() ) ) {
        return get_option( 'wcsm_price_text', 'Desde $90 – valor sujeto a alcance del proyecto' );
    }

    return $price;
}, 10, 2 );
