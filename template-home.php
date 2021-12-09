<?php

/**
 * Template Name: Home
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

$archive_link = get_post_type_archive_link('exame');

$categorias = array(
    array(
        'title'     => 'Exames por Imagem',
        'posts'     => get_tax_posts_array('exame', 'categoria', 'exames-por-imagem'),
        'archive'   => get_term_link('exames-por-imagem', 'categoria')
    ),
    array(
        'title'     => 'Exames Laboratoriais',
        'posts'     => get_tax_posts_array('exame', 'categoria', 'exames-laboratoriais'),
        'archive'   => get_term_link('exames-laboratoriais', 'categoria')
    )
);

?>

<div class="template-home">
    <div class="home-cta">
        <img class="bg-img" src="<?php echo THEME_IMG_URI . 'bg-home-cta.png'; ?>" alt="">
        <div class="container col-xl-8">
            <div class="d-flex cta">
                <div class="col-6 me-auto">
                    <h2 class="title text-uppercase">Melhores profissionais de saúde</h2>

                    <div class="my-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.
                    </div>

                    <a href="/contato/" class="btn btn-primary slim">Saber mais</a>

                </div>
            </div>

            <div class="exames mt-5 row">
                <?php foreach ($categorias as $categoria): ?>
                    <div class="exame col">
                        <div class="heading">
                            <span><?php echo $categoria['title']; ?></span>
                        </div>
    
                        <div class="links">
                            <?php foreach ($categoria['posts'] as $exame) : ?>
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

                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php 
    $args = array(
        'post_type'         => 'exame',
        'status'            => 'publish',
        'orderby'           => array( 'menu_order' => 'ASC' , 'date' => 'DESC' ),
        'posts_per_page'    => 3 
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $i = -1;
        while($query->have_posts()) {
            $query->the_post();
            $i++;
            
            ?>
            <div class="exame exame-<?php echo ($i % 2 == 0) ? 'a' : 'b'; ?>">
                <div class="container">
                    <div class="d-flex">
                        <div class="content me-auto my-auto col-6">
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
                        <div class="image ms-auto order-<?php echo ($i % 2 == 0) ? 'last' : 'first'; ?>">
                            <?php the_post_thumbnail(); ?>
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


    <div class="unidades mt-5">
        <div class="container col-xl-8 d-flex flex-column">
            <div class="title text-uppercase m-auto">
                <h3 class="mb-0">Unidades</h3>
            </div>
            <div class="row w-100 m-0">
                <div class="col">
                    <div id="carouselAtlantic" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselAtlantic" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselAtlantic" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item active">
                                <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="m-auto text-center px-2 py-3">
                        <h5 class="mb-0 text-uppercase">Atlantic Tower</h5>
                        <div class="mt-2">
                            (92) 4009-6001
                            <br />1719, Térreo, sala 2A, Manaus-AM
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div id="carouselMillenium" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselMillenium" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselMillenium" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="">
                            </div>
                        </div>
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
                        <a href="" class="btn btn-info slim text-white fw-bold">Agendar Exames</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
