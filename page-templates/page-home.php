<?php
/*
Template Name: Page d'accueil
*/
?>
<?php 
	get_header(); 
 	$count_events = wp_count_posts('evenements'); 
 	$galerie = get_field('galerie'); 
 	$testimonies = get_field('temoignages');
 ?>	

	<article>
		<h2>Les solution existent déjà : <strong>à moi de faire le premier pas !</strong></h2>

		<div class="video"><?php echo get_field('video'); ?></div>

		<p><?php echo get_field('texte_intro'); ?></p>
	</article>

	<article>
		<h2>Les solutions sont là</h2>
		<h3>Plus de <?php echo $count_events->publish; ?> événements</h3>

		<div class="map-holder">
			<a href="#" class="close js-close-map">X</a>
		 	<div id="map-events"></div>
		</div>

		<a href="#" class="button js-open-map">Voir la carte des événements</a>
	
		<p>Vous organisez un évènement ?</p>

		<a href="<?php echo home_url(); ?>/ajouter-evenement/" class="button">J’inscris mon évènement</a>

		<p>Vous souhaitez des conseils pour organiser votre évènement ?</p>

		<a href="#" class="link js-accordion">Voir le mode d’emploi</a>

		<p class="accordion-content">
			<?php echo get_field('mode_emploi'); ?>				
		</p>

	</article>

	<article>
		<h2>Parlez en autour de vous</h2>
		<p>#journeetransition</p>
	</article>

	<article>
		<h2>Les photos de la JTC</h2>
		<p>éditions 2014 et 2015</p>

		<?php if( $galerie ): ?>
		    <div id="slider" class="flexslider">
		        <ul class="slides">
		            <?php foreach( $galerie as $image ): ?>
		                <li>
		                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">			                    
		                </li>
		            <?php endforeach; ?>
		        </ul>
		    </div>			    
		<?php endif; ?>

	</article>

	<article>
		<h2>Ils ont fait le premier pas</h2>
		<p>voici leur histoire</p>
		
		<?php if($testimonies): ?>
			<div class="tabs-controls">
				<?php foreach($testimonies as $row){ ?>
					<a href="#" class="button js-tab-btn"><?php echo $row['prenom']; ?></a>
				<?php $id_title++; } ?> 
			</div>
		<?php endif; ?>

		<?php if($testimonies): ?>
			<ul class="tabs">
				<?php foreach($testimonies as $row){ ?>
					<li class="tab"><?php echo $row['temoignage']; ?></li>
				<?php } ?> 
			</ul>
		<?php endif; ?>		


	</article>
	

<?php get_footer(); ?>

