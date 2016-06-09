<?php get_header(); ?>

	<div id="content" class="site-content" role="document">

		<section class="container"> <!-- content -->

			<hr class="featurette-divider">
			<div class="row featurette">

				<?php if ( have_posts() ) : ?> 
					<div class="col-md-12">

						<?php the_title( '<h2 class="featurette-heading">', '</h2>'); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( 'showcase-img img-fluid' ); ?>
							<?php } ?>

							<?php the_content(); ?>

						<?php endwhile; ?>

					</div>
				<?php endif; ?>

			</div>
			<hr class="featurette-divider">

		</section>

	</div><!-- #content -->
	
<?php get_footer(); ?>
