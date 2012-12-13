<?php
add_image_size( 'scratch-feature-image', 960, 360, true );
//home feature widget
class scratch_feature_widget extends WP_Widget {
	function scratch_feature_widget() {
		$widget_ops = array(
		'classname' => 'widget_feature', 
		'description' => 'Shows the latest large image from a specific category of posts. put this in the Home Featured Image area for best results' );
		$this->WP_Widget('widget_feature', 'Feature Image', $widget_ops);

	}
 
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
	 
			echo $before_widget;
			
			$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
			
			
			?>
            
            <?php 
				//first loop
				
				query_posts("category_name=$category&showposts=1"); ?>
				
				<?php while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" class="post">
				<div class="thumbnail">
				<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('scratch-feature-image'); ?>
				</a>
				</div>
				<div class="postinfo">
				<h3><?php the_category(', '); ?></h3>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?></div> 
				</div>
				<?php endwhile;?>
            
            <?php 
			echo $after_widget;

	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['category'] = strip_tags($new_instance['category']);
	
 
		return $instance;

	}
 
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'category' => '') );
		$category = strip_tags($instance['category']);
		
?>
			
			<p><label for="<?php echo $this->get_field_id('cateogry'); ?>">Category Name: <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo esc_attr($category); ?>" /></label></p>
			

<?php

	}
}
register_widget('scratch_feature_widget');