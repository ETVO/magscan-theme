<?php

/**
 * Blog partial
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

$categories = get_categories();

?>

<div class="template-blog">

    <div class="blog">
        <div class="container px-lg-0">
            <div class="row m-0 w-100">
                <div class="list col col-12 col-lg-4">
                    <div class="explain">
                        <div class="title text-uppercase text-primary">
                            <h1 class="fs-3 fw-bold">Blog</h1>
                        </div>
                        <div class="text mt-2">
                            Somos especialistas na criação de conteúdos que fazem a diferença na sua saúde
                        </div>
                    </div>
                    <div class="search-wrap my-4">
                        <div class="outline">
                            <?php get_template_part('partials/searchform', null, array(
                                'post_type' => 'post'
                            )); ?>
                        </div>
                    </div>
                    <div class="card-list">
                        <div class="heading">
                            <span class="icon">
                                <span class="bi-search"></span>
                            </span>
                            <span class="text">Categorias</span>
                        </div>

                        <div class="links">
                            <?php foreach ($categories as $category) : ?>
                                <a href="<?php echo get_category_link($category->term_id); ?>" class="link">
                                    <span class="icon bi-chevron-right"></span>
                                    <span class="text"><?php echo $category->name; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="exame-col col">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'status' => 'publish',
                        'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'),
                        'posts_per_page' => 1
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        $query->the_post();

                    ?>

                        <div class="exame-view">
                            <div class="d-flex flex-column">
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else {
                                        ?>
                                            <img src="<?php echo THEME_IMG_URI . 'default-exame.png' ?>" alt="<?php echo the_title(); ?>">
                                        <?php
                                        } ?>
                                    </a>
                                </div>

                                <div class="content">
                                    <div class="title">
                                        <h4><?php the_title(); ?></h4>
                                    </div>

                                    <div class="my-3">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <div class="action">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-info slim text-white">Saber mais</a>
                                    </div>
                                </div>
                            </div>
                            <div class="underlay"></div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <div class="feed pb-4">
        <?php get_template_part('partials/components/feed') ?>
    </div>
</div>