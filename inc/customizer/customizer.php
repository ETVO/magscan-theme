<?php
/**
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
        $section = 'magscan_options';
        $wp_customize->add_section(
            $section,
            array(
                'title'    => __('Sobre Nós'),
                'priority' => 10,
                'panel'    => $panel,
            )
        );

        /**
         *  Test link
         */
        $wp_customize->add_setting(
            'magscan_test_link',
            array(
                'default' => ''
            )
        );

        Kirki::add_field( 'magscan_test_link', [
            'type'     => 'link',
            'settings' => 'magscan_test_link',
            'label'    => esc_html__('Link do teste'),
            'description'    => esc_html__('"Quero fazer o teste"'),
            'section'  => $section
        ] );
        
    }
}

new Magscan_Customizer();