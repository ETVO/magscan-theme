<?php
/**
 * Partial for posts feed rendering
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

?>

<div class="pagination d-flex my-3">
    <?php 
        global $wp_query;

        $big = 999999999;

        $label = __("Página");

        $paginate = paginate_links( 
            array(
                'base' => str_replace($big, '%#%', esc_url( get_pagenum_link( $big ))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'before_page_number' => '<span aria-label="' . $label . '"></span>',
                'prev_text' => '<span class="bi bi-chevron-left"></span>',
                'next_text' => '<span class="bi bi-chevron-right"></span>',
            )
        );
    ?>

    <div class="links m-auto">
        <?php echo $paginate; ?>
    </div>
</div>