<?php
/**
 * Top component
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */
?>

<div class="top d-flex">
    <div class="container d-flex flex-column flex-md-row">
        <div class="social-icons mx-auto ms-md-0 me-md-auto mb-md-0">
            <a class="social-icon btn btn-outline-primary" href="https://facebook.com">
                <span class="bi-facebook"></span>
            </a>
            <a class="social-icon btn btn-outline-primary" href="https://instagram.com">
                <span class="bi-instagram"></span>
            </a>
            <a class="social-icon btn btn-outline-primary" href="https://linkedin.com">
                <span class="bi-linkedin"></span>
            </a>
        </div>
        <div class="actions d-none d-md-block ms-auto">
            <a class="btn btn-primary" href="https://magscan.centraldemarcacao.com.br/">
                Agendar Consulta
            </a>
            <a class="btn btn-primary" href="https://www.medcloud.co/?page=magscan">
                Resultados
                <br class="d-md-none"><span class="d-none d-md-inline"></span>de exames
            </a>
            <span class="dropdown search">
                <button
                    class="search-btn btn btn-outline-primary dropdown-toggle"
                    role="button"
                    id="dropdownSearch"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <span class="bi-search"></span>
                </button>
                <div class="dropdown-menu p-0">
                    <div class="outline bigger">
                        <?php get_template_part('partials/searchform') ?>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>