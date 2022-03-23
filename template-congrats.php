<?php
/**
 * Template Name: Congratulations
 */

get_header(); ?>
</div>
<div class="pageHeader">
	<div class="fullWidth">
		<?php
			//var_dump($_SESSION['cf7_submission']);
			$newUserEmail = $_SESSION['cf7_submission']['email'];
			$newUserObject = get_user_by('email', $newUserEmail);
			$newUserID = $newUserObject->ID;
			if($_SESSION['cf7_submission']['text-30'] == "40.00"){
				$thisYear = date("Y");
				$nextYear = $thisYear+1;
				$renewalDate = date("d") . '/' . date("m") . '/' . $nextYear;
				
			}

			update_field('address_1', $_SESSION['cf7_submission']['address-1'], $newUserID);
			update_field('address_2', $_SESSION['cf7_submission']['address-2'], $newUserID);
			update_field('town', $_SESSION['cf7_submission']['town'], $newUserID);
			update_field('state', $_SESSION['cf7_submission']['county'], $newUserID);
			update_field('postcode', $_SESSION['cf7_submission']['postcode'], $newUserID);
			update_field('country', $_SESSION['cf7_submission']['country'], $newUserID);
			update_field('dob', $_SESSION['cf7_submission']['date-984'], $newUserID);
			update_field('renewal_date', $renewalDate, $newUserID);
		?>
		<h1><?php echo get_the_title();?></h1>	
	</div>
</div>
<div id="container" class="fullWidth">
<div class="whoAreYouBody sidebarTrue"> 
	<?php the_content(); ?>
</div>
<?php get_sidebar();?>
</div>

<script>

 </script>

<?php get_footer(); ?>