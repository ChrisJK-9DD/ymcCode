<?php
/**
 * Template Name: Join
 */

get_header(); ?>
</div>
<div class="pageHeader">
	<div class="fullWidth">
		<?php $url=parse_url(get_permalink());
//echo $url["fragment"]; global $wp;
// add_query_arg( $wp->query_vars, home_url() );?>
		<h1><?php echo get_the_title();?></h1>	
	</div>
</div>
<div id="container" class="fullWidth">
<div class="whoAreYouBody sidebarTrue"> 
	<?php the_content(); ?>
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
//     function onSubmit(token) {
// 		document.getElementById("wpcf7-f123-o1").submit();
// 	}
// 	
	$("document").ready(function(){
		if($("body").hasClass("page-id-167")){
			$("#fullPriceHidden").val("30.00");
		} else {
			$("#fullPriceHidden").val("40.00");
		}
	});
	
	$('.wpcf7-form-control-wrap input[type=radio][name=radio-32]').change(function() {
    	if (this.value == '£30 (One Year)') {
			if($("body").hasClass("page-id-167")){
				$(".subTotal span").text("30");
			} else {
    	    	$(".subTotal span").text("40");
			}
    	}
    	else if (this.value == '£60 (Two Years)') {
    	    $(".subTotal span").text("60");
    	}
		$("#fullPriceHidden").val($(".subTotal span").text() + ".00");
	});
	
	if($("body").hasClass("page-id-179")){
		setTimeout(function(){
			//window.location.pathname = "/";	
		},3000);
	}
 </script>

<?php get_footer(); ?>