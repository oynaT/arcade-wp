<?php 
get_header(); 
//$bgImage = get_the_post_thumbnail_url(null ,'full') ?: 'path-to-default-image.jpg';
?>
 <?php while( have_posts() ) : the_post(); ?>
 
 <?php 
 $hero_image_url = get_field('hero_post_image'); 
  if ($hero_image_url)  :?>
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?php echo $hero_image_url; ?>');">
  <?php  else :?>
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-color: #214252;">
  <?php endif; ?>
  
  <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
              <h1 class="mb-4"><?php the_title(); ?></h1>
              <div class="post-meta align-items-center text-center">
              <!-- <figure class="author-figure mb-0 me-3 d-inline-block"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure> -->
              <span class="d-inline-block mt-1">By <?php echo get_the_author_meta( 'display_name' ); ?></span>
              <span class="d-inline-block mt-1">By <a class="text-white" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> - <?php the_author(); ?></a></span> 
              <span>&nbsp;-&nbsp; <?php echo get_the_date(); ?></span>
                <?php
                      
                  $faq_categories = get_the_terms(get_the_ID(), 'faqs-category'); 
                  if ($faq_categories && ! is_wp_error($faq_categories)) {
                    $category_name = array_shift($faq_categories); //get first cat
                     echo '- &nbsp;<span class="category-name">Category: <i>' . esc_html($category_name->name) . '</i></span>';
                  }
                        
                 ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">
      <div class="row blog-entries element-animate">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="post-content-body">
          <?php the_content() ?>
          </div>
          <!-- <div class="pt-4" style="display:flex">
            Categories: <?php #the_category(); ?> &nbsp;
            <?php #the_tags(); ?>
          </div> -->
        </div>
        <?php endwhile; ?>
        
        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box">
          <h3 class="heading">FAQ Categories</h3>
          <?php display_faq_categories_in_sidebar(); ?>
          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

<?php get_footer(); ?>
