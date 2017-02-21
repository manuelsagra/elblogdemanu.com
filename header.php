<!DOCTYPE html>
<!--
    ______ __   ____   __                     __         __  ___
   / ____// /  / __ ) / /____   ____ _   ____/ /___     /  |/  /____ _ ____   __  __
  / __/  / /  / __  |/ // __ \ / __ `/  / __  // _ \   / /|_/ // __ `// __ \ / / / /
 / /___ / /  / /_/ // // /_/ // /_/ /  / /_/ //  __/  / /  / // /_/ // / / // /_/ /
/_____//_/  /_____//_/ \____/ \__, /   \__,_/ \___/  /_/  /_/ \__,_//_/ /_/ \__,_/
                             /____/
-->
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('::', true, 'right'); ?>El Blog de Manu</title>
		<meta name="description" content="<?php if (!is_single()) : bloginfo('description'); else:
$post = $wp_query->post;
$descrip = strip_tags($post->post_content);
$descrip_more = '';
if (strlen($descrip) > 155) {
	$descrip = substr($descrip, 0, 155);
	$descrip_more = ' ...';
}
$descrip = str_replace('"', '', $descrip);
$descrip = str_replace("'", '', $descrip);
$descripwords = preg_split('/[\n\r\t ]+/', $descrip, -1, PREG_SPLIT_NO_EMPTY);
array_pop($descripwords);
$descrip = implode(' ', $descripwords) . $descrip_more;
echo $descrip;
 endif;?>">
		<meta name="keywords" content="manuel sagra, blog, juegos, reportajes, entrevistas, diseño, internet, opinion, curiosidades, desarrollo, manu">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<meta name="robots" content="follow, all, noodp">

		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@manuelsagra">
		<meta name="twitter:title" content="<?php wp_title('::', true, 'right'); ?>El Blog de Manu">
		<meta name="twitter:description" content="<?php if (!is_single()) : bloginfo('description'); else: echo trim(substr(strip_tags($post->post_content), 0, 250)); endif; ?>">
		<meta name="twitter:image" content="<?php
if (is_single()) {
	$images = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image");
	if ($images && count($images) > 0) {
		echo reset(array_reverse($images))->guid;
	} else {
		echo 'http://elblogdemanu.com/wordpress/wp-content/themes/responsive/img/mai@2x.png';
	}
} else {
	echo 'http://elblogdemanu.com/wordpress/wp-content/themes/responsive/img/mai@2x.png';
}
?>">

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?20150331">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

		<link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/ElBlogDeManu">
		<?php if (is_single()) : ?><link rel="canonical" href="<?php the_permalink(); ?>"><?php endif; ?>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
		</style>
<?php wp_head(); ?>
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="outdated">Estás usando un navegador <strong>inseguro</strong> y <strong>desactualizado</strong>. Por favor, <a href="http://browsehappy.com/">actualízalo</a> para mejorar tu experiencia al navegar por Internet.</p>
		<![endif]-->

		<div class="header-container">
			<header class="wrapper clearfix">
				<h1 class="title"><a href="/">El Blog de Manu</a></h1>
				<nav id="nav">
					<a href="#nav" title="Mostrar Categorías" class="mostrar"><i class="fa fa-bars"></i> <span>Categorías</span></a>
					<a href="#" title="Ocultar Categorías" class="ocultar"><i class="fa fa-angle-double-up"></i> <span>Categorías</span></a>
					<ul class="menu">
						<li><a href="/categoria/curiosidades/">Curiosidades</a></li>
						<li><a href="/categoria/entrevistas/">Entrevistas</a></li>
						<li><a href="/categoria/opinion/">Opinión</a></li>
						<li><a href="/categoria/reportajes/">Reportajes</a></li>
						<li><a href="/categoria/viajes/">Viajes</a></li>
						<li><a href="/categoria/varios/">Varios</a></li>
					</ul>
				</nav>
				<ul class="social">
					<li><a href="https://github.com/manuelsagra" title="Github"><i class="fa fa-github"></i></a></li>
					<li><a href="http://www.flickr.com/photos/manuelsagra/" title="Flickr"><i class="fa fa-flickr"></i></a></li>
					<li><a href="http://www.linkedin.com/in/manuelsagra" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="https://plus.google.com/+ManuelSagradeDiego/" title="Google+"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="https://twitter.com/manuelsagra" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="mailto:manuelsagra@gmail.com" title="Contacto"><i class="fa fa-envelope"></i> </a></li>
				</ul>
			</header>
		</div>

		<?php if (is_home()) : ?>
		<div class="profile-container">
			<section class="profile wrapper clearfix">
				<a href="http://manuelsagra.com/" class="manu">Manu</a>
				<p class="hello">¡Bienvenido!</p>
				<p>Me llamo <a href="http://manuelsagra.com/">Manuel Sagra</a>, y este blog está dedicado a hablar de mis aficiones, pero sobre todo de videojuegos de todas las épocas, y de curiosidades sobre los mismos. ¡Disfruta de la visita!</p>
			</section>
		</div>
		<?php endif; ?>

		<div class="main-container">
		<div class="main wrapper clearfix">