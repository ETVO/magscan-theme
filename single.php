<?php

/**
 * Single post template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

?>
<div class="template-single-post">
    <div class="content-wrap">
        <div class="title text-center mb-3">
            <h1 class="fs-3 fw-normal"><?php the_title(); ?></h1>
        </div>

        <div class="meta-bar d-flex py-2">
            <div class="share me-auto">
                <a href="#" class="tlink d-flex">
                    <span class="text text-uppercase small">
                        Compartilhar
                    </span>
                    <span class="ms-2 icon">
                        <span class="bi-share"></span>
                    </span>
                </a>
            </div>

            <div class="date ms-auto d-flex">
                <span class="icon my-auto bi-clock text-primary"></span>
                <span class="small ms-2 my-auto text-capitalize"><?php echo get_the_date('F / Y'); ?></span>
            </div>
        </div>

        <div class="thumbnail mt-3 mb-4">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="content">
            <?php the_content(); ?>
        </div>


        <div class="meta-bar d-flex pt-2 pb-4">
            <div class="share ms-auto">
                <a href="#" class="tlink d-flex">
                    <span class="text text-uppercase small">
                        Compartilhar
                    </span>
                    <span class="ms-2 icon">
                        <span class="bi-share"></span>
                    </span>
                </a>
            </div>
        </div>

        <div class="about d-flex">
            <div class="image col col-4">
                <img src="<?php echo THEME_IMG_URI . 'about-magscan.png'; ?>" alt="">
            </div>
            <div class="desc col col-8">
                <small>
                    <b>Nonummy nibh euismod</b>
                    <div>CRO/SC 5000 - umsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
                </small>
            </div>
        </div>
    </div>

    <div class="related mt-5">
        <div class="container">
            <div class="title text-center">
                <h5>Fique por dentro dos nossos conteúdos exclusivos!</h5>
            </div>
            <?php
            $args = array(
                'post_type'         => 'post',
                'status'            => 'publish',
                'orderby'           => array('menu_order' => 'ASC', 'date' => 'DESC'),
                'posts_per_page'    => 4
            );
            query_posts($args);

            get_template_part('partials/components/feed');

            wp_reset_query();
            ?>
            <div class="action d-flex">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-info mx-auto text-uppercase text-white slim">
                    <small>Ver Todos</small>
                </a>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
