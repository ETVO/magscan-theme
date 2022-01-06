<?php

/**
 * Template Name: Home
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

$cpt_tax = 'tipo';

$categorias = array(
    array(
        'title'     => 'Exames por Imagem',
        'posts'     => get_tax_posts_array('exame', $cpt_tax, 'exames-por-imagem', 3),
        'archive'   => get_term_link('exames-por-imagem', $cpt_tax)
    ),
    array(
        'title'     => 'Exames Laboratoriais',
        'posts'     => get_tax_posts_array('exame', $cpt_tax, 'exames-laboratoriais', 3),
        'archive'   => get_term_link('exames-laboratoriais', $cpt_tax)
    )
);

$convenios = array(
    get_posts_array('convenio', 9),
    get_posts_array('convenio', 9, 9),
    get_posts_array('convenio', 9, 18),
);

?>

<div class="template-home">
    <div class="home-cta">
        <img class="bg-img" src="<?php echo THEME_IMG_URI . 'bg-home-cta.png'; ?>" alt="">
        <div class="container col-xl-8">
            <div class="d-flex cta">
                <div class="px-2 px-sm-4 px-md-0 col col-md-8 col-lg-6 me-auto">
                    <h1 class="fs-2 title text-uppercase">Melhores profissionais de saúde</h1>

                    <div class="my-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.
                    </div>

                    <a href="/contato/" class="btn btn-primary slim">Saber mais</a>

                </div>
            </div>

            <div class="exames mt-3 mt-md-5 row g-5 w-100 mx-0">
                <?php foreach ($categorias as $categoria) : ?>
                    <div class="col col-12 col-md-6">
                        <div class="exame">
                            <div class="heading">
                                <h2><?php echo $categoria['title']; ?></h2>
                            </div>

                            <div class="links">
                                <?php foreach ($categoria['posts'] as $i => $exame) : ?>
                                    <a href="<?php echo get_the_permalink($exame->ID); ?>" class="link">
                                        <span class="icon bi-chevron-right"></span>
                                        <span class="text"><?php echo $exame->post_title; ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                            <div class="action d-flex">
                                <a href="<?php echo $categoria['archive']; ?>" class="btn btn-primary m-auto">Ver todos os exames</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php
    $args = array(
        'post_type'         => 'exame',
        'status'            => 'publish',
        'orderby'           => array('menu_order' => 'ASC', 'date' => 'DESC'),
        'posts_per_page'    => 3
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $i = -1;
        while ($query->have_posts()) {
            $query->the_post();
            $i++;

    ?>
            <div class="template-exame exame-<?php echo ($i % 2 == 0) ? 'a' : 'b'; ?>">
                <div class="container">
                    <div class="row g-4">
                        <div class="content col-12 col-md-6 d-flex">
                            <div class="my-auto">
                                <div class="title">
                                    <h4><?php the_title(); ?></h4>
                                </div>

                                <div class="my-3">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="action">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-info slim text-white">Saber mais</a>
                                </div>
                            </div>
                        </div>

                        <div class="image col-12 col-md-6 order-first order-md-<?php echo ($i % 2 == 0) ? 'last' : 'first'; ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                ?>
                                    <img src="<?php echo THEME_IMG_URI . 'default-exame.png' ?>" alt="<?php echo the_title(); ?>">
                                <?php
                                } ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="underlay">

                </div>
            </div>
    <?php
        }
        wp_reset_postdata();
    }

    ?>

    <div class="convenios pt-5 pb-4">
        <div class="container col-xl-8">
            <div class="title mb-4 text-uppercase text-center text-dark">
                <h3>Convênios</h3>
            </div>
            <div id="carouselConvenios" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($convenios as $i => $convenios_item) {
                    ?>

                        <div class="carousel-item <?php if ($i == 0) echo 'active' ?>">
                            <div class="row g-3 m-0 w-100 row-cols-2 row-cols-md-3">
                                <?php
                                foreach ($convenios_item as $col_i => $convenio) {

                                    $thumbnail = get_the_post_thumbnail($convenio);
                                ?>
                                    <div class="col <?php if($col_i == 8) echo ' d-none d-md-block'; ?>">
                                        <?php if (has_post_thumbnail($convenio)) {
                                            echo $thumbnail;
                                        } else {
                                        ?>
                                            <img src="<?php echo THEME_IMG_URI . 'default-convenio.png' ?>" alt="<?php echo the_title(); ?>">
                                        <?php
                                        } ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselConvenios" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselConvenios" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
            <div class="action text-center pt-4 mt-2">
                <a href="<?php echo get_post_type_archive_link('convenio'); ?>" class="btn btn-info slim text-white">Ver Todos</a>
            </div>
        </div>
        <div class="underlay"></div>
    </div>

    <div class="unidades">
        <div class="container col-xl-8 d-flex flex-column">
            <div class="title text-uppercase m-auto">
                <h3 class="mb-0">Unidades</h3>
            </div>
            <div class="row w-100 m-0 g-5 justify-content-center">
                <div class="col-12 col-md-6 col-lg-5">
                    <div id="carouselUnidadeAtlantic" class="carousel-unidades unidade-fade-left carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselUnidadeAtlantic" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselUnidadeAtlantic" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselUnidadeAtlantic" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselUnidadeAtlantic" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>

                    <div class="m-auto text-center px-2 py-3">
                        <h5 class="mb-0 text-uppercase">Atlantic Tower</h5>
                        <div class="mt-2">
                            (92) 4009-6001
                            <br />1719, Térreo, sala 2A, Manaus-AM
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-1"></div>
                <div class="col-12 col-md-6 col-lg-5">

                    <div id="carouselUnidadeMillenium" class="carousel-unidades carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselUnidadeMillenium" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselUnidadeMillenium" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselUnidadeMillenium" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselUnidadeMillenium" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>

                    <div class="m-auto text-center px-2 py-3">
                        <h5 class="mb-0 text-uppercase">Millennium Shopping</h5>
                        <div class="mt-2">
                            (92) 4009-6001
                            <br /> Av. Djalma Batista, 1661, loja 243, Manaus-AM
                        </div>
                    </div>

                </div>
                <div class="d-flex mt-4">
                    <div class="m-auto">
                        <a href="https://magscan.centraldemarcacao.com.br/" class="btn btn-info slim text-white fw-bold">
                            Agendar Exames
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
