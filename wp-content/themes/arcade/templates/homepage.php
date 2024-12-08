<?php
/**
 * Template Name: Homepage
 */
?>

<?php get_header(); ?>
	<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
			<?php get_template_part('partials/section-random-posts', 'section'); ?>
				<!-- <div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('http://localhost/arcade/wp-content/themes/blogy/images/img_2_horizontal.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>AI can now kill those annoying cookie pop-ups</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img" style="background-image: url('http://localhost/arcade/wp-content/themes/blogy/images/img_5_horizontal.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Don’t assume your user data in the cloud is safe</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry img-5 h-100 gradient">

						<div class="featured-img" style="background-image: url('http://localhost/arcade/wp-content/themes/blogy/images/img_1_vertical.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Why is my internet so slow?</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('http://localhost/arcade/wp-content/themes/blogy/images/img_3_horizontal.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Startup vs corporate: What job suits you best?</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img" style="background-image: url('http://localhost/arcade/wp-content/themes/blogy/images/img_4_horizontal.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Thought you loved Python? Wait until you meet Rust 1</h2>
						</div>
					</a>
				</div> -->
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Business</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="/arcade/category/business" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
			<?php display_posts_by_category_name(['Business']); ?>
				</div>
		</div>
	</section>

	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			 <div class="row">
				<?php get_template_part( 'partials/more-blog-posts' , 'section' ); ?> 
			</div> 		
		</div>
	</section>

	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Culture</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="/arcade/category/culture" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
			<?php display_posts_by_category_name(['Culture']); ?>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="/arcade/author/arcade/" class="read-more">View All</a></div>
			</div>
			<div class="row">
			
			<?php get_template_part('partials/section-politics-posts' , 'section'); ?>
			
		</div>
		
		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Travel</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="/arcade/author/travel/" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">

			<?php get_template_part('partials/section-travel-posts', 'section'); ?>

			</div>
		</div>
	</div>
	</div>
	</div>
<?php get_footer(); ?>
