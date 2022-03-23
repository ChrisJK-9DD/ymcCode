<?php
/**
 * Template Name: Video
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
		VIDEO LIBRARY
	</h2> -->
	<div class="tabs">
	    <div class="tab active" data-cat="*">
	        View All
	    </div>
	    <?php
	        $catArray = array();
	        $moreArgs = array(
				'post_type' => 'video',
				'orderby' => 'date',
				'order'   => 'DESC',
			);
			$moreSel = new WP_Query($moreArgs);
			if ($moreSel->have_posts()) {
				while ( $moreSel->have_posts() ) : $moreSel->the_post();
				$terms = get_the_terms($post->ID, 'videoCat');
				$term = $terms[0];
				array_push($catArray, $term);
				endwhile;
			}
			$cats = array_unique($catArray);
			foreach($cats as $cat) {
			    echo '<div class="tab" data-cat="' . $cat->slug . '">' . $cat->name . '</div>';
			}
			
		?>
	</div>
	<div class="library">
		<?php //the_content(); ?>
		<?php
			
			if ($moreSel->have_posts()) {
				while ( $moreSel->have_posts() ) : $moreSel->the_post();
		            $terms = get_the_terms($post->ID, 'videoCat');
		            //var_dump($terms);
		            $term = $terms[0];
					?>
					<div class="video" data-cat="<?php echo $term->slug;?>">
						<h4 class="videoTitle"><?php echo get_the_title();?></h4>
						<div class="videoThumb"><?php echo get_field('link');?></div>
						<div class="videoDesc">
							<?php echo get_field('description'); ?>
						</div>
					</div>
				<?php endwhile;
			}
		?>
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
	$(".tab").on("click", function(){
		$(".tab").removeClass("active");
		$(this).addClass("active");
		var catToShow = $(this).attr("data-cat");
        $(".video").hide();
		if(catToShow == "*"){
		    $(".video").show();
		} else {
		    $(".video[data-cat="+catToShow+"]").show();
		}
		console.log(catToShow);
	})
</script>

<?php get_footer(); ?>