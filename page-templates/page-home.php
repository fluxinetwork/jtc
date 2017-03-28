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

		<h2 class="wrap-content"><span>2000 événements</span><br>pour accélérer la transition !</h2>

		<div class="video has-anim"><?php echo get_field('video'); ?></div>
		
		<div class="wrap-content">
			<p><?php echo get_field('texte_intro'); ?></p>

			<img src="<?php bloginfo('template_url'); ?>/app/img/pieton-cycliste.png" class="pieton-cycliste" />
		</div>
	</section>

	<!--<section class="section solutions">
			<img src="<?php bloginfo('template_url'); ?>/app/img/france.svg" class="france">
			<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-3.svg" class="zigouigoui--3">

			<header class="solutions__header wrap-content has-anim">
				<img src="<?php bloginfo('template_url'); ?>/app/img/chemin-pin.png" class="chemin-pin">
				<img src="<?php bloginfo('template_url'); ?>/app/img/chemin-pin-plus.png" class="chemin-pin-plus">
				<h2><span class="icon--round icon-map-marker"></span><?php echo get_field('titre_carte'); ?></h2>
				<h3>plus de <?php echo $count_events->publish; ?> événements</h3>
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

			<div class="organisateur">
				<div class="organisateur__add">
					<p><?php echo get_field('texte_top_cta'); ?></p>
					<a href="<?php echo home_url(); ?>/ajouter-evenement/" class="button--cta h3"><?php echo get_field('texte_cta'); ?></a>
				</div>
		
				<div class="organisateur__help">
					<p class="mode-emploi">Vous souhaitez des conseils<br> pour organiser votre évènement ?</p>
					<a href="http://www.transitioncitoyenne.org/organiser-journee-v2/" target="_blank" class="link p">Voir le mode d’emploi</a>
				</div>
			</div>	
	</section>-->

	<section class="section">
		<div class="share">
			<h2 class="share__title"><?php echo get_field('titre_partage_reseaux_sociaux'); ?></h2>
			<h3 class="share__subtitle"><?php echo get_field('sous_titre_partage_reseaux_sociaux'); ?></h3>
			<div class="share__buttons">
				<a href="" class="wrap-icon--facebook js-share" data-url="<?php echo get_permalink(); ?>" data-network="facebook"><span class="icon-facebook"></span></a>
				<a href="" class="wrap-icon--twitter js-share" data-url="<?php echo get_permalink(); ?>" data-network="twitter"><span class="icon-twitter"></span></a>
			</div>
			<p><?php echo get_field('hashtag'); ?></p>
		</div>

		<img src="<?php bloginfo('template_url'); ?>/app/img/bus.png" class="bus">
	</section>

	<section class="section photos">
		<h2><span class="icon--round icon-image"></span><?php echo get_field('titre_galerie'); ?></h2>
		<h3><?php echo get_field('sous_titre_galerie'); ?></h3>

		<?php if( $galerie ): ?>
			<div class="wrap-slider has-anim">
				<div class="wrap-content">
					<img src="<?php bloginfo('template_url'); ?>/app/img/montagne-eolienne.png" class="montagne-eolienne">
					<img src="<?php bloginfo('template_url'); ?>/app/img/eolienne.png" class="eolienne">
				</div>
			    <div id="slider" class="flexslider">
			        <ul class="slides">
			            <?php foreach( $galerie as $image ): ?>
			                <li>
			                    <img src="" data-src="<?php echo $image['sizes']['slider']; ?>" alt="<?php echo $image['alt']; ?>">			                    
			                </li>
			            <?php endforeach; ?>
			        </ul>
			    </div>	
		    </div>		    
		<?php endif; ?>

	</section>

	<section class="section temoignages">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-4.svg" class="zigouigoui--4">
			<div class="wrap-content">
				<h2><span class="icon--round icon-users"></span><?php echo get_field('titre_temoignages'); ?></h2>
				<h3><?php echo get_field('sous_titre_temoignages'); ?></h3>
				
				<?php if($testimonies): ?>
					<div class="tabs-controls limit">
						<?php foreach($testimonies as $row){ ?>
							<a href="#" class="tabs-controls__btn js-tab-btn p"><?php echo $row['prenom']; ?></a>
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

