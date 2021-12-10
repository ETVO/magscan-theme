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

if (is_tax() || is_category()) {
    $title = single_term_title('', false);
}

?>
<div class="template-archive">
    <div class="container">
        <div class="title text-primary">
            <h1 class="fs-3"><?php echo $title; ?></h3>
        </div>
        <div class="feed">
            <?php get_template_part('partials/components/feed') ?>
        </div>
    </div>
</div>
<?php

get_footer();
