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

    register_setting( 'wcsm_settings_group', 'wcsm_enable_button' );
    register_setting( 'wcsm_settings_group', 'wcsm_enable_price' );
    register_setting( 'wcsm_settings_group', 'wcsm_enable_notice' );
    register_setting( 'wcsm_settings_group', 'wcsm_enable_whatsapp' );

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
            <?php settings_fields( 'wcsm_settings_group' ); ?>

            <table class="form-table">

                <!-- MÓDULOS -->
                <tr>
                    <th scope="row">Módulos activos</th>
                    <td>
                        <label><input type="checkbox" name="wcsm_enable_button" value="1" <?php checked( get_option( 'wcsm_enable_button', 1 ), 1 ); ?>> Botón</label><br>
                        <label><input type="checkbox" name="wcsm_enable_price" value="1" <?php checked( get_option( 'wcsm_enable_price', 1 ), 1 ); ?>> Precio</label><br>
                        <label><input type="checkbox" name="wcsm_enable_notice" value="1" <?php checked( get_option( 'wcsm_enable_notice', 1 ), 1 ); ?>> Aviso</label><br>
                        <label><input type="checkbox" name="wcsm_enable_whatsapp" value="1" <?php checked( get_option( 'wcsm_enable_whatsapp', 1 ), 1 ); ?>> WhatsApp</label>
                    </td>
                </tr>

                <!-- CATEGORÍA -->
                <tr>
                    <th scope="row">Categoría de servicios</th>
                    <td>
                        <?php
                        $selected = get_option( 'wcsm_service_category', '' );
                        $cats = get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => false ] );
                        ?>
                        <select name="wcsm_service_category">
                            <option value="">— Seleccionar —</option>
                            <?php foreach ( $cats as $cat ) : ?>
                                <option value="<?php echo esc_attr( $cat->slug ); ?>" <?php selected( $selected, $cat->slug ); ?>>
                                    <?php echo esc_html( $cat->name ); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <!-- TEXTOS -->
                <tr>
                    <th>Texto botón</th>
                    <td><input type="text" name="wcsm_button_text" value="<?php echo esc_attr( get_option( 'wcsm_button_text', 'Solicitar servicio' ) ); ?>" class="regular-text"></td>
                </tr>

                <tr>
                    <th>Texto precio</th>
                    <td><input type="text" name="wcsm_price_text" value="<?php echo esc_attr( get_option( 'wcsm_price_text', 'Desde $90 – valor sujeto a alcance del proyecto' ) ); ?>" class="regular-text"></td>
                </tr>

                <tr>
                    <th>Mensaje aviso</th>
                    <td><textarea name="wcsm_notice_text" rows="3" class="large-text"><?php echo esc_textarea( get_option( 'wcsm_notice_text', 'Este servicio se gestiona bajo modalidad de solicitud profesional.' ) ); ?></textarea></td>
                </tr>

                <!-- WHATSAPP -->
                <tr>
                    <th>Número WhatsApp</th>
                    <td><input type="text" name="wcsm_whatsapp_number" value="<?php echo esc_attr( get_option( 'wcsm_whatsapp_number', '' ) ); ?>" class="regular-text"></td>
                </tr>

                <tr>
                    <th>Mensaje WhatsApp</th>
                    <td><textarea name="wcsm_whatsapp_message" rows="2" class="large-text"><?php echo esc_textarea( get_option( 'wcsm_whatsapp_message', 'Hola, estoy interesado en el servicio: {service}' ) ); ?></textarea></td>
                </tr>

            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
