<?php
/**
 * Plugin Name: WC Service Mode
 * Description: Convierte WooCommerce en un sistema optimizado para servicios profesionales.
 * Version: 1.1.0
 * Author: Tu Nombre
 * License: GPL v2 or later
 * Text Domain: wc-service-mode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Verificar dependencia WooCommerce
 * --------------------------------------------------
 */
add_action( 'plugins_loaded', function () {

    if ( ! class_exists( 'WooCommerce' ) ) {
        add_action( 'admin_notices', function () {
            echo '<div class="notice notice-error"><p><strong>WC Service Mode</strong> requiere WooCommerce activo.</p></div>';
        } );
        return;
    }

} );

/**
 * --------------------------------------------------
 * Cargar módulos
 * --------------------------------------------------
 */
require_once __DIR__ . '/includes/admin-settings.php';
require_once __DIR__ . '/includes/buttons.php';
require_once __DIR__ . '/includes/pricing.php';
require_once __DIR__ . '/includes/notices.php';
