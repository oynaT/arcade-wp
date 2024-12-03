<!DOCTYPE html>
 <html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<!-- <link rel="shortcut icon" href="favicon.png"> -->

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/icomoon/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/tiny-slider.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/aos.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/glightbox.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/flatpickr.min.css">

	<!-- <title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title> -->
    
	<title><?php wp_title(); ?></title>
    
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'test-class' ); ?>>


	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>
	
	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="<?php echo get_home_url( '/' ); ?>" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

						<?php
						// WordPress Menu
						$nav_menu_args = array(
							//'menu'				=> 'primary-menu', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
							'menu_class'		=> 'js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto', // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
							'container'			=> 'ul', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
							'container_class'	=> 'container-class', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
							'theme_location'	=> 'primary', // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
						);
						wp_nav_menu( $nav_menu_args );
						?>



							<!-- <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="index.html">Home</a></li>
								<li class="has-children">
									<a href="category.html">Pages</a>
									<ul class="dropdown">
										<li><a href="search-result.html">Search Result</a></li>
										<li><a href="blog.html">Blog</a></li>
										<li><a href="single.html">Blog Single</a></li>
										<li><a href="category.html">Category</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="#">Menu One</a></li>
										<li><a href="#">Menu Two</a></li>
										<li class="has-children">
											<a href="#">Dropdown</a>
											<ul class="dropdown">
												<li><a href="#">Sub Menu One</a></li>
												<li><a href="#">Sub Menu Two</a></li>
												<li><a href="#">Sub Menu Three</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="category.html">Culture</a></li>
								<li><a href="category.html">Business</a></li>
								<li><a href="category.html">Politics</a></li>
							</ul> -->

						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<form action="#" class="search-form d-none d-lg-inline-block">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>