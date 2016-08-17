<?php
/*
Template Name: Ajouter événement
*/
?>
<?php get_header(); ?>

<article>
	<header>
		<h1><?php echo get_the_title(); ?></h1>
	</header>

	<?php require_once( get_template_directory() . '/page-templates-parts/forms/form-event.php' ); ?>

</article>

<?php get_footer(); ?>

