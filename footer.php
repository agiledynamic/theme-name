<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */

?>
	<div class="container-fluid p-y-1">
		<div class="row">
			<?php $query_about = new WP_Query( 'post_type=about&posts_per_page=1' ); ?>
			<?php $query_contact = new WP_Query( 'post_type=contact&posts_per_page=1' ); ?>

			<?php if( $query_about->have_posts() && $query_contact->have_posts() ) : ?>
				<div class="col-xs-12 col-lg-5 p-y-1 about">
			<?php elseif( $query_about->have_posts() ) : ?>
				<div class="col-xs-12 col-lg-12 p-y-1 about">
			<?php else :  ?>
				<div>
			<?php endif; ?>
			
			<?php if( $query_about->have_posts() ) : while( $query_about->have_posts() ) : $query_about->the_post(); ?>
				<?php $title= str_ireplace('"', '', trim(get_the_title())); ?>
				<?php $desc= str_ireplace('"', '', trim(get_the_content())); ?>
					<p><strong><?= $title ?></strong></p>
					<p><?= $desc; ?></p><br>
			<?php endwhile; endif; ?>
				</div> <!-- .about -->

			<?php if( $query_contact->have_posts() && $query_about->have_posts() ) : ?>
				<div class="col-xs-12 col-lg-5 p-y-1 pull-lg-right contact">
			<?php elseif( $query_contact->have_posts()) : ?>
				<div class="col-xs-12 col-lg-5 p-y-1 contact">
			<?php else: ?>
				<div>
			<?php endif; ?>
			<?php if( $query_contact->have_posts() ) : while( $query_contact->have_posts() ) : $query_contact->the_post(); 
				$title = str_ireplace('"', '', trim(get_the_title())); 
				$homepage = str_ireplace ( array('www.', 'http://'), '', trim(get_post_meta($post->ID, 'webpage', true)));
				$facebook = get_post_meta($post->ID, 'facebook', true); 
				$linkedin = get_post_meta($post->ID, 'linkedin', true); 
				$instagram = get_post_meta($post->ID, 'instagram', true); 
				$twitter = get_post_meta($post->ID, 'twitter', true);
			?>	
				<p><strong><?= $title ?></strong></p>
				<adress>
					<p class="adress-online">
						<span><a href="mailto:<?= get_post_meta($post->ID, 'email', true) ?>"><?= get_post_meta($post->ID, 'email', true) ?></a></span>
						<span><?= get_post_meta($post->ID, 'phone', true) ?></span>
						<span><a href="<?= get_post_meta($post->ID, 'webpage', true) ?>"> <?= $homepage ?></a></span> 
					</p>
					<p class="adress-offline">
						<span><?= get_post_meta($post->ID, 'street', true) ?></span>
						<span><?= get_post_meta($post->ID, 'zipcode', true) ?></span>
						<span><?= get_post_meta($post->ID, 'city', true) ?></span>
					</p>
				</adress>
				</div> <!-- .contact -->
				<div class="col-xs-12 col-lg-2 center-block">
					<ul class="socialmedia">
						<?php if ($facebook): ?>
						<li>
							<a href="http://www.facebook.com/<?= $facebook; ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i> </a>
						</li>
						<?php endif; ?>
						<?php if ($linkedin): ?>
						<li>
							<a href="http://www.linkedin.com/in/<?= $linkedin; ?> "><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</li>
						<?php endif; ?>
						<?php if($instagram): ?>
						<li>
							<a href="http://www.instagram.com/<?= $instagram; ?> "><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</li>
						<?php endif; ?>
						<?php if($twitter): ?>
						<li>
							<a href="http://www.twitter.com/<?= $twitter; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></>
						</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endwhile; endif; ?>
			<div class="col-xs-12"> <!-- fallback if nothing is written in about and/or contact -->
				<span>&copy; <?= bloginfo('name');?> <?= date('Y'); ?> </span>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" crossorigin="anonymous"></script>

</body>
</html>