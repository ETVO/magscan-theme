<?php

/**
 * Template Name: Home
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

$exames1 = [
    'Tomografia computorizadas',
    'Ressonância Magnética',
    'Ultrassonografia',
    'Radiologia Digital',
    'Eletroencefalograma'
];

$exames2 = [
    'Hemograma',
    'Colesterol',
    'Glicemia de Jejum',
    'Eletrólitos',
    'Urocultura'
];

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
                <div class="exame col">
                    <div class="heading">
                        <span>Exames por Imagem</span>
                    </div>

                    <div class="links">
                        <?php foreach ($exames1 as $exame) : ?>
                            <a href="#" class="link">
                                <span class="icon bi-chevron-right"></span>
                                <span class="text"><?php echo $exame; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="action d-flex">
                        <a href="#" class="btn btn-primary m-auto">Ver todos os exames</a>
                    </div>

                </div>
                <div class="exame col">
                    <div class="heading">
                        <span>Exames Laboratoriais</span>
                    </div>

                    <div class="links">
                        <?php foreach ($exames2 as $exame) : ?>
                            <a href="#" class="link">
                                <span class="icon bi-chevron-right"></span>
                                <span class="text"><?php echo $exame; ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="action d-flex">
                        <a href="#" class="btn btn-primary m-auto">Ver todos os exames</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="exame exame-a">
        <div class="container">
            <div class="d-flex">
                <div class="content me-auto my-auto col-6">
                    <div class="title">
                        <h4>Ressonância Magnética</h4>
                    </div>

                    <div class="my-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>

                    <div class="action">
                        <a href="#" class="btn btn-info slim text-white">Saber mais</a>
                    </div>
                </div>
                <div class="image ms-auto">
                    <img src="<?php echo THEME_IMG_URI . 'ressonancia-magnetica.png'; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="underlay">

        </div>
    </div>
    <div class="exame exame-b">
        <div class="container">
            <div class="d-flex">
                <div class="image ms-auto">
                    <img src="<?php echo THEME_IMG_URI . 'ressonancia-magnetica.png'; ?>" alt="">
                </div>
                <div class="content me-auto my-auto col-6">
                    <div class="title">
                        <h4>Ressonância Magnética</h4>
                    </div>

                    <div class="my-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>

                    <div class="action">
                        <a href="#" class="btn btn-info slim text-white">Saber mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="underlay">

        </div>
    </div>

    <div class="exame exame-a">
        <div class="container">
            <div class="d-flex">
                <div class="content me-auto my-auto col-6">
                    <div class="title">
                        <h4>Ressonância Magnética</h4>
                    </div>

                    <div class="my-3">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                    </div>

                    <div class="action">
                        <a href="#" class="btn btn-info slim text-white">Saber mais</a>
                    </div>
                </div>
                <div class="image ms-auto">
                    <img src="<?php echo THEME_IMG_URI . 'ressonancia-magnetica.png'; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="underlay">

        </div>
    </div>

    <div class="unidades mt-5">
        <div class="container col-xl-8 d-flex flex-column">
            <div class="title text-uppercase m-auto">
                <h4 class="mb-0">Unidades</h4>
            </div>
            <div class="row w-100 m-0">
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
                            <div class="carousel-item">
                                <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item active">
                                <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="m-auto text-center px-2 py-3">
                        <h5 class="mb-0 text-uppercase">Millennium Shopping</h5>
                        <div class="mt-2">
                            (92) 4009-6001
                            <br/> Av. Djalma Batista, 1661, loja 243, Manaus-AM
                        </div>
                    </div>

                </div>
                <div class="d-flex mt-4">
                    <div class="m-auto">
                        <a href="" class="btn btn-info slim text-white">Ver Todos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
