<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Aviso informativo debajo del botón
 * --------------------------------------------------
 */
add_action( 'woocommerce_after_add_to_cart_button', function () {
    global $product;
    /** @var WC_Product $product */

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {
        echo '<p class="wcsm-notice" style="margin-top:10px;font-size:14px;">
            Este servicio se gestiona bajo modalidad de <strong>solicitud profesional</strong>.
            No se realiza ningún pago en línea en esta etapa.
        </p>';
    }
} );
