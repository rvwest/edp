<?php
/**
* The Header for our theme.
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--[if IE 9]>
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
<![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  >
	<div id="wrapper" class="skepage " >
		<div id="header" class="skehead-headernav clearfix">
			<div class="glow">
				<div id="skehead">
					<div class="container">
						<div class="row-fluid fixedrow">
							<!-- #logo -->
							<div id="logo" class="span4">
								<?php if( get_theme_mod('advertica_lite_logo_img', '') != '' ){ ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" ><img class="logo" src="<?php echo esc_url( get_theme_mod('advertica_lite_logo_img') ); ?>" alt="<?php bloginfo('name') ?>" /></a>
								<?php } elseif ( display_header_text() ) { ?>
								<!-- #description -->
								<div id="site-title" class="logo_desp">
									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" ><?php bloginfo('name'); ?></a>
									<div id="site-description"><?php bloginfo( 'description' ); ?></div>
								</div>
								<!-- #description -->
								<?php } ?>
							</div>
							<!-- #logo -->
							<!-- navigation-->
							<div class="top-nav-menu span8">
							<?php
								if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'Header' ) ) {
									wp_nav_menu(array( 'container_class' => 'ske-menu', 'container_id' => 'skenav', 'menu_id' => 'menu-main','theme_location' => 'Header' ));
								} else {
								?>
								<div class="ske-menu" id="skenav">
									<ul id="menu-main" class="menu">
										<?php wp_list_pages('title_li=&depth=0'); ?>
									</ul>
								</div>
								<?php } ?>
							</div>
							<div class="clearfix"></div>
							<!-- #navigation -->
						</div>
					</div>
				</div>
				<!-- #skehead -->
			</div>
			<!-- glow -->
		</div>
<!-- #header -->
		<div class="header-clone"></div>

<!-- header image section -->
<?php include("includes/front-header-image-section.php"); ?>

<div id="main" class="clearfix ">
