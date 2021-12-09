<?php

/**
 * 404 error page template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

?>
<div class="404 pb-5">
    <div class="container d-flex">
        <div class="m-auto text-center">
            <h1 class="text-primary mb-0" style="line-height: 1; font-size: 8rem;">404</h1>
            <h5 class="fw-light text">Página não encontrada</h5>
            <div class="my-4">
                <?php get_search_form(); ?>
            </div>
            <div class="action mt-3 text-uppercase fw-bold">
                <a href="<?php echo esc_url(home_url('/'));  ?>" class="tlink tlink-hover-primary">Voltar à Home</a>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
