<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
</div>
<div class="pageHeader">
	<div class="fullWidth">
		<h1><?php echo get_the_title();?></h1>	
	</div>
</div>
<div id="container" class="fullWidth">
<div class="whoAreYouBody sidebarTrue"> 
	<p>Contact us by email:</p>
	<p>
		<a href="mailto:info@youngmagiciansclub.co.uk">info@youngmagiciansclub.co.uk</a>
	</p>
	<br/>
	<p>Or by post at:</p>
	<p>The Young Magicians Club<br/>
	Centre for The Magic Arts<br/>
	12 Stephenson Way<br/>
	London<br/>
	NW1 2HD<br/>
	United Kingdom</p>
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