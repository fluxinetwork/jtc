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

		<?php get_template_part( 'page-templates-parts/map', 'events' ); ?>
		
		<article>
			<br><br>
			<a href="/ajouter-evenement/" class="button">Ajouter un event</a>
		</article>
	</section>
<?php get_footer(); ?>

