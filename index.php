<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-name
 */
?>
<?php get_header(); ?>

	<div id="page" class="site">
		<div id="content" class="site-content" role="document">
			
			<!-- SLIDER -->
			<header class="extra-slider">
				<?php 
				$slide = 1;
				global $post;
				$starredPosts = get_post_meta( $post->ID, 'proj-starred' ); //get_post_meta( $post-ID, 'proj-starred', true);

				if( $starredPosts ){
					$args = [
						'post_type'		=> 'showcase',
						'meta_query'	=> [
							[
								'key'	=> 'proj-starred',
								'value' => 'Yes'
							]
						]
					];
					$slider_query = new WP_Query($args);
				} else {
					$slider_query = new WP_Query( 'post_type=showcase', 'posts_per_page="5"' );
				}
				?>
				<figure class="wrapper">
					<ul>
					<?php while ($slider_query -> have_posts()) : $slider_query -> the_post(); ?>
						<li class="slider-item <?php if ($slide == 1) echo 'active'; ?>" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');">
							<div class="navigation">
								<a href="#" class="prev secondary-color"></a>
								<a href="#" class="next secondary-color"></a>
							</div>
							<div class="slider-text">
								<h1 class="slider-title h1-font primary-color"><?php echo the_title(); ?></h1>
								<figcaption class="slider-caption h1-font primary-color">
									<?php if ( has_excerpt() ) {
										echo excerpt(35);
									} ?>
								</figcaption>
								<a class="slider-link h1-font primary-color" href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>">Read more</a>
							</div>
						</li>
					<?php 
					$slide++;
					endwhile; 
					wp_reset_postdata();
					?>
					</ul>
				</figure>
				<div class="pagination"></div>
			</header><!-- .extra-slider -->


			<section class="<?php echo get_theme_mod('layout_container', 'container'); ?> featurette__container"> <!-- content -->
				<!-- START THE FEATURETTES -->

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="row featurette" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');">
					<div class="col-md-5 <?php if ($wp_query->current_post % 2 == 1) { echo 'col-md-push-7';} ?> featurette__text secondary-color-bg">
						<a href="<?php the_permalink() ?>" class="primary-color">
							<h2 class="featurette__heading h2-font primary-color"><?php the_title(); ?></h2>
						</a>
						<p class="featurette__caption paragraph-font primary-color">
							<?php echo get_the_excerpt(); ?>
						</p>
						<a class="featurette__link h2-font primary-color" href="<?php the_permalink() ?>" title="<?php echo the_title(); ?>">Read more</a>
					</div>
				</div>
				<hr class="featurette__divider accent-color-two">
				<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

			<!-- /END THE FEATURETTES -->

			</section>
		</div><!-- #content -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
	<?php get_footer(); ?>