<?php
/**
 * Template Name: Home
 */

get_header(); ?>
</div>
<div class="homeSlider">
	<div class="fullWidth">
		<div class="ymcLogoImage"></div>
		<div class="sliderText">
			<p>The Young Magicians Club is a youth initiative of<br/> The Magic Circle, the world's premier magical society</p>
			<a class="loginButton readMore">Login</a>
			<a href="/join" class="readMore">Join</a>
			<a href="/about-us" class="readMore">Find out more</a>
		</div>
	</div>
	<?php echo do_shortcode('[slide-anything id="133"]'); ?>
</div>
<div class="areYou"> 
	<div class="fullWidth">
		<div class="sectionHeader">
			Are you?
		</div>
		<ul class="areYouList">
			<?php
				if(have_rows('are_you')) {
					while(have_rows('are_you')):
						the_row();
						echo '<li>' . get_sub_field('question') . '</li>';
					endwhile;
				}
			?>
		</ul>
		<div class="areYouJoin">
			Click <a href="/join/">here</a> to join us
		</div>
	</div>
</div>
<div class="homePageBody">
	<div class="fullWidth">
		<div class="three_column">
			<?php //var_dump(get_field('homepage_cards'));?>
			<?php
				$homepageCards = get_field('homepage_cards');
				foreach($homepageCards as $card){
// 					var_dump($card['logged_in']);
					if($card['logged_in'][0] == "yes") { $class="loggedInOnly";} ?>
					<a class="<?php echo $class;?>" href="<?php echo $card['card_link'];?>">
						<div>
							<div class="boxTitle">
								<img src="<?php echo $card['card_image'];?>">
								<h3><?php echo $card['card_title'];?></h3>
							</div>
							<div class="boxText">
								<p><?php echo $card['card_text'];?></p>
							</div>
						</div>
					</a>
				<?php }
			?>
		</div>
		<div class="secretsMagazine">
			<div class="sectionHeader">
				Secrets Magazine
			</div>
			<?php echo get_field('secrets_magazine');?>
			<div class="magazineBackground"></div>
			<div class="magazineStar"></div>
		</div>
	</div>
</div>
<div class="famousFaces"> 
	<div class="fullWidth">
		<div class="two_column">
<!-- 			<div>
				<div class="sectionHeader">
					Famous Faces
				</div>
				<p>
					See how many former members of the Young Magicians Club you recognise below
				</p>
			</div> -->
			<div>
				<div class="sectionHeader">
					What they say?
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
		</div>
	</div>
</div>

<script>
	
</script>

<?php get_footer(); ?>