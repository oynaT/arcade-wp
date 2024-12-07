<?php get_header(); ?>

<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center pt-5">
        <div class="col-lg-6">
          <h1 class="heading text-white mb-3" data-aos="fade-up"> <?php echo get_the_archive_title(); ?> </h1>
          <p class="text-white">
          <?php
			echo get_the_author_meta( 'description' );
		   ?>			
		 </p>          
        </div>
      </div>
    </div>
  </div>

  <div class="section search-result-wrap">
    <div class="container">
      
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
              					<span class="date"><?php echo get_the_date(); ?> &bullet; <a href="#">Business</a></span>
              						<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
              						<p><?php the_excerpt(20); ?></p>
              						<p><a href="<?php echo get_the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
            					</div>
								</div>
							<?php endwhile; ?>
				<?php else : ?>
					No posts found.
				<?php endif; ?>

          <div class="row text-start pt-5 border-top">
            <div class="col-md-12">
              <div class="custom-pagination">

                <?php
                the_posts_pagination( array(
                  'mid_size'  => 4,
                  'prev_text' => __( '<-', 'arcade' ),
                  'next_text' => __( '->', 'arcade' ),
                ) );
                ?>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="col-lg-4 sidebar">
          <div class="sidebar-box">
          </div>
            </div> -->
      </div>
    </div>
  </div>
  <?php get_footer(); ?>