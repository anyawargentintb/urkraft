<?php

add_action( 'wp_ajax_get_singel', 'ajax_get_single' );
add_action( 'wp_ajax_nopriv_get_singel', 'ajax_get_single' );

function ajax_get_single() {
    

    echo 'ajax';

    // get_template_part( 'woocommerce/ajax-product' );
    wp_die();
}

?>