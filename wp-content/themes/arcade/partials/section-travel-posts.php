
<?php
/**
 * Template Part: Section Travel Categories
 */

    // WP_Query за извличане на публикации от категория Travel
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'category_name'  => 'travel', // slug на категорията
        'posts_per_page' => 4,       // броят на публикациите
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        $counter = 0; // Брояч за постове
        while ($query->have_posts()) : $query->the_post();
            $counter++;
            if ($counter == 1) : // Първият пост (висока колона)
                ?>
                <div class="col-md-5 order-md-2">
                    <a href="<?php the_permalink(); ?>" class="hentry img-1 h-100 gradient">
                        <div class="featured-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'large'); ?>');"></div>
                        <div class="text">
                            <span><?php echo get_the_date(); ?></span>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>
            <?php elseif ($counter == 2) : // Вторият пост (голямо хоризонтално изображение) ?>
                <div class="col-md-7">
                    <a href="<?php the_permalink(); ?>" class="hentry img-2 v-height mb30 gradient">
                        <div class="featured-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'large'); ?>');"></div>
                        <div class="text text-sm">
                            <span><?php echo get_the_date(); ?></span>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </a>
                    <div class="two-col d-block d-md-flex justify-content-between">
            <?php else : // Останалите два поста (двуколонен layout) ?>
                        <a href="<?php the_permalink(); ?>" class="hentry v-height img-2 gradient">
                            <div class="featured-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>');"></div>
                            <div class="text text-sm">
                                <span><?php echo get_the_date(); ?></span>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
            <?php
                if ($counter == 4) : // Затваряне на двуколонния layout след четвъртия пост
                    ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile;

        wp_reset_postdata();
    
    else : ?>
        <p>No posts found in the Travel category.</p>
    <?php endif; ?>

