<?php
/*
	Template Name: Home Page
*/
get_header();
the_post();
?>

<main>
	<div class="container">
		<?php the_content(); ?>
	</div>
</main>
<?php get_footer(); ?>