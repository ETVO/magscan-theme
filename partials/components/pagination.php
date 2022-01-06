<?php
/**
 * Partial for posts feed rendering
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

$color = (isset($args['color'])) ? $args['color'] : null;

?>

<div class="pagination d-flex my-3 variation-<?php echo $color; ?>">
    <?php 
        global $wp_query;

        $big = 999999999;

        $label = __("Página");

        if(count($_GET)) {
            // there are GET params set
            $base = home_url($_SERVER['REQUEST_URI']) . "&paged=%#%";
        }
        else {
            $base = home_url($_SERVER['REQUEST_URI']) . "?paged=%#%";
        }

        $paginate = paginate_links( 
            array(
                'base'                  => $base,
                'format'                => '?paged=%#%',
                'current'               => max(1, get_query_var('paged')),
                'total'                 => $wp_query->max_num_pages,
                'before_page_number'    => '<span aria-label="' . $label . '"></span>',
                'prev_text'             => '<span class="bi bi-chevron-left"></span>',
                'next_text'             => '<span class="bi bi-chevron-right"></span>',
            )
        );
    ?>

    <div class="links m-auto">
        <?php echo $paginate; ?>
    </div>
</div>