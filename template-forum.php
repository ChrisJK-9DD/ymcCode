<?php
/**
 * Template Name: Forum
 */

get_header(); ?>
</div>
<div class="pageHeader">
	<div class="fullWidth">
		<h1>
			<?php echo get_the_title();?>
		</h1>	
	</div>
</div>
<div id="container" class="fullWidth">
<div class="whoAreYouBody sidebarTrue"> 
	<h2>
		Forum
	</h2>
	<div class="library">
		<?php the_content(); ?>
	</div>
	<div class="testimony">
		<?php
			$first_testimonial = get_field('first_testimonial');
			if( $first_testimonial ):
				$post = $first_testimonial;
				setup_postdata($post);?>
				<div class="test_content">
					<?php echo the_content(); ?>	
				</div>
				<div class="test_title"><?php echo get_the_title(); ?></div>
				<div class="test_image">
					<?php echo the_post_thumbnail(); ?>
				</div>
			<?php wp_reset_postdata(); endif; 
		?>
	</div>
</div>
<?php get_sidebar();?>
</div>

<script>
	
</script>

<?php get_footer(); ?>