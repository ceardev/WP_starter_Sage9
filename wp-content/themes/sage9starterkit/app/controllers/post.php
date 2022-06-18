<?php

namespace Post;

use Sober\Controller\Controller;

class Post extends Controller {
    public function siteName(){
        return get_bloginfo('name');
    }

    /**
     * [getPosts description]
     * @return [type] [description]
     */
    public static function all($limit = 15)
    {
    	$args = [
    		'post_type' => 'post',
    		'posts_per_page' => $limit,
    		'published' => true
    	];

    	$posts = get_posts($args);

    	return $posts;
    }

    public static function get($limit = 15){
    	$paged = get_query_var('paged');
			$paged = $paged == 0 ? 1 : $paged;

    	$args = array(
				'post_type' 			=> 'post',
				'post_status' 		=> 'publish',
				'posts_per_page'	=> $limit,
				'paged' 					=> $paged,
				'orderby'					=> 'date',
				'order'   				=> 'DESC',
			);

    	// Filter by category
    	if(!empty($_GET['category']) && $_GET['category']!='all'){
    		$args['tax_query'][] = [
    			'taxonomy'  => 'category',
          'field'   	=> 'slug',
          'terms' 		=> $_GET['category']
    		];
    	}

    	// Filter by type
    	if(!empty($_GET['type']) && $_GET['type']!='all'){
    		$args['tax_query'][] = [
    			'taxonomy'  => 'post-types',
          'field'   	=> 'slug',
          'terms' 		=> $_GET['type']
    		];
    	}

			$posts 	= new \WP_Query($args);

			return $posts;
    }

    public static function related($post, $limit = 3)
    {
    	// If manual related posts, return them
    	if(get_field('related_posts', $post->ID)){
    		return get_field('related_posts', $post->ID);
    	}

    	// Else, return 3 posts with same category
    	$args = array(
				'post_type' 			=> 'post',
				'post_status' 		=> 'publish',
				'posts_per_page'	=> $limit,
				'paged' 					=> $paged,
				'orderby'					=> 'date',
				'order'   				=> 'DESC',
			);

    	$category = get_the_category($post->ID)[0];

    	// Filter by category
  		$args['tax_query'][] = [
  			'taxonomy'  => 'category',
        'field'   	=> 'slug',
        'terms' 		=> $category->slug
  		];

			$posts 	= get_posts($args);

			return $posts;
    }

    public static function getCategories()
    {
    	$categories = get_terms('category', [
    		'hide_empty' => true,
    	]);

    	return $categories;
    }

    public static function getTypes()
    {
    	$types = get_terms('post-types', [
    		'hide_empty' => true,
    	]);

    	return $types;
    }
}
