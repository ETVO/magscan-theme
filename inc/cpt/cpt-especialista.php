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

class CPT_Especialista {
    protected $slug;

    /**
     * Construct class
     * 
     * @since 1.0
     */
    public function __construct(string $slug = 'especialista')
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
            'name'                          => __('Corpo Clínico'),
            'singular_name'                 => __('Especialista'),
            'menu_name'                     => __('Corpo Clínico'),
            'name_admin_bar'                => __('Especialista'),
            'add_new'                       => __('Adicionar Novo'),
            'add_new_item'                  => __('Adicionar novo especialista'),
            'new_item'                      => __('Novo especialista'),
            'edit_item'                     => __('Editar especialista'),
            'view_item'                     => __('Ver especialista'),
            'view_items'                    => __('Ver especialistas'),
            'all_items'                     => __('Todos os especialistas'),
            'search_items'                  => __('Pesquisar especialista'),
            'parent_items'                  => __('Especialistas superiores'),
            'parent_item_colon'             => __('Especialistas superiores:'),
            'not_found'                     => __('Nenhum especialista encontrado'),
            'not_found_in_trash'            => __('Nenhum especialista encontrado na lixeira'),
            'featured_image'                => __('Imagem em destaque'),
            'set_featured_image'            => __('Definir imagem em destaque'),
            'remove_featured_image'         => __('Remover imagem em destaque'),
            'use_featured_image'            => __('Usar como imagem em destaque'),
            'archives'                      => __('Arquivo de especialistas'),
            'insert_into_item'              => __('Inserir em especialista'),
            'uploaded_to_this_item'         => __('Carregado neste especialista'),
            'filter_items_list'             => __('Filtrar especialistas'),
            'items_list_navigation'         => __('Navegação por especialistas'),
            'items_list'                    => __('Lista de especialistas'),
            'items_published'               => __('Especialista publicado'),
            'items_published_protectedly'   => __('Especialista publicado em privado'),
            'item_reverted_to_draft'        => __('Especialista revertido a rascunho'),
            'item_updated'                  => __('Especialista atualizado'),
        );

        $supports = array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions',
            'page-attributes'
        );

        $args = array(
            'label'                 => __('Corpo Clínico'),
            'labels'                => $labels,
            'description'           => __('Especialistas Magscan'),
            'public'                => true,
            'show_in_rest'          => true,
            'hierarchical'          => false,
            'menu_position'         => 31,
            'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
          </svg>'),
            'capability_type'       => 'post',
            'supports'              => $supports,
            'has_archive'           => true,
            'rewrite'               => array('slug' => 'corpo-clinico', 'with_front' => false),
            'taxonomies'            => array('category')
        );

        return $args;
    }
}

new CPT_Especialista();