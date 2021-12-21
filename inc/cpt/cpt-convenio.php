<?php
/**
 * Register Especialistas Custom Post Type
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
    
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class CPT_Convenio {
    protected $slug;

    /**
     * Construct class
     * 
     * @since 1.0
     */
    public function __construct(string $slug = 'convenio')
    {
        $this->set_slug($slug);

        $this->register_cpt();
    }

    /**
     * Register custom post type
     *
     * @since 1.0
     */
    public function register_cpt()
    {

        $slug = $this->get_slug();
        $args = $this->get_args();

        register_post_type($slug, $args);
    }

    /**
     * Set slug of custom post type
     *
     * @param string $slug
     * @since 1.0
     */
    protected function set_slug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug of custom post type
     *
     * @return string
     * @since 1.0
     */
    public function get_slug(): string
    {
        return $this->slug;
    }

    /**
     * Get custom post type *transform* array of arguments
     *
     * @return array
     * @since 1.0
     */
    public function get_args(): array
    {
        $slug = $this->get_slug();

        $labels = array(
            'name'                          => __('Convênios'),
            'singular_name'                 => __('Convênio'),
            'menu_name'                     => __('Convênios'),
            'name_admin_bar'                => __('Convênio'),
            'add_new'                       => __('Adicionar Novo'),
            'add_new_item'                  => __('Adicionar novo convênio'),
            'new_item'                      => __('Novo convênio'),
            'edit_item'                     => __('Editar convênio'),
            'view_item'                     => __('Ver convênio'),
            'view_items'                    => __('Ver convênios'),
            'all_items'                     => __('Todos os convênios'),
            'search_items'                  => __('Pesquisar convênio'),
            'parent_items'                  => __('Convênios superiores'),
            'parent_item_colon'             => __('Convênios superiores:'),
            'not_found'                     => __('Nenhum convênio encontrado'),
            'not_found_in_trash'            => __('Nenhum convênio encontrado na lixeira'),
            'featured_image'                => __('Imagem em destaque'),
            'set_featured_image'            => __('Definir imagem em destaque'),
            'remove_featured_image'         => __('Remover imagem em destaque'),
            'use_featured_image'            => __('Usar como imagem em destaque'),
            'archives'                      => __('Arquivo de convênios'),
            'insert_into_item'              => __('Inserir em convênio'),
            'uploaded_to_this_item'         => __('Carregado neste convênio'),
            'filter_items_list'             => __('Filtrar convênios'),
            'items_list_navigation'         => __('Navegação por convênios'),
            'items_list'                    => __('Lista de convênios'),
            'items_published'               => __('Convênio publicado'),
            'items_published_protectedly'   => __('Convênio publicado em privado'),
            'item_reverted_to_draft'        => __('Convênio revertido a rascunho'),
            'item_updated'                  => __('Convênio atualizado'),
        );

        $supports = array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions',
            // 'page-attributes'
        );

        $args = array(
            'label'                 => __('Convênios'),
            'labels'                => $labels,
            'description'           => __('Convênios Magscan'),
            'public'                => true,
            // 'show_in_rest'          => true,
            'hierarchical'          => false,
            'menu_position'         => 33,
            'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
          </svg>'),
            'capability_type'       => 'post',
            'supports'              => $supports,
            'has_archive'           => true,
            'taxonomies'            => array('category')
        );

        return $args;
    }
}

new CPT_Convenio();