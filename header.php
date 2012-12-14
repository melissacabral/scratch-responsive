<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( 'Page' , max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/reset.css" type="text/css" media="screen,projection" />

<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/font-awesome.css" rel="stylesheet" type="text/css" />

<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />

<!-- Media Queries support for IE < 9 (you can remove this section and the corresponding 'js' directory files if you don't intend to support IE < 9) -->
<!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/css3-mediaqueries.js"></script>
  <![endif]-->

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/selectivizr-min.js"></script>
  <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
<![endif]-->



</head>

<body <?php body_class(); ?>>
<nav id="navigation"> <a href="#nav" class="open-nav"><i class=" icon-arrow-down"></i> Open Navigation </a>
	<ul id="nav" class="clearfix">
		<?php wp_nav_menu( array(
		 	'theme_location' => 'top_menu',
			'container'       => false, 
			'items_wrap'      => '%3$s',
			'fallback_cb'     => '',
		 ) ); ?>
	</ul>
</nav>
<div id="header">
	<h1><a href="<?php echo home_url('/') ?>"><span>
		<?php bloginfo('name'); ?>
		</span></a></h1>
	<h2 class="description">
		<?php bloginfo('description'); ?>
	</h2>
</div>
<!-- /#header  -->