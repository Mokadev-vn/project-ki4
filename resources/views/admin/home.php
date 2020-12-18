<?php layout('layout.header'); ?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord">
		<div class="container">
			<div class="row">
				<?php layout('admin.layouts.menu'); ?>
				<div class="col-sm-12 col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<h4 class="mb30">Dashboard</h4>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-paper-plane"></span></div>
								<div class="detais">
									<div class="timer"><?= $countUser ?></div>
									<p>Users</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-favorites"></span></div>
								<div class="detais">
									<div class="timer"><?= $countCompany ?></div>
									<p>Companys</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-rating"></span></div>
								<div class="detais">
									<div class="timer"><?= $countJob ?></div>
									<p>Jobs</p>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="recent_job_apply">
								<h4 class="title">Recent Apply Jobs <a class="text-thm float-right" href="#">Browse All Jobs <span class="flaticon-right-arrow"></span></a></h4>
								<div class="rj_grid">
									<h4 class="sub_title">UX/UI Designer</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
								<div class="rj_grid">
									<h4 class="sub_title">Regional Sales Manager South east Asia</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
								<div class="rj_grid">
									<h4 class="sub_title">C Developer (Senior) C .Net</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
								<div class="rj_grid mb0">
									<h4 class="sub_title">UX/UI Designer</h4>
									<p class="text-thm float-left">Wiggle CRC</p>
									<ul class="rj_post_address float-right">
										<li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
										<li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
					    				<li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
									</ul>
								</div>
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
			</div>
		</div>
	</section>

<?php layout('layout.footer'); ?>