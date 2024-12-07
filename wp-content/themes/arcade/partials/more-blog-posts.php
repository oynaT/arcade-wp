<?php
// is single.php page or not
if ( is_single() ) {
    $categories = wp_get_post_categories( get_the_ID() );
    $args = [
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'category__in'   => $categories, // постове от същата категория
        'posts_per_page' => 4,          // брой постове
        'post__not_in'   => [ get_the_ID() ], // изключваме текущия пост
        'orderby'        => 'date',
        'order'          => 'DESC'
    ];
} else {
    $args = [
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'posts_per_page' => 4,  // брой постове
        'orderby'        => 'rand' // рандомизиране
    ];
}

// get posts
$related_posts = new WP_Query( $args );

if ( $related_posts->have_posts() ) :
    while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
        <div class="col-md-6 col-lg-3">
            <div class="blog-entry">
                <a href="<?php the_permalink(); ?>" class="img-link">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'medium', [ 'class' => 'img-fluid' ] ); 
                    } ?>
                </a>
                <span class="date"><?php echo get_the_date(); ?></span>
                <?php
                    $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '//<span class="category-name"><i>' . esc_html( $categories[0]->name ) . '</i></span>';
                    }
                ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                <p><a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a></p>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata();
else : ?>
    <p>No posts found</p>
<?php endif; ?>
