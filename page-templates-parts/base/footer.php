<footer class="footer">
	<img src="<?php bloginfo('template_url'); ?>/app/img/footer-scene.png" class="footer__scene">
	<p>Un projet à l’initiative du</p>
	<a href="http://www.transitioncitoyenne.org/" class="wrap-logo"><img src="<?php bloginfo('template_url'); ?>/app/img/logos/logo-ctc.png" alt="logo colectif journee transition"></a>

	<?php if (!is_front_page()) : ?>
		<div class="wrap-back">
			<a href="<?php bloginfo('url'); ?>" class="button--outline"><span class="icon-reply"></span>Retour accueil</a>

			<?php if (is_single()) : ?>
			<a href="<?php bloginfo('url'); ?>" class="button--outline"><span class="icon-plus"></span>Ajouter votre évènement</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</footer>