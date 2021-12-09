<?php

if (!function_exists('get_image_props')) {
    function get_image_props($images, $i)
    {
        $image = $images[$i];
        $id = $image['id'];
        $url = $image['url'];
        $caption = wp_get_attachment_caption($id);

        return array(
            'id' => $id,
            'url' => $url,
            'caption' => $caption,
        );
    }
}

if (!function_exists('get_image_props_id')) {
    function get_image_props_id($id)
    {
        $caption = wp_get_attachment_caption($id);
        $url = wp_get_attachment_url($id);

        return array(
            'id' => $id,
            'url' => $url,
            'caption' => $caption,
        );
    }
}

if (!function_exists('get_tax_posts_array')) {
    function get_tax_posts_array($post_type, $tax_type, $tax_slug)
    {
        $args = array(
            'post_type' => $post_type,
            'tax_query' => array(
                array(
                    'taxonomy' => $tax_type,
                    'field' => 'slug',
                    'terms' => $tax_slug,
                ),
            ),
            'orderby'   => array( 'menu_order' => 'ASC' , 'date' => 'DESC' ),
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            return $query->posts;
        }
    }
}

// trim excerpt whitespace
if (!function_exists('trim_excerpt_whitespace')) {
    function trim_excerpt_whitespace($excerpt)
    {
        return trim($excerpt);
    }
    add_filter('get_the_excerpt', 'trim_excerpt_whitespace', 1);
}
