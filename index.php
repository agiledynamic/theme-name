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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav class="navbar navbar-fixed-top navbar-light bg-faded">
		<div class="container">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler hidden-sm-up pull-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
			&#9776;
			</button>
			<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<ul class="nav navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			
		</header><!-- #masthead -->

		<div id="content" class="site-content" role="document">
			<div id="frontpage-carousel" class="carousel slide" data-ride="carousel"> <!-- fullscreen -->
				<ol class="carousel-indicators">
					<li data-target="#frontpage-carousel" data-slide-to="0 active"></li>
					<li data-target="#frontpage-carousel" data-slide-to="1"></li>
					<li data-target="#frontpage-carousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="first-slide" src="" alt="First slide">
						<div class="container">
							<div class="carousel-caption text-xs-left">
								<p> 
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit enim quia cum cupiditate, earum qui voluptates ad vero, ab odit perferendis! Amet distinctio accusantium, minima assumenda. Similique necessitatibus quam maxime.
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="second-slide" src="" alt="Second slide">
						<div class="container">
							<div class="carousel-caption text-xs-right">
								<p> 
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit enim quia cum cupiditate, earum qui voluptates ad vero, ab odit perferendis! Amet distinctio accusantium, minima assumenda. Similique necessitatibus quam maxime.
								</p>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="frontpage-carousel" role="button" data-slide="prev">
						prev
					</a>
					<a class="right carousel-control" href="frontpage-carousel" role="button" data-slide="next">
						next
					</a>
				</div>
			</div>
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
							<h2 class="featurette-heading"><?php the_title(); ?></h2>
						</a>

						<p class="lead">
							<?php the_excerpt(__('(more…)')); ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" crossorigin="anonymous"></script>


</body>
</html>