<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet" type="text/css">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_enqueue_script('jquery'); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">

<!-- start header -->
	<header>
		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php $options = get_option( 'simplenotes_theme_options' ); ?>
<?php if ( $options['option_tagline'] != '' ) : ?><div id="description"><?php bloginfo('description'); ?></div><?php endif; ?>
	</header>
<!-- end header -->

<!-- start extra -->
	<div id="extra">

<!-- start social -->
<?php $options = get_option( 'simplenotes_theme_options' ); ?><?php if ( $options['option_social'] != '' ) : ?>
	<div id="social">
		<a id="rss" href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed">RSS Feed</a>
		<?php if ( $options['instagram_url'] != '' ) : ?><a id="instagram" title="Instagram" href="http://instagram.com/<?php echo $options['instagram_url']; ?>">Instagram</a><?php endif; ?>
		<?php if ( $options['twitter_url'] != '' ) : ?><a id="twitter" title="Twitter" href="http://twitter.com/<?php echo $options['twitter_url']; ?>">Twitter</a><?php endif; ?>
		<?php if ( $options['linkedin_url'] != '' ) : ?><a id="linkedin" title="Linkedin" href="http://linkedin.com/in/<?php echo $options['linkedin_url']; ?>">Linkedin</a><?php endif; ?>
		<?php if ( $options['facebook_url'] != '' ) : ?><a id="facebook" title="Facebook" href="http://facebook.com/<?php echo $options['facebook_url']; ?>">Facebook</a><?php endif; ?>
		<div class="clear"></div>
	</div>
<?php endif; ?>
<!-- end social -->

<!-- start search -->
<?php $options = get_option( 'simplenotes_theme_options' ); ?><?php if ( $options['option_search'] != '' ) : ?>
	<div id="search">
		<?php get_search_form(); ?><div class="clear"></div>
	</div>
<?php endif; ?>
<!-- end search -->

		<div class="clear"></div>
	</div>
<!-- end extra -->

<!-- start navigation -->
	<div id="navigation">
	<nav>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<?php wp_nav_menu( array( 'menu' => 'navigation', 'container_id' => '', 'container' => 'false', 'depth' => '2') ); ?>
	<?php else: ?>
	<ul><?php wp_list_pages('sort_column=menu_order&sort_order=asc&title_li=&depth=2'); ?></ul>
	<?php endif; ?>
		<div class="clear"></div>
	</nav>
</div>
<!-- end navigation -->

<!-- start main -->
	<main>