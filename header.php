<!DOCTYPE html>
<html lang="<?php echo get_locale() ?>">	
<head>
	
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title><?php get_template_part( 'page-templates-parts/base/title'); ?></title>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script type="text/javascript" src="http://www.ensa-dijon.fr/wp-content/themes/ensav6/assets/js/respond.min.js"></script>
	<script type="text/javascript" src="http://www.ensa-dijon.fr/wp-content/themes/ensav6/assets/js/selectivizr-min.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
	
</head>

<?php include( TEMPLATEPATH.'/app/inc/bodyclass.php' ); ?>
<body <?php body_class($bodyclass); ?> >
		
	<?php get_template_part( 'page-templates-parts/base/header'); ?>

	<main role="main">