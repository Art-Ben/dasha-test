<?php
/**
 * Template for displaying single post on home.php (home pager) 
 */
$post_title = get_the_title();
$post_id = get_the_id();
$post_excrept = get_the_excerpt();
$post_date = get_the_date( 'd, F Y' );
$post_thumb = get_the_post_thumbnail_url( $post_id, 'full' );
?>

<div class="cstPostsPage__single" id="post-<?php echo $post_id; ?>">
    <div class="thumb" style="background-image:url(<?php echo($post_thumb ? $post_thumb : '');?>)"></div>
    <div class="info">
        <span class="date"><?php echo $post_date; ?></span>
        <span class="title"><?php echo $post_title; ?></span>
        <div class="desc">
            <?php echo $post_excrept; ?>
        </div>    
    </div>
</div>