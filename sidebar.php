<aside id="sidebar"> 

<?php if ( !function_exists('dynamic_sidebar')  
        || !dynamic_sidebar('sidebar') ) : ?>  
 <section class="widget">
 	<h3>About</h3>  
 	<p>This is the deafult sidebar, add some widgets to change it.</p>
 </section>  
<?php endif; ?>  


</aside> 