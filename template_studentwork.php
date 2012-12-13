<?php 
/*
Template Name: Student Work Links
*/
?>
<?php get_header(); ?>  

<div id="content">

	<div class="main"><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<?php
		if(is_singular()){ ?>   
            <?php if(has_post_thumbnail()){
				//show medium image on posts and pages ?>
                <div class="thumbnail">
                <?php the_post_thumbnail('scratch-medium'); ?>
                </div>
			<?php } ?>
            <h2><?php the_terms($post->ID, 'class_day', '<span class="day">', ', ', '</span>'); ?> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>  </h2>
            <?php if(is_single()){get_attachment_icons($echo=true);} ?>
			<ul>
			<?php wp_list_bookmarks(array(
			'category' => '65',
			'title_li' => '',
			'categorize' => 0
			)) ?>
            </ul>
            
            
        <?php }else{ //not a singular page/post ?>
            <div class="thumbnail">       
            <?php 
            if(!is_category()){ ?>
            	
            <?php } ?>
            <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('scratch-thumbnail'); ?>
            </a>
            </div>	
            <div class="entry-content"><h2>
			<?php the_terms($post->ID, 'code_tag', '<span class="day">', ', ', '</span>'); ?>
			<?php the_terms($post->ID, 'class_day', '<span class="day">', ', ', '</span>'); ?> 
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>  </h2><h3><?php the_category(', '); ?></h3>
            <?php the_excerpt(); ?>
        
        
		
		
		
 <p class="metadata"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> | <?php the_category(', '); ?>  <?php edit_post_link('<i class="icon-pencil icon-large"></i>', ' '); ?>`</p>
 </div><?php }?>
        
        <?php comments_template(); // Get wp-comments.php template on single pages ?>
        
    </div><!-- end post -->
	<?php endwhile; else: ?>

	<img class="alignleft" src="http://wordpress.melissacabral.com/wp-content/uploads/2012/04/funny-dog-pictures-goggie-gif-roly-poly-roly-poly-roly-poly.gif" width="310" height="233" />
	
	<h2 class="entry-title"><a href="<?php echo home_url(); ?>">Woops...</a></h2>

	<p> Sorry, I'm having trouble finding what you're looking for. Try the search bar or the links at the top of the page</p>
	
	

	<?php endif; ?>

	<div class="pagenavi"><?php if(!is_home()){ posts_nav_link(); } ?></div>
</div><!-- end main -->
<?php get_sidebar(); ?>  
  </div><!-- /#content -->
<?php get_footer(); ?>  