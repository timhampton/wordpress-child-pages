<?php
/**
 * @package Child_pages
 * @version 0.1
 */
/*
Plugin Name: Child Pages
Plugin URI: https://github.com/timhampton/wordpress-child-pages/
Description: This plugin simply allows you to list all the child pages of a page, via a simple shortcode [childpagelist]
Author: Tim Hampton
Version: 0.1
Author URI: http://tmh.nz/
*/




function tmh_list_child_pages() { 

global $post; 

if ( is_page() && $post->post_parent )

	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

	$string = '<ul class="child-page-item">' . $childpages . '</ul>';
}

return $string;

}

add_shortcode('childpagelist', 'tmh_list_child_pages');

?>
