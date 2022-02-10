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


class Magscan_Customizer
{

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
        $section = 'magscan_sobre';
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

        Kirki::add_field('magscan_test_link', [
            'type'     => 'link',
            'settings' => 'magscan_test_link',
            'label'    => esc_html__('Link do teste'),
            'description' => esc_html__('"Quero fazer o teste"'),
            'section'  => $section
        ]);

        /**
         * ------------------- Section ----------------
         */
        $section = 'magscan_home_and_exames';
        $wp_customize->add_section(
            $section,
            array(
                'title'    => 'Home e Exames',
                'priority' => 12,
                'panel'    => $panel,
            )
        );

        /**
         *  Exames por Imagem
         */
        $wp_customize->add_setting(
            'magscan_home_exames_imagem',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_home_exames_imagem', [
            'type'     => 'textarea',
            'settings' => 'magscan_home_exames_imagem',
            'label'    => esc_html__('Caixa Exames por Imagem'),
            'description'    => esc_html__('Insira os slugs das páginas separados por vírgula'),
            'section'  => $section
        ]);

        /**
         *  Exames Laboratoriais
         */
        $wp_customize->add_setting(
            'magscan_home_exames_laboratoriais',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_home_exames_laboratoriais', [
            'type'     => 'textarea',
            'settings' => 'magscan_home_exames_laboratoriais',
            'label'    => esc_html__('Caixa Exames Laboratoriais'),
            'description'    => esc_html__('Insira os slugs das páginas separados por vírgula'),
            'section'  => $section
        ]);

        Kirki::add_field(
            'title_exames',
            array(
                'type'      => 'custom',
                'settings'  => 'title_exames',
                'section'   => $section,
                'default'   => '<h3 class="customize-section-title">'
                    . __('Exames')
                    . '</h3>'
            )
        );

        /**
         *  Test link
         */
        $wp_customize->add_setting(
            'magscan_highlight_exame',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_highlight_exame', [
            'type'     => 'textarea',
            'settings' => 'magscan_highlight_exame',
            'label'    => esc_html__('Exame em destaque principal na página de Exames'),
            'description'    => esc_html__('Insira o slug'),
            'section'  => $section
        ]);

        /**
         *  Test link
         */
        $wp_customize->add_setting(
            'magscan_chosen_exames',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_chosen_exames', [
            'type'     => 'textarea',
            'settings' => 'magscan_chosen_exames',
            'label'    => esc_html__('Exames a exibir em destaque na página de Exames'),
            'description'    => esc_html__('Insira os slugs separados por vírgula'),
            'section'  => $section
        ]);



        Kirki::add_field(
            'title_home',
            array(
                'type'      => 'custom',
                'settings'  => 'title_home',
                'section'   => $section,
                'default'   => '<h3 class="customize-section-title">'
                    . 'Home'
                    . '</h3>'
            )
        );

        /**
         *  Home chosen exames
         */
        $wp_customize->add_setting(
            'magscan_home_chosen_exames',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_home_chosen_exames', [
            'type'     => 'textarea',
            'settings' => 'magscan_home_chosen_exames',
            'label'    => esc_html__('Exames a exibir em destaque na Home'),
            'description'    => esc_html__('Insira os slugs das páginas separados por vírgula'),
            'section'  => $section
        ]);

        /**
         * ------------------- Section ----------------
         */
        $section = 'magscan_cookies';
        $wp_customize->add_section(
            $section,
            array(
                'title'    => __('Cookies e Política de Privacidade'),
                'priority' => 15,
                'panel'    => $panel,
            )
        );

        /**
         *  Test link
         */
        $wp_customize->add_setting(
            'magscan_privacy_policy',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_privacy_policy', [
            'type'     => 'link',
            'settings' => 'magscan_privacy_policy',
            'label'    => esc_html__('Link para a página de Política de Privacidade'),
            'section'  => $section
        ]);


        /**
         * ------------------- Section ----------------
         */
        $section = 'magscan_links';
        $wp_customize->add_section(
            $section,
            array(
                'title'    => __('Links'),
                'priority' => 17,
                'panel'    => $panel,
            )
        );

        /**
         *  Facebook
         */
        $wp_customize->add_setting(
            'magscan_facebook',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_facebook', [
            'type'     => 'link',
            'settings' => 'magscan_facebook',
            'label'    => esc_html__('Link Facebook'),
            'section'  => $section
        ]);

        /**
         *  Instagram
         */
        $wp_customize->add_setting(
            'magscan_instagram',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_instagram', [
            'type'     => 'link',
            'settings' => 'magscan_instagram',
            'label'    => esc_html__('Link Instagram'),
            'section'  => $section
        ]);

        /**
         *  YouTube
         */
        $wp_customize->add_setting(
            'magscan_youtube',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_youtube', [
            'type'     => 'link',
            'settings' => 'magscan_youtube',
            'label'    => esc_html__('Link YouTube'),
            'section'  => $section
        ]);

        /**
         *  Agendar Consulta
         */
        $wp_customize->add_setting(
            'magscan_consulta',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_consulta', [
            'type'     => 'link',
            'settings' => 'magscan_consulta',
            'label'    => esc_html__('Link Agendar Consulta'),
            'section'  => $section
        ]);

        /**
         *  Resultados dos exames
         */
        $wp_customize->add_setting(
            'magscan_resultados',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('magscan_resultados', [
            'type'     => 'link',
            'settings' => 'magscan_resultados',
            'label'    => esc_html__('Link Resultados dos Exames'),
            'section'  => $section
        ]);


        /**
         * ------------------- Section ----------------
         */
        $section = 'magscan_unidades';
        $wp_customize->add_section(
            $section,
            array(
                'title'    => __('Unidades'),
                'priority' => 20,
                'panel'    => $panel,
            )
        );

        Kirki::add_field(
            'title_atlantic',
            array(
                'type'      => 'custom',
                'settings'  => 'title_atlantic',
                'section'   => $section,
                'default'   => '<h3 class="customize-section-title">'
                    . 'Atlantic Tower'
                    . '</h3>'
            )
        );

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'atlantic_name',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('atlantic_name', [
            'type'     => 'text',
            'settings' => 'atlantic_name',
            'label'    => esc_html__('Nome'),
            'section'  => $section
        ]);

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'atlantic_phone',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('atlantic_phone', [
            'type'     => 'text',
            'settings' => 'atlantic_phone',
            'label'    => esc_html__('Telefone'),
            'section'  => $section
        ]);

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'atlantic_address',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('atlantic_address', [
            'type'     => 'text',
            'settings' => 'atlantic_address',
            'label'    => esc_html__('Endereço'),
            'section'  => $section
        ]);

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'atlantic_images',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('atlantic_images', [
            'type'        => 'repeater',
            'section'     => $section,
            'settings'     => 'atlantic_images',
            'label'       => esc_html__('Galeria'),
            'row_label' => [
                'type'  => 'field',
                'value' => esc_html__('Imagem'),
                'field' => 'label',
            ],
            'button_label' => esc_html__('Adicionar nova'),
            'default'      => [],
            'fields' => [
                'image' => [
                    'type'        => 'image',
                    'label'       => esc_html__('Imagem'),
                ],
            ]
        ]);

        

        Kirki::add_field(
            'title_millenium',
            array(
                'type'      => 'custom',
                'settings'  => 'title_millenium',
                'section'   => $section,
                'default'   => '<h3 class="customize-section-title">'
                    . 'Millenium Shopping'
                    . '</h3>'
            )
        );

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'millenium_name',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('millenium_name', [
            'type'     => 'text',
            'settings' => 'millenium_name',
            'label'    => esc_html__('Nome'),
            'section'  => $section
        ]);

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'millenium_phone',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('millenium_phone', [
            'type'     => 'text',
            'settings' => 'millenium_phone',
            'label'    => esc_html__('Telefone'),
            'section'  => $section
        ]);

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'millenium_address',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('millenium_address', [
            'type'     => 'text',
            'settings' => 'millenium_address',
            'label'    => esc_html__('Endereço'),
            'section'  => $section
        ]);

        /**
         *  Field
         */
        $wp_customize->add_setting(
            'millenium_images',
            array(
                'default' => ''
            )
        );

        Kirki::add_field('millenium_images', [
            'type'        => 'repeater',
            'section'     => $section,
            'settings'     => 'millenium_images',
            'label'       => esc_html__('Galeria'),
            'row_label' => [
                'type'  => 'field',
                'value' => esc_html__('Imagem'),
                'field' => 'label',
            ],
            'button_label' => esc_html__('Adicionar nova'),
            'default'      => [],
            'fields' => [
                'image' => [
                    'type'        => 'image',
                    'label'       => esc_html__('Imagem'),
                    'choices'     => [
                        'save_as' => 'url',
                    ],
                ],
            ]
        ]);
    }
}

new Magscan_Customizer();
