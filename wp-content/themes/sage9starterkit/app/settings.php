<?php

/* Define timezone
======================================== */
date_default_timezone_set('America/Montreal');


function register_acf_options_pages() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_page();
}

// Hook into acf initialization.
// add_action('acf/init', 'register_acf_options_pages');


function my_plugin_block_categories( $categories, $post ) {
    // if ( $post->post_type !== 'post' ) {
    //     return $categories;
    // }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'client_slug',
                'title' => __( 'MyClient', 'fn' ),
                'icon'  => '',
            ),
            array(
                'slug' => 'limited',
                'title' => __( 'Limited', 'fn' ),
                'icon'  => '',
            ),
        )
    );
}
add_filter( 'block_categories_all', 'my_plugin_block_categories', 10, 2 );


function sage_register_menus() {
  register_nav_menu('primary_navigation', __('Primary navigation', 'sage'));
  register_nav_menu('others_navigation', __('Others navigation', 'sage'));
}
// add_action('after_setup_theme', 'sage_register_menus');


// add_image_size('banner_crop', 1920, 1080, true);
// add_image_size('thumbnail_big', 1140, 670, true);
// add_image_size('thumbnail_small', 740, 340, true);




//////////////////////////
/// Reset unwanted wordpress settings
//////////////////////////





/* wp_head Cleanup
========================================= */
remove_action( 'wp_head', 'feed_links_extra');
remove_action( 'wp_head', 'feed_links');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10);
remove_action( 'wp_head', 'start_post_rel_link', 10);
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action( 'wp_head', 'wp_generator');

function disable_wp_emojicons() {
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );

/* Remove non-usefull widgets from dashboard
======================================== */
function remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


// Prevent tinymce fromn loading theme style so _reset.scss won't screw the display
function pn_tinymce_remove_mce_css($stylesheets)
{
    $stylesheets = explode(',',$stylesheets);
    foreach ($stylesheets as $key => $sheet) {
        if (preg_match('/sage\/dist\/styles\/main\.css/',$sheet)) {
            unset($stylesheets[$key]);
        }
    }
    $stylesheets = implode(',',$stylesheets);
    return $stylesheets;
}
// add_filter("mce_css", "pn_tinymce_remove_mce_css");


add_action('admin_head', 'disable_icl_metabox', 99);
function disable_icl_metabox() {
  global $post;

  if (!empty($post)) {
    remove_meta_box('icl_div_config',$post->posttype,'normal');
  }
}




/* Optimization
======================================== */
function optimize_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_deregister_script('jquery-migrate.min');
        wp_deregister_script('comment-reply.min');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, '3.6', false);
        wp_enqueue_script('jquery');
        wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );
    }
}
add_action('template_redirect', 'optimize_jquery');