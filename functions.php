<?php

add_action( 'wp_ajax_get_single_ur', 'ajax_get_single_ur' );
add_action( 'wp_ajax_nopriv_get_single_ur', 'ajax_get_single_ur' );

add_action( 'wp_head','ajax_scripts' );

function ajax_scripts() {
	require get_stylesheet_directory() . '/ajax-scripts.php';
}

function ajax_get_single_ur() {
    $url =  $_POST['postUrl'];
 	$query = new WP_Query( array('p' => $_POST['postId']) );
 	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    get_template_part( 'includes/loop', 'index' );
		endwhile; 
	endif;
	wp_reset_postdata();
    wp_die();
}

$ajax_post_content = apply_filters('the_content', get_post_field('post_content', $my_post_id));


// Shortcode for latest posts
function latest_posts_ur( $atts ){
	$args = array(
		'numberposts' => 2,
		'offset' => 0,
		'category' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' =>'',
		'post_type' => 'post',
		'post_status' => 'draft, publish, future, pending, private',
		'suppress_filters' => true
	);

	$recent_posts = get_posts( $args );
	$post_content = ""; 
		foreach($recent_posts as $key => $recent_post) {
			$post_content .= '<div class="recentposts-wrapper"><p>' . $recent_post->post_title . '</p><p>' . $recent_post->post_date . '</p><a class="readmore-link" href="' . $recent_post->guid . '" data-id="' . $recent_post->ID . '">Läs mer >></a></div>' ;
		} 
		return $post_content;
		wp_reset_query();
}
add_shortcode( 'latest_posts_ur', 'latest_posts_ur' );

function readmore_latest_posts() {
	$args = array(
		'numberposts' => 10,
		'offset' => 0,
		'category' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' =>'',
		'post_type' => 'post',
		'post_status' => 'draft, publish, future, pending, private',
		'suppress_filters' => true
	);	
		return $the_query = new WP_Query( $args );
		wp_reset_query();
}

function insert_ajax_target() {
	echo '<div class="popuppost-wrapper"><div class="close-post"></div></div>';
	echo '<div class="page-cover"></div>';
}
add_action( 'wp_head','insert_ajax_target' );

?>