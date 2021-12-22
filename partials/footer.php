<?php

/**
 * Footer component
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
?>

<footer>
    <div class="bg-white navbar navbar-expand-lg text-dark">
        <div class="container py-3 pb-lg-2 px-lg-0">
            <div class="navbar-brand me-auto p-0">
                <?php the_custom_logo(); ?>
            </div>

            <!-- <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenuDropdown" aria-controls="mainMenuDropdown" aria-expanded="false" aria-label="<?php echo __("Menu") ?>">
                <span class="icon bi bi-list"></span>
            </button> -->

            <div class="d-flex w-100" id="mainMenuDropdown">
                <div class="actions ms-auto d-flex">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="goto-blog text-uppercase text-decoration-none">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30.415" height="38.353" viewBox="0 0 30.415 38.353">
                                <g id="Group_1396" data-name="Group 1396" transform="translate(30.415 38.353) rotate(180)">
                                    <path id="Path_71" data-name="Path 71" d="M1942.2,8747.17c-.113-.123-.19-.2-.262-.284-.775-.9-1.544-1.813-2.325-2.709q-2.608-3-5.225-5.989c-1.244-1.427-2.492-2.849-3.727-4.285a15.2,15.2,0,0,1,1.322-21.14,14.563,14.563,0,0,1,8.86-3.886,15.195,15.195,0,0,1,15.562,20.561,15.8,15.8,0,0,1-2.975,4.837c-1.588,1.775-3.13,3.593-4.7,5.39-1.009,1.159-2.027,2.309-3.035,3.47-1.072,1.235-2.135,2.478-3.2,3.717C1942.41,8746.949,1942.318,8747.042,1942.2,8747.17Z" transform="translate(-1926.999 -8708.817)" fill="#a81e2e" />
                                </g>
                            </svg>
                        </span>
                        <span class="text">Acesse nosso blog</span>
                    </a>

                    <div class="social-icons">
                        <a class="social-icon btn btn-outline-primary" href="https://web.facebook.com/ClinicaMagscan/">
                            <span class="bi-facebook"></span>
                        </a>
                        <a class="social-icon btn btn-outline-primary" href="https://www.instagram.com/clinicamagscan/">
                            <span class="bi-instagram"></span>
                        </a>
                        <a class="social-icon btn btn-outline-primary" href="https://www.youtube.com/channel/UC24ZqHtdRGmUgy3BbEHu-dA">
                            <span class="bi-youtube"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-content text-dark d-flex pt-lg-3">
        <div class="footer-text">
            <div class="py-5">
                <h5 class="mb-3">Locais de atendimento</h5>
                <p>
                    <b>Unidade Millennium Shopping</b>
                    <br>
                    (92) 4009-6001 / Av. Djalma Batista, 1661, loja 243, Manaus-AM
                </p>
                <p>
                    <b>Atlantic Tower</b>
                    <br>
                    (92) 4009-6001 / 1719, Térreo, sala 2A, Manaus-AM
                </p>
                <h6>LGPD - Lei Geral de Proteção de Dados Pessoais</h6>
                <p class="very-small">
                    A Magscan trata com seriedade, confidencialidade e integridade todos os dados pessoais que se encontram sob a sua responsabilidade. Aqui cuidamos não apenas da sua saúde, mas também do sigilo das informações dos pacientes, colaboradores, médicos, prestadores de serviço e fornecedores.
                </p>
                <h6 class="mb-0">Requisições relacionadas à Lei Geral de Dados Pessoais (LGPD)?</h6>
                <a href="#" class="tlink tlink-hover-decoration"><b>Entre em contato com a Magscan.</b></a>

            </div>
        </div>
        <div class="footer-form">
            <div class="heading">
                <h5>Cadastre seu e-mail para receber informativos</h5>
            </div>
            <div class="form">
                
                <?php echo do_shortcode('[contact-form-7 id="2281" title="Newsletter"]'); ?>

                <?php if(false): ?>
                <form onsubmit="return false;">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Nome">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-check mb-3 d-flex">
                        <div class="mb-auto">
                            <input class="form-check-input" type="checkbox" value="" id="accept">
                        </div>
                        <label class="form-check-label" for="accept">
                            Eu aceito receber conteúdos informativos sobre saúde e serviços por e-mail.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Receber Informativos</button>
                </form>
                <?php endif; ?>
                <div class="bottom-text fs-6">
                    <b>DIRETOR TÉCNICO MÉDICO</b>
                    <br />CRM - AM 340
                </div>
            </div>
        </div>
    </div>
</footer>