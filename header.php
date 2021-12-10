<?php

/**
 * Header template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset=<?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?>>

    <div id="head"></div>

    <?php wp_body_open(); ?>

    <?php get_template_part("partials/top"); ?>
    <?php get_template_part("partials/header"); ?>


    <?php if (!is_front_page()) : ?>
        <div class="pb-4">
            <div class="container d-flex">
                <div class="ms-auto">
                    <?php the_breadcrumb(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>