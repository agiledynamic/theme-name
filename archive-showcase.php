<?php
/**
 * The archive page for showcase.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-name
 */

get_header();

query_posts('post_type=showcase&posts_per_page=9'); ?>

<div id="portfolio" class="site">
	<section class="container">
		<h1 class="h1-font"><?php wp_title('') ?></h1>
		<div class="row showcase-grid">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php $title= str_ireplace('"', '', trim(get_the_title())); ?>
				<?php $desc= str_ireplace('"', '', trim(get_the_content())); ?>

				<div class="col-xs-12 col-md-4 col-xl-3 item">
					<a title="<?= $title ?>" href="<?= get_permalink($post->ID) ?>">
						<div class="img">
							<?php the_post_thumbnail(); ?>	
						</div> 
						<p class="showcase-item__title paragraph-font accent-color-one">
							<strong class="primary-color"><?= $title ?></strong>
							<span class="info"><?php print get_the_excerpt(); ?></span>
						</p>						
					</a>
					
				</div> <!-- .showcase-item -->
			<?php endwhile; endif; ?>
		</div> <!-- .row -->
	</section> <!-- .container -->
</div> <!-- #portfolio -->


<?php get_footer();

?>