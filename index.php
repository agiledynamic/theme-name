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
		<header id="masthead" class="site-header" role="banner">
			
		</header><!-- #masthead -->

		<div id="content" class="site-content" role="document">
			
			<!-- SLIDER -->
			<section class="extra-slider">
				<?php 
				$slide = 1;
				$my_post_meta = get_post_meta( $post-ID, 'proj-starred', true);

				$args = [
					'post_type'		=> 'showcase',
					'meta_key'		=> 'proj-starred',
				];
				$slider_query = new WP_Query($args);
				?>
				<figure class="wrapper">
					<ul>
					<?php while ($slider_query -> have_posts()) : $slider_query -> the_post(); ?>
						<li class="slider-item <?php if ($slide == 1) echo 'active'; ?>" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');" alt="">
							<figcaption class="slider-caption theme-font-color"><?php the_title(); ?></figcaption>
						</li>
					<?php 
					$slide++;
					endwhile; 
					wp_reset_postdata();
					?>
					</ul>
				</figure>
				<div class="navigation">
					<a href="#" class="prev">Previous</a>
					<a href="#" class="next">Next</a>
				</div>
				<div class="pagination"></div>
			</section> <!-- .extra-slider -->


			<section class="container"> <!-- content -->
			<!-- START THE FEATURETTES -->
				<hr class="featurette-divider">
				<?php 
				$showcase = new WP_Query( $args );
				$args = [
					'post_type'		=> 'showcase',
				];

			    $the_query = new WP_Query($args);
			 
				?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

				<div class="row featurette">
					<div class="col-md-7 <?php if ($the_query->current_post % 2 == 1) { echo 'col-md-push-5';} ?>">
						<a href="<?php the_permalink() ?>">
							<h2 class="featurette-heading theme-font-color"><?php the_title(); ?></h2>
						</a>

						<p class="lead theme-font-color">
							<?php echo get_the_excerpt(); ?>
						</p>
					</div>
					<div class="col-md-5 <?php if ($the_query->current_post % 2 == 1) { echo 'col-md-pull-7';} ?> square">
						<?php the_post_thumbnail( 'full', array( 'class' => 'featurette-image img-fluid center-block', 'alt' => 'Post feautred image' ) ); ?>
					</div>
				</div>
				<hr class="featurette-divider">
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			<!-- /END THE FEATURETTES -->

			</section>
			

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
	<?php get_footer(); ?>