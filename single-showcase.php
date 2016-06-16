<?php get_header(); ?>
<div class="wrapper" id="single-wrapper">
	<div id="content" class="site-content site" role="document">

		<section class="container"> <!-- content -->
			<div class="row">

				<?php if ( have_posts() ) : ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class();?> >
						<header>
							<?php the_title( '<h2 class="featurette-heading">', '</h2>');?>
						</header>
						<?php while ( have_posts() ) : the_post(); ?>
		
							<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( 'showcase-img img-fluid' ); ?>
							<?php } ?>

							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							
							<?php
							//if comments is open and we have minimum 1 comment we load the comment_template.
							if ( comments_open() || get_comments_number() ) {
								comments_template(); //gör en comments.php
							}

						endwhile; ?>
					</article>
				<?php endif; ?>

			</div> 

			<hr class="featurette-divider">

		</section> <!-- .container -->

	</div><!-- #content -->
</div> <!-- .wrapper -->
<?php get_footer(); ?>
