<?php

/**
 * Top component
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
?>

<div class="top d-none d-md-flex">
    <div class="container d-flex flex-column flex-md-row">
        <div class="social-icons mx-auto ms-md-0 me-md-auto mb-md-0">
            <a class="social-icon btn btn-outline-primary" href="https://web.facebook.com/ClinicaMagscan/">
                <span class="bi-facebook"></span>
            </a>
            <a class="social-icon btn btn-outline-primary" href="https://www.instagram.com/clinicamagscan/">
                <span class="bi-instagram"></span>
            </a>
            <a class="social-icon btn btn-outline-primary" href="https://www.youtube.com/channel/UC24ZqHtdRGmUgy3BbEHu-dA">
                <span class="bi-youtube"></span>
            </a>
        </div>
        <div class="actions ms-auto">
            <a class="btn btn-primary" href="https://magscan.centraldemarcacao.com.br/">
                Agendar Consulta
            </a>
            <a class="btn btn-primary" href="https://www.medcloud.co/?page=magscan">
                Resultados
                <br class="d-md-none"><span class="d-none d-md-inline"></span>de exames
            </a>
            <span class="dropdown search">
                <button class="search-btn btn btn-outline-primary dropdown-toggle" role="button" id="dropdownSearch" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="bi-search"></span>
                </button>
                <div class="dropdown-menu p-0">
                    <div class="outline">
                        <?php get_template_part('partials/searchform') ?>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>