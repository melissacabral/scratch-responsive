<?php get_header(); ?>  

<div id="content">

	<div class="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<?php
	//
	//SINGLE PAGE/POST
	//
	if(is_singular()){ ?>   
           
		 <?php $icon = get_post_meta($post->ID, 'wcm_icon', true); ?>
		  <header class="single-heading <?php if($icon) echo 'has-icon'; ?>">		 
		  <?php if($icon):?> 
			 <i class="<?php echo get_post_meta($post->ID, 'wcm_icon', true);?> icon-large"></i> 			
		  <?php endif;?>    
		 
		  <h2> <?php the_title(); ?>  </h2>
		 </header>
           
           <?php the_terms($post->ID, 'class_day', '<span class="day">', ', ', '</span>'); ?>
		  <?php the_content(); ?>
		  
		  <?php if(is_single()){get_attachment_icons($echo=true);} ?>

		  <?php wp_link_pages(array(
			  'before'=>'<div class="pagination"><i class="icon-asterisk icon-large"></i> Continue Reading:&nbsp;&nbsp;',
			   'after'=>'</div>',
			   'next_or_number'=>'number',
			   'pagelink'=>' Page %'
		  )); ?>
		  
		  <p class="metadata"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> | <?php the_category(', '); ?> <?php the_tags(' | Tags: ', ', ', ''); ?> <?php edit_post_link('<i class="icon-pencil icon-large"></i>', ' '); ?></p>
        <?php }else{ 
	   //
	   // NOT a singular page/post 
	   //?>
          
		  <div class="thumbnail icon">		 
		  <?php $icon = get_post_meta($post->ID, 'wcm_icon', true);
		  if($icon): ?>
			 <a href="<?php the_permalink() ?>">
			 <i class="<?php echo get_post_meta($post->ID, 'wcm_icon', true);?>"></i>  
			 </a>
		  <?php endif;  ?> 		  
		 </div><!--icon  -->	
		
            <div class="entry-content">
		  <h2>
			<?php the_terms($post->ID, 'code_tag', '<span class="day">', ', ', '</span>'); ?>
			<?php the_terms($post->ID, 'class_day', '<span class="day">', ', ', '</span>'); ?> 
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>  </h2>
		  
		  <h3><?php the_category(', '); ?></h3>
		  
            <?php the_excerpt(); ?>
        
        
		
		
		
 <p class="metadata"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> | <?php the_category(', '); ?> <?php edit_post_link('<i class="icon-pencil icon-large"></i>', ' '); ?></p>
 </div><?php }?>
        
        <?php comments_template(); // Get wp-comments.php template on single pages ?>
        
    </div><!-- end post -->
	<?php endwhile; else: ?>

	<img class="alignleft" src="http://wordpress.melissacabral.com/wp-content/uploads/2012/04/funny-dog-pictures-goggie-gif-roly-poly-roly-poly-roly-poly.gif" width="310" height="233" />
	
	<h2 class="entry-title"><a href="<?php echo home_url(); ?>">Woops...</a></h2>

	<p> Sorry, I'm having trouble finding what you're looking for. Try the search bar or the links at the top of the page</p>
	
	

	<?php endif; ?>

	<div class="pagination"> <?php
	  /**
	 * If more than one page exists, return TRUE.
	 */
	 if(function_exists('wp_pagenavi')){
	
		wp_pagenavi();
	 }else{
		function show_posts_nav() {
			global $wp_query;
			return ($wp_query->max_num_pages > 1);
		} ?>
		  
		<?php if (show_posts_nav()) : ?>
		
			<span class='older'><?php next_posts_link('&laquo; Older Entries'); ?></span>
			<span class='newer'><?php previous_posts_link('Newer Entries &raquo;'); ?></span>
		
		<?php endif; 
	
	 }?>  
	 </div>
</div><!-- end main -->
<?php get_sidebar(); ?>  
  </div><!-- /#content -->
<?php get_footer(); ?>  