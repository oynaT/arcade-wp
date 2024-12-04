<?php
$latest_posts_args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $number_of_posts,
);

$latest_posts_query = new WP_Query( $latest_posts_args );
?>

<?php if ( $latest_posts_query->have_posts() ) : ?>
    <section id="latest-blog" class="scrollspy-section bg-grey padding-large">
        <div class="container">

            <div class="row">

                <div class="col">

                    <div class="section-header">
                        <div class="title">
                            <span>read our blog</span>
                        </div>
                        <h2 class="section-title">latest blog</h2>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="post-grid">
                        <div class="row">

                            <?php while( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post(); ?>
                                <div class="col-md-4">

                                    <article class="post-item">

                                        <figure>
                                            <a href="<?php echo get_the_permalink(); ?>" class="image-hvr-effect">
                                                <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'post-image', 'title' => 'Feature image' ] ); ?>
                                            </a>
                                        </figure>

                                        <div class="post-content">
                                            <div class="meta-date"><?php echo get_the_date(); ?></div>
                                            <h3 class="post-title">
                                                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                            </h3>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </article>

                                </div>
                            <?php endwhile; ?>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col">

                    <div class="btn-wrap align-center">
                        <a href="#" class="btn btn-xlarge btn-accent btn-rounded">View all blog</a>
                    </div>

                </div>
            </div>

        </div>
    </section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>