<?php
/**
 * Template Name: Magazines
 */

get_header(); 

$moreArgs = array(
	'post_type' => 'magazine',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order'   => 'DESC',
);
$moreSel = new WP_Query($moreArgs);
?>
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
		<div class="tabs">
			<?php
				$yearArray = array();
				if ($moreSel->have_posts()) {
					while ( $moreSel->have_posts() ) : $moreSel->the_post();
						$title = get_the_title();
						$magazineYear = explode(" ", $title)[1];
						$magazineYear = explode("/", $magazineYear)[0];
						array_push($yearArray, $magazineYear);
					endwhile;
				}
			$years = array_unique($yearArray);
				foreach($years as $year) {
					if($year == date("Y")) {
						$class="active";
					} else { $class = "";}
					echo '<div class="tab ' . $class . '" data-year="' . $year . '">' . $year . '</div>';
				}
			?>
		</div>
		<?php //the_content(); ?>
		<?php
			if ($moreSel->have_posts()) {
				while ( $moreSel->have_posts() ) : $moreSel->the_post();
					$title = get_the_title();
					$magazineYear = explode(" ", $title)[1];
					$year = explode("/", $magazineYear)[0];
				?>
					<div class="video" data-year="<?php echo $year;?>">
						<a href="<?php echo get_field('magazine');?>" target="_blank">
							<div class="videoThumb"><img src="<?php echo get_field('cover');?>"></div>
						</a>
						<div class="videoInfo">
						    <h4 class="videoTitle"><a href="<?php echo get_field('magazine');?>" target="_blank"><?php echo $title;?></a></h4>
						    <div class="videoDesc">
    							<?php echo get_field('description'); ?>
						    </div>
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
	$(".video").hide();
	$(".video[data-year=2021]").show();
	
	$(".tab").on("click", function(){
		$(".tab").removeClass("active");
		$(this).addClass("active");
		var yearToShow = $(this).attr("data-year");
		$(".video").hide();
		$(".video[data-year="+yearToShow+"]").show();
	})
</script>

<?php get_footer(); ?>