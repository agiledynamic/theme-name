<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package theme-name 
 *
 * sistaminuten fix: kopiera å klistra! :)
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header id="header" class="single__header" style="background-image: url('https://media.giphy.com/media/9J7tdYltWyXIY/giphy.gif');">
				<div class="single__text">
					<h1 class="single__title text-xs-center h1-font primary-color">
						404 - page not found
					</h1>
				</div>
			</header><!-- /header -->	

			<section class="<?php echo get_theme_mod('layout_container', 'container'); ?> single__container"> <!-- content -->
				<div class="row">
					<article class="text-xs-center col-xs-12 col-lg-10 col-lg-offset-1 single__content primary-color">
						<p>Nuttin´ to see here, move along.</p>
					</article>
				</div>
			</section>


		</main><!-- .site-main -->

	</div><!-- .content-area -->

<?php get_footer(); ?>
