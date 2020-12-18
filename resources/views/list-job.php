<?php layout('layout.header'); ?>
<!-- Our Candidate List -->
<section class="our-faq bgc-fa mt50">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="row mb20">
					<div class="col-md-6 col-lg-6">
						<div class="candidate_job_alart_btn pjlv3">
							<h4 class="fz20 mb15"><?= count($listJob) ?> Candidates Found</h4>
							<button class="btn btn-thm btns ml10 fr-xsd">Show Filter</button>
						</div>
					</div>
					<div class="col-md-6 col-lg-6">
						<div class="candidate_revew_select pjlv3 job_list text-right mt50">
							<ul>
								<li class="list-inline-item">Sort by:</li>
								<li class="list-inline-item">
									<select class="selectpicker show-tick">
										<option>Newest</option>
										<option>Recent</option>
										<option>Old Review</option>
									</select>
								</li>
							</ul>
						</div>
						<div class="content_details">
							<div class="details">
								<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span>Hide Filter</span><i>×</i></a>
								<div class="faq_search_widget mb30">
									<h4 class="fz20 mb15">Search Keywords</h4>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
										</div>
									</div>
								</div>
								<div class="faq_search_widget mb30">
									<h4 class="fz20 mb15">Location</h4>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Find Your Question" aria-label="Recipient's username" aria-describedby="button-addon2">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-location-pin"></span></button>
										</div>
									</div>
								</div>
								<div class="cl_latest_activity mb30">
									<h4 class="fz20 mb15">Date Posted</h4>
									<div class="ui_kit_radiobox">
										<div class="radio">
											<input id="radio_one" name="radio" type="radio" checked="">
											<label for="radio_one"><span class="radio-label"></span> Last Hour</label>
										</div>
										<div class="radio">
											<input id="radio_two" name="radio" type="radio">
											<label for="radio_two"><span class="radio-label"></span> Last 24 hours</label>
										</div>
										<div class="radio">
											<input id="radio_three" name="radio" type="radio">
											<label for="radio_three"><span class="radio-label"></span> Last 7 days</label>
										</div>
										<div class="radio">
											<input id="radio_four" name="radio" type="radio">
											<label for="radio_four"><span class="radio-label"></span> Last 14 days</label>
										</div>
										<div class="radio">
											<input id="radio_five" name="radio" type="radio">
											<label for="radio_five"><span class="radio-label"></span> Last 30 days</label>
										</div>
										<a class="text-thm2 pl30" href="#">View All <span class="flaticon-right-arrow pl10"></span></a>
									</div>
									<div class="cl_latest_activity mb30">
									</div>
									<h4 class="fz20 mb15">Job Type</h4>
									<div class="ui_kit_whitchbox">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch1">
											<label class="custom-control-label" for="customSwitch1">Freelance</label>
										</div>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch2">
											<label class="custom-control-label" for="customSwitch2">Full Time</label>
										</div>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch3">
											<label class="custom-control-label" for="customSwitch3">Part Time</label>
										</div>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch4">
											<label class="custom-control-label" for="customSwitch4">Internship</label>
										</div>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch5">
											<label class="custom-control-label" for="customSwitch5">Temporary</label>
										</div>
									</div>
								</div>
								<div class="cl_pricing_slider mb30">
									<h4 class="fz20 mb20">Hourly Rate</h4>
									<div id="slider-range"></div>
									<p class="text-center">
										<input class="sl_input" type="text" id="amount">
									</p>
								</div>
								<div class="cl_skill_checkbox mb30">
									<h4 class="fz20 mb20">Skills</h4>
									<div class="content ui_kit_checkbox text-left">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">HTML 5</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck2">
											<label class="custom-control-label" for="customCheck2">Javascript</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck3">
											<label class="custom-control-label" for="customCheck3">PHP</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck4">
											<label class="custom-control-label" for="customCheck4">jQuery</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck5">
											<label class="custom-control-label" for="customCheck5">UX/UI Design</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck6">
											<label class="custom-control-label" for="customCheck6">Design</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck7">
											<label class="custom-control-label" for="customCheck7">Web Design</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck8">
											<label class="custom-control-label" for="customCheck8">Graphic Design</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck9">
											<label class="custom-control-label" for="customCheck9">Sketch App</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck10">
											<label class="custom-control-label" for="customCheck10">UI Design</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck11">
											<label class="custom-control-label" for="customCheck11">Graphic Design</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck12">
											<label class="custom-control-label" for="customCheck12">Sketch App</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck13">
											<label class="custom-control-label" for="customCheck13">UI Design</label>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php foreach ($listJob as $job) : ?>
						<div class="col-lg-6 col-xl-4">
							<div class="fj_post style3">
								<div class="details">
									<div class="thumbs">
										<img class="img-fluid d-block mx-auto img-thubn w-auto" src="<?= ($job['avatar']) ? APP_CONFIG['uploads'].$job['avatar'] : APP_CONFIG['static'].'images/partners/cs1.jpg' ?>" alt="">
									</div>
									<h5 class="job_chedule text-thm2"><?= ($job['type'] == 1) ? 'Full Time' : 'Part Time' ?></h5>
									<h4><?= $job['title'] ?></h4>
									<p><span class="flaticon-clock"></span> <?= formatDate($job['create_at']) ?></p>
									<div class="featurej_post mt40">
										<p><span class="flaticon-location-pin"></span> <a href="#"><?= ($job['city'] == 1) ? 'Hà Nội' : (($job['city'] == 2) ? 'Đà Nẵng' : 'TP Hồ Chí Minh') ?></a></p>
										<a class="btn btn-transparent" href="<?= APP_CONFIG['url'].'job/'.$job['slug'] ?>">Browse Job</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="col-lg-12">
						<div class="mbp_pagination text-center">
							<ul class="page_navigation">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item active" aria-current="page">
									<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
								</li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item"><a class="page-link" href="#">...</a></li>
								<li class="page-item"><a class="page-link" href="#">45</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next <span class="flaticon-right-arrow"></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php layout('layout.footer'); ?>