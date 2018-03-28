<?php
$args = array(
	'ignore_sticky_posts' => 1,
	'posts_per_page' => 20,
	'post_type' => 'slide'
);
$slides = new WP_Query( $args );	
?>

<?php if($slides->post_count > 0) :?>
<div class="slideshow">
			
	<div class="flexslider">		
		<ul class="slides">
			<?php $i = 1; while ($slides->have_posts()) : $slides->the_post(); ?>
			<?php
			//Get slide options			
			$slide_background_img = wp_get_attachment_image_src(get_post_meta($post->ID, "_ttrust_slide_background_image", true), 'full');			
			$slide_background_img = $slide_background_img[0];
			
			$s_styles = "";
			$s_class = "";
			if($slide_background_img){
				$s_styles .= "background-image: url(".$slide_background_img.");";						
				$s_styles .= "background-repeat: no-repeat;";
				$s_styles .= "background-position: center center;";
				$s_styles .= "background-size: cover;";	
			}		
			?>					
		
			<li id="slide<?php echo $i; ?>" <?php post_class($s_class); ?> style="<?php echo $s_styles;?>">								
					<div class="details">
						<div class="box">
							<div class="inside">
								<div class="text">
									<?php the_content(); ?>								
								</div>
							</div>
						</div>					
					</div>				
			</li>		
			
			<?php $i++; ?>			
		
			<?php endwhile; ?>
		</ul>
	</div>	
	
	<div id="downButton"></div>
	
	<?php $slideshow_delay = of_get_option('ttrust_slideshow_delay'); ?>
	<?php $autoPlay = ($slideshow_delay != "0") ? 1 : 0; ?>
	<?php $slideshow_effect = "fade" ?>

	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready(function(){			
		jQuery('#header .top .flexslider').flexslider({
			slideshowSpeed: <?php echo $slideshow_delay . '000'; ?>,  
			directionNav: true,
			slideshow: <?php echo $autoPlay; ?>,				 				
			animation: '<?php echo $slideshow_effect; ?>',
			animationLoop: true
		});  		
	});
	//]]>
	</script>
</div>
<?php endif; ?>