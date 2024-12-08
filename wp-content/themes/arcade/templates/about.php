<?php
/**
 * Template Name: About
 */
?>

<?php get_header(); ?>

	<div class="site-cover site-cover-sm same-height overlay single-page" style="background-color: #214252;">
		<div class="container">
			<div class="row same-height justify-content-center">
				<div class="col-md-6">
					<div class="post-entry text-center">
						<h1 class="mb-4" data-aos="fade-up"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section sec-halfs py-0">
		<div class="container">
			<div class="half-content d-lg-flex align-items-stretch">
				<?php
				$image_left = get_post_meta( get_the_ID(), 'image_left', true ); // Вземете ID на изображението
				if ( $image_left ) {
					$image_left = wp_get_attachment_url( $image_left ); // URL на изображението
					?>
					<div class="img" style="background-image: url('<?php echo esc_url( $image_left ); ?>')" data-aos="fade-in" data-aos-delay="100"></div>
   				<?php } ?>
	
				<div class="text">
					<?php $text_block_right = get_post_meta(get_the_ID(), 'text_block_right', true);
						if ( $text_block_right ) {
							echo '<div class="about-text">' .  $text_block_right  . '</div>';
						}
					?>

				</div>
			</div>

			<div class="half-content d-lg-flex align-items-stretch">
				<?php
				$image_right = get_post_meta( get_the_ID(), 'image_right', true ); // Вземете ID на изображението
				if ( $image_right ) {
					$image_right = wp_get_attachment_url( $image_right ); // URL на изображението
					?>
					<div class="img order-md-2" style="background-image: url('<?php echo esc_url( $image_right ); ?>')" data-aos="fade-in" data-aos-delay="100"></div>
   				<?php } ?>
				
				<div class="text">
					<?php $text_block_left = get_post_meta(get_the_ID(), 'text_block_left', true);
						if ( $text_block_left ) {
							echo '<div class="about-text">' .  $text_block_left  . '</div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="section sec-features">
		<div class="container">
			<div class="row g-5">
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
					<div class="feature d-flex">
						<span class="bi-bag-check-fill"></span>
						<div> 
							<?php  $blue_section_h1 = get_post_meta(get_the_ID(), 'blue_section_h1', true);
								if (  $blue_section_h1 ) {
									echo '<h3>' . esc_html(  $blue_section_h1 )  . '</h3>';
								}
							?>

							<?php $blue_section_text1 = get_post_meta(get_the_ID(), 'blue_section_text1', true);
								if ( $blue_section_text1 ) {
									echo '<p>' . esc_html(  $blue_section_text1 )  . '</p>';
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="feature d-flex">
						<span class="bi-wallet-fill"></span>
						<div>
							<?php  $blue_section_h2 = get_post_meta(get_the_ID(), 'blue_section_h2', true);
								if (  $blue_section_h2 ) {
									echo '<h3>' . esc_html(  $blue_section_h2 )  . '</h3>';
								}
							?>

							<?php $blue_section_text2 = get_post_meta(get_the_ID(), 'blue_section_text2', true);
								if ( $blue_section_text2 ) {
									echo '<p>' . esc_html(  $blue_section_text2 )  . '</p>';
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
					<div class="feature d-flex">
						<span class="bi-pie-chart-fill"></span>
						<div>
							<?php  $blue_section_h3 = get_post_meta(get_the_ID(), 'blue_section_h3', true);
								if (  $blue_section_h3 ) {
									echo '<h3>' . esc_html(  $blue_section_h3 )  . '</h3>';
								}
							?>

							<?php $blue_section_text3 = get_post_meta(get_the_ID(), 'blue_section_text3', true);
								if ( $blue_section_text3 ) {
									echo '<p>' . esc_html(  $blue_section_text3 )  . '</p>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			
			<div class="row mb-5">
				<div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
		
							<?php  $our_team_heading = get_post_meta(get_the_ID(), 'our_team_heading', true);
								if ( $our_team_heading ) {
									echo '<h2 class="heading text-primary">' . esc_html(  $our_team_heading )  . '</h3>';
								}
							?>
							<?php $our_team_description = get_post_meta(get_the_ID(), 'our_team_description', true);
								if ( $our_team_description ) {
									echo '<p>' . esc_html(  $our_team_description )  . '</p>';
								}
							?>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="0">
					<?php
						$member_1_imaga = get_post_meta( get_the_ID(), 'member_1_imaga', true ); // Вземете ID на изображението
						if ( $member_1_imaga ) {
							$member_1_imaga = wp_get_attachment_url( $member_1_imaga ); // URL на изображението
							?>
							<img src="<?php echo esc_url( $member_1_imaga ); ?>" alt="Member Image" class="img-fluid w-50 rounded-circle mb-3">
						<?php
						} 
					?>
					<?php  $member_1_name = get_post_meta(get_the_ID(), 'member_1_name', true);
								if ( $member_1_name ) {
									echo '<h5 class="text-black">' . esc_html(  $member_1_name )  . '</h5>';
								}
					?>
					<?php $member_1_description = get_post_meta(get_the_ID(), 'member_1_description', true);
								if ( $member_1_description ) {
									echo '<p>' . esc_html(  $member_1_description )  . '</p>';
								}
					?>
				</div>
				<div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="100">
					<?php
						$member_2_imaga = get_post_meta( get_the_ID(), 'member_2_imaga', true ); // Вземете ID на изображението
						if ( $member_2_imaga ) {
							$member_2_imaga = wp_get_attachment_url( $member_2_imaga ); // URL на изображението
							?>
							<img src="<?php echo esc_url( $member_2_imaga ); ?>" alt="Member Image" class="img-fluid w-50 rounded-circle mb-3">
						<?php
						} 
					?>
					<?php  $member_2_name = get_post_meta(get_the_ID(), 'member_2_name', true);
								if ( $member_2_name ) {
									echo '<h5 class="text-black">' . esc_html(  $member_2_name )  . '</h5>';
								}
					?>
					<?php $member_2_description = get_post_meta(get_the_ID(), 'member_2_description', true);
								if ( $member_2_description ) {
									echo '<p>' . esc_html(  $member_2_description )  . '</p>';
								}
					?>							
				</div>
				<div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="200">
					<?php
						$member_3_imaga = get_post_meta( get_the_ID(), 'member_3_imaga', true ); // Вземете ID на изображението
						if ( $member_3_imaga ) {
							$member_3_imaga = wp_get_attachment_url( $member_3_imaga ); // URL на изображението
							?>
							<img src="<?php echo esc_url( $member_3_imaga ); ?>" alt="Member Image" class="img-fluid w-50 rounded-circle mb-3">
						<?php
						} 
					?>
					<?php  $member_3_name = get_post_meta(get_the_ID(), 'member_3_name', true);
								if ( $member_3_name ) {
									echo '<h5 class="text-black">' . esc_html(  $member_3_name )  . '</h5>';
								}
					?>
					<?php $member_3_description = get_post_meta(get_the_ID(), 'member_3_description', true);
								if ( $member_3_description ) {
									echo '<p>' . esc_html(  $member_3_description )  . '</p>';
								}
					?>	
				</div>
			</div>

		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-4 mb-lg-0">
					<?php
						$work_info_image = get_post_meta( get_the_ID(), 'work_info_image', true ); // Вземете ID на изображението
						if ( $work_info_image ) {
							$work_info_image = wp_get_attachment_url( $work_info_image ); // URL на изображението
							?>
							<img src="<?php echo esc_url( $work_info_image ); ?>" alt="Member Image" class="img-fluid rounded">
						<?php
						} 
					?>
				</div>
				<div class="col-lg-4 ps-lg-2">
					<div class="mb-5">
							<?php  $work_info_heading = get_post_meta(get_the_ID(), 'work_info_heading', true);
								if ( $work_info_heading ) {
									echo '<h2 class="text-black h4">' . esc_html(  $work_info_heading )  . '</h2>';
								}
							?>
							<?php $work_info_description = get_post_meta(get_the_ID(), 'work_info_description', true);
								if ( $work_info_description ) {
									echo '<p>' . esc_html(  $work_info_description )  . '</p>';
								}
							?>	
					
					</div>
					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-wallet-fill me-4"></span>
						</div>
						<div>
						<?php  $work_info_sub_heading_1 = get_post_meta(get_the_ID(), 'work_info_sub_heading_1', true);
								if ( $work_info_sub_heading_1 ) {
									echo '<h3>' . esc_html(  $work_info_sub_heading_1 )  . '</h3>';
								}
							?>
							<?php $work_info_description_1 = get_post_meta(get_the_ID(), 'work_info_description_1', true);
								if ( $work_info_description_1 ) {
									echo '<p>' . esc_html(  $work_info_description_1 )  . '</p>';
								}
							?>	
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-pie-chart-fill me-4"></span>
						</div>
						<div>
						<?php  $work_info_sub_heading_2 = get_post_meta(get_the_ID(), 'work_info_sub_heading_2', true);
								if ( $work_info_sub_heading_2 ) {
									echo '<h3>' . esc_html(  $work_info_sub_heading_2 )  . '</h3>';
								}
							?>
							<?php $work_info_description_2 = get_post_meta(get_the_ID(), 'work_info_description_2', true);
								if ( $work_info_description_2 ) {
									echo '<p>' . esc_html(  $work_info_description_2 )  . '</p>';
								}
							?>	
						</div>
					</div>

					<div class="d-flex mb-3 service-alt">
						<div>
							<span class="bi-bag-check-fill me-4"></span>
						</div>
						<div>
						<?php  $work_info_sub_heading_3 = get_post_meta(get_the_ID(), 'work_info_sub_heading_3', true);
								if ( $work_info_sub_heading_3 ) {
									echo '<h3>' . esc_html(  $work_info_sub_heading_3 )  . '</h3>';
								}
							?>
							<?php $work_info_description_3 = get_post_meta(get_the_ID(), 'work_info_description_3', true);
								if ( $work_info_description_3 ) {
									echo '<p>' . esc_html(  $work_info_description_3 )  . '</p>';
								}
							?>	
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
<?php get_footer(); ?>