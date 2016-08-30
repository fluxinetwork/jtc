<?php
/*
Template Name: Ajouter événement
*/
?>
<?php get_header(); ?>

<article>
	<header class="form-header">
		<h2>Ajouter votre évènement</h2>
	</header>

	<?php require_once( get_template_directory() . '/page-templates-parts/forms/form-event.php' ); ?>
</article>

<?php get_footer(); ?>

