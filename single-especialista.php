<?php

/**
 * Single especialista template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

$nome_completo = get_field('nome_completo');
$credenciais = get_field('credenciais');
$especialidade = get_field('especialidade');

?>
<div class="template-single-especialista pb-4">
    <div class="container col-xl-8">
        <div class="title text-center text-primary text-uppercase">
            <h1 class="fs-3"><?php echo $nome_completo; ?></h1>
        </div>
        <div class="row m-0 w-100 mt-3">
            <div class="col">
                <div class="image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="action d-grid mt-3">
                    <a href="" class="btn btn-primary fw-bold">
                        <small>Agendar Consulta</small>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="dados fw-bold mb-4">
                    <div class="credenciais">
                        <?php echo $credenciais; ?>
                    </div>
                    <div class="especialidade">
                        <?php echo $especialidade; ?>
                    </div>
                </div>

                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="related mt-5">
        <div class="container">
            <div class="title text-center">
                <h5>Fique por dentro dos nossos conteúdos exclusivos!</h5>
            </div>
            <?php
            $args = array(
                'post_type'         => 'post',
                'status'            => 'publish',
                'orderby'           => array('menu_order' => 'ASC', 'date' => 'DESC'),
                'posts_per_page'    => 4
            );
            query_posts($args);

            get_template_part('partials/components/feed');

            wp_reset_query();
            ?>
            <div class="action d-flex">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-info mx-auto text-uppercase text-white slim">
                    <small>Ver Todos</small>
                </a>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
