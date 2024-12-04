<?php
$populate_posts_args = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    =>  $number_of_posts,
    'orderby'           => 'date', // order by date
    'order'             => 'desc' // the latest post 
);

$populate_posts_query = new WP_Query( $populate_posts_args );
?>

<?php if ( $populate_posts_query->have_posts() ) : ?>
              <?php while( $populate_posts_query->have_posts() ) : $populate_posts_query->the_post(); ?>
                <li>
                <a href="<?php echo get_the_permalink(); ?>">
                   <?php the_post_thumbnail( 'thumbnail', [ 'class' => 'me-4 rounded', 'title' => 'Feature image' , 'alt' => 'Image placeholder' ] ); ?>
            
                    <div class="text">
                      <h4><?php echo get_the_title(); ?></h4>
                      <div class="post-meta">
                        <span class="mr-2"><?php echo get_the_date(); ?></span>
                      </div>
                    </div>
                  </a>
                </li>
                <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>