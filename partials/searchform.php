<?php

/**
 * Partial for the search form component
 * 
 * @package WordPress
 * @subpackage Magscan-Theme
 */

$search_validity = __('Por favor insira um termo de pesquisa');
$search_label = __('Qual serviço está procurando?');

?>

<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="searchform d-flex">

    <div class="inner d-flex">
        <div class="form-group">
            <div class="icon-control">
                <input 
                    type="text" 
                    class="input form-control" 
                    name="s" 
                    id="search" 
                    value="<?php the_search_query(); ?>" 
                    oninvalid="this.setCustomValidity('<?php echo $search_validity; ?>')" 
                    placeholder="<?php echo $search_label; ?>" 
                    required
                >
                <button type="submit" class="icon submit" title="<?php echo $search_label; ?>">
                    <div class="icon-inner m-auto">
                        <span class="bi-search"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- <input type="hidden" name="post_type" value="post" required> -->
</form>