<?php

/**
 * Template Name: Sobre Nós
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

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

<div class="template-sobre">

    <div class="present">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="title text-uppercase text-primary">
                        <h1 class="fs-3 fw-bold">A Magscan</h1>
                    </div>

                    <div class="text mt-3">
                        "Acreditamos no poder da Medicina para oferecer mais saúde para você/sua família/os manauaras"
                    </div>
                </div>
                <div class="image col-12 col-lg-8">
                    <img src="<?php echo THEME_IMG_URI . 'present.svg'; ?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="sobre">
        <div class="container">
            <div class="row w-100 m-0">
                <div class="normal col col-12 col-lg-6 text-dark">
                    <div class="text">
                        <p>Imagine que bom poder confiar em uma clínica em Manaus que tem como compromisso acreditar no poder da Medicina, especialmente no campo da Medicina Diagnóstica</p>

                        <p>– Ela existe!</p>

                        <p>Em 14 de junho de 1999, a Clínica Magscan foi fundada com empenho e a missão de oferecer um novo conceito na realização de exames de diagnóstico por imagens com confiança e qualidade.</p>

                        <p>Desde então, a trajetória da Clínica Magscan tem reforçado esse compromisso a cada passo dado com a classe médica e a população, oferecendo o que há de mais moderno em serviços, estrutura e equipamentos.</p>

                        <p><b>Nossa missão é objetiva</b></p>

                        <p>Proporcionar uma experiência acolhedora a quem busca cuidar da saúde.</p>
                    </div>
                </div>

                <div class="accent col col-12 col-lg-6">
                    <div class="text">
                        <h4>Unidade</h4>

                        <p>Sempre prezando pela qualidade de seus exames e atendimento, a demanda aumentou e a Clínica cresceu. Em 2005, inaugurou sua unidade localizada no Shopping Millennium.</p>

                        <p>Oferecendo os mais diversos exames em Manaus, a Clínica Magscan é uma referência no segmento pela constante capacitação do seu corpo clínico, treinamento humanizado dos seus colaboradores e acompanhamento criterioso do desenvolvimento tecnológico, qualitativo e de excelência no atendimento de todos os clientes.</p>

                        <p>Hoje, a Magscan é uma das empresas de saúde mais conceituadas do Norte do Brasil. Em 2019, ampliou seu portfólio de serviços, indo além dos exames de imagem e inaugurando em seu laboratório de análises clínicas.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="values">
        <div class="container">
            <div class="row m-0 w-100 g-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="value">
                        <div class="inner">
                            <div class="title">
                                <h4>Uma visão do futuro</h4>
                            </div>
                            <div class="text">
                                Ser reconhecida como uma empresa de excelência na área de Medicina Diagnóstica na cidade de Manaus e no Brasil, com o compromisso de aprimoramento contínuo.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="value">
                        <div class="inner">
                            <div class="title">
                                <h4>Valores inestimáveis</h4>
                            </div>
                            <div class="text">
                                Ética | Confiança | Responsabilidade | Comprometimento | Servir com amor | Buscar continuamente qualidade e excelência | Ser humano | lembrar que somos e lidamos com pessoas
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="value">
                        <div class="inner">
                            <div class="title">
                                <h5><span class="fw-normal">Acesse o nosso teste</span><br>“Quais exames você precisa fazer anualmente?”</h4>
                            </div>
                            <div class="text">
                                <a href="<?php echo get_theme_mod('magscan_test_link') ?>" class="btn btn-info text-white text-uppercase fw-bold">
                                    Quero fazer o teste
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="corpo-clinico">
        <div class="container col-xl-8">
            <div class="title text-center text-uppercase">
                <h3>Corpo Clínico</h3>
            </div>
            <div class="row w-100 m-0 g-5 mt-4">
                <?php
                $args = array(
                    'post_type'         => 'especialista',
                    'status'            => 'publish',
                    'orderby'           => array('menu_order' => 'ASC', 'date' => 'DESC'),
                    'posts_per_page'    => 3
                );

                query_posts($args);
                if (have_posts()) {
                    while (have_posts()) :
                        the_post();
                        $post = get_post();

                        $permalink = esc_url(get_the_permalink());

                        $title = get_the_title();
                        $especialidade = get_field('especialidade');

                ?>

                        <div class="col-12 col-md-4 especialista text-center">
                            <div class="image">
                                <a href="<?php echo $permalink; ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else {
                                    ?>
                                        <img src="<?php echo THEME_IMG_URI . 'default-especialista.png' ?>" alt="<?php echo the_title(); ?>">
                                    <?php
                                    } ?>
                                </a>
                            </div>
                            <div class="title text-center text-uppercase">
                                <h4 class="fw-bold">
                                    <a class="tlink tlink-hover-decoration" href="<?php echo $permalink; ?>">
                                        <?php echo $title; ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="especialidade">
                                <?php echo $especialidade; ?>
                            </div>
                        </div>

                <?php
                    endwhile;
                }
                ?>
                <div class="action text-uppercase d-flex mt-4">
                    <a href="<?php echo get_post_type_archive_link('especialista'); ?>" class="mx-auto btn btn-info slim text-white">
                        <small>Ver Todos</small>
                    </a>
                </div>
            </div>
        </div>
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
                        <a href="<?php echo get_theme_mod('magscan_consulta'); ?>" class="btn btn-info slim text-white fw-bold">Agendar Exames</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
