<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	
<div id="projects" class="full homeSection clearfix">
	
	<?php
	if(of_get_option('ttrust_home_project_type') == "featured") : //Show only featured projects 
		$args = array(
			'ignore_sticky_posts' => 1,
			'meta_key' => '_ttrust_project_featured',
			'meta_value' => true,    			
    		'posts_per_page' => $home_project_count,
    		'post_type' => array(				
				'project'					
				)
			);			
	else:
		$args = array(
			'ignore_sticky_posts' => 1,			  			
    		'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => array(				
				'project'					
				)
		);	
	endif;
	?>		
	<?php $projects = new WP_Query( $args ); ?>				
	<div class="thumbs clearfix">			
		<?php  while ($projects->have_posts()) : $projects->the_post(); ?>		
			<?php get_template_part( 'part-project-thumb'); ?>
		<?php endwhile; ?>
				
	</div>
</div>
<?php endif; ?>