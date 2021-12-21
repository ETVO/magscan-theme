<?php

/**
 * Single post template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

?>
<div class="template-convenio">
    <div class="content-wrap pb-3">
        <div class="title text-center mb-3">
            <h1 class="fs-3 fw-normal"><?php the_title(); ?></h1>
        </div>

        <div class="excerpt">
            <small class="text-center">
                <?php the_excerpt(); ?>
            </small>
        </div>
            
        <div class="mt-3 mb-4 d-flex">
            <div class="m-auto">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>

        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>

    

    <div class="seja-parceiro">

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
