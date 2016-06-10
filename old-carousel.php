<section id="frontpage-carousel-01" class="carousel slide" data-ride="carousel" data-interval="" data-pause="hover" data-wrap="true">
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