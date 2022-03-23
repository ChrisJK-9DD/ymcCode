<?php
/**
 * Template Name: FAQ
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
	<div class="accordion">
		<?php
			if(have_rows('faq')) {
				while(have_rows('faq')):
					the_row();
					echo '<div class="question"><h3>' . get_sub_field('question') . '</h3><i class="fas fa-angle-double-down"></i><i class="fas fa-angle-double-up"></i></div';
					echo '<div class="seperator"></div>';
					echo '<div class="answer">' . get_sub_field('answer') . '</div>';
				endwhile;
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
	var acc = document.getElementsByClassName("question");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
	    	for (j = 0; j < acc.length; j++) {
	      		if(acc[j] != this){
	        		if(acc[j].classList.contains("active")){
	          			acc[j].classList.remove("active");
	          			var panel = acc[j].nextElementSibling;
	          			panel.style.maxHeight = null;
	        		}
	      		}
	    	}
	    	this.classList.toggle("active");
	    	var panel = this.nextElementSibling;
	    	if (panel.style.maxHeight){
	      		panel.style.maxHeight = null;
	    	} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
	    	} 
	  	});
	}
</script>

<?php get_footer(); ?>