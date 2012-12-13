
<?php get_header(); ?>  

<div id="content">

 <div class="main"> <?php 
  
  
  while (have_posts()) : the_post(); ?>
     <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		 
		 <div class="thumbnail icon">		 
		  <?php $icon = get_post_meta($post->ID, 'wcm_icon', true);
		  if($icon): ?>
			 <a href="<?php the_permalink() ?>">
			 <i class="<?php echo get_post_meta($post->ID, 'wcm_icon', true);?>"></i>  
			 </a>
		  <?php endif;  ?> 		  
		</div><!--icon  -->	
		
         <div class="entry-content"><h2><?php the_terms($post->ID, 'class_day', '<span class="day">', ', ', '</span>'); ?> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <h3><?php the_category(', '); ?></h3>
		<?php the_excerpt(); ?>
        <?php edit_post_link('<i class="icon-pencil icon-large"></i>', ' '); ?></div>

        </div>
  <?php endwhile; ?>
  
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
 </div>


<?php get_sidebar(); ?>  
	
		
	

</div><!-- /#content -->

  
<?php get_footer(); ?>  