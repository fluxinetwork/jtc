<?php
/**
 * The template part for displaying the content
 */
?>

<div class="section">
	<div class="zigouigouis">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-1.svg" class="zigouigoui--1">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-2.svg" class="zigouigoui--2">
	</div>
	<article class="wrap-content">		

		<header><?php the_title( '<h1 class="single-title">', '</h1>' ); ?></header>		
		
		<p class="description"><?php the_content(); ?></p>

	</article>
	
	<img src="<?php bloginfo('template_url'); ?>/app/img/bus.png" class="bus">
</div>


