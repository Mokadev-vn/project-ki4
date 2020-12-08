<?php layout('layout.header'); ?>



<!-- Home Design -->
<section class="home-one style3 parallax home_bg3" data-stellar-background-ratio="0.3">
	<div class="container">
		<div class="row home-content">
			<div class="col-lg-8">
				<div class="home-text">
					<h2 class="fz40">
						Find The Job That Fits Your Life

					</h2>
					<p class="color-white">Each month, more than 7 million jobseekers turn to website in their search for work, making over 160,000 applications every day.</p>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="home-job-search-box mt20 mb20">
					<form class="form-inline">
						<div class="search_option_one">
							<div class="form-group">
								<label for="exampleInputName"><span class="flaticon-search"></span></label>
								<input type="text" class="form-control h70" id="exampleInputName" placeholder="Job Title or Keywords">
							</div>
						</div>
						<div class="search_option_two">
							<div class="form-group">
								<label for="exampleInputEmail"><span class="flaticon-location-pin"></span></label>
								<input type="text" class="form-control h70" id="exampleInputEmail" placeholder="Location">
							</div>
						</div>
						<div class="search_option_button">
							<button type="submit" class="btn btnh3 btn-thm btn-secondary h70">Search</button>
						</div>
					</form>
				</div>
				<p class="color-white">Trending Keywords: DesignCer, Developer, Web, IOS, PHP, Senior, Engineer</p>
			</div>
		</div>
	</div>
</section>

<!-- Features Job List Design -->
<section class="popular-job">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="ulockd-main-title">
					<h3 class="mt0">Việc làm nổi bật</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($jobs as $rowjobs) : ?>
				<div class="col-sm-6 col-lg-12">
					<div class="fj_post home3">
						<div class="details">
							<div class="thumb fn-smd">
								<img class="img-fluid" src="<?=$rowjobs['avatar']?>" alt="2.jpg">
							</div>
							<h4><?= $rowjobs['title'] ?></h4>
							<p><?= $rowjobs['create_at'] ?> <a class="text-thm3" href="#">Robert Half Finance & Accounting</a></p>
							<ul class="featurej_post">
								<li class="list-inline-item"><span class="flaticon-location-pin"></span> <a href="#"><?= $rowjobs['city'] ?></a></li>
								<li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#"><?= $rowjobs['offerd_salary'] ?></a></li>
							</ul>
						</div>
						<a class="btn btn-md btn-transparent2 float-right fn-smd" href="#">Browse Job</a>
					</div>
				</div>
			<?php endforeach; ?>
		
			<div class="col-lg-6 offset-lg-3">
				<div class="pjc_all_btn text-center mt15">
					<a class="btn btn-blue" href="#">Show More Jobs <span class="flaticon-right-arrow pl10"></span></a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- How It's Work -->
<section class="popular-job bgc-fa">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="ulockd-main-title">
					<h3 class="mt0">How It Works?</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-lg-4 prpl5">
				<div class="icon_box_hiw home3">
					<div class="icon">
						<div class="list_tag float-right">
							<p>1</p>
						</div><span class="flaticon-unlocked"></span>
					</div>
					<div class="details">
						<h4>Create An Account</h4>
						<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 prpl5 mt20-xxsd">
				<div class="icon_box_hiw home3">
					<div class="icon middle">
						<div class="list_tag float-right">
							<p>2</p>
						</div><span class="flaticon-job"></span>
					</div>
					<div class="details">
						<h4>Search Jobs</h4>
						<p>Browse profiles, reviews, and proposals then interview top candidates.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4 prpl5 mt20-xxsd">
				<div class="icon_box_hiw home3">
					<div class="icon">
						<div class="list_tag float-right">
							<p>3</p>
						</div><span class="flaticon-trophy"></span>
					</div>
					<div class="details">
						<h4>Save & Apply</h4>
						<p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Top Company Registered -->
<section class="job-location">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="ulockd-main-title mb0">
					<h3 class="mt0">Top Company Registered</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="company_reg_slider">
				<?php	foreach($companys as $rowcompanys):?>
					<div class="item">
						<div class="company_grid text-center">
							<div class="thumb"><img class="img-fluid" src="<?=$rowcompanys['image']?>" alt="5.jpg"></div>
							<div class="details">
								<h4><?= $rowcompanys['name']?></h4>
								<p><span class="flaticon-location-pin pr10"></span><?= $rowcompanys['full_address']?></p>
								<a class="btn btn-blue" href="#">4 Open Position</a>
							</div>
						</div>
					</div>
				<?php endforeach;?>
				
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Testimonials -->
<section class="our-carrer bgc-fa">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="ulockd-main-title">
					<h3 class="fz25 mt0">What Our Clients Say About Us</h3>
				</div>
			</div>
			<div class="col-lg-10 offset-lg-1">
				<div class="testimonial_slider_home3">
					<div class="item">
						<div class="testimonial_grid">
							<div class="t_icon home3"><span class="flaticon-quotation-mark"></span></div>
							<div class="testimonial_content">
								<div class="thumb">
									<img class="img-fluid" src="images/testimonial/1.jpg" alt="1.jpg">
									<h4>Alex Gibson</h4>
									<p>Telemarketer</p>
								</div>
								<div class="details">
									<p>This is the best job-board theme that our company has come across! Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite…</p>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial_grid">
							<div class="t_icon home3"><span class="flaticon-quotation-mark"></span></div>
							<div class="testimonial_content">
								<div class="thumb">
									<img class="img-fluid" src="images/testimonial/2.jpg" alt="2.jpg">
									<h4>Ali TUFAN</h4>
									<p>Designer</p>
								</div>
								<div class="details">
									<p>This is the best job-board theme that our company has come across! Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite…</p>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial_grid">
							<div class="t_icon home3"><span class="flaticon-quotation-mark"></span></div>
							<div class="testimonial_content">
								<div class="thumb">
									<img class="img-fluid" src="images/testimonial/3.jpg" alt="3.jpg">
									<h4>Martha Select</h4>
									<p>Developer</p>
								</div>
								<div class="details">
									<p>This is the best job-board theme that our company has come across! Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite…</p>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial_grid">
							<div class="t_icon home3"><span class="flaticon-quotation-mark"></span></div>
							<div class="testimonial_content">
								<div class="thumb">
									<img class="img-fluid" src="images/testimonial/4.jpg" alt="4.jpg">
									<h4>Alex Gibson</h4>
									<p>Telemarketer</p>
								</div>
								<div class="details">
									<p>This is the best job-board theme that our company has come across! Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite…</p>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial_grid">
							<div class="t_icon home3"><span class="flaticon-quotation-mark"></span></div>
							<div class="testimonial_content">
								<div class="thumb">
									<img class="img-fluid" src="images/testimonial/2.jpg" alt="5.jpg">
									<h4>Ali TUFAN</h4>
									<p>Telemarketer</p>
								</div>
								<div class="details">
									<p>This is the best job-board theme that our company has come across! Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite…</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Our Carrer Tips -->
<section class="our-carrer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="ulockd-main-title">
					<h3 class="fz25 mt0">Quick Career Tips</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="carrer_tips_slider">
					<div class="item">
						<a href="#" class="carrer_tips">
							<div class="ct_header">
								<img class="img-fluid" src="images/blog/h31.jpg" alt="h31.jpg">
								<div class="ct_date_meta">
									<p class="year">2018</p>
									<p class="date">April 24</p>
								</div>
							</div>
							<div class="details">
								<h5>Tips</h5>
								<h4>Attract More Attention Sales And Profits</h4>
								<p>A job ravenously while Far much that one rank beheld after outside ignobly more when oh fussy insect wow.</p>
							</div>
						</a>
					</div>
					<div class="item">
						<a href="#" class="carrer_tips">
							<div class="ct_header">
								<img class="img-fluid" src="images/blog/h32.jpg" alt="h32.jpg">
								<div class="ct_date_meta">
									<p class="year">2018</p>
									<p class="date">April 24</p>
								</div>
							</div>
							<div class="details">
								<h5>Tips</h5>
								<h4>11 Tips to Help You Get New Clients</h4>
								<p>Think back over your life. Think about the people that had a positive influence on Far much that one rank beheld.</p>
							</div>
						</a>
					</div>
					<div class="item">
						<a href="#" class="carrer_tips">
							<div class="ct_header">
								<img class="img-fluid" src="images/blog/h33.jpg" alt="h33.jpg">
								<div class="ct_date_meta">
									<p class="year">2018</p>
									<p class="date">April 24</p>
								</div>
							</div>
							<div class="details">
								<h5>Tips</h5>
								<h4>An Overworked Newspaper Editor</h4>
								<p>Repeatedly dreamed alas opossum but dramatical despite expeditiously that jeepers loosely yikes the as compactly far.</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Our Pricing Table -->
<section class="our-pricing bgc-fa">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="ulockd-main-title mb50">
					<h3 class="mt0">Membership Plans</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-4 p0 prpl5-sm">
				<div class="pricing_table home3 one">
					<div class="pt_header_four">
						<div class="pt_tag_four"><span>$90.00 / monthly</span></div>
						<h4>Basic Jobs</h4>
					</div>
					<div class="pt_details">
						<ul>
							<li><a href="#">1 job posting</a></li>
							<li><a href="#">0 featured job</a></li>
							<li><a href="#">Job displayed for 20 days</a></li>
							<li><a href="#">Premium Support 24/7</a></li>
						</ul>
						<a href="#" class="btn btn-lg btn-block"><span> Buy Now</span></a>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 p0 prpl5-sm">
				<div class="pricing_table mid home3">
					<h3 class="text-center">Most Popular</h3>
					<div class="pt_header_four">
						<div class="pt_tag_four"><span>$90.00 / monthly</span></div>
						<h4>Basic Jobs</h4>
					</div>
					<div class="pt_details">
						<ul>
							<li><a href="#">1 job posting</a></li>
							<li><a href="#">0 featured job</a></li>
							<li><a href="#">Job displayed for 20 days</a></li>
							<li><a href="#">Premium Support 24/7</a></li>
						</ul>
						<a href="#" class="btn btn-lg btn-block"><span> Buy Now</span></a>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 p0 prpl5-sm">
				<div class="pricing_table home3 three">
					<div class="pt_header_four">
						<div class="pt_tag_four"><span>$90.00 / monthly</span></div>
						<h4>Golden Jobs</h4>
					</div>
					<div class="pt_details">
						<ul>
							<li><a href="#">90 job posting</a></li>
							<li><a href="#">35 featured job</a></li>
							<li><a href="#">Job displayed for 60 days</a></li>
							<li><a href="#">Premium Support 24/7</a></li>
						</ul>
						<a href="#" class="btn btn-lg btn-block"><span> Buy Now</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php layout('layout.footer'); ?>