<?php
/**
 * Register Exames Custom Post Type
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
    
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class CPT_Exame {
    protected $slug;

    /**
     * Construct class
     * 
     * @since 1.0
     */
    public function __construct(string $slug = 'exame')
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
        
        $this->register_tipo_for_cpt();
    }

    /**
     * Register taxonomy for custom post type
     *
     * @return void
     */
    public function register_tipo_for_cpt()
    {
        $taxonomy_slug = 'tipo';
        $post_type = $this->get_slug();

        $labels = array(
            'name'                          => __('Tipos'),
            'singular_name'                 => __('Tipo'),
        );

        register_taxonomy(
            $taxonomy_slug,
            $post_type,
            array(
                'labels'                => $labels,
                'description'           => __('Tipos de exames'),
                'public'                => true,
                'hierarchical'          => true,
                'show_in_rest'          => true,
                'show_admin_column'     => true,
                'has_archive'           => true,
                'rewrite'               => array('slug' => $post_type . 's/'. $taxonomy_slug. 's', 'with_front' => false),
                'sort'                  => true
            )
        );
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
            'name'                          => __('Exames'),
            'singular_name'                 => __('Exame'),
            'menu_name'                     => __('Exames'),
            'name_admin_bar'                => __('Exame'),
            'add_new'                       => __('Adicionar Novo'),
            'add_new_item'                  => __('Adicionar novo exames'),
            'new_item'                      => __('Novo exame'),
            'edit_item'                     => __('Editar exame'),
            'view_item'                     => __('Ver exame'),
            'view_items'                    => __('Ver exames'),
            'all_items'                     => __('Todos os exames'),
            'search_items'                  => __('Pesquisar exame'),
            'parent_items'                  => __('Exames superiores'),
            'parent_item_colon'             => __('Exames superiores:'),
            'not_found'                     => __('Nenhum exame encontrado'),
            'not_found_in_trash'            => __('Nenhum exame encontrado na lixeira'),
            'featured_image'                => __('Imagem em destaque'),
            'set_featured_image'            => __('Definir imagem em destaque'),
            'remove_featured_image'         => __('Remover imagem em destaque'),
            'use_featured_image'            => __('Usar como imagem em destaque'),
            'archives'                      => __('Arquivo de exames'),
            'insert_into_item'              => __('Inserir em exame'),
            'uploaded_to_this_item'         => __('Carregado neste exame'),
            'filter_items_list'             => __('Filtrar exames'),
            'items_list_navigation'         => __('Navegação por exames'),
            'items_list'                    => __('Lista de exames'),
            'items_published'               => __('Exame publicado'),
            'items_published_protectedly'   => __('Exame publicado em privado'),
            'item_reverted_to_draft'        => __('Exame revertido a rascunho'),
            'item_updated'                  => __('Exame atualizado'),
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
            'label'                 => __('Exames'),
            'labels'                => $labels,
            'description'           => __('Exames Magscan'),
            'public'                => true,
            'show_in_rest'          => true,
            'hierarchical'          => false,
            'menu_position'         => 31,
            'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
          </svg>'),
            'capability_type'       => 'post',
            'supports'              => $supports,
            'has_archive'           => true,
            'rewrite'               => array('slug' => $slug, 'with_front' => false),
            'taxonomies'            => array('category')
        );

        return $args;
    }
}

new CPT_Exame();