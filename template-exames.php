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
                            <h1 class="fs-5 fw-bold">Exames e Preparos</h1>
                        </div>
                        <div class="text mt-2">
                            Aqui você encontra informações sobre o exame que você deseja realizar.
                        </div>
                    </div>
                    <div class="exame">
                        <div class="heading">
                            <span><?php echo $exames1['title'] ?></span>
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
                                <?php the_post_thumbnail(); ?>
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
                        <?php the_post_thumbnail(); ?>
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
            <div class="d-flex">
                <div class="list">
                    <div class="exame">
                        <div class="heading">
                            <span><?php echo $exames2['title'] ?></span>
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
                                <a href="https://magscan.centraldemarcacao.com.br/" class="btn btn-primary ms-auto">Ver resultados</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fale-conosco">

        <div class="container ">
            <div class="row w-100 m-0 justify-content-center">
                <div class="more col-5 d-flex">
                    <div class="m-auto">
                        <h4 class="title fw-bold text-uppercase">
                            Fale Conosco!
                        </h4>
                        <div class="text mt-3">
                            <p>
                                Para dúvidas, agendamentos, comentários e avaliações, entre em contato conosco.
                            </p>
                        </div>
                        <div class="banner mb-4">
                            <div class="text">
                                Você pode entrar em contato pelo nosso <i class="fw-bold">WhatsApp</i>!
                            </div>

                            <div class="icon mt-3">
                                <a href="#" title="Entre em contato através do WhatsApp">
                                    <span class="bi bi-whatsapp m-auto"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form col-5">
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
                </div>
            </div>
        </div>
    </div>


</div>

<?php

get_footer();
