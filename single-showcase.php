<?php
/**
 * The template for displaying all showcase-single posts.
 *
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
			<header id="header" class="showcase-single__header" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');">
				<div class="showcase-single__text">
					<h1 class="showcase-single__title text-xs-center h1-font primary-color">
						<?php the_title(); ?>
					</h1>
					<p class="showcase-single__date text-xs-center  paragraph-font primary-color">
						<?php the_date('Y-m-d'); ?>
					</p>
					<p class="showcase-single__author text-xs-center  paragraph-font primary-color">
						Written by <?php the_author(); ?>.
					</p>
				</div>
			</header><!-- /header -->	

			<section class="<?php echo get_theme_mod('layout_container', 'container'); ?> showcase-single__container"> <!-- content -->
				<div class="row">
					<article class="col-xs-12 col-lg-10 col-lg-offset-1 showcase-single__content primary-color paragraph-font">
						<?php the_content(); ?>
						<hr class="featurette__divider accent-color-two">
					</article>
				</div>
			</section>

			<section class="<?php echo get_theme_mod('layout_container', 'container'); ?>">
				<div class="row">
					<div class="col-xs-12 col-lg-10 col-lg-offset-1 showcase-single__comments paragraph-font">
						<?php
							//if comments is open and we have minimum 1 comment we load the comment_template.
							if ( comments_open() || get_comments_number() ) {
								comments_template(); //gör en comments.php
							}
						?>
					</div>
				</div>
			</section>
		<?php endwhile; endif; ?>
		</div><!-- #content -->
	</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_footer(); ?>
