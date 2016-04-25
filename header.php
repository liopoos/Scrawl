<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Scrawl
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<SCRIPT language=javascript>
function show_date_time(){
window.setTimeout("show_date_time()", 1000);
BirthDay=new Date("7/1/2015 18:05:30");//月，日，年，小时，分钟，秒
today=new Date();
timeold=(today.getTime()-BirthDay.getTime());
sectimeold=timeold/1000
secondsold=Math.floor(sectimeold);
msPerDay=24*60*60*1000
e_daysold=timeold/msPerDay
daysold=Math.floor(e_daysold);
e_hrsold=(e_daysold-daysold)*24;
hrsold=setzero(Math.floor(e_hrsold));
e_minsold=(e_hrsold-hrsold)*60;
minsold=setzero(Math.floor((e_hrsold-hrsold)*60));
seconds=setzero(Math.floor((e_minsold-minsold)*60));
span_dt_dt.innerHTML="已运行"+daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
}
function setzero(i){
if (i<10)
{i="0" + i};
return i;
}
show_date_time();
</SCRIPT>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/prism.css" type="text/css" media="screen" />
<script type="text/javascript" src=<?php bloginfo('template_url'); ?>/prism.js"></script>
<link href="/wp-content/themes/scrawl/prism.css" rel="stylesheet" />
<script type="text/javascript" src="https://blog.mayuko.cn/siyue-api/?encode=js&charset=utf-8"></script>
<?php wp_head(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'primary' ) || has_nav_menu ( 'social' ) ) : ?>
	<button class="menu-toggle x">
		<span class="lines"></span>
		<span class="screen-reader-text"><?php _e( 'Primary Menu', 'scrawl' ); ?></span>
	</button>
	<div class="slide-menu">
		<?php if ( function_exists( 'jetpack_the_site_logo' ) && has_site_logo() ) {
				jetpack_the_site_logo();
			} elseif ( '' !== get_theme_mod( 'scrawl_gravatar_email', '' ) ) {
				scrawl_get_gravatar();
			} 
		?>
		
		<?php if ( has_nav_menu ( 'social' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
		<?php endif; ?>

		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) {
			get_sidebar();
		} ?>
	</div><!-- .slide-menu -->
<?php endif; ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'scrawl' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
			<?php if ( function_exists( 'jetpack_the_site_logo' ) && has_site_logo() ) {
					jetpack_the_site_logo();
				} elseif ( '' !== get_theme_mod( 'scrawl_gravatar_email', '' ) ) {
					scrawl_get_gravatar();
				} 
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

	</header><!-- #masthead -->

	<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img class="custom-header" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	<?php endif;  // End header image check. ?>

	<?php // Single post header images */

		  if ( is_single() && has_post_thumbnail() ) : ?>
		<div class="featured-header-image">
			<?php the_title( '<h1 class="entry-title"><a id="scroll-to-content" href="#post-' . get_the_ID() . '">', '</a></h1>' ); ?>
		</div>
	<?php endif; ?>

	<div id="content" class="site-content">

