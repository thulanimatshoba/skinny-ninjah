<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skinny_Ninjah
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script type="text/human">

		      ,gg,                                                             ,ggg, ,ggggggg,
		     i8""8i   ,dPYb,                                                  dP""Y8,8P"""""Y8b                                          ,dPYb,
		     `8,,8'   IP'`Yb                                                  Yb, `8dP'     `88                                          IP'`Yb
		      `88'    I8  8I      gg                                           `"  88'       88   gg                     gg              I8  8I
		      dP"8,   I8  8bgg,   ""                                               88        88   ""                     ""              I8  8'
		     dP' `8a  I8 dP" "8   gg    ,ggg,,ggg,    ,ggg,,ggg,   gg     gg       88        88   gg    ,ggg,,ggg,       gg    ,gggg,gg  I8 dPgg,
		    dP'   `Yb I8d8bggP"   88   ,8" "8P" "8,  ,8" "8P" "8,  I8     8I       88        88   88   ,8" "8P" "8,      8I   dP"  "Y8I  I8dP" "8I
		_ ,dP'     I8 I8P' "Yb,   88   I8   8I   8I  I8   8I   8I  I8,   ,8I       88        88   88   I8   8I   8I     ,8I  i8'    ,8I  I8P    I8
		"888,,____,dP,d8    `Yb,_,88,_,dP   8I   Yb,,dP   8I   Yb,,d8b, ,d8I       88        Y8,_,88,_,dP   8I   Yb,  _,d8I ,d8,   ,d8b,,d8     I8,
		a8P"Y88888P" 88P      Y88P""Y88P'   8I   `Y88P'   8I   `Y8P""Y88P"888      88        `Y88P""Y88P'   8I   `Y8888P"888P"Y8888P"`Y888P     `Y8
		                                                                ,d8I'                                          ,d8I'
		                                                              ,dP'8I                                         ,dP'8I
		                                                             ,8"  8I                                        ,8"  8I
		                                                             I8   8I                                        I8   8I
		                                                             `8, ,8I                                        `8, ,8I
		                                                              `Y8P"                                          `Y8P"
		</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part('partials/components/preloader'); ?>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'skinny-ninjah' ); ?></a>

    <?php
    get_template_part('partials/header/off-canvas');
    get_template_part('partials/header/header'); ?>
