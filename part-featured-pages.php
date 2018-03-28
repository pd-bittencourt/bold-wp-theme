<?php $featured_pages_links_enabled = of_get_option('ttrust_featured_pages_links_enabled'); ?>
<?php $featured_page_count = intval(of_get_option('ttrust_featured_pages_count')); ?>
<?php
$args = array(
	'ignore_sticky_posts' => 1,  
	'meta_key' => '_ttrust_page_featured',
	'meta_value' => true,  			
	'posts_per_page' => $featured_page_count,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_type' => array(				
	'page'					
	)
);	
?>
<?php $pages = new WP_Query( $args ); ?>
<?php if($pages->post_count>0 && $featured_page_count > 0): ?>	
<div id="featuredPages" class="full homeSection clearfix">		
	<div class="flexslider normal">		
		<ul class="slides">
	<?php while ($pages->have_posts()) : $pages->the_post(); ?>			    
		<li <?php post_class(''); ?>>	
			<div class="inside">
			<?php if($featured_pages_links_enabled): ?>	
			<a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_post_thumbnail("ttrust_one_third_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>			
			<h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
			<?php else: ?>	
			<?php the_post_thumbnail("ttrust_post_thumb_small", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>						
			<h3 class="title"><?php the_title(); ?></h3>	
			<?php the_excerpt(); ?>
			<?php endif; ?>	
			</div>				
		</li>		
	<?php endwhile; ?>
		</ul>
	</div>
	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready(function(){
	jQuery('#featuredPages .flexslider').imagesLoaded(function() {		
		jQuery('#featuredPages .flexslider').flexslider({
			slideshowSpeed: 8000,  
			directionNav: false,
			slideshow: false,				 				
			animation: 'fade',
			animationLoop: true
		});  
	});
	});
	//]]>
	</script>
	
</div>
<?php endif; ?>