<?php get_header(); ?>

<section class="section">
    <div class="container">
      <div class="row blog-entries element-animate">
        <div class="col-md-12 main-content">
          <div class="post-content-body align-items-center text-center">
			<h1 style="font-size: 100px;">404</h1>
		  	<h2><?php _e( 'Page Not Found.', 'arcade' ); ?></h2><br>
			<a style="font-size: 18px;" href="<?php echo get_home_url( '/' ); ?>" class="">Back to Home</a>
		  </div>
		</div>
	</div>
	</div>
</section>

<?php get_footer(); ?>