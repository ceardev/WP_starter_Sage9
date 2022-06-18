<?php

if( function_exists('acf_add_options_page') ) {

    // Register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Configuration'),
        'menu_title'    => __('Configuration'),
        'menu_slug'     => 'general-configuration',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}