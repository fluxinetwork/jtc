<?php
/*
Template Name: Page d'accueil
*/
?>
<?php get_header(); ?>
	<section>
		<article>
			<h1>Monopage main : <?php bloginfo('title'); ?> </h1>
		</article>
	</section>

	<?php get_template_part( 'page-templates-parts/map', 'events' ); ?>

<?php get_footer(); ?>

