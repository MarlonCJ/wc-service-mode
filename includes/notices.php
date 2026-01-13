<?php
/**
 * --------------------------------------------------
 * Avisos informativos para servicios
 * Archivo: includes/notices.php
 * --------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Mensaje informativo debajo del botón de acción
 * --------------------------------------------------
 */
add_action( 'woocommerce_after_add_to_cart_button', function () {
    global $product;
    /** @var WC_Product $product */

    if ( $product && has_term( WCSM_SERVICE_CATEGORY, 'product_cat', $product->get_id() ) ) {

        $notice_text = get_option(
            'wcsm_notice_text',
            'Este servicio se gestiona bajo modalidad de solicitud profesional. No se realiza ningún pago en línea en esta etapa.'
        );

        echo '<p class="wcsm-notice" style="margin-top:10px;font-size:14px;">'
             . wp_kses_post( $notice_text )
             . '</p>';
    }
} );
