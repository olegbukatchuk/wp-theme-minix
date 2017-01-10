<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>

<!-- start entries -->
	<div id="entries-full">

<!-- start breadcrumbs -->
	<div id="breadcrumbs">
		<?php simplenotes_get_breadcrumbs(); ?><div class="clear"></div>
	</div>
<!-- end breadcrumbs -->

<?php if ( have_posts () ) : while (have_posts()):the_post();?>

<!-- start entry -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry">
			<h2><?php the_title(); ?></h2><div class="clear"></div>

<!-- start contents -->
	<div class="contents">
		<?php the_content(); ?><div class="clear"></div>
		<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
<!-- end contents -->

		</div>
	</div>
<!-- end entry -->

<?php endwhile; ?>

<?php comments_template(); ?>

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

<?php get_footer(); ?>