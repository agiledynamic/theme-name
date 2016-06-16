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
		<h2> <?php echo wp_title(); ?></h2>
		<div class="row">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php $title= str_ireplace('"', '', trim(get_the_title())); ?>
				<?php $desc= str_ireplace('"', '', trim(get_the_content())); ?>

				<div class="col-xs-12 col-md-4 col-xl-3 showcase-item">
					<div class="img">
						<a title="<?= $title ?>" href="<?= get_permalink($post->ID) ?>">
							<?php the_post_thumbnail(); ?>	
						</a>
					</div> 
					<p>
						<strong><?= $title ?>: </strong> <?php print get_the_excerpt(); ?>
						<a title="<?= $title ?>" href="<?= get_permalink($post->ID) ?>">(more)</a>
					</p>
					<?php $site = get_post_custom_values('projLink'); ?>
					<?php if($site[0] != ""){ ?>
						<p>
							<a href="<?= $site[0] ?>">Visit the site</a>
						</p>
					<?php }else{ ?>
						<p><em>Live Link Unavailable</em></p>
					<?php } ?>
				</div> <!-- .showcase-item -->
			<?php endwhile; endif; ?>	
		</div> <!-- .row -->
	</section> <!-- .container -->
</div> <!-- #portfolio -->


<?php get_footer();

?>