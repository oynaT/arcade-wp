<?php get_header(); ?>

<section id="latest-blog" class="scrollspy-section bg-grey padding-large">
	<div class="container">

		<div class="row">
			<div class="col">
				<div class="section-header">
					<h2 class="section-title"><?php echo get_the_archive_title(); ?></h2>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<?php if ( have_posts() ) : ?>
					<div class="post-grid">
						<div class="row">
							<?php while( have_posts() ) : the_post(); ?>
								<div class="col-md-4">

								<article id="post-id-<?php the_ID(); ?>" <?php post_class( 'post-item' ) ?>>

										<?php if ( has_post_thumbnail() ) : ?>
											<figure>
												<a href="<?php echo get_the_permalink(); ?>" class="image-hvr-effect">
													<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'post-image', 'title' => 'Feature image' ] ); ?>
												</a>
											</figure>
										<?php endif; ?>

										<div class="post-content">
											<div class="meta-date"><?php echo get_the_date(); ?></div>
											<h3 class="post-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<p><?php the_excerpt(); ?></p>
										</div>
									</article>

								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php else : ?>
					No posts to be shown.
				<?php endif; ?>
			</div>
		</div>

		<div class="row">
			<div class="col">

				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'textdomain' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) );
				?>

				<!-- <div class="btn-wrap align-center">
					<a href="#" class="btn btn-xlarge btn-accent btn-rounded">View all blog</a>
				</div> -->

			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>