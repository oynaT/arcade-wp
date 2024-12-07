<?php get_header(); ?>
  <div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading"><?php echo get_the_archive_title(); ?></div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
              <?php if ( have_posts() ) : ?>
							<?php while( have_posts() ) : the_post(); ?>
							<div id="post-id-<?php the_ID(); ?>" <?php post_class( 'blog-entry d-flex blog-entry-search-item' ) ?>>
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php echo get_the_permalink(); ?>" class="img-link me-4">
										<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'img-fluid', 'title' => 'Feature image' ] ); ?>
									</a>
								<?php endif; ?>
								<div>
              					<span class="date"><?php echo get_the_date(); ?> &bullet; <a href="#"><?php single_cat_title(); ?></a></span>
              						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
              						<p><?php the_excerpt(20); ?></p>
              						<p><a href="<?php echo get_the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
            					</div>
								</div>
							<?php endwhile; ?>	
				<?php else : ?>
					No posts to be shown.
				<?php endif; ?>

              <div class="row text-start pt-5 border-top">
                <div class="col-md-12">
                  <div class="custom-pagination">
                    <?php
                    the_posts_pagination( array(
                      'mid_size'  => 2,
                      'prev_text' => __( '<-', 'arcade' ),
                      'next_text' => __( '->', 'arcade' ),
                    ) );
                    ?>

                  </div>
                </div>
              </div>

				</div>

				<div class="col-lg-4 sidebar">
					
					<div class="sidebar-box search-form-wrap mb-4">
						<form action="#" class="sidebar-search-form">
							<span class="bi-search"></span>
							<input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
						</form>
					</div>
					<!-- END sidebar-box -->
					<div class="sidebar-box">
						<h3 class="heading">Popular Posts</h3>
						<div class="post-entry-sidebar">
							<ul>
							<?php display_popular_posts( 3 ); ?>
							</ul>
						</div>
					</div>
					<!-- END sidebar-box -->

					<div class="sidebar-box">
						<h3 class="heading">Categories</h3>
						<?php 
							if (function_exists('display_categories_in_sidebar')) {
								display_categories_in_sidebar();
							} else {
								echo 'No categories found.';
							}
						?>
					</div>
					<!-- END sidebar-box -->

					<div class="sidebar-box">
						<!-- <h3 class="heading">Tags</h3> -->
						<!-- <ul class="tags"></ul>  -->
						<!-- 	<li><a href="#">Travel</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Freelancing</a></li>
							<li><a href="#">Travel</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Freelancing</a></li>
						-->
					</div>

				</div>
			</div>
		</div>
	</div>  
  
  <?php get_footer(); ?>