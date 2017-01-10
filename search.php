<?php get_header(); ?>

<!-- start entries -->
	<div id="entries">

<!-- start breadcrumbs -->
	<div id="breadcrumbs">
		<?php simplenotes_get_breadcrumbs(); ?><div class="clear"></div>
	</div>
<!-- end breadcrumbs -->

<?php if ( have_posts () ) : while (have_posts()):the_post();?>

<!-- start entry -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry">
 			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2><div class="clear"></div>

<!-- start date -->
	<a href="<?php echo get_permalink(); ?>">
		<div class="date">
			<div class="month"><?php the_time('M') ?></div>
			<div class="day"><?php the_time('d') ?></div>
		</div>
	</a>
<!-- end date -->

<!-- start contents -->
	<div class="contents">
		<?php the_content(); ?><div class="clear"></div>
		<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
<!-- end contents -->

<!-- start meta -->
	<div class="meta">
		<span class="category"><?php the_category(', ', '' ); ?></span>
		<span class="tag"><?php the_tags('', ', ', ''); ?></span>
		<span class="comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
		<div class="clear"></div>
	</div>
<!-- end meta -->

		</div>
	</div>
<!-- end entry -->

<?php endwhile; ?>

<!-- start pagination -->
<?php
$prev_link = get_previous_posts_link('<');
$next_link = get_next_posts_link('>');
if ( isset( $prev_link ) or isset( $next_link ) ) {
        echo '<div id="pagination">', PHP_EOL;
        if( isset( $prev_link ) ) {
            echo $prev_link;
        }
        if( isset( $next_link ) ) {
            echo $next_link;
        }
        echo '</div>', PHP_EOL;
    }
?>
<!-- end pagination -->

<?php else : ?>

<!-- start 404 -->
	<div class="entry">
		<h2>404 Not Found</h2><div class="clear"></div>
		<div class="contents">
			<p>Sorry, but you are looking for something that isn't here. </p>
			<p><?php get_search_form(); ?></p>
		</div>
	</div>
<!-- end 404 -->

<?php endif; ?>

	</div>
<!-- end entries -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>