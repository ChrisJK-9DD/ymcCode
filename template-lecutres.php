<?php
/**
 * Template Name: Lectures
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
<!-- 	<h2>
		Magazines
	</h2> -->
	<div class="library">
		<?php //the_content(); ?>
		<?php
			$moreArgs = array(
				'post_type' => 'lecture',
				'orderby' => 'date',
				'order'   => 'DESC',
			);
			$moreSel = new WP_Query($moreArgs);
			if ($moreSel->have_posts()) {
				while ( $moreSel->have_posts() ) : $moreSel->the_post(); ?>
					<div class="video">
						<h4 class="videoTitle"><a href="<?php echo get_field('lecture_notes');?>"><?php echo get_the_title();?></a></h4>
						<a href="<?php echo get_field('lecture_notes');?>">
							<div class="videoThumb"><img src="<?php echo get_field('image');?>"></div>
						</a>
						
						<div class="videoDesc">
							<?php echo get_field('description'); ?>
						</div>
<!-- 						<a class="eventLink">
							Find out more
						</a> -->
					</div>
				<?php endwhile;
			}
		?>
	</div>
</div>
<?php get_sidebar();?>
</div>

<script>
	
</script>

<?php get_footer(); ?>