	
	<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header(); ?>
	
	<div class="hero overlay inner-page bg-primary py-5">
		<div class="container">
			<div class="row align-items-center justify-content-center text-center pt-5">
				<div class="col-lg-6">
					<h1 class="heading text-white mb-3" data-aos="fade-up"><?php the_title(); ?> </h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
					<div class="contact-info">

						<div class="address mt-2">
							<i class="icon-room"></i>
							<h4 class="mb-2">Location:</h4>
							<?php $address = get_post_meta(get_the_ID(), 'address', true);
								if ( $address ) {
									echo '<p>' .  $address  . '</p>';
								}
							?>
						</div>

						<div class="open-hours mt-4">
							<i class="icon-clock-o"></i>
							<h4 class="mb-2">Open Hours:</h4>
							<?php $work_time = get_post_meta(get_the_ID(), 'work_time', true);
								if ( $work_time ) {
									echo '<p>' .  $work_time  . '</p>';
								}
							?>
						</div>

						<div class="email mt-4">
							<i class="icon-envelope"></i>
							<h4 class="mb-2">Email:</h4>
							<?php $email = get_post_meta(get_the_ID(), 'email', true);
								if ( $email ) {
									echo '<p>' .  $email  . '</p>';
								}
							?>
						</div>

						<div class="phone mt-4">
							<i class="icon-phone"></i>
							<h4 class="mb-2">Call:</h4>
							<?php $phone_number = get_post_meta(get_the_ID(), 'phone_number', true);
								if ( $phone_number ) {
									echo '<p>' .  $phone_number  . '</p>';
								}
							?>
						</div>

					</div>
				</div>
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<form action="#">
						<div class="row">
							<div class="col-6 mb-3">
								<input type="text" class="form-control" placeholder="Your Name">
							</div>
							<div class="col-6 mb-3">
								<input type="email" class="form-control" placeholder="Your Email">
							</div>
							<div class="col-12 mb-3">
								<input type="text" class="form-control" placeholder="Subject">
							</div>
							<div class="col-12 mb-3">
								<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
							</div>

							<div class="col-12">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- /.untree_co-section -->
	<?php get_footer(); ?>