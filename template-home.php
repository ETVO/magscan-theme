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
        'posts'     => get_posts_by_names(['exame', 'page'], explode(',', get_theme_mod('magscan_home_exames_imagem')), 5),
        'archive'   => get_term_link('exames-por-imagem', $cpt_tax)
    ),
    array(
        'title'     => 'Exames Laboratoriais',
        'posts'     => get_posts_by_names(['exame', 'page'], explode(',', get_theme_mod('magscan_home_exames_laboratoriais')), 5),
        'archive'   => get_term_link('exames-laboratoriais', $cpt_tax)
    )
);

$convenios = array(
    get_posts_array('convenio', 9),
    get_posts_array('convenio', 9, 9),
    get_posts_array('convenio', 9, 18),
);

$unidades = array(
    'atlantic' => array(
        'name' => get_theme_mod('atlantic_name'),
        'phone' => get_theme_mod('atlantic_phone'),
        'address' => get_theme_mod('atlantic_address'),
        'images' => get_theme_mod('atlantic_images'),
    ),
    'millenium' => array(
        'name' => get_theme_mod('millenium_name'),
        'phone' => get_theme_mod('millenium_phone'),
        'address' => get_theme_mod('millenium_address'),
        'images' => get_theme_mod('millenium_images'),
    ),
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

    $chosen_exames = explode(',', get_theme_mod('magscan_home_chosen_exames'));
    $chosen_exames = array_map(function ($value) {
        return trim($value);
    }, $chosen_exames);

    $args = array(
        'post_type'         => ['page', 'exame'],
        'status'            => 'publish',
        'orderby'           => array('menu_order' => 'ASC', 'date' => 'ASC'),
        'posts_per_page'    => 3,
        'post_name__in'     => $chosen_exames,
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
                                    <div class="col <?php if ($col_i == 8) echo ' d-none d-md-flex'; ?>">
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
            <div class="row w-100 m-0 gx-5 gy-3 justify-content-center">

                <?php $i = 0;
                foreach ($unidades as $key => $unidade) :
                    $id = 'carousel' . $key;
                ?>
                    <div class="col-12 col-md-6 col-lg-5">
                        <div id="<?php echo $id; ?>" class="carousel-unidades <?php if ($i % 2 == 0) echo 'unidade-fade-left'; ?> carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
                            <div class="carousel-indicators">
                                <?php foreach ($unidade['images'] as $j => $image) : ?>
                                    <button type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide-to="<?php echo $j; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $j + 1; ?>"></button>
                                <?php endforeach; ?>
                            </div>
                            <div class="carousel-inner">

                                <?php foreach ($unidade['images'] as $j => $image):
                                    $url = wp_get_attachment_image_src($image['image'], 'large')[0];
                                ?>

                                    <div class="carousel-item <?php if ($j == 0) echo 'active'; ?>">
                                        <img src="<?php echo $url; ?>" class="d-block w-100">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Próximo</span>
                            </button>
                        </div>


                        <div class="m-auto text-center px-2 py-3">
                            <h5 class="mb-0 text-uppercase"><?php echo $unidade['name']; ?></h5>
                            <div class="mt-2">
                                <?php echo $unidade['phone']; ?>
                                <br /><?php echo $unidade['address']; ?>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>

                <div class="d-flex mt-4">
                    <div class="m-auto">
                        <a href="<?php echo get_theme_mod('magscan_consulta'); ?>" class="btn btn-info slim text-white fw-bold">
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
