<?php
/**
 * Template Name: News
 */

get_header(); ?>
</div>
<div class="pageHeader">
	<div class="fullWidth">
		<h1>News</h1>	
	</div>
</div>
<div id="container" class="fullWidth">
<div class="whoAreYouBody sidebarTrue"> 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
</div>
<?php get_sidebar();?>
</div>

<script>
	console.log("hi");
</script>

<?php get_footer(); ?>