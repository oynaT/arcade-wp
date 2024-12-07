<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
					<?php dynamic_sidebar( 'footer-1' ); ?>

					<?php dynamic_sidebar( 'footer-2' ); ?>

					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			
				<div class="col-lg-3">
					<div class="widget">
						<h3 class="mb-4">Recent Post Entry</h3>
						<div class="post-entry-footer">
							<ul>
								<?php
								$recent_posts = new WP_Query( array(
									'posts_per_page' => 3,
									'post_status'    => 'publish', // published only
									'orderby'        => 'date', // order by date
									'order'          => 'asc' // the latest post 
								) );

								if ( $recent_posts->have_posts() ) :
									while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>">
												<?php
												if ( has_post_thumbnail() ) {
													the_post_thumbnail( 'thumbnail', array( 'class' => 'me-4 rounded', 'alt' => esc_attr( get_the_title() ) ) );
												} ?>
												<div class="text">
													<h4><?php the_title(); ?></h4>
													<div class="post-meta">
														<span class="mr-2"><?php echo get_the_date(); ?></span>
													</div>
												</div>
											</a>
										</li>
									<?php endwhile;
									wp_reset_postdata();
								else : ?>
									<p>No post found.</p>
								<?php endif; ?>
							</ul>
						</div>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-1">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed by <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/tiny-slider.js"></script>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/flatpickr.min.js"></script>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/aos.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/glightbox.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/navbar.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/counter.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
	
	<?php wp_footer(); ?>
	</body>
    </html>
  