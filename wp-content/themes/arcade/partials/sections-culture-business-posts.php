<?php
/**
 * Template Part: Sections for Business and Culture Categories
 */

if ( empty( $categories ) ) {
    $categories = ['Uncategorized']; // Задай стойност по подразбиране
}

// WP_Query аргументи за публикации от избраните категории
$category_post_query = [
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'category_name'     => implode(',', $categories), // комбиниране на категории в низ
    'posts_per_page'    => 6, // максимален брой публикации
    'orderby'           => 'date',
    'order'             => 'DESC',
];

$category_post_query = new WP_Query($category_post_query);

if ($category_post_query->have_posts()) : ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row g-3">
                <?php
                $count = 0;
                while ($category_post_query->have_posts()) : $category_post_query->the_post();
                    $count++;
                    if ($count > 2) break; // Показваме само първите 2 в лявата секция
                    ?>
                    <div class="col-md-6">
                        <div class="blog-entry">
                            <a href="<?php the_permalink(); ?>" class="img-link">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', ['class' => 'img-fluid']);
                                } else {
                                    echo '<img src="' . get_stylesheet_directory_uri() . '/images/default.jpg" alt="' . get_the_title() . '" class="img-fluid">';
                                }
                                ?>
                            </a>
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            <p><a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled blog-entry-sm">
                <?php
                $count = 2;
                while ($category_post_query->have_posts()) : $category_post_query->the_post();
                    $count++;
                    if ($count <= 2) continue; // Пропускаме първите 2
                    ?>
                    <li>
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        <p><a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
<?php
else :
    echo '<p>No posts found for this categories.</p>';
endif;

wp_reset_postdata();
?>
