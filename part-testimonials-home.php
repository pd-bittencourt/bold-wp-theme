<?php $home_testimonial_count = intval(of_get_option('ttrust_home_testimonial_count')); ?>
<?php
$args = array(
	'ignore_sticky_posts' => 1,    	
	'post_type' => array(				
	'testimonial'					
	),
	'posts_per_page' => $home_testimonial_count,
);
$testimonials = new WP_Query( $args );		
?>
<?php if($home_testimonial_count > 0 && $testimonials->post_count > 0) : ?>
<div id="testimonials" class="full homeSection clearfix">			
	

	<div class="flexslider">		
		<ul class="slides">
		<?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
		<?php 
			$testimonial_background_img = wp_get_attachment_image_src(get_post_meta($post->ID, "_ttrust_testimonial_background_image", true), 'full'); 
			$testimonial_background_img = $testimonial_background_img[0];
			$t_styles = "";
			$t_class = "";
			if($testimonial_background_img){
				$t_styles .= "background-image: url(".$testimonial_background_img.");";						
				$t_styles .= "background-repeat: no-repeat;";
				$t_styles .= "background-position: center top;";
				$t_styles .= "background-size: cover;";	
			}		
		?>
					    
		<li id="testimonial<?php echo $post->ID; ?>" <?php post_class($t_class); ?> style="<?php echo $t_styles;?>">				
			<div class="inside">	
			<div class="text">			
				<?php the_content(); ?>	
				<span class="title"><span>- <?php the_title(); ?></span></span>
			</div>	
			</div>		
		</li>
		<?php endwhile; ?>		
		</ul>
	</div>
	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready(function(){
	jQuery('#testimonials .flexslider').imagesLoaded(function() {		
		jQuery('#testimonials .flexslider').flexslider({
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