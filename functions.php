<?php
//displaying like time ago
function time_ago( $type = 'post' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}

//Content Word Limit and Edit the read more link text (not for <!--more-->)
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'<span class="clear"></span>read the full post ==> <a href="'. get_permalink($post->ID) . '" title="'. the_title('', '', false) . '">'. get_permalink($post->ID) . '</a>';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

// Edit the read more link text for <!--more-->
add_filter('get_the_content_more_link', 'custom_read_more_link');
add_filter('the_content_more_link', 'custom_read_more_link');
function custom_read_more_link() {
return '<span class="clear"></span>read the full post ==> <a href="'. get_permalink($post->ID) . '" title="'. the_title('', '', false) . '">'. get_permalink($post->ID) . '</a>';
}

//content without <p> for pre format
remove_filter ('the_content', 'wpautop');
?>

<?php  
// Load main options panel file  
require_once (TEMPLATEPATH . '/admin.php');  
?>  