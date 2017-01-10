<?php get_header(); ?>

<!-- start entries -->
	<div id="entries">

<?php if ( have_posts () ) : while (have_posts()):the_post();?>

<!-- start entry -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry">
			<h2><?php the_title(); ?></h2><div class="clear"></div>

<!-- start contents -->
	<div class="contents">
		<p><?php echo wp_get_attachment_link( $id, 'medium', true ); ?></p>
		<p><?php previous_image_link(); ?> <?php next_image_link();?></p>
	</div>
<!-- end contents -->

		</div>
	</div>
<!-- end entry -->

<?php endwhile; ?>

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