<?php

/**
 * Convenio archive template
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */


$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-convenio.php'
));

wp_redirect($pages[0]->guid);
