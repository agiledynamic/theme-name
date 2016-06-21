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
<title><?php echo get_bloginfo( 'name' ); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand nav-font secondary-color" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
			<button class="navbar-toggler hidden-lg-up pull-xs-right secondary-color" type="button" data-toggle="collapse" data-target="#navbarCollapse">
			&#9776;
			</button>
			<div class="collapse navbar-toggleable-md" id="navbarCollapse">

				<ul class="nav navbar-nav">
					<?php
					$queryObject = new WP_Query( 'post_type=showcase&posts_per_page=5' );
					// The Loop!
					if ($queryObject->have_posts()) {
					    while ($queryObject->have_posts()) {
					        $queryObject->the_post();
					        ?>
					        <li class="nav-item">
					        	<a class="nav-link nav-font secondary-color" href="<?php the_permalink(); ?>">
						        	<?php if (strlen($post->post_title) > 10) {
										echo substr(the_title($before = '', $after = '', FALSE), 0, 10) . '...'; 
									} else {
										the_title();
									} ?>
								</a>
					        </li>
					    <?php
					    }
					} ?>
					<li class="nav-item">
						<a class="nav-link nav-more nav-font secondary-color" href="<?php echo get_home_url(); ?>/showcase/">More showcases</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>