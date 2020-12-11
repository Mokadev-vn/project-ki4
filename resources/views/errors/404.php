<?php layout('layout.header'); ?>
	<!-- Our Error Page -->
	<section class="our-error bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="error_page newsletter_widget">
						<div class="erro_code"><img class="img-fluid" src="<?= APP_CONFIG['static'] ?>images/resource/404.png" alt="404.png"></div>
						<h4>We Are Sorry, Page Not Found</h4>
						<p>Unfortunately the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exist. Check the Url you entered for any mistakes and try again.</p>
					</div>
					<a class="text-thm mt25" href="<?= APP_CONFIG['url'] ?>">Back to Homepage <span class="flaticon-right-arrow pl10"></span></a>
				</div>
			</div>
		</div>
	</section>
	<?php layout('layout.footer'); ?>