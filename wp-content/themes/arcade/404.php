<?php get_header(); ?>

<section id="not-found" class="scrollspy-section padding-xlarge">
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<div class="section-header">
					<h2 class="section-title"><?php echo get_the_title(); ?></h2>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12 description text-lead">
				<?php _e( 'Not Found.', 'arcade' ); ?>
			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>