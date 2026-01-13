<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Registrar opciones
 * --------------------------------------------------
 */
add_action( 'admin_init', function () {

    register_setting( 'wcsm_settings_group', 'wcsm_service_category' );
    register_setting( 'wcsm_settings_group', 'wcsm_button_text' );
    register_setting( 'wcsm_settings_group', 'wcsm_price_text' );
    register_setting( 'wcsm_settings_group', 'wcsm_notice_text' );
    register_setting( 'wcsm_settings_group', 'wcsm_whatsapp_enabled' );
    register_setting( 'wcsm_settings_group', 'wcsm_whatsapp_number' );
    register_setting( 'wcsm_settings_group', 'wcsm_whatsapp_message' );


} );

/**
 * --------------------------------------------------
 * Menú en WooCommerce
 * --------------------------------------------------
 */
add_action( 'admin_menu', function () {

    add_submenu_page(
        'woocommerce',
        'WC Service Mode',
        'WC Service Mode',
        'manage_options',
        'wc-service-mode',
        'wcsm_render_settings_page'
    );

} );

/**
 * --------------------------------------------------
 * Render del panel
 * --------------------------------------------------
 */
function wcsm_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>WC Service Mode</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields( 'wcsm_settings_group' );
            ?>

            <table class="form-table">

                <!-- Categoría -->
                <tr>
                    <th scope="row">Categoría de servicios</th>
                    <td>
                        <?php
                        $selected_category = get_option( 'wcsm_service_category', '' );
                        $categories = get_terms( array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => false,
                        ) );
                        ?>
                        <select name="wcsm_service_category">
                            <option value="">— Seleccionar categoría —</option>
                            <?php foreach ( $categories as $category ) : ?>
                                <option value="<?php echo esc_attr( $category->slug ); ?>"
                                    <?php selected( $selected_category, $category->slug ); ?>>
                                    <?php echo esc_html( $category->name ); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description">Esta categoría será tratada como servicios.</p>
                    </td>
                </tr>

                <!-- Botón -->
                <tr>
                    <th scope="row">Texto del botón</th>
                    <td>
                        <input type="text"
                               name="wcsm_button_text"
                               value="<?php echo esc_attr( get_option( 'wcsm_button_text', 'Solicitar servicio' ) ); ?>"
                               class="regular-text">
                    </td>
                </tr>

                <!-- Precio -->
                <tr>
                    <th scope="row">Texto del precio</th>
                    <td>
                        <input type="text"
                               name="wcsm_price_text"
                               value="<?php echo esc_attr( get_option( 'wcsm_price_text', 'Desde $90 – valor sujeto a alcance del proyecto' ) ); ?>"
                               class="regular-text">
                    </td>
                </tr>

                <!-- Aviso -->
                <tr>
                    <th scope="row">Mensaje informativo</th>
                    <td>
                        <textarea name="wcsm_notice_text"
                                  rows="4"
                                  class="large-text"><?php
                            echo esc_textarea(
                                get_option(
                                    'wcsm_notice_text',
                                    'Este servicio se gestiona bajo modalidad de solicitud profesional. No se realiza ningún pago en línea en esta etapa.'
                                )
                            );
                        ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Activar WhatsApp</th>
                    <td>
                        <input type="checkbox" name="wcsm_whatsapp_enabled" value="1"
                            <?php checked( get_option( 'wcsm_whatsapp_enabled' ), 1 ); ?>>
                        <label>Mostrar botón de WhatsApp en servicios</label>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Número de WhatsApp</th>
                    <td>
                        <input type="text"
                            name="wcsm_whatsapp_number"
                            value="<?php echo esc_attr( get_option( 'wcsm_whatsapp_number', '' ) ); ?>"
                            class="regular-text">
                        <p class="description">Ejemplo: 573001234567 (sin + ni espacios)</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Mensaje de WhatsApp</th>
                    <td>
                        <textarea name="wcsm_whatsapp_message"
                                rows="3"
                                class="large-text"><?php
                            echo esc_textarea(
                                get_option(
                                    'wcsm_whatsapp_message',
                                    'Hola, estoy interesado en el servicio: {service}'
                                )
                            );
                        ?></textarea>
                        <p class="description">Usa <code>{service}</code> para insertar el nombre del servicio.</p>
                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
