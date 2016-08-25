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

	<section class="section intro">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-1.svg" class="zigouigoui--1">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-2.svg" class="zigouigoui--2">

		<div class="wrap-content">
			<h2><span>Les solution existent déjà :</span><br>à moi de faire le premier pas !</h2>

			<div class="video"><?php echo get_field('video'); ?></div>

			<p><?php echo get_field('texte_intro'); ?></p>

			<img src="<?php bloginfo('template_url'); ?>/app/img/pieton-cycliste.png" class="pieton-cycliste" />
		</div>
	</section>

	<section class="section solutions">
			<img src="<?php bloginfo('template_url'); ?>/app/img/france.svg" class="france">
			<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-2.svg" class="zigouigoui--3">

			<header class="wrap-content">
				<img src="<?php bloginfo('template_url'); ?>/app/img/chemin-pin.png" class="chemin-pin">
				<h2>Les solutions sont là !</h2>
				<h3>plus de <?php echo $count_events->publish + 247; ?> événements</h3>
			</header>
	
			<div class="map-holder">
				<a href="#" class="close js-close-map">X</a>
			 	<div id="map-events"></div>
			</div>
			
			<a href="#" class="map-launcher js-open-map">
				<span class="map-launcher__label">Voir la carte<br> des événements</span>
				<div class="map-launcher__map">
					<img src="<?php bloginfo('template_url'); ?>/app/img/simple-map.svg">
				</div>
			</a>

			<div class="wrap-content">
				<p>Vous organisez un évènement ?</p>
				<a href="<?php echo home_url(); ?>/ajouter-evenement/" class="button--cta">J’inscris mon évènement</a>
		
				<p class="mode-emploi">Vous souhaitez des conseils<br> pour organiser votre évènement ?</p>
				<a href="#" class="link">Voir le mode d’emploi</a>
			</div>	
	</section>

	<section class="section">
		<div class="share">
			<h2 class="share__title">Parlez en autour de vous</h2>
			<h3 class="share__subtitle">en partageant sur </h3>
			<p>#journeetransition</p>
		</div>

		<img src="<?php bloginfo('template_url'); ?>/app/img/bus.png" class="bus">
	</section>

	<section class="section photos">
		<h2>Les photos de la JTC</h2>
		<h3>éditions 2014 et 2015</h3>

		<?php if( $galerie ): ?>
			<div class="wrap-slider">
				<img src="<?php bloginfo('template_url'); ?>/app/img/montagne-eolienne.png" class="montagne-eolienne">
				<img src="<?php bloginfo('template_url'); ?>/app/img/eolienne.png" class="eolienne">

			    <div id="slider" class="flexslider">
			        <ul class="slides">
			            <?php foreach( $galerie as $image ): ?>
			                <li>
			                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">			                    
			                </li>
			            <?php endforeach; ?>
			        </ul>
			    </div>	
		    </div>		    
		<?php endif; ?>

	</section>

	<section class="section temoignages">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-1.svg" class="zigouigoui--4">
			<div class="wrap-content">
				<h2>Ils ont fait le premier pas</h2>
				<h3>voici leur histoire</h3>
				
				<?php if($testimonies): ?>
					<div class="tabs-controls limit">
						<?php foreach($testimonies as $row){ ?>
							<a href="#" class="tabs-control__btn js-tab-btn"><?php echo $row['prenom']; ?></a>
						<?php } ?> 
						<button class="more-tabs js-more-tabs">+</button>
					</div>
				<?php endif; ?>

				
				<?php if($testimonies): ?>
					<ul class="tabs">
						<?php foreach($testimonies as $row){ ?>
							<li class="tab">
								
								<p><span class="tab__title"><?php echo $row['localisation']; ?> : </span><?php echo $row['temoignage']; ?></p>
								
							</li>
						<?php } ?> 
					</ul>
				<?php endif; ?>		
			</div>
	</section>
	

<?php get_footer(); ?>

