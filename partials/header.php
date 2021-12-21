<?php
/**
 * Header component
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
?>

<header class="navbar navbar-expand-lg text-dark" id="header">
    <div class="container my-3 px-lg-0">
        <div class="navbar-brand me-auto p-0">
            <?php the_custom_logo(); ?>
        </div>
        
        <button class="navbar-toggler p-0" type="button" 
		data-bs-toggle="collapse" data-bs-target="#mainMenuDropdown" 
		aria-controls="mainMenuDropdown" aria-expanded="false" aria-label="<?php echo __("Menu") ?>">
            <span class="icon bi bi-list"></span>
		</button>

        <div class="collapse navbar-collapse" id="mainMenuDropdown">
            <?php 
                wp_nav_menu(
                    array( 
                        'theme_location'    => 'main_menu',
                        'depth'             => 2,
                        'container_class'   => 'ms-auto',
                        'menu_class'        => 'navbar-nav',
                        'walker'            => new BS_Menu_Walker()
                    )
                ); 
            ?>
        </div>
    </div>
</header>