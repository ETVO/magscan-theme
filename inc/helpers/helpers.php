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
            'orderby'   => array('menu_order' => 'ASC', 'date' => 'DESC'),
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

if (!function_exists('the_breadcrumb')) {
    function the_breadcrumb()
    {

        $sep = ' | ';

        if (!is_front_page()) {

            $post_type = get_post_type_object(get_post_type());

            // Start the breadcrumb with a link to your homepage
            echo '<small class="breadcrumbs text-uppercase">';
            echo '<a href="';
            echo get_option('home');
            echo '" class="tlink tlink-hover-primary">';
            echo 'Home';
            echo '</a>' . $sep;

            $need_sep = false;

            if (is_single() && $post_type->name == 'post') {
                echo 'Blog';
            } else if (is_single() && $post_type->name == 'especialista') {
                $page = get_page_by_path('sobre-nos');
                echo '<a href="';
                echo get_the_permalink($page);
                echo '" class="tlink tlink-hover-primary">';
                echo get_the_title($page);
                echo '</a>';
                echo $sep;
                echo '<a href="';
                echo get_post_type_archive_link('especialista');
                echo '" class="tlink tlink-hover-primary">';
                echo 'Corpo Clínico';
                echo '</a>';
                $need_sep = true;
            } else if (is_tax() || is_category()) {

                if (is_single() && !in_array($post_type->name, ['especialista'])) {
                    if ($post_type->name == 'exame')
                        $taxonomy = 'tipo';
                    else
                        $taxonomy = 'category';

                    $term = get_the_terms(get_the_ID(), $taxonomy)[0];
                    if (isset($term)) {
                        echo '<a href="';
                        echo get_term_link($term, $taxonomy);
                        echo '" class="tlink tlink-hover-primary">';
                        echo $term->name;
                        echo '</a>';
                    }
                } else {
                    if ($post_type->name == 'especialista') {
                        $page = get_page_by_path('sobre-nos');
                        echo '<a href="';
                        echo get_the_permalink($page);
                        echo '" class="tlink tlink-hover-primary">';
                        echo get_the_title($page);
                        echo '</a>';
                        echo $sep;
                    }
                    echo single_term_title('', false);
                }
            } else if (is_archive() || is_single()) {
                if (is_day()) {
                    echo get_the_date();
                } else if (is_month()) {
                    echo get_the_date('F Y');
                } else if (is_year()) {
                    echo get_the_date('Y');
                } else {
                    if ($post_type->name == 'especialista') {
                        $page = get_page_by_path('sobre-nos');
                        echo '<a href="';
                        echo get_the_permalink($page);
                        echo '" class="tlink tlink-hover-primary">';
                        echo get_the_title($page);
                        echo '</a>';
                        echo $sep;
                    }
                    echo '<a href="';
                    echo get_post_type_archive_link($post_type->name);
                    echo '" class="tlink tlink-hover-primary">';
                    echo $post_type->labels->name;
                    echo '</a>';
                    $need_sep = true;
                }
            }

            // If the current page is a singular post, show its title with the separator
            if (is_single()) {
                echo $sep;
                the_title();
            }

            // If the current page is a static page, show its title.
            if (is_page()) {
                the_title();
            }

            if (is_404()) {
                echo '404';
            }

            if (is_search()) {
                if ($need_sep) echo $sep;
                echo 'Pesquisa';
            }

            // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
            if (is_home()) {
                global $post;
                $page_for_posts_id = get_option('page_for_posts');
                if ($page_for_posts_id) {
                    $post = get_post($page_for_posts_id);
                    setup_postdata($post);
                    the_title();
                    rewind_posts();
                }
            }

            echo '</small>';
        }
    }
}

function leading_zero_wp_link_pages_link($i)
{
    $i = zeroise($i, 2);
    return $i;
}

add_filter('wp_link_pages_link',  'leading_zero_link_pages_link');
