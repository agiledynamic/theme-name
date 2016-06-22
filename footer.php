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
		<div class="row contact">
			<?php $query_about = new WP_Query( 'post_type=about&posts_per_page=1' ); ?>
			<?php $query_contact = new WP_Query( 'post_type=contact&posts_per_page=1' ); ?>

			<?php if( $query_about->have_posts() && $query_contact->have_posts() ) : ?>
				<div class="hidden-sm-down text-center col-md-4 col-lg-4 p-y-1 about secondary-color nav-font">
			<?php elseif( $query_about->have_posts() && $query_contact->have_posts() == false ) : ?>
				<div class="hidden-sm-down col-md-6 col-lg-6 p-y-1 about secondary-color nav-font">
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
				<div class="col-xs-12 text-xs-center col-md-4 p-y-1 text-md-left pull-md-right contact-adress secondary-color nav-font">
			<?php elseif( $query_contact->have_posts() && $query_about->have_posts() == false) : ?>
				<div class="col-xs-12 col-md-6 p-y-1 text-xs-center contact-adress secondary-color nav-font">
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
				$adress = get_post_meta($post->ID, 'street', true) . " " . get_post_meta($post->ID, 'zipcode', true) . " " . get_post_meta($post->ID, 'city', true);
			?>	
				<p><strong><?= $title ?></strong></p>
				<adress>
					<span><a class="secondary-color" href="http://maps.google.com/?q=<?= $adress; ?>"> <?= $adress; ?> </a></span>
					<span><a class="secondary-color" href="mailto:<?= get_post_meta($post->ID, 'email', true) ?>"><?= get_post_meta($post->ID, 'email', true) ?></a></span>
					<span><?= get_post_meta($post->ID, 'phone', true) ?></span>
					<span><a class="secondary-color" href="http://www.<?= $homepage; ?>"> <?= $homepage; ?></a></span> 
				</adress>
				</div> <!-- .contact -->
				<?php if ($query_about->have_posts() == false ) : ?>
				<div class="col-xs-12 col-md-6 p-y-1 contact-socialmedia">
				<?php else: ?>
				<div class="col-xs-12 col-md-4 p-y-1 contact-socialmedia">
				<?php endif; ?>
					<ul>
						<?php if ($facebook): ?>
						<li>
							<a class="secondary-color" href="http://www.facebook.com/<?= $facebook; ?>">
								<i class="fa fa-facebook-official" aria-hidden="true"></i> <?= $facebook; ?>
							</a>
						</li>
						<?php endif; ?>
						<?php if ($linkedin): ?>
						<li>
							<a class="secondary-color" href="http://www.linkedin.com/in/<?= $linkedin; ?> ">
								<i class="fa fa-linkedin" aria-hidden="true"></i> <?= $linkedin; ?>
							</a>
						</li>
						<?php endif; ?>
						<?php if($instagram): ?>
						<li>
							<a class="secondary-color" href="http://www.instagram.com/<?= $instagram; ?> ">
								<i class="fa fa-instagram" aria-hidden="true"></i> <?= $instagram; ?>
								</a>
						</li>
						<?php endif; ?>
						<?php if($twitter): ?>
						<li>
							<a class="secondary-color" href="http://www.twitter.com/<?= $twitter; ?>">
								<i class="fa fa-twitter" aria-hidden="true"></i> <?= $twitter; ?>
							</a> 
						</li>
						<?php endif; ?>
					</ul>
				</div>
				<?php endwhile; endif; ?>
			</div>
		</div> <!-- .row .contact -->
		<div class="row">
			<div class="col-xs-12 secondary-color nav-font"> <!-- Always showing -->
				<div class="text-xs-center"><?= bloginfo('name');?> &copy;  <?= date('Y'); ?> </div>
			</div>
		</div>
	</div> <!-- .container-fluid -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js" crossorigin="anonymous"></script>

</body>
</html>