<?php get_header(); ?>

<section id="about" class="scrollspy-section padding-xlarge">
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<div class="section-header">
                     <h1>PAGE TEMPLATE</h1>
					<h2 class="section-title"><?php echo get_the_title(); ?></h2>
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-md-12 description text-lead">
				<?php the_content(); ?>
			</div>

		</div>

	</div>
</section>

<?php get_footer(); ?>