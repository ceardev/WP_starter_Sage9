<?php

if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}


/* Get Video Info
======================================== */
function util_get_video_infos($url) {
    if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
        $infos = array('id' => $id[1], 'type' => 'youtube');
    } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
        $infos = array('id' => $id[1], 'type' => 'youtube');
    } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
        $infos = array('id' => $id[1], 'type' => 'youtube');
    } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
        $infos = array('id' => $id[1], 'type' => 'youtube');
    } else if(preg_match('/player\.vimeo\.com\/video\/([^\&\?\/]+)/', $url, $id)) {
        $infos = array('id' => $id[1], 'type' => 'vimeo');
    } else if(preg_match('/vimeo\.com\/([^\&\?\/]+)/', $url, $id)) {
        $infos = array('id' => $id[1], 'type' => 'vimeo');
    } else {
        $infos = array();
    }
    return $infos;
}


function getNavWithChilds($navigation_name) {
    $locations = get_nav_menu_locations();
    $navigation_menu = wp_get_nav_menu_object( $locations[ $navigation_name ] );

    if (empty($navigation_menu)) {
        return [];
    }

    $navigation = wp_get_nav_menu_items( $navigation_menu->term_id, array( 'order' => 'DESC' ) );

    if (empty($navigation)) {
        return [];
    }

    return  $navigation ? buildTree( $navigation, 0 ) : [];
}

function buildTree( array &$elements, $parentId = 0 ) {
    $branch = array();
    foreach ( $elements as &$element )
    {
        if (get_class($element) === 'WPML_LS_Menu_Item') {
            $branch[$element->ID] = $element;
            unset( $element );
            continue;
        }

        if ( $element->menu_item_parent == $parentId )
        {
            $children = buildTree( $elements, $element->ID );
            if ( $children )
                $element->child_items = $children;
                // $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset( $element );
        }
    }
    return $branch;
}

function getChildGroupContent($item){
    $child_group = array();

    // Get Menu item template
    $menu_template = get_field('menu_template', $item->ID);

    // Set Front Menu Item 
    $child_group = array(
        'parent' => 'nav'.$item->ID,
        'globalLink' => $item->url,
        'title'  => $item->title,
        'childs' => getChildGroupItemCascadeForTemplate( $item, $menu_template ) );

    // If get Menu Image for template 2
    if($menu_template == 2) :
        $child_group['menu_image'] = get_field('menu_image', $item->ID);
    endif;

    return $child_group;
}

function getChildGroupItemCascadeForTemplate( $item, $menu_template ){
    $childs = array();

    foreach($item->child_items as $index => $child){
        $sub = array(
            'id' => $child->ID,
            'title' => $child->title,
            'url' => $child->url,
            'description' => $child->description
        );
        
        // Get additionnal links in child objects
        $sub['childs'] = $child->child_items;
        $sub['additionnal_links'] = get_field('additionnal_links', $child->ID);

        $childs[] = $sub;
    }
    return $childs;
}

function util_clean_tel($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^0-9]/', '', $string); // Removes special chars.
}