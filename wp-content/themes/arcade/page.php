<?php get_header(); ?>

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
              <h1 class="mb-4" data-aos="fade-up"><?php the_title(); ?></h1>
              <div class="post-meta align-items-center text-center" data-aos="fade-up">
              <!-- <figure class="author-figure mb-0 me-3 d-inline-block"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure> -->
              <!-- <span class="d-inline-block mt-1">By <?php #echo get_the_author_meta( 'display_name' ); ?></span> -->
              <span class="d-inline-block mt-1">By <a class="text-white" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> - <?php the_author(); ?></a></span>
              <span >&nbsp;-&nbsp; <?php echo get_the_date(); ?></span>
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
        </div>
        <?php endwhile; ?>
        
        <div class="col-md-12 col-lg-4 sidebar">
        <div class="sidebar-box search-form-wrap">
          <!-- END sidebar-box -->  
          <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
              <?php display_popular_posts( 2 ); ?>
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

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
          <!-- END sidebar-box -->
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

<?php get_footer(); ?>