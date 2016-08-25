	</main>

	<?php get_template_part( 'page-templates-parts/partenaires'); ?>

	<?php get_template_part( 'page-templates-parts/base/footer'); ?>

<?php 
	wp_footer();

	if (is_user_logged_in()) {
		//echo '<script>document.write("<script src="http://" + (location.host || localhost").split(":")[0] + ":35729/livereload.js?snipver=1"></" + "script>)</script>';
	}
?>
	
</body>

</html>