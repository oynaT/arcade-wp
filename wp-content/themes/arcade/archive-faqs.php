<?php get_header(); ?>

<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="heading text-white mb-3" data-aos="fade-up"><?php echo get_the_archive_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row posts-entry">
            <div class="col-lg-8">
              
                <?php if ( have_posts() ) : ?>
                <!-- Bootstrap Accordion -->
                <div class="accordion" id="faqAccordion">
                    <?php $faq_count = 0; ?>
                    <?php while ( have_posts() ) : the_post(); $faq_count++; ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?php echo $faq_count; ?>">
                                <button class="accordion-button <?php echo $faq_count > 1 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $faq_count; ?>" aria-expanded="<?php echo $faq_count === 1 ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo $faq_count; ?>">
                                    <?php the_title(); ?>
                                </button>
                            </h2>
                            <div id="collapse-<?php echo $faq_count; ?>" class="accordion-collapse collapse <?php echo $faq_count === 1 ? 'show' : ''; ?>" aria-labelledby="heading-<?php echo $faq_count; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <?php the_content(); ?>
                                    <p>
                                        <a href="<?php echo get_permalink(); ?>" class="btn btn-sm btn-primary">
                                            Read More
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- End Accordion -->
            <?php else : ?>
                <p>No FAQs found.</p>
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
                   <div class="sidebar-box">
                      <h3 class="heading">FAQ Categories</h3>
                      <?php display_faq_categories_in_sidebar(); ?>
                  </div>
                </div>
                <!-- END sidebar-box -->
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
