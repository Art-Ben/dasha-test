<?php

if( !function_exists('clear_styles_and_scripts') ) {
    function clear_styles_and_scripts() {
        global $wp_scripts;
        global $wp_styles;
        $styles_to_keep = array("wp-admin", "admin-bar", "dashicons", "open-sans");
      
        foreach( $wp_styles ->queue as $handle ) {
         if ( in_array($handle, $styles_to_keep) ) continue;
          wp_dequeue_style( $handle );
          wp_deregister_style( $handle );
      
        }
    }

    add_action( 'wp_enqueue_scripts', 'clear_styles_and_scripts', 100 );
}

if( !function_exists('init_style_scripts') ) {
    function init_style_scripts() {
        // styles 
        wp_enqueue_style('main', get_template_directory_uri().'/dist/styles/main.min.css');

        // scripts
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        global $wp_query;
        wp_register_script('main-js', get_template_directory_uri().'/dist/scripts/main.min.js', array(), null, true);
        
        wp_localize_script( 'main-js', 'ajax_posts_object', array(
            'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', 
            'posts' => json_encode( $wp_query->query_vars ),
            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages
        ) );

        wp_enqueue_script('main-js');
    }
}


