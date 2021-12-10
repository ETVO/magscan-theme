<?php

/**
 * Especialista archive template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

$post_type = get_post_type_object(get_post_type());
$title = '';

if (is_tax() || is_category()) {
    $title = single_term_title('', false);
}

?>
<div class="template-archive-especialista">
    <div class="container">
        <div class="row">
            <div class="col-6 explain">
                <div class="title text-uppercase text-primary">
                    <h1 class="fs-4 fw-bold">Corpo Clínico</h1>
                </div>
                <div class="text mt-4">
                    Cuidado individualizado e humanizado. Conheça os profissionais que atuam na Clínica Magscan.
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-4 search-wrap d-flex">
                <div class="mt-auto w-100">
                    <div class="outline">
                        <?php get_template_part('partials/searchform', null, array(
                            'post_type' => 'especialista'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feed-wrap pt-5">
        <div class="underlay"></div>
        <div class="especialistas">
            <div class="inner">
                <div class="container">
                    <div class="row mx-0 w-100 g-4 row-cols-4">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) :
                                the_post();
                                $post = get_post();

                                $permalink = esc_url(get_the_permalink());

                                $title = get_the_title();
                                $nome_completo = get_field('nome_completo');
                                $credenciais = get_field('credenciais');
                                $especialidade = get_field('especialidade');

                        ?>

                                <div class="col especialista">
                                    <div class="image">
                                        <a href="<?php echo $permalink; ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                    <div class="title text-center text-uppercase">
                                        <h4 class="fw-bold">
                                            <a class="tlink tlink-hover-decoration" href="<?php echo $permalink; ?>">
                                                <?php echo $title; ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="dados">
                                        <div class="credenciais">
                                            <?php echo $credenciais; ?>
                                        </div>
                                        <div class="especialidade">
                                            <?php echo $especialidade; ?>
                                        </div>
                                    </div>
                                </div>

                        <?php

                            endwhile;
                        } else {
                            ?>
                                <div class="w-100">
                                    <h5 class="m-auto text-center">Nenhum especialista foi encontrado.</h5>
                                </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
