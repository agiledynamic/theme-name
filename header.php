<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
  WebFont.load({
    google: {
      families: ['Oswald']
    }
  });
</script>

	<nav class="navbar navbar-fixed-top navbar-light">
		<div class="container">
			<a class="navbar-brand nav-font primary-color" href="#">Navbar</a>
			<button class="navbar-toggler hidden-sm-up pull-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
			&#9776;
			</button>
			<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
				<ul class="nav navbar-nav">
					<li class="nav-item active">
						<a class="nav-link nav-font primary-color" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-font primary-color" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-font primary-color" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-font primary-color" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/showcase">Showcase</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>