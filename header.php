<?php

$url = $_SERVER["SERVER_NAME"];

if(($url === "www.bold.pro.br")||($url === "bold.pro.br")||($url === "www.bold.net.br")||($url === "bold.net.br")||($url === "www.bolddesign.net.br")||($url === "bebold.com.br")||($url === "www.bebold.com.br")||($url === "bolddesign.net.br")||($url === "www.bolddesign.com.br")||($url === "bolddesign.com.br")){
header("location: http://www.bold.com.br");
}

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" />
	<?php $menu_font = of_get_option('ttrust_menu_font'); ?>
	<?php $heading_font = of_get_option('ttrust_heading_font'); ?>
	<?php $sub_heading_font = of_get_option('ttrust_sub_heading_font'); ?>
	<?php $body_font = of_get_option('ttrust_body_font'); ?>
	<?php $slideshow_heading_font = of_get_option('ttrust_slideshow_heading_font'); ?>
	<?php $slideshow_body_font = of_get_option('ttrust_slideshow_body_font'); ?>
	<?php $home_message_font = of_get_option('ttrust_home_message_font'); ?>
	
	<?php if ($menu_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($menu_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>
	<?php if ($heading_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($heading_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>	
	<?php if ($sub_heading_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($sub_heading_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>
	<?php if ($body_font != "" && $body_font != $heading_font) : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($body_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>	
	<?php if ($slideshow_heading_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($slideshow_heading_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>
	<?php if ($slideshow_body_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($slideshow_body_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>
	<?php if ($home_message_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($home_message_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>

	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php if (of_get_option('ttrust_favicon') ) : ?>
		<link rel="shortcut icon" href="<?php echo of_get_option('ttrust_favicon'); ?>" />
	<?php endif; ?>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?> >

<div id="container">	
<div id="header">
	<?php if(is_front_page() && of_get_option('ttrust_slideshow_enabled')) : ?>
	<div class="top">		
		<?php get_template_part( 'part-slideshow'); ?>		
	</div>
	<?php endif; ?>
	<div class="bottom">
	<div class="surround">
	<div class="inside clearfix">
		
		<div id="flag">
			<a href="http://bold.com.br/en"><img class="aligncenter size-full wp-image-1410" alt="btn-ing" 					src="http://bolddesign.com.br/wp-content/uploads/2014/06/btn-ing.png" width="25" height="20" /></a>
		</div>	
		<?php $logoHeadTag = (is_front_page()) ? "h1" : "h3";	?>					
		<?php $ttrust_logo = of_get_option('logo'); ?>
		<div id="logo">
		<?php if($ttrust_logo) : ?>				
			<<?php echo $logoHeadTag; ?> class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></<?php echo $logoHeadTag; ?>>
		<?php else : ?>				
			<<?php echo $logoHeadTag; ?>><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></<?php echo $logoHeadTag; ?>>				
		<?php endif; ?>	
		</div>
		
		<div id="mainNav" class="clearfix">		
			<div class="btn-toggle-menu">MENU</div>
			<?php wp_nav_menu( array(
				'menu_class' => 'responsive-menu', 
				'theme_location' => 'primary', 
				'fallback_cb' => 'default_nav'
				)); 
			?>		
		
		</div>	
							
	</div>
	</div>
	</div>	
</div>
