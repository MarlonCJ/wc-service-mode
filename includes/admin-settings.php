<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * --------------------------------------------------
 * Registro de opciones
 * --------------------------------------------------
 */
add_action( 'admin_init', function () {

    register_setting( 'wcsm_settings_group', 'wcsm_button_text' );
    register_setting( 'wcsm_settings_group', 'wcsm_price_text' );
    register_setting( 'wcsm_settings_group', 'wcsm_notice_text' );

});

/**
 * --------------------------------------------------
 * Menú en el admin
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

});

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
            do_settings_sections( 'wcsm_settings_group' );
            ?>

            <table class="form-table">
                <tr>
                    <th scope="row">Texto del botón</th>
                    <td>
                        <input type="text"
                               name="wcsm_button_text"
                               value="<?php echo esc_attr( get_option( 'wcsm_button_text', 'Solicitar servicio' ) ); ?>"
                               class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row">Texto del precio</th>
                    <td>
                        <input type="text"
                               name="wcsm_price_text"
                               value="<?php echo esc_attr( get_option( 'wcsm_price_text', 'Desde $90 – valor sujeto a alcance del proyecto' ) ); ?>"
                               class="regular-text">
                    </td>
                </tr>

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
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
