<?php

/**
 * Partial for default content rendering
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

?>

<div class="template-page">
    <div class="content-wrap">
        <div class="title text-center mb-2">
            <h1 class="fs-3"><?php the_title(); ?></h1>
        </div>

        <div class="thumbnail mt-3 mb-4">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
</div>