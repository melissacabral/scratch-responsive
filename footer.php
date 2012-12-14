

<div id="footer">


<?php if(has_nav_menu('footer_menu')): ?>
	
	  <?php wp_nav_menu( array(
		 	'theme_location' => 'footer_menu',
			'container' => false
		 ) ); ?>
	
<?php endif; ?>

    <ul> 

    <?php if ( !function_exists('dynamic_sidebar')  

        || !dynamic_sidebar('footer') ) : ?>  

     

    <?php endif; ?>  

    </ul>

    



	<p class="copyright">&copy; 2011 - <?php the_time('Y'); ?> Melissa Cabral<br />

	<a href="<?php bloginfo('rss2_url'); ?>">Grab the feed</a>

    </p>

<div class="clearer"></div>

</div>

<?php  //footer stuff ?>

<?php wp_footer(); ?>


</body>

</html>

