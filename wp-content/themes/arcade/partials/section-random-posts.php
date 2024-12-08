<?php 
/**
 *  Section Random post from both Post and CPT-Faqs
 */

// WP_Query for "post" and CPT "faqs"
$args = array(
    'post_type'      => array('post', 'faqs'), // post и faqs CPT
    'posts_per_page' => 6, 
    'orderby'        => 'rand',
);
$random_posts_query = new WP_Query($args);
?>

<div class="row">
    <?php if ($random_posts_query->have_posts()) : ?>
        <?php while ($random_posts_query->have_posts()) : $random_posts_query->the_post(); ?>
            <div class="col-md-4">
                <a href="<?php the_permalink(); ?>" class="h-entry mb-30 v-height gradient">
                    <div class="featured-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');"></div>
                    <div class="text">
                        <span class="date"><?php echo get_the_date(); ?></span>
                        
                        <?php
                        //  category post
                        if ('post' === get_post_type()) {
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                echo '<span class="category-name"><i>' . esc_html( $categories[0]->name ) . '</i></span>';
                            }
                        }
                        
                        // category from CPT 'faqs'
                        if ('faqs' === get_post_type()) {
                            $faq_categories = get_the_terms(get_the_ID(), 'faqs-category'); 
                            if ($faq_categories && ! is_wp_error($faq_categories)) {
                                $category_name = array_shift($faq_categories); // Вземаме първата категория
                                echo '<span class="category-name"><i>' . esc_html($category_name->name) . '</i></span>';
                            }
                        }
                        ?>

                        <h2><?php the_title(); ?></h2>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php wp_reset_postdata(); ?>
