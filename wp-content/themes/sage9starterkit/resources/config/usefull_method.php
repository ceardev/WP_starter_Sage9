<?php

//-----------------
// Usefull methods
//-----------------

//USE ACF OPTIONS GLOBALLY FROM DEFAULT LANGUAGE
add_filter( 'acf/validate_post_id', function( $post_id, $original_post_id ){
   
  if( strpos($post_id, 'options_') === 0 ){ //postfix detection
    $post_id = 'options';
  }
   
  return $post_id; //FILTER! MUST RETURN!
}, 10, 2 );