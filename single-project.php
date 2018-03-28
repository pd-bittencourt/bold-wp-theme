<?php get_header(); ?>			
		
		<div id="pageHead">				
		<div class="inside">				
			<h1><?php the_title(); ?></h1>								
		</div>					
		</div>
		<div id="middle" class="clearfix">		 
		<div id="content" class="full">			
			<?php while (have_posts()) : the_post(); ?>			    
			<div class="project clearfix">   						
				<?php the_content(); ?>
				<div class="meta clearfix">					
					<div class="projectNav next <?php if(!get_next_post()){ echo 'inactive'; }?>">						
						<?php next_post_link('%link', '&larr; %title'); ?>				
					</div>					
					<div class="projectNav previous <?php if(!get_previous_post()){ echo 'inactive'; }?>">
						<?php previous_post_link('%link', '%title &rarr;'); ?>
					</div>
				</div>									
			</div>
			<?php comments_template('', true); ?>	
			<?php endwhile; ?>										    	
		</div>
		</div>
<?php get_footer(); ?>