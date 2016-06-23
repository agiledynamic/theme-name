<?php
/**
 * The archive page for showcase.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme-name
 */

get_header();

query_posts('post_type=showcase'); ?>
<header class="container-fluid">
	<?php $value = get_theme_mod( 'showcase_background', get_template_directory_uri() . '/images/pineapple.jpeg' ); ?>
	<div class="row showcase__header" <?php if ($value !== ''){ echo 'style="background-image: url('.$value.')"'; } ?>>
		<span class="col-xs-12">
			<h1 class="showcase__title h1-font primary-color"><?php wp_title('') ?></h1>
		</span>
	</div>
</header>
<main id="showcase" class="site <?php echo get_theme_mod('layout_container', 'container'); ?> showcase__container">
	<section class="row showcase__grid">

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php $title= str_ireplace('"', '', trim(get_the_title())); ?>
		<?php $desc= str_ireplace('"', '', trim(get_the_content())); ?>

		<article class="col-xs-12 col-sm-6 col-lg-4 item"><!-- showcase-item -->
            <a title="<?= $title ?>" href="<?= get_permalink($post->ID) ?>">
                <div class="item__content" style="background-image: url('<?php the_post_thumbnail_url('full') ?>');">
                	<div class="item__overlay item--hover text-center accent-color-two-bg">
                        <figcaption class="item__text">
                            <h3 class="item__heading secondary-color">
                            	<?= $title ?>
                            </h3>
                            <p class="item__caption secondary-color">
                            	<?php echo excerpt(25); ?>
                            </p>
                        </figcaption>
                    </div>
                </div>
            </a>
        </article><!-- .showcase-item -->
	<?php endwhile; endif; ?>
	
	</section> <!-- .row -->
</main> <!-- / #showcase & .container -->

<?php wp_footer(); ?>
<?php get_footer(); ?>