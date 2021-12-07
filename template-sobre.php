<?php

/**
 * Template Name: Sobre Nós
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

the_post();

?>

<div class="template-sobre">

    <div class="present">
        <div class="container d-flex">
            <div class="me-auto my-auto col-xl-4">
                <div class="title text-uppercase text-primary">
                    <h3 class="fw-bold">A Magscan</h3>
                </div>

                <div class="text mt-3">
                    "Acreditamos no poder da Medicina para oferecer mais saúde para você/sua família/os manauaras"
                </div>
            </div>
            <div class="ms-auto">
                <img src="<?php echo THEME_IMG_URI . 'present.svg'; ?>" alt="">
            </div>
        </div>
    </div>

    <div class="sobre">
        <div class="container">
            <div class="row w-100 m-0">
                <div class="normal col text-dark">
                    <div class="text">
                        <p>Imagine que bom poder confiar em uma clínica em Manaus que tem como compromisso acreditar no poder da Medicina, especialmente no campo da Medicina Diagnóstica</p>

                        <p>– Ela existe!</p>

                        <p>Em 14 de junho de 1999, a Clínica Magscan foi fundada com empenho e a missão de oferecer um novo conceito na realização de exames de diagnóstico por imagens com confiança e qualidade.</p>

                        <p>Desde então, a trajetória da Clínica Magscan tem reforçado esse compromisso a cada passo dado com a classe médica e a população, oferecendo o que há de mais moderno em serviços, estrutura e equipamentos.</p>

                        <p><b>Nossa missão é objetiva</b></p>

                        <p>Proporcionar uma experiência acolhedora a quem busca cuidar da saúde.</p>
                    </div>
                </div>

                <div class="accent col">
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


    <?php foreach ($pessoas as $pessoa) : ?>
    <?php endforeach; ?>
</div>

<?php

get_footer();
