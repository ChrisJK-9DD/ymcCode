<?php
/**
 * Template Name: Events
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
		Events
	</h2> -->
	<div class="library">
		<?php //the_content(); ?>
		<?php
			$moreArgs = array(
				'post_type' => 'events',
				'orderby' => 'date',
				'order'   => 'DESC',
			);
			$moreSel = new WP_Query($moreArgs);
			if ($moreSel->have_posts()) {
				while ( $moreSel->have_posts() ) : $moreSel->the_post(); ?>
					<div class="video">
						<h4 class="videoTitle"><?php echo get_the_title();?></h4>
						<div class="videoThumb"><img src="<?php echo get_the_post_thumbnail_url();?>"></div>
						<div class="videoDesc">
							<?php echo get_field('description'); ?>
						</div>
						<?php if(get_field('event_link') && get_field('event_link') != "#") { ?>
						<a href="<?php echo get_field('event_link');?>" class="eventLink">
							Find out more
						</a>
						<?php } ?>
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