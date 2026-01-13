<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Botón de WhatsApp para servicios
 * --------------------------------------------------
 */
add_action( 'woocommerce_after_add_to_cart_button', function () {
    global $product;
    /** @var WC_Product $product */

    $service_category = get_option( 'wcsm_service_category', '' );
    $enabled          = get_option( 'wcsm_whatsapp_enabled', 0 );
    $number           = get_option( 'wcsm_whatsapp_number', '' );
    $message_template = get_option(
        'wcsm_whatsapp_message',
        'Hola, estoy interesado en el servicio: {service}'
    );

    if (
        ! $enabled ||
        ! $number ||
        ! $product ||
        ! $service_category ||
        ! has_term( $service_category, 'product_cat', $product->get_id() )
    ) {
        return;
    }

    $message = str_replace(
        '{service}',
        $product->get_name(),
        $message_template
    );

    $url = 'https://wa.me/' . esc_attr( $number ) . '?text=' . rawurlencode( $message );

    echo '<p style="margin-top:15px;">
        <a href="' . esc_url( $url ) . '" 
           class="button"
           target="_blank"
           style="background:#25D366;color:#fff;">
           Contactar por WhatsApp
        </a>
    </p>';
} );
