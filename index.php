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
			
			<!-- CAROUSEL -->
			<section id="frontpage-carousel-01" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="hover" data-wrap="true">
				<?php 
				$stickyposts = get_option( 'sticky_posts' );
				$slide = 1;
				if ( $stickyposts ) {
					$args = [
				        'post_type'           => 'post',
				        'post__in'            => $stickyposts,
				        'ignore_sticky_posts' => 1
				    ];
				    $carousel_query = new WP_Query($args);
				} else {
					$carousel_query = new WP_Query( 'posts_per_page=5' );
				}
				?>
				<ol class="carousel-indicators">
					<?php while ($carousel_query -> have_posts()) : $carousel_query -> the_post(); ?>
						<li data-target="#frontpage-carousel-01" data-slide-to="<?php echo $carousel_query->current_post; ?>" class="<?php if ($slide == 1) echo 'active'; ?>"></li>
					<?php endwhile;?>
				</ol>
				<div class="carousel-inner" role="listbox">
					
					<?php while ($carousel_query -> have_posts()) : $carousel_query -> the_post(); ?>
					<figure class="carousel-item <?php if ($slide == 1) echo 'active'; ?>" style="background-image: url('<?php the_post_thumbnail_url() ?>');" alt="">
						<figcaption class="carousel-caption">
							<h3 class="theme-font-color"><?php the_title(); ?></h3>
						</figcaption>
					</figure>
					<?php 
					$slide++;
					endwhile; 
					wp_reset_postdata();
					?>
				</div>
				<a class="left carousel-control" href="#frontpage-carousel-01" role="button" data-slite="prev">
					<span class="icon-prev" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<a class="right carousel-control" href="#frontpage-carousel-01" role="button" data-slite="next">
					<span class="icon-next" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</section>
			<!-- CAROUSEL -->


			<section class="container"> <!-- content -->
			<!-- START THE FEATURETTES -->
				<hr class="featurette-divider">

				<?php 
				$stickyposts = get_option( 'sticky_posts' );

				if ( $stickyposts ) {
					$args = [
				        'post_type'           => 'post',
				        'post__in'            => $stickyposts,
				        'ignore_sticky_posts' => 1
				    ];

				    $the_query = new WP_Query($args);
				} else {
					$the_query = new WP_Query( 'posts_per_page=5' );
				}
			 
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