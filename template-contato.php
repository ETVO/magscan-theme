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
                <div class="form col-5">
                    <div class="banner d-flex mb-4">
                        <div class="icon my-auto me-4">
                            <a href="#" title="Entre em contato através do WhatsApp">
                                <span class="bi bi-whatsapp m-auto"></span>
                            </a>
                        </div>
                        <div class="text my-auto">
                            <div class="fs-5">Você pode entrar em contato pelo nosso <i class="fw-bold">WhatsApp</i>!</div>
                        </div>
                    </div>
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
                <div class="more col-5 d-flex">
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
                <div class="image col-4 my-auto">
                    <img src="<?php echo THEME_IMG_URI . 'millenium.png'; ?>" class="d-block w-100" alt="">
                </div>
                <div class="content col-5 my-auto">
                    <h4>MILLENIUM SHOPPING</h4>
                    <div class="mt-3">
                        (92) 4009-6001
                        <br>1719, Térreo, sala 2A, Manaus-AM
                    </div>
                </div>
                <div class="map col-3 my-auto">
                    <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=&t=m&mrt=yp&z=15&output=embed&iwloc=addr&msa=0">
                    </iframe>
                </div>
            </div>
            <div class="unidade row">
                <div class="image col-4 my-auto">
                    <img src="<?php echo THEME_IMG_URI . 'atlantic.png'; ?>" class="d-block w-100" alt="">
                </div>
                <div class="content col-5 my-auto">
                    <h4>ATLANTIC TOWER</h4>
                    <div class="mt-3">
                        (92) 4009-6001
                        <br>Av. Djalma Batista, 1661, loja 243, Manaus-AM
                    </div>
                </div>
                <div class="map col-3 my-auto">
                    <iframe frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=&t=m&mrt=yp&z=15&output=embed&iwloc=addr&msa=0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="boxes">
        <div class="container col-xl-6">
            <div class="row">
                <div class="box col">
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
                <div class="box col">
                    <div class="title text-dark">
                        <h4>TRABALHE CONOSCO</h4>
                    </div>
                    <div class="mt-3">
                        Faça parte da nossa equipe!
                    </div>
                    <div class="action mt-3">
                        <a href="#" class="btn btn-primary">Ver vagas abertas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
