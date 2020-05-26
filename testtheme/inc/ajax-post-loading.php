<?php

if( !function_exists('ajax_load_more_posts')) {
	function ajax_load_more_posts(){
	
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1;
		$args['post_status'] = 'publish';
	
		query_posts( $args );
	
		if( have_posts() ) {

			while( have_posts() ) {
				the_post();
	
				get_template_part( 'template-parts/content', 'blog-mini' );

			}
		}
		die(); 
	}
} 
 
add_action('wp_ajax_loadmore_posts', 'ajax_load_more_posts');
add_action('wp_ajax_nopriv_loadmore_posts', 'ajax_load_more_posts');