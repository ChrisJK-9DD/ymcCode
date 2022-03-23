<?php
/**
 * Template Name: Legal
 */

get_header(); ?>
</div>
<div id="container" class="fullWidth">
<div class="whoAreYouBody sidebarTrue"> 
	<h2>TERMS OF USE</h2>
	<?php echo the_content(); ?>
	<?php 
		$first_testimonial = get_field('first_testimonial');
		if( $first_testimonial ):?>
		<div class="testimony">
			<?php
				$post = $first_testimonial;
				setup_postdata($post);?>
				<div class="test_content">
					<?php echo the_content(); ?>	
				</div>
				<div class="test_title"><?php echo get_the_title(); ?></div>
				<div class="test_image">
					<?php echo the_post_thumbnail(); ?>
				</div>
				<?php wp_reset_postdata(); 
			?>
		</div>
	<?php endif; ?>
</div>
<?php get_sidebar( 'legal' );?>
</div>

<script>
	
</script>

<?php get_footer(); ?>