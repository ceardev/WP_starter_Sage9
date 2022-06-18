<?php
/*
    Lock specific blocks for templates
***************/
function sage_get_pages_blocks($template) {
    $pages_blocks = [];
    $pages_blocks['views/template-home.blade.php'] = [
        ['acf/banner'],
        ['core/paragraph', ['placeholder' => '']],
        ['acf/box-multiple'],
        ['acf/slider'],
    ];

    $pages_blocks['views/template-contact.blade.php'] = [
        ['acf/contact'],
        ['acf/box-multiple'],
    ];

    return isset($pages_blocks[$template]) ? $pages_blocks[$template] : false;
}

function sage_page_blocks_home() {
    if (!is_admin() || !isset($_GET['post'])) {
        // This is not the post/page we want to limit things to.
        return false;
    }

    $template_slug = get_page_template_slug($_GET['post']);
    if (empty($template_slug)) {
        return false;
    }

    if (!$template = sage_get_pages_blocks($template_slug)) {
        return false;
    }


    $post_type_object = get_post_type_object('page');
    $post_type_object->template = $template;
    $post_type_object->template_lock = 'all';
}
add_action( 'init', 'sage_page_blocks_home' );