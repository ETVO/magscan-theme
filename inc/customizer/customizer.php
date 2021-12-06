<?php
/**
 * TO-DO
 * Customizer controls and options
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
    
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Magscan_Customizer {

    /**
     * Construct class functions and constants
     * 
     * @since 1.0
     */
    public function __construct()
    {

        // Register all the customizer options and sections 
        add_action('customize_register', array($this, 'register_options'));
    }

    /**
     * Register all customizer options
     * 
     * @since 1.0
     */
    public function register_options($wp_customize)
    {

        /**
         * Panel
         */
        $panel = 'magscan_panel';
        $wp_customize->add_panel(
            $panel,
            array(
                'title'    => __('Opções Magscan'),
                'priority' => 10,
            )
        );
        

        /**
         * ------------------- Section ----------------
         */
        $section = 'magscan_contact';
        $wp_customize->add_section(
            $section,
            array(
                'title'    => __('Contatos'),
                'priority' => 10,
                'panel'    => $panel,
            )
        );

        /**
         *  WhatsApp No.
         */
        $wp_customize->add_setting(
            'magscan_whatsapp',
            array(
                'default' => ''
            )
        );
       
        Kirki::add_field( 
            'title_whatsapp',
            array(
                'type'      => 'custom',
                'settings'  => 'title_whatsapp',
                'section'   => $section,
                'default'   => '<h3 class="customize-section-title">' 
                    . __('WhatsApp') 
                    . '</h3>'
            )
        );
        
    }
}

new Magscan_Customizer();