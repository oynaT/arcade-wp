<?php get_header(); ?>


<h1>!!! SINGLE FAQ PAGE TEMPLATE!!!</h1>
<section id="about" class="scrollspy-section padding-xlarge">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="section-header">
                    <h2 class="section-title"><?php echo get_the_title(); ?></h2>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 description text-lead">
                <?php the_content(); ?>
            </div>



        </div>

    </div>
</section>

<?php // endif; ?>

<?php get_footer(); ?>