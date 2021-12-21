<?php

/**
 * Template Name: Convênios
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

?>
<div class="template-convenio">
    <div class="container">
        <div class="row m-0 w-100">
            <div class="col-12 col-md-6 explain">
                <div class="title text-uppercase text-primary">
                    <h1 class="fs-4 fw-bold">Convênios</h1>
                </div>
                <div class="text mt-4">
                    Seja por convênio ou particular, conte com a estrutura e atenção especializada que você merece.
                </div>
            </div>
            <div class="d-none d-md-block col-2"></div>
            <div class="col-12 col-md-4 search-wrap d-flex">
                <div class="mt-3 mt-md-auto w-100">
                    <div class="outline">
                        <?php get_template_part('partials/searchform', null, array(
                            'post_type' => 'convenio'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="feed-wrap w-100 pb-4">

            <div class="convenio-feed mt-3 g-3 row m-0 w-100 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                <?php
                $args = array(
                    'post_type'         => 'convenio',
                    'status'            => 'publish',
                    'orderby'           => array('menu_order' => 'ASC', 'date' => 'DESC'),
                    'posts_per_page'    => 30,
                    'paged'             => max(1, get_query_var('paged')),
                    's'                 => get_search_query()
                );
                $query = new WP_Query($args);

                global $wp_query;

                $wp_query = $query;

                if (have_posts()) {
                    while (have_posts()) :
                        the_post();
                        $post = get_post();
                        setup_postdata($post);

                        $permalink = esc_url(get_the_permalink());

                        $title = get_the_title();

                ?>

                        <div class="convenio col">
                            <div class="image">
                                <a href="<?php echo $permalink; ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else {
                                    ?>
                                        <img src="<?php echo THEME_IMG_URI . 'default-convenio.png' ?>" alt="<?php echo the_title(); ?>">
                                    <?php
                                    } ?>
                                </a>
                            </div>
                            <div class="title pt-2 text-center">
                                <a class="tlink tlink-hover-primary" href="<?php echo $permalink; ?>">
                                    <h6><?php echo $title; ?></h6>
                                </a>
                            </div>
                        </div>

                    <?php

                    endwhile;
                } else {
                    ?>
                    <div class="w-100 py-3">
                        <h6 class="m-auto text-center fw-light">Nenhum convênio foi encontrado.</h6>
                    </div>
                <?php
                }
                ?>
                <div class="mt-3 w-100">
                    <?php get_template_part('partials/components/pagination'); ?>
                </div>
            </div>

        </div>
    </div>

    <div class="seja-parceiro mt-4">

        <div class="container ">
            <div class="d-flex mb-3">
                <div class="m-auto text-white text-center">
                    <h4 class="title fw-bold text-uppercase">
                        Seja um Parceiro da Magscan
                    </h4>
                    <div class="text mt-3">
                        <p>
                            Parcerias estratégicas qualificam a rede de apoio aos clientes e pacientes que buscam por mais saúde.
                            <br>Essa é uma das nossas missões. Seja nosso parceiro!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row w-100 m-0 justify-content-center">
                <div class="form col-12 col-md-8 col-lg-5">
                    <div class="form-content px-4">
                        <?php echo do_shortcode('[contact-form-7 id="2278" title="Seja Um Parceiro"]') ?>
                    </div>
                    <?php if (false) : ?>
                        <div class="form-content px-4">
                            <div class="form-group mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <div class="icon-control">
                                    <input type="text" class="form-control" name="nome" id="nome">
                                    <span class="icon d-flex">
                                        <div class="icon-inner m-auto">
                                            <div class="bi-person"></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <div class="icon-control">
                                    <input type="email" class="form-control" name="email" id="email">
                                    <span class="icon d-flex">
                                        <div class="icon-inner m-auto">
                                            <div class="bi-envelope"></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="telefone" class="form-label">Telefone</label>

                                <div class="icon-control">
                                    <input type="text" class="form-control" name="telefone" id="telefone">
                                    <span class="icon d-flex">
                                        <div class="icon-inner m-auto">
                                            <div class="bi-telephone-fill"></div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mensagem" class="form-label">Mensagem</label>
                                <textarea class="form-control" name="mensagem" id="mensagem"></textarea>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-primary text-uppercase slim mx-auto" type="submit">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="image col-12 col-lg-5 d-none d-xl-flex">
                    <img src="<?php echo THEME_IMG_URI . 'seja-parceiro.png'; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


<?php

get_footer();
