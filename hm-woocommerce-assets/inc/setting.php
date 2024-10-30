<?php

/**
 * Create the section for comingsoon setting
 **/



class Hmwcs_Settings_Tab {
    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_hm', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_hm', __CLASS__ . '::update_settings' );
    }
    
    
    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
    	
        $settings_tabs['settings_hm'] = __( 'Hm Woo commerce Coming Soon ', 'hm-woo' );
        return $settings_tabs;
    }
    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }
    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }
    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {
        $settings = array(
            'section_title' => array(
                'name'     => __( 'Hm woo commerce coming soon  options', 'hm-woo' ),
                'type'     => 'title',
                'id'       => 'wc_settings_hm_section_title'
            ),
            'hm_title' => array(
                'name' => __( 'Coming Soon text', 'hm-woo' ),
                'type' => 'text',
                'desc' => __( 'This is some helper text', 'hm-woo' ),
                'id'   => 'wc_settings_hm_title'
            ),
            'hm_enable_section' => array(
                'name' => __( 'Show Comingsoon text', 'hm-woo' ),
                'type' => 'checkbox',
                'id'   => 'hm_enable_coming_soon'
            ),
            'hm_hide_pricing_shop' => array(
                'name' => __( 'Price Hide on Shop Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( 'Price Hide on Shop Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_hide_pricing_shop'
            ),
            'hm_hide_pricing_single' => array(
                'name' => __( 'Price Hide on single Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( 'Price Hide on single Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_hide_pricing_single'
            ),
            'hm_hide_cart_button_shop' => array(
                'name' => __( '"Add to Cart" Button Hide on Shop Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( '"Add to Cart" Button Hide on Shop Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_hide_cart_button_shop'
            ),
            'hm_hide_cart_button_single' => array(
                'name' => __( '"Add to Cart" Button Hide on Single Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( '"Add to Cart" Button Hide on Single Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_hide_cart_button_single'
            ),
            'hm_display_date_shop' => array(
                'name' => __( 'display date shop Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( 'display date shop Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_display_date_shop'
            ),
            'hm_display_view_shop' => array(
                'name' => __( 'display view on shop Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( 'display view on shop Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_display_view_shop'
            ),
            'hm_display_date_single' => array(
                'name' => __( 'display date on Single Page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( 'display date on Single Page', 'hm-woo' ),
                'id'   => 'wc_settings_hm_display_date_single'
            ),

            'hm_display_auto_cart' => array(
                'name' => __( 'Auto add cart button on single page', 'hm-woo' ),
                'type' => 'checkbox',
                'desc' => __( 'display  automatic cart button after time end', 'hm-woo' ),
                'id'   => 'wc_settings_hm_display_autocart_single'
            ),
            
             'hm_Color_Set' => array(
                'name' => __( 'Color Set', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Comingsoon Text Color', 'hm-woo' ),
                'id'   => 'wc_settings_hm_Color_Set'
            ),
              'hm_theme_Set' => array(
                'name' => __( 'Theme Selection', 'hm-woo' ),
                'desc' => __( 'Theme Selection', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme_set',
                'type'     => 'select',
                'css'      => 'min-width:300px;',
                'default'  => 'cm',
                    'options'  => array(
                        'theme1'  => __( 'Theme 1 (Normal View)', 'hm-woo' ),
                        'theme2' => __( 'Theme 2(Circel View)', 'hm-woo' ),
                        'theme3' => __( 'Theme 3(Square View)', 'hm-woo' ),
                        'theme4' => __( 'Theme 4(Box View)', 'hm-woo' ),
                        'theme5' => __( 'Theme 5(Digital clock view)', 'hm-woo' ),
                        
                    ),
                    
            ),
              'hm_theme1_back_color' => array(
                'name' => __( 'Theme 1 Background Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 1 Background Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme1_color_set'
            ),

              'hm_theme1_font_color' => array(
                'name' => __( 'Theme 1 Font Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 1 Font Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme1_font_color'
            ),

            'hm_theme2_back_color' => array(
                'name' => __( 'Theme 2 Background Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 2 Background Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme2_back_color'
            ),
              'hm_theme2_day_color' => array(
                'name' => __( 'Theme 2 Day circle Active  Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 2 day circle active colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme2_day_color'
            ),
            'hm_theme2_hour_color' => array(
                'name' => __( 'Theme 2 Hour circle Active  Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 2 hour circle active colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme2_hour_color'
            ),
            'hm_theme2_minute_color' => array(
                'name' => __( 'Theme 2 Minute circle Active  Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 2 minute circle active colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme2_minute_color'
            ),
            'hm_theme2_second_color' => array(
                'name' => __( 'Theme 2 Second circle Active  Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 2 second circle active colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme2_second_color'
            ),
             'hm_theme2_font_color' => array(
                'name' => __( 'Theme 2 Font circle Active  Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Set Theme 2 font circle active colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme2_font_color'
            ),
            'hm_theme3_back_color' => array(
                'name' => __( 'Theme 3 Background Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 3 Background Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme3_back_color'
            ),
            'hm_theme3_border_color' => array(
                'name' => __( 'Theme 3 Border Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 3 border Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme3_border_color'
            ),
            'hm_theme3_font_color' => array(
                'name' => __( 'Theme 3 Font Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 3 font Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme3_font_color'
            ),

            'hm_theme4_back_color' => array(
                'name' => __( 'Theme 4 Background Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 4 Background Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme4_back_color'
            ),
           'hm_theme4_font_color' => array(
                'name' => __( 'Theme 4 Font Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 4 font Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme4_font_color'
            ),
            'hm_theme5_back_color' => array(
                'name' => __( 'Theme 5 Background Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 5 Background Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme5_back_color'
            ),
            'hm_theme5_border_color' => array(
                'name' => __( 'Theme 5 Border Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 5 border Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme5_border_color'
            ),
            'hm_theme5_font_color' => array(
                'name' => __( 'Theme 5 Font Colour', 'hm-woo' ),
                'type' => 'color',
                'desc' => __( 'Theme 5 font Colour', 'hm-woo' ),
                'id'   => 'wc_settings_hm_theme5_font_color'
            ),
         
                
            
            'section_end' => array(
                 'type' => 'sectionend',
                 'id' => 'wc_settings_hm_section_end'
            )
        );
        return apply_filters( 'hm_woo_wc_settings_hm_settings', $settings );
    }
}
Hmwcs_Settings_Tab::init();






