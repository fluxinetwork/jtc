<footer class="footer">
	<img src="<?php bloginfo('template_url'); ?>/app/img/footer-scene.png" class="footer__scene">
	<p>Un projet à l’initiative du<p>
	<a href="http://www.transitioncitoyenne.org/" class="wrap-logo" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-ctc.png" alt="logo colectif journee transition"></a>
	<p>Et ses membres</p>
	<ul class="logos wrap-content">
		<li class="logos__logo--small"><a href="https://alternatiba.eu/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-alternatiba.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.amisdelaterre.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-ami-terre.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.artisansdumonde.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-artisans-monde.jpg"></a></li>
		<li class="logos__logo--small"><a href="https://france.attac.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-attac.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.bioconsomacteurs.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-bio-conso.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.reseaucocagne.asso.fr/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-cocagne.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.demain-en-mains.info/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-demain.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.enercoop.fr/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-enercoop.jpg"></a></li>
		<li class="logos__logo--small"><a href="https://energie-partagee.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-ep.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.lelabo-ess.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-labo.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://miramap.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-mouvement-amap.jpg"></a></li>
		<li class="logos__logo--small"><a href="https://www.lanef.com/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-nef.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.onpassealacte.fr/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-passe-acte.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://www.commercequitable.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-plateforme-equitable.jpg"></a></li>
		<li class="logos__logo--small"><a href="http://eg-pouvoir-citoyen.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-pouvoir-citoyen.jpg"></a></li>
		<li class="logos__logo--small"><a href="https://collectif-roosevelt.fr/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-roosevelt.jpg"></a></li>
		<li class="logos__logo--small"><a href="https://www.terredeliens.org/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-terre-lien.jpg"></a></li>
		<li class="logos__logo--small"><a href="" target="_blank"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-membre-ville-transition.jpg"></a></li>
	</ul>

	<a href="http://www.transitioncitoyenne.org/contact/" target="_blank" class="contact-button">Contact</a>

	<p>Illustrations : <a href="http://studiobluecherry.tumblr.com/" target="_blank">Studio Blue Cherry</a></p>
	<p>Design & Code: <a href="http://www.yannrolland.com/" target="_blank">Yann Rolland</a> + <a href="http://www.tcaroli.fr/" target="_blank">Thibaut Caroli</a></p>

	<?php if (!is_front_page()) : ?>
		<div class="wrap-back">
			<a href="<?php bloginfo('url'); ?>" class="button--outline has-icon"><span class="icon-reply"></span>Retour accueil</a>

			<?php if (is_single()) : ?>
			<a href="<?php echo home_url(); ?>/ajouter-evenement/" class="button--outline has-icon"><span class="icon-plus"></span>Ajouter votre évènement</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</footer>