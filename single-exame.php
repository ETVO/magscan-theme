<?php

/**
 * Single exame template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

get_header();

$cpt_tax = 'tipo';
$tax = get_the_terms(get_the_ID(), $cpt_tax);
$related_exames = array();

if ($tax) {
    $tax = $tax[0];

    $related_exames = array(
        'title'     => $tax->name,
        'posts'     => get_tax_posts_array('exame', $cpt_tax, $tax->slug, 4),
        'archive'   => get_term_link($tax->slug, $cpt_tax)
    );
}
else {

    $related_exames = array(
        'title'     => 'Outros Exames',
        'posts'     => get_posts_array('exame', 4),
        'archive'   => get_post_type_archive_link('exame'),
    );
}


?>
<div class="single-exame">
    <div class="container px-lg-0">
        <div class="row m-0 w-100">
            <div class="col col-12 col-lg-6">
                <div class="title text-primary text-uppercase">
                    <h1 class="fs-4 fw-bold"><?php the_title(); ?></h1>
                </div>
                <div class="content mt-3">
                    <?php the_content(); ?>
                </div>
                <div class="action">
                    <a href="#" class="btn btn-primary">Agendar Consulta</a>
                </div>
            </div>
            <div class="col col-12 col-lg-6">
                <div class="date d-flex">
                    <div class="ms-auto d-flex">
                        <span class="icon my-auto bi-clock text-primary"></span>
                        <span class="small ms-2 my-auto text-uppercase"><?php echo get_the_date('F / Y'); ?></span>
                    </div>
                </div>
                <div class="image-view">
                    <div class="d-flex">
                        <div class="image ms-lg-auto">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } else {
                            ?>
                                <img src="<?php echo THEME_IMG_URI . 'default-exame.png' ?>" alt="<?php echo the_title(); ?>">
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="underlay">

                    </div>
                </div>
                <?php if(count($related_exames)): ?>
                <div class="d-flex">
                    <div class="exame ms-lg-auto">
                        <div class="heading">
                            <span><?php echo $related_exames['title'] ?></span>
                        </div>

                        <div class="links">
                            <?php 
                            foreach ($related_exames['posts'] as $exame) : 
                            ?>
                                <a href="<?php echo get_the_permalink($exame->ID); ?>" class="link">
                                    <span class="icon bi-chevron-right"></span>
                                    <span class="text"><?php echo $exame->post_title; ?></span>
                                </a>
                            <?php 
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
