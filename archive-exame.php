<?php

/**
 * Blog home template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

$post_type = get_post_type_object(get_post_type());
$title = '';

$letras = get_terms(['taxonomy' => 'letra']);
$selected_letra = (isset($_GET['letra'])) ? $_GET['letra'] : '';

$get_str = '?';

foreach ($_GET as $key => $value) {
    if ($key != 'letra')
        $get_str .= "$key=$value&";
}

if (is_tax() || is_category()) {
    $obj = get_queried_object();
    if($obj->taxonomy == 'letra')
        $title = 'Exames - ' . $obj->name;
    else{
        $title = $obj->name;
        if($selected_letra != '')
            $title .= ' - ' . $selected_letra;
    }
} else {
    $title = 'Exames';
}

?>
<div class="template-archive-exame">
    <div class="container">
        <div class="row m-0 w-100">
            <div class="col-12 col-md-6 explain">
                <div class="title text-uppercase text-primary">
                    <h1 class="fs-4 fw-bold"><?php echo $title; ?></h1>
                </div>
            </div>
            <div class="d-none d-md-block col-2"></div>
            <div class="col-12 col-md-4 search-wrap d-flex">
                <div class="mt-3 mt-md-auto w-100">
                    <div class="outline">
                        <?php get_template_part('partials/searchform', null, array(
                            'post_type' => 'exame'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="feed-wrap w-100 pb-4">
            <div class="letras mt-3 d-none d-sm-flex">
                <a class="letra <?php if ($selected_letra == '') echo 'selected' ?>"" href=" <?php echo $get_str . 'paged=1'; ?>">
                    <span class="letra-name">
                        TODOS
                    </span>
                </a>
                <?php
                foreach ($letras as $letra) :

                    $is_selected = $letra->slug === $selected_letra;
                ?>

                    <a class="letra <?php if ($is_selected) echo 'selected' ?>" href="<?php echo $get_str . "paged=1&letra=$letra->slug"; ?>">
                        <span class="letra-name">
                            <?php echo $letra->name; ?>
                        </span>
                    </a>

                <?php endforeach; ?>
            </div>

            <div class="exames-feed mt-3">
                <?php
                if (have_posts()) {
                    while (have_posts()) :
                        the_post();
                        $post = get_post();

                        $permalink = esc_url(get_the_permalink());

                        $title = get_the_title();

                ?>

                        <div class="exame-row row w-100 m-0">
                            <div class="col-12 col-lg-8 title my-auto">
                                <h6><?php echo $title; ?></h6>
                            </div>
                            <div class="col-12 col-lg-4 pt-2 pt-lg-0 actions d-flex">
                                <span class="ms-auto">
                                    <small>
                                        <a href="<?php echo $permalink; ?>" class="tlink tlink-hover-primary text-uppercase fw-light">Saiba Mais</a>
                                    </small>
                                    <a href="https://magscan.centraldemarcacao.com.br/" class="ms-3 btn btn-primary slim fw-light rounded-pill">Agendar online</a>
                                </span>
                            </div>
                        </div>

                    <?php

                    endwhile;
                } else {
                    ?>
                    <div class="w-100 py-3">
                        <h6 class="m-auto text-center fw-light">Nenhum exame foi encontrado.</h6>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="mt-3">
                <?php get_template_part('partials/components/pagination'); ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
