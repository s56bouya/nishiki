<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2, user-scalable=1, initial-scale=1" />
	<?php if( !is_home() ){ ?>
		<link rel="prerender" href="<?php echo esc_url( home_url() ); ?>">
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
