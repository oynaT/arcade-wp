<?php get_header(); ?>

<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="heading text-white mb-3" data-aos="fade-up">
                    <?php echo get_the_archive_title(); ?>
                </h1>
                <p class="text-white">
                    <?php echo get_the_author_meta( 'description' ); ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row posts-entry">
            <div class="col-lg-8">
                <?php
                $args = array(
                    'post_type'      => array( 'post', 'faqs' ),
                    'author'         => get_the_author_meta( 'ID' ),
                    'posts_per_page' => 10,
                );

                $custom_query = new WP_Query( $args );
                if ( $custom_query->have_posts() ) :
                    while ( $custom_query->have_posts() ) :
                        $custom_query->the_post();
                ?>
                <div id="post-id-<?php the_ID(); ?>" <?php post_class( 'blog-entry d-flex blog-entry-search-item' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="img-link me-4">
                            <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid custom-thumbnail', 'title' => 'Feature image' ) ); ?>
                        </a>
                    <?php endif; ?>
                    <div>
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <p>No posts found.</p>
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

                <?php wp_reset_postdata(); ?>
            </div>

            <div class="col-lg-4 sidebar">
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

            <div class="sidebar-box">
              <h3 class="heading">FAQ Categories</h3>
              <?php display_faq_categories_in_sidebar(); ?>
              </div>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>
