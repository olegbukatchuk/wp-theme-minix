<?php
add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
if ( ! isset( $content_width ) ) {
$content_width = 595;
}
function simplenotes_alter_search_form( $form ){
return '<form role="search" method="get" id="search-form" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div>
				<label class="screen-reader-text" for="s">Search for:</label>
				<input type="text" placeholder="Search" autocomplete="off" value="" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="Search" />
		</div>
</form>';
}
add_filter( 'get_search_form', 'simplenotes_alter_search_form', 99999 );
?>
<?php
function theme_styles()  
{
  wp_register_style( 'simplenotes-style', 
    get_template_directory_uri() . '/style.css', 
    array(), 
    '4.2', 
    'all' );
  // enqueing:
  wp_enqueue_style( 'simplenotes-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');
function simplenotes_load_scripts() {
	if ( !is_admin() ) {  
		wp_register_script('simplenotes_custom_script', get_template_directory_uri() . '/js/scroll.js', array('jquery') );
		wp_enqueue_script('simplenotes_custom_script');
		wp_register_script('simplenotes_custom_script2', get_template_directory_uri() . '/js/custom.js', array('jquery') );
		wp_enqueue_script('simplenotes_custom_script2');
	}
}
add_action('init', 'simplenotes_load_scripts');
?>
<?php
add_action( 'init', 'simplenotes_register_menus' );
function simplenotes_register_menus() {
register_nav_menus( array(
'primary' => __( 'Primary Navigation', 'simplenotes' ),
) );
}
add_action( 'widgets_init', 'simplenotes_widgets_init' );
function simplenotes_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'simplenotes' ),
        'id' => 'sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'simplenotes' ),
        'before_widget' => '<div class="sidebar">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>',
    ) );
}
?>
<?php
if ( ! function_exists( 'simplenotes_comment' ) ) :
function simplenotes_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div class="comments" id="comment-<?php comment_ID(); ?>">
		<div class="commentsData">
			<div class="gravatar"><?php echo get_avatar( $comment, 50 ); ?></a></div>
		<div class="author">
				<div class="authorName"><?php comment_author_link() ?></div>
				<div class="authordate"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s at %2$s', 'simplenotes' ), get_comment_date(),  get_comment_time() ); ?></a> <?php edit_comment_link( __( '(Edit)', 'simplenotes' ), ' ' ); ?></div>
	</div>
<div class="clear"></div>
		</div>
		<div class="commented"><?php comment_text(); ?>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em>Your comment is awaiting moderation.</em>
			<br />
		<?php endif; ?>
		</div>
		<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
<div class="clear"></div>
	</div>
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'simplenotes'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
function simplenotes_get_breadcrumbs(){
	global $wp_query; 
	if ( !is_home() ){
		echo '<ul>';
		echo '<li><a href="'. home_url() .'">'. get_bloginfo('name') .'</a></li>';
		if ( is_category() ) 
		{
			$catTitle = single_cat_title( "", false );
			$cat = get_cat_ID( $catTitle );
			echo "<li> &nbsp; &#10151; ". get_category_parents( $cat, TRUE, " &#10151; " ) ."</li>";
		}
		elseif ( is_archive() && !is_category() ) 
		{
			echo "<li> &nbsp; &#10151; Archives</li>";
		}
		elseif ( is_single() ) 
		{
			$category = get_the_category();
			$category_id = get_cat_ID( $category[0]->cat_name );
			echo '<li> &nbsp; &#10151; '. get_category_parents( $category_id, TRUE, "</li><li> &nbsp; &#10151; " );
			echo the_title('','', FALSE) ."</li>";
		}
		elseif ( is_page() ) 
		{
			$post = $wp_query->get_queried_object(); 
			if ( $post->post_parent == 0 ){ 
				echo "<li>&nbsp; &#10151; ".the_title('','', FALSE)."</li>";
			} else {
				$title = the_title('','', FALSE);
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				array_push($ancestors, $post->ID);
 
				foreach ( $ancestors as $ancestor ){
					if( $ancestor != end($ancestors) ){
						echo '<li>&nbsp; &#10151; <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
					} else {
						echo '<li>&nbsp; &#10151; '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
					}
				}
			}
		}
		// End the UL
		echo "</ul>";
	}
}
?>
<?php
require_once ( get_stylesheet_directory() . '/theme-options.php' );
?>