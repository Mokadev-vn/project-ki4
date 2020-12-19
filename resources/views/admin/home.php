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
					<div class="col-xl-12">
						<div class="recent_job_apply">
							<h4 class="title">Statistical </h4>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="ff_one">
									<div class="icon"><span class="flaticon-paper-plane"></span></div>
									<div class="detais">
										<div class="timer"><?= $getCompany['sum'] ?></div>
										<p>Total Coin</p>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="ff_one">
									<div class="icon"><span class="flaticon-paper-plane"></span></div>
									<div class="detais">
										<div class="timer"><?= $getHistory['sum'] ?></div>
										<p>Total Coin</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php layout('layout.footer'); ?>