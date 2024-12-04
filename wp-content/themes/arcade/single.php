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
            <!-- <a href="#">Food</a>, <a href="#">Travel</a>   -->
            <?php the_tags(); ?>
            <!--  <a href="#">#manila</a>, <a href="#">#asia</a> -->
            
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
              <?php softuni_display_popular_posts( 3 ); ?>
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
            <h3 class="heading">Tags</h3>
            <ul class="tags">
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
            </ul>
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
            <div class="col-12 text-uppercase text-black">More Blog Posts</div>
        </div>
        <div class="row">
            <?php
            $categories = wp_get_post_categories( get_the_ID() );
            $args = array(
                'category__in'   => $categories, // post from the same category
                'posts_per_page' => 4, // number of posts
                'post__not_in'   => array( get_the_ID() ), // disabled current post
                'orderby'        => 'date',
                'order'          => 'DESC'
            );

            $related_posts = new WP_Query( $args );

            if ( $related_posts->have_posts() ) :
                while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="<?php the_permalink(); ?>" class="img-link">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'medium', [ 'class' => 'img-fluid' ]); 
                                } ?>
                            </a>
                            <span class="date"><?php echo get_the_date(); ?></span>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            <p><a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
                else : ?>
                <p>Not other post from this category</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<?php get_footer(); ?>