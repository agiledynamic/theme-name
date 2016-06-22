<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme_name
 */

get_header(); ?>

<div id="page" class="site">
		<div id="content" class="site-content" role="document">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<nav class="switch-post">
			<a href="#" class="prev-post" alt="Link to next post."></a>
			<a href="#" class="next-post" alt="Link to previous post."></a>
		</nav>
			<header id="header" class="single__header" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');">
				<div class="single__text">
					<h1 class="single__title text-xs-center h1-font primary-color">
						<?php the_title(); ?>
					</h1>
					<p class="single__date text-xs-center  paragraph-font primary-color">
						<?php the_date('Y-m-d'); ?>
					</p>
					<p class="single__author text-xs-center  paragraph-font primary-color">
						Written by <?php the_author(); ?>.
					</p>
				</div>
			</header><!-- /header -->	

			<section class="<?php echo get_theme_mod('layout_container', 'container'); ?> single__container"> <!-- content -->
				<div class="row">
					<article class="col-xs-12 col-lg-10 col-lg-offset-1 single__content primary-color">
						<?php the_content(); ?>
					</article>
				</div>
			</section>
		<?php endwhile; endif; ?>
		</div><!-- #content -->
	</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_footer(); ?>
