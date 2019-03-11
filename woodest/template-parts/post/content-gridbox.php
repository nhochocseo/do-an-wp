<?php
/**
 * Template part for excerpt
 */
	global $post;
	$comment_count = wp_count_comments( $post->ID );
	$comment_count = $comment_count->total_comments;

	$post_categories = wp_get_post_categories( $post->ID );
	$custom_count_cats = 0;
	$count_post_categories = count($post_categories);
	$cats = array();
?>
<div class="col-md-4">
	<div class="main-gridbox">
		<div class="title">
			<?php the_title(); ?>
		</div>
		<div class="content">
			<?php the_excerpt(); ?>
		</div>
		<?php 
		if(has_post_thumbnail()){ ?>
			<div class="avatar">
				<?php the_post_thumbnail('full' ); ?>
			</div>
		<?php 
		} ?>
	</div>
</div>