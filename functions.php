<?php
//Widget - featured image
require_once ( get_template_directory() . '/feature-image-widget.php' );
//Attachment Icons
require_once ( get_template_directory() . '/attachment-icons.php' );

//wp requirements
if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
 
//supports custom background - visit wp-admin > appearance > background to change
add_theme_support( 'custom-background' ) ;
add_editor_style();

//supports featured post thumbnails - visit the edit a post to change this
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

//sets up image sizes for home page (name, width, height, crop)
add_image_size( 'scratch-thumbnail', 48, 48, true );
add_image_size( 'scratch-medium', 48, 48, true);

//set up menus
register_nav_menus( array(
	'top_menu' => 'Top Menu',
	'footer_menu' => 'Footer Menu'
) );

//adds 3 widget zones - home feature, sidebar and footer
if ( function_exists('register_sidebar') ){	
	register_sidebar(array(
		'name' => 'sidebar',
		'description' => 'A column alongside the content. called in sidebar.php',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'footer',
		'description' => 'the area at the bottom of the page. called in footer.php',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Home Featured Image',
		'description' => 'the area at the top of the home page. called in index.php',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}
//changes length of excerpt for a prettier home page
function new_excerpt_length($length) {
	return 12;
}
add_filter('excerpt_length', 'new_excerpt_length');

//changes the [...] in excerpts
function new_excerpt_more($more) {	
	 global $post;
	 $readmore = 'Read More';	 
	return ' <a class="readmore btn" href="'. get_permalink($post->ID) . '">' . $readmore. '</a>';

}
add_filter('excerpt_more', 'new_excerpt_more');

function scratch_scripts(){
	wp_enqueue_script("jquery");
	
	$modernizr_path =  get_template_directory_uri().'/scripts/modernizr.js';
  	wp_register_script( 'modernizr', $modernizr_path , '', '2.6.1', false ); 
	wp_enqueue_script('modernizr');	
		
}
add_action('wp_enqueue_scripts', 'scratch_scripts');