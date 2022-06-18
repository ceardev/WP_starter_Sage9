<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller{
    public function siteName(){
        return get_bloginfo('name');
    }

    public static function title(){
        if (is_home()) {
            return __('Page Content', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function exportQuiz()
    {
    	global $wpdb;

			$date = $_POST['date'];

			$query = "SELECT * FROM uni_quiz_results";
				
			if(!empty($date)){
				$date = explode('/', $date);
				$date = $date[2].'-'.$date[1].'-'.$date[0];
				$date = (new \DateTime($date))->format('Y-m-d 00:00:00');
				$query .= " WHERE created_at >= '$date'";
			}

			$results = $wpdb->get_results($wpdb->prepare($query));

			foreach($results as $result){
				
			}

			//echo json_encode($results);
			//wp_die();
    }
}
