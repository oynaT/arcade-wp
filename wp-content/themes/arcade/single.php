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
              <span>&nbsp;-&nbsp; <?php echo get_the_date(); ?></span>
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
          <div class="pt-4" style="display:flex">
            Categories: <?php the_category(); ?> &nbsp;
            <?php the_tags(); ?>
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
              <?php display_popular_posts( 3 ); ?>
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

          <div class="sidebar-box">
            <!-- <h3 class="heading">Tags</h3> -->
            <!-- <ul class="tags">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Adventure</a></li>
              <li><a href="#">Food</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Freelancing</a></li>
              <li><a href="#">Travel</a></li>
              <li><a href="#">Adventure</a></li>
              <li><a href="#">Food</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Freelancing</a></li>
            </ul> -->
          </div>
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-uppercase text-black">More Blog Posts for this category</div>
        </div>
        <div class="row">
            <?php get_template_part( 'partials/more-blog-posts' , 'section' ); ?>  
        </div>
    </div>
</section>
<!-- End posts-entry -->

<?php get_footer(); ?>