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

<!-- Bootstrap v4 Alpha -->
<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" integrity="sha384-XXXXXXXX" crossorigin="anonymous">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div class="fix-to-top"> <!-- fix header to top -->
				<div class="container"> <!-- margin right/left auto, padding left/right 15 -->
					<button></button> <!-- logo -->
					<nav> <!-- menu med ul -->
						
					</nav>
				</div>
			</div>
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
			<section> <!-- content -->
				<div class="container">
					<div class="row"></div>
				</div>
			</section>
			

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" integrity="sha384-XXXXXXXX" crossorigin="anonymous"></script>


</body>
</html>