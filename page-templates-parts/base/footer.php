<footer class="footer">
	<img src="<?php bloginfo('template_url'); ?>/app/img/footer-scene.png" class="footer__scene">
	<p>Un projet à l’initiative du</p>
	<a href="http://www.transitioncitoyenne.org/" class="wrap-logo"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-ctc.png" alt="logo colectif journee transition"></a>
	<a href="http://www.transitioncitoyenne.org/contact/" target="_blank" class="button--outline p">Contact</a>
	<p>Illustrations : <a href="kdihttp://studiobluecherry.tumblr.com/" target="_blank">Studio Blue Cherry</a></p>
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