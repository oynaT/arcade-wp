<?php
/**
 * Template Part: Section Politics Categories
 */

    // WP_Query get post from category "politics"
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'category_name'  => 'politics', // category slug 
        'posts_per_page' => 6,         // number of posts
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    
                    <a href="<?php the_permalink(); ?>" class="img-link">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                        
                        <?php else : ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.jpg" alt="Image" class="img-fluid">
                        <?php endif; ?>
                    </a>
                    
                    <div class="excerpt">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
                        <div class="post-meta align-items-center text-left clearfix">
                            <!-- <figure class="author-figure mb-0 me-3 float-start">
                                <?php #echo get_avatar(get_the_author_meta('ID'), 48, '', '', ['class' => 'img-fluid']); ?>
                            </figure> -->
                            <span class="d-inline-block mt-1">By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                            <span>&nbsp;-&nbsp; <?php echo get_the_date(); ?></span>
                        </div>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <p><a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a></p>
                    </div>

                </div>
            </div>

        <?php endwhile;
        wp_reset_postdata();
    else : ?>

        <p>No posts found in the Politics category.</p>
    
    <?php endif; ?>
</div>
