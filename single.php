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
				<?php 
					$prev_post = get_previous_post();
					if($prev_post) {
	   				$prev_title = strip_tags(str_replace('"', '', $prev_post->post_title)); 
	   			?>
	   				<a rel="prev" href="<?= get_permalink($prev_post->ID) ?>" title="<?=$prev_title?>" class="prev-post"></a>
	            <?php } ?>
	           	<?php 
					$next_post = get_next_post();
					if($next_post) {
	   				$next_title = strip_tags(str_replace('"', '', $next_post->post_title)); 
	   			?>
	   				<a rel="next" href="<?= get_permalink($next_post->ID) ?>" title="<?=$next_title?>" class="next-post"></a>
	            <?php } ?>
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
