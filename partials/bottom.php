<?php

/**
 * Bottom component
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
// https://api.whatsapp.com/send/?phone=
?>

<a href="https://api.whatsapp.com/send?phone=559299039910&text=Ol%C3%A1%2C%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es" target="_blank" class="floating" id="floating" title="Entre em contato através do WhatsApp">
    <span class="bi bi-whatsapp m-auto"></span>
</a>

<div class="bottom bg-white text-dark">
    <div class="container d-flex">
        <div class="copy me-auto">
            <span>© 2010-<?php echo date('Y'); ?> MAGSCAN - <small>TODOS OS DIREITOS RESERVADOS</small></span>
        </div>
        <div class="faq ms-auto">
            <a href="<?php echo esc_url(home_url('/contato')); ?>" class="tlink tlink-hover-primary">FAQ</a> -
            <a href="<?php echo get_theme_mod('magscan_privacy_policy') ?>" class="tlink tlink-hover-primary">Política de Privacidade</a>
        </div>
    </div>
</div>