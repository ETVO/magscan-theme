<?php

/**
 * Partial for posts feed rendering
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

$post_type = (isset($_GET['post_type'])) ? $_GET['post_type'] : 'post';

// Get theme mod for meta separator 
$separator = "&bull;";

$no_posts_found = "Nenhum post foi encontrado...";

?>

<div class="feed">
    <div class="container">
        <div class="row m-0 w-100 g-4 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            <?php
            if (have_posts()) {
                while (have_posts()) :
                    the_post();
                    $post = get_post();

                    $permalink = esc_url(get_the_permalink());

                    $date = get_the_date('d M Y');

                    $title = get_the_title();


            ?>

                    <div class="col post">
                        <div class="meta">
                            <div class="date d-flex">
                                <span class="icon my-auto bi-clock bi-bold-dark"></span>
                                <span class="ms-2 my-auto"><?php echo $date; ?></span>   
                            </div>
                        </div>
                        <div class="image">
                            <a href="<?php echo $permalink; ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </div>
                        <div class="title">
                            <h2 class="fs-5">
                                <a class="tlink tlink-hover-primary" href="<?php echo $permalink; ?>">
                                    <?php echo $title; ?>
                                </a>
                            </h2>
                        </div>
                    </div>

                <?php

                endwhile;
            } else {
                ?>
                <h5 class="mt-4 no-posts"><?php echo $no_posts_found; ?></h5>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="pt-3">
        <?php
        get_template_part("partials/components/pagination");
        ?>
    </div>
</div>