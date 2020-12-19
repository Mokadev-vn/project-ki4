<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
	<div class="container">
		<div class="row">
			<?php layout('user.layout.menu'); ?>
			<?php if (getSession('user')['role'] == 1) : ?>
				<div class="col-sm-12 col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mb30">Dashboard</h4>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-paper-plane"></span></div>
								<div class="detais">
									<div class="timer"><?= $countAp ?></div>
									<p>Applied Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-favorites"></span></div>
								<div class="detais">
									<div class="timer">26</div>
									<p>Favorite Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-rating"></span></div>
								<div class="detais">
									<div class="timer">79</div>
									<p>Reviews</p>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="recent_job_apply">
								<h4 class="title">Recent Apply Jobs <a class="text-thm float-right" href="applied-jobs">Browse All Jobs <span class="flaticon-right-arrow"></span></a></h4>
								<?php foreach ($listAp as $ap) : ?>
									<div class="rj_grid">
										<h4 class="sub_title"><?= $ap['title'] ?></h4>
										<p class="text-thm float-left"><span class="flaticon-clock"></span> <?= formatDate($ap['create_at']) ?> </p>
										<ul class="rj_post_address float-right">
											<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
											<li class="list-inline-item"><a href="#"><?= $ap['full_address'] ?></a></li>
											<li class="list-inline-item delete-apply" id-ap="<?= $ap['id_app'] ?>"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
										</ul>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="recent_job_activity">
								<h4 class="title">Activity</h4>
								<div class="grid">
									<div class="color_bg float-left"></div>
									<ul>
										<li><span>Dobrick </span>published an article</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg two float-left"></div>
									<ul>
										<li><span>Stella </span>created an event</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg three float-left"></div>
									<ul>
										<li><span>Peter </span>submitted the reports</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg four float-left"></div>
									<ul>
										<li><span>Nateila </span>updated the docs</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg float-left"></div>
									<ul>
										<li><span>Dobrick </span>published an article</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid mb0">
									<div class="color_bg two float-left"></div>
									<ul>
										<li><span>Stella </span>created an event</li>
										<li>2 hours ago</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php else : ?>
				<div class="col-sm-12 col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mb30">Dashboard</h4>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-paper-plane"></span></div>
								<div class="detais">
									<div class="timer"><?= $headJob['job_total'] ?></div>
									<p>Posted Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-favorites"></span></div>
								<div class="detais">
									<div class="timer"><?= $apply['total'] ?></div>
									<p>Applications</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-alarm"></span></div>
								<div class="detais">
									<div class="timer"><?= $headJob['active_total'] ?></div>
									<p>Shortlisted</p>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="recent_job_apply">
								<h4 class="title">Recent Applicants</h4>
								<?php foreach ($listResumes as $info) : ?>
									<div class="candidate_list_view style3 mb50">
										<div class="thumb">
											<img class="img-fluid rounded-circle" width="120px" src="<?= APP_CONFIG['uploads'] ?><?= ($info['avatar']) ? $info['avatar'] : 'avatar.png' ?>" alt="c2.jpg">
											<div class="cpi_av_rating"><span>4.5</span></div>
										</div>
										<div class="content">
											<h4 class="title"><?= $info['name'] ?> <small class="verified text-thm2 pl10"><i class="fa fa-check-circle"></i></small></h4>
											<p><?= $info['title'] ?></p>
											<ul class="review_list">
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
											</ul>
										</div>
										<ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
											<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> <?= $info['address'] ?></a></li>
											<?php if ($info['pay'] == 1) : ?>
												<li class="list-inline-item"><a href="<?= APP_CONFIG['uploads'] . $info['file'] ?>" data-toggle="tooltip" data-placement="top" title="Download CV" class="download"><span class="flaticon-resume"></span> Download CV</a></li>
											<?php else : ?>
												<li class="list-inline-item down-cv" id-ap="<?= $info['apply_id']; ?>"><a href="#" data-toggle="tooltip" data-placement="top" title="Download CV" class="download"><span class="flaticon-resume"></span> Download CV</a></li>
											<?php endif; ?>
										</ul>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="recent_job_activity">
								<h4 class="title">Activity</h4>
								<div class="grid">
									<div class="color_bg float-left"></div>
									<ul>
										<li><span>Dobrick </span>published an article</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg two float-left"></div>
									<ul>
										<li><span>Stella </span>created an event</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg three float-left"></div>
									<ul>
										<li><span>Peter </span>submitted the reports</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg four float-left"></div>
									<ul>
										<li><span>Nateila </span>updated the docs</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid">
									<div class="color_bg float-left"></div>
									<ul>
										<li><span>Dobrick </span>published an article</li>
										<li>2 hours ago</li>
									</ul>
								</div>
								<div class="grid mb0">
									<div class="color_bg two float-left"></div>
									<ul>
										<li><span>Stella </span>created an event</li>
										<li>2 hours ago</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php layout('layout.footer'); ?>