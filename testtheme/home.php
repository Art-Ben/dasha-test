<?php
/**
 * template for basic home posts page
 */

get_header();
?>
<div class="cstPostsPage">
    <div class="container">
        <div class="cstPostsPage__title">
            <h1 class="caption">Read Our Blog</h1>
            <span class="subtitle">
                New stories
            </span>
        </div>

        <div class="cstPostsPage__items">
        <?php
            if(  have_posts() ) {
                while( have_posts() ) {
                    the_post();
                    
                    get_template_part( 'template-parts/content', 'blog-mini' );

                }
                global $wp_query;
                if (  $wp_query->max_num_pages > 1 ) {
                    echo '<div class="load_more_btn_cont"><a href="javascript:void(0);" rel="nofollow" class="ajax_load_more_posts">Load more posts</a></div>';
                }
            } else {
                echo '<div class="cstPostsPage__empty">Извините, но ни одной новости не найдено</div>';
            }
        ?>
        </div>
        
    </div>
</div>
<?php
get_footer();