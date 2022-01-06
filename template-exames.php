<?php

/**
 * Template Name: Exames
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

$cpt_tax = 'tipo';

$exames = array(
    array(
        'title'     => 'Exames por Imagem',
        'posts'     => get_tax_posts_array('exame', $cpt_tax, 'exames-por-imagem'),
        'archive'   => get_term_link('exames-por-imagem', $cpt_tax)
    ),
    array(
        'title'     => 'Exames Laboratoriais',
        'posts'     => get_tax_posts_array('exame', $cpt_tax, 'exames-laboratoriais'),
        'archive'   => get_term_link('exames-laboratoriais', $cpt_tax)
    )
);

$convenios = array(
    get_posts_array('convenio', 9),
    get_posts_array('convenio', 9, 9),
    get_posts_array('convenio', 9, 18),
);

$exames1 = $exames[0];
$exames2 = $exames[1];


?>

<div class="template-exames">
    <div class="preparos">
        <div class="container">
            <div class="row">
                <div class="list col-12 col-lg-4">
                    <div class="explain">
                        <div class="title text-uppercase">
                            <h1 class="fs-4 fw-bold">Exames e Preparos</h1>
                        </div>
                        <div class="text mt-2">
                            Aqui você encontra informações sobre o exame que você deseja realizar.
                        </div>
                    </div>
                    <div class="exame">
                        <div class="heading">
                            <h2><?php echo $exames1['title'] ?></span>
                        </div>

                        <div class="links">
                            <?php foreach ($exames1['posts'] as $exame) : ?>
                                <a href="<?php echo get_the_permalink($exame->ID); ?>" class="link">
                                    <span class="icon bi-chevron-right"></span>
                                    <span class="text"><?php echo $exame->post_title; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="search col-12 col-lg-8">
                    <div class="inner">
                        <div class="outline">
                            <?php get_template_part('partials/searchform', null, array(
                                'post_type' => 'exame'
                            )); ?>
                        </div>


                    </div>
                    <div class="show-exame d-flex flex-column">
                        <?php

                        $exame = $exames1['posts'][0];
                        global $post;
                        $post = get_post($exame->ID, OBJECT);
                        setup_postdata($post);

                        ?>
                        <div class="inner ms-auto">
                            <div class="image">
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
                            <div class="content">
                                <div class="title">
                                    <h4 class="mb-0 fs-3"><?php the_title(); ?></h4>
                                </div>

                                <div class="mb-3 mt-2">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="action">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-info slim text-white">Saber mais</a>
                                </div>
                            </div>
                        </div>

                        <?php

                        wp_reset_postdata();
                        ?>

                        <div class="under"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    $exames_show = array($exames2['posts'][1], $exames1['posts'][0]);
    foreach ($exames_show as $i => $exame) {
        global $post;
        $post = get_post($exame->ID, OBJECT);
        setup_postdata($post);
    ?>
        <div class="template-exame exame-<?php echo ($i % 2 != 0) ? 'a' : 'b'; ?>">
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
                    <div class="image col-12 col-md-6 order-first order-md-<?php echo ($i % 2 != 0) ? 'last' : 'first'; ?>">
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
        wp_reset_postdata();
    }
    ?>

    <div class="laboratorio">
        <div class="container col-xl-9">
            <div class="d-flex flex-column flex-lg-row">
                <div class="list">
                    <div class="exame">
                        <div class="heading">
                            <h2><?php echo $exames2['title'] ?></h2>
                        </div>

                        <div class="links">
                            <?php foreach ($exames2['posts'] as $exame) : ?>
                                <a href="<?php echo get_the_permalink($exame->ID); ?>" class="link">
                                    <span class="icon bi-chevron-right"></span>
                                    <span class="text"><?php echo $exame->post_title; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="options">
                    <div class="image">
                        <img src="<?php echo THEME_IMG_URI . 'woman-working-laborator.png' ?>" alt="">
                    </div>
                    <div class="actions pt-3">
                        <div class="action-row row w-100 m-0 d-flex">
                            <span class="col col-lg-7 p-0 text m-auto ms-0">Acesse o resultado do seu exame</span>
                            <span class="col col-lg-5 p-0 action m-auto me-0 d-flex">
                                <a href="https://www.medcloud.co/?page=magscan" class="btn btn-primary ms-auto">Ver resultados</a>
                            </span>
                        </div>
                        <div class="action-row row w-100 m-0 d-flex">
                            <span class="col col-lg-7 p-0 text m-auto ms-0">Agende seu exame aqui</span>
                            <span class="col col-lg-5 p-0 action m-auto me-0 d-flex">
                                <a href="https://magscan.centraldemarcacao.com.br/" class="btn btn-primary ms-auto">Agendar exame</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <div class="row g-3 m-0 w-100 row-cols-3">
                                <?php
                                foreach ($convenios_item as $convenio) {

                                    $thumbnail = get_the_post_thumbnail($convenio);
                                    $permalink = get_the_permalink($convenio);
                                ?>
                                    <div class="col">
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
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselConvenios" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="action text-center pt-4 mt-2">
                <a href="<?php echo get_post_type_archive_link('convenio'); ?>" class="btn btn-info slim text-white">Ver Todos</a>
            </div>
        </div>
        <div class="underlay"></div>
    </div>

    <div class="fale-conosco">

        <div class="container ">
            <div class="row w-100 m-0 justify-content-center">
                <div class="more col-12 col-lg-5 d-flex">
                    <div class="m-auto">
                        <h3 class="title fw-bold text-uppercase">
                            Fale Conosco!
                        </h3>
                        <div class="text mt-3">
                            <p class="fs-5">
                                Para dúvidas, agendamentos, comentários e avaliações, entre em contato conosco.
                            </p>
                        </div>
                        <div class="banner mb-4">
                            <div class="text fs-5">
                                Você pode entrar em contato pelo nosso
                                <a class="tlink tlink-hover-decoration" href="https://api.whatsapp.com/send?phone=559299039910&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es" title="Entre em contato através do WhatsApp"><i class="fw-bold">WhatsApp</i></a>!
                            </div>

                            <div class="icon mt-3">
                                <a href="https://api.whatsapp.com/send?phone=559299039910&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es" target="_blank" title="Entre em contato através do WhatsApp">
                                    <span class="bi bi-whatsapp m-auto"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form col-12 col-lg-5">
                    <div class="form-content px-4">
                        <?php echo do_shortcode('[contact-form-7 id="2187" title="Formulário de Contato"]') ?>
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
            </div>
        </div>
    </div>


</div>

<?php

get_footer();
