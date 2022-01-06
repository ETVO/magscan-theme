<?php

/**
 * Template Name: Contato
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

?>

<div class="template-contato">
    <div class="title-heading">
        <div class="container col-xl-8 d-flex">
            <div class="m-auto text-center">
                <div class="title text-uppercase">
                    <h1 class="fs-3 fw-bold text-primary">Fale Conosco!</h1>
                </div>
                <div class="text mt-2 text-dark">
                    Para dúvidas, agendamentos, comentários e avaliações, entre em contato conosco.
                </div>
            </div>
        </div>
    </div>

    <div class="contato">
        <div class="container ">
            <div class="row w-100 m-0 justify-content-center">
                <div class="form col-lg-5">
                    <div class="banner d-flex mb-4">
                        <div class="icon ms-auto my-auto me-4">
                            <a href="https://api.whatsapp.com/send?phone=559299039910&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es" target="_blank" title="Entre em contato através do WhatsApp">
                                <span class="bi bi-whatsapp m-auto"></span>
                            </a>
                        </div>
                        <div class="text me-auto my-auto">
                            <div class="fs-5">Você pode entrar em contato pelo nosso
                                <a class="tlink tlink-hover-decoration" href="https://api.whatsapp.com/send?phone=559299039910&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es" title="Entre em contato através do WhatsApp"><i class="fw-bold">WhatsApp</i></a>!
                            </div>
                        </div>
                    </div>
                    <div class="form-content px-4">
                        <?php echo do_shortcode('[contact-form-7 id="2187" title="Formulário de Contato"]') ?>
                    </div>
                </div>
                <div class="more col-lg-5 d-flex">
                    <div class="m-auto">
                        <h5 class="title fw-bold">
                            Precisa de mais informações sobre os nossos serviços ou deseja marcar a sua consulta?
                        </h5>
                        <div class="text mt-3">
                            <p>
                                Central de Laudos
                                <br>(92) 4009-6011
                            </p>

                            <p>
                                Comercial
                                <br>(92) 4009-6001
                                <br><a href="mailto:contato@magscan.com.br" class="tlink tlink-hover-decoration">contato@magscan.com.br</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="unidades-cards">
        <div class="container">
            <div class="title text-center">
                <h3 class="fw-bold text-dark">UNIDADES</h3>
            </div>
            <div class="unidade row">
                <div class="image col-lg-4 my-auto">
                    <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="">
                </div>
                <div class="content col-lg-5 my-auto">
                    <h4>MILLENIUM SHOPPING</h4>
                    <div class="mt-3">
                        (92) 4009-6001
                        <br>1719, Térreo, sala 2A, Manaus-AM
                    </div>
                </div>
                <div class="map col-lg-3 my-auto">
                    <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Rua 1719, Térreo, sala 2A, Manaus-AM&t=m&mrt=yp&z=15&output=embed&iwloc=addr&msa=0">
                    </iframe>
                </div>
            </div>
            <div class="unidade row">
                <div class="image col-12 col-lg-4 my-auto">
                    <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="">
                </div>
                <div class="content col-lg-5 my-auto">
                    <h4>ATLANTIC TOWER</h4>
                    <div class="mt-3">
                        (92) 4009-6001
                        <br>Av. Djalma Batista, 1661, loja 243, Manaus-AM
                    </div>
                </div>
                <div class="map col-lg-3 my-auto">
                    <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Av. Djalma Batista, 1661, loja 243, Manaus-AM&t=m&mrt=yp&z=15&output=embed&iwloc=addr&msa=0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="boxes">
        <div class="container col-xl-8">
            <div class="row g-3">
                <div class="box col-12 col-md">
                    <div class="inner">
                        <div class="title text-dark">
                            <h4>PERGUNTAS FREQUENTES</h4>
                        </div>
                        <div class="mt-3">
                            Resultados de exames
                            <br>Atendimento
                            <br>Consultas
                            <br>Exames de imagem
                        </div>
                    </div>
                </div>
                <div class="box col-12 col-md">
                    <div class="inner">
                        <div class="title text-dark">
                            <h4>TRABALHE CONOSCO</h4>
                        </div>
                        <div class="mt-3">
                            Faça parte da nossa equipe!
                        </div>
                        <div class="action mt-3">
                            <a href="https://magscan.solides.jobs/" class="btn btn-primary">Ver vagas abertas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
